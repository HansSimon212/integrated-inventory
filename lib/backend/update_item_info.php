<?php
session_start();

/*
====================================================================================================
                                        EXPECTED VARIABLES
====================================================================================================

$_POST: 
    > 'sender'      : relative path (relative to frontend/index.php) of the calling script
    > 'new_item_location' : new location for the scanned/looked up item
    > 'new_item_quantity_kg' : new quantity for the scanned/looked up item
    
$_SESSION:
    > 'passed_array'  : array of retrieved information about the scanned item

====================================================================================================
                                    VARIABLES SET BEFORE RETURN
====================================================================================================

$_SESSION:
    > 'status' :String             
    : what status the of the calling page should be (one of    '',    'info')
    
    > 'err_msg' :String 
    : any error message to be used in calling script
    
    > 'success_msg' :String        
    : any success message to be used in calling script 
    
    > 'rm_info' :String             
    : retrieved information about a raw material (serialized Array)
    
    > 'dispersion_info' :String
    : retrieved information about a dispersion (serialized Array)

    ================================================================================================
*/

$sender = $_POST['sender']; // address this script was invoked from

// one of these is empty, one contains information about an item
$rm_info = $_SESSION['rm_info'];
$dispersion_info = $_SESSION['dispersion_info'];

// getPassedArray(): Void -> Array
// Returns which of {$rm_info, $dispersion_info} is nonempty
function getPassedArray()
{
    global $rm_info, $dispersion_info;

    if (!empty($rm_info)) {
        return $rm_info;
    } else {
        return $dispersion_info;
    }
}

$passed_array = getPassedArray();

$new_item_location = $_POST['new_item_location'];
$new_item_quantity_kg = $_POST['new_item_quantity_kg'];
$item_uid = $passed_array['uid'];

$destination = "Location: ../../src/" . $sender; // calling script

// returnToSender: String String String Array Array -> Void
// Sets session variables and returns to calling script. If
// database connection is active/open, closes it. Returns given status, error message,
// success message, rm info array, dispersion info array.
function returnToSender($status, $errMsg, $successMsg, $rm_info, $dispersion_info)
{
    // gets global reference
    global $destination, $con;
    // closes database conn. if conn. has been attempted and succeeded
    isset($con) and $con and $con->close();

    $_SESSION = [];
    $_SESSION['status'] = $status;
    $_SESSION['err_msg'] = $errMsg;
    $_SESSION['success_msg'] = $successMsg;
    $_SESSION['rm_info'] = $rm_info;
    $_SESSION['dispersion_info'] = $dispersion_info;

    // returns to calling script
    header($destination);
    exit();
}

// connectToDB(): Void -> Void
// Attempts to establish connection to databse
function connectToDB()
{
    global $rm_info, $dispersion_info;

    // Variables required for MySQL connection
    $server = "208.109.166.118";
    $username = 'danielwilczak';
    $password = 'Dmw0234567';
    $database = "LEI_Inventory";

    // Attempts connection to database
    global $con;
    $con = mysqli_connect($server, $username, $password, $database);

    // Returns with an error message if error occurs
    if (mysqli_connect_errno()) {
        returnToSender('info', 'Connection to database failed.<br>Error: ' . $con->error, '', $rm_info, $dispersion_info);
    }
}

// queryDatabase(): String -> Array
// Queries the database with the given query, returns array representing result if query
// was successful and return is non-empty
function queryDatabase($sql)
{
    global $con, $rm_info, $dispersion_info, $item_uid;

    $result = $con->query($sql);

    if (!$result) {
        returnToSender('info', 'Database query failed: <br> uid:' . $item_uid . '<br>query: ' . $sql, '', $rm_info, $dispersion_info);
    }

    if (mysqli_connect_errno()) {
        returnToSender('info', 'Database query failed: <br> uid:' . $item_uid . '<br>query: ' . $sql . '<br>Error: ' . $con->error, '', $rm_info, $dispersion_info);
    }
    return mysqli_fetch_array($result);
}

// Error checking user inputted new item location, new item quantity
// $new_item_location
if ($new_item_location <= 0) {
    returnToSender('info', 'Invalid item location: ' . $new_item_location . '<br>Please input
    a positive number with no decimals.', '', $rm_info, $dispersion_info);
}

// $new_item_quantity_kg
if ($new_item_quantity_kg <= 0) {
    returnToSender('info', 'Invalid item quantity: ' . $new_item_quantity_kg . '<br>Please input
    a positive number.', '', $rm_info, $dispersion_info);
}

// Attempts to connect to database
connectToDB();

// gets previous location and weight
$previous_item_location = $passed_array['location'];
$previous_item_quantity_kg = $passed_array['quantity_Kg'];

// if neither location nor quantity is going to change, returns with error
if ($previous_item_location == $new_item_location && $previous_item_quantity_kg == $new_item_quantity_kg) {
    returnToSender('info', 'Item already has<br>Location: ' . $new_item_location . "<br>Quantity: " . $new_item_quantity_kg, '', $rm_info, $dispersion_info);
}

// composeSuccessMessage(): String String -> String
// Returns the message to be returned to the calling page on success
function composeSuccessMessage($prev_loc, $prev_quant, $new_loc, $new_quant)
{
    global $passed_array;

    $success_msg = '';
    $diff_loc = ($prev_loc != $new_loc);
    $diff_quant = ($prev_quant != $new_quant);

    // INVARIANT: either location or quantity was updated
    if ($diff_loc && !$diff_quant) {
        return 'Successfully moved<br>' . $passed_array['name'] . '<br>Rack ' . $prev_loc . ' &#10230 Rack ' . $new_loc;
    } else if ($diff_quant && !$diff_loc) {
        return 'Successfully changed quantity of<br>' . $passed_array['name'] . '<br>' . $prev_quant . ' Kg &#10230 ' . $new_quant . ' Kg';
    } else {
        return 'Successfully moved<br>' . $passed_array['name'] . '<br>Rack ' . $prev_loc . ' &#10230 Rack ' . $new_loc . '<br>and changed quantity<br>' . $prev_quant . ' Kg &#10230 ' . $new_quant . ' Kg';
    }
}

// Builds and submits query based on item type
if (!empty($rm_info)) {
    $sql = "UPDATE 29_RAW_INVENTORY SET location=" . $new_item_location . ",
        quantity_Kg=" . $new_item_quantity_kg . " WHERE uid=" . $item_uid . "";

    queryDatabase($sql);

    // We know the query was successful
    returnToSender('success', '', composeSuccessMessage($previous_item_location, $previous_item_quantity_kg, $new_item_location, $new_item_quantity_kg), array(), array());
} else if (!empty($dispersion_info)) {
    $sql = "UPDATE 29_Dispersion_Inventory SET location=" . $new_item_location . ",
        quantity_Kg=" . $new_item_quantity_kg . " WHERE uid=" . $item_uid . "";

    queryDatabase($sql);
    // We know the query was successful

    returnToSender('success', '', composeSuccessMessage($previous_item_location, $previous_item_quantity_kg, $new_item_location, $new_item_quantity_kg), array(), array());
} else {
    returnToSender('', "Unrecognized item type (attempted item info update)", '', array(), array());
}
