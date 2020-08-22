<?php
session_start();

/*
====================================================================================================
                                        EXPECTED VARIABLES
====================================================================================================

$_POST: 
    > 'sender'      : relative path (relative to frontend/index.php) of the calling script
    > 'item_type_letter'   : scanned item's type (one of 'R', 'D', .... more to be added)
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

$item_type_letter = $_POST['item_type_letter'];
$new_item_location = $_POST['new_item_location'];
$new_item_quantity_kg = $_POST['new_item_quantity_kg'];
$item_uid = $passed_array['uid'];

$destination = "Location: ../../src/" . $sender; // calling script

// resetSessionVars: Void -> Void
// Resets all session variables and starts a new session (creates a clean slate)
function resetSessionVars()
{
    session_destroy();
    session_start();
}

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

    $_SESSION['status'] = $status;
    $_SESSION['err_msg'] = $errMsg;
    $_SESSION['success_msg'] = $successMsg;
    $_SESSION['rm_info'] = $rm_info;
    $_SESSION['dispersion_info'] = $dispersion_info;

    // returns to calling script
    header($destination);
    exit();
}

// returnToSenderWithData: String String -> Void
// Returns to calling script with error message.
// Sets data array to the array passed to this script (one of rm_info, dispersion_info)
function returnToSenderWithData($errMsg)
{
    global $item_type_letter, $passed_array;

    if ($item_type_letter == 'R') {
        returnToSender('info', $errMsg, '', $passed_array, array());
    } else if ($item_type_letter == 'D') {
        returnToSender('info', $errMsg, '', array(), $passed_array);
    } else {
        resetSessionVars();
        returnToSender('', 'Unrecognized item type: ' . $item_type_letter, '', array(), array());
    }
}

// connectToDB(): Void -> Void
// Attempts to establish connection to databse
function connectToDB()
{
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
        returnToSenderWithData($con->error);
    }
}

// queryDatabase(): String -> Array
// Queries the database with the given query, returns array representing result if query
// was successful and return is non-empty
function queryDatabase($sql)
{
    global $con, $item_uid, $passed_array;

    $result = $con->query($sql);

    if (!$result || mysqli_connect_errno()) {
        returnToSenderWithData('Database query failed: <br> uid:' . $item_uid . '<br>query: ' . $sql . '<br>Error: ' . $con->error);
    }
}

// Error checking user inputted new item location, new item quantity
// $new_item_location
if ($new_item_location <= 0) {
    returnToSenderWithData('Invalid item location: ' . $new_item_location . '<br>Please input
    a positive number with no decimals.');
}

// $new_item_quantity_kg
if ($new_item_quantity_kg <= 0) {
    returnToSenderWithData('Invalid item quantity: ' . $new_item_quantity_kg . '<br>Please input
    a positive number.');
}


// Attempts to connect to database
connectToDB();

// Builds query based on item type (last character in item_uid)
switch ($item_type_letter) {
    case "R":
        $sql = "UPDATE 29_RAW_INVENTORY SET location=" . $new_item_location . ",
        quantity_Kg=" . $new_item_quantity_kg . " WHERE uid=" . $item_uid . "";
        queryDatabase($sql);
        returnToSender('success', '', 'Successfully moved<br>' . $passed_array['name'] . '<br>to<br>Rack ' . $new_item_location, array(), array());
        break;
    case "D":
        $sql = "UPDATE 29_Dispersion_Inventory SET location=" . $new_item_location . ",
        quantity_Kg=" . $new_item_quantity_kg . " WHERE uid=" . $item_uid . "";
        queryDatabase($sql);
        returnToSender('success', '', 'Successfully moved<br>' . $passed_array['name'] . '<br>to<br>Rack ' . $new_item_location, array(), array());
        break;
    default:
        resetSessionVars();
        returnToSender('', "Unrecognized item type: " . $item_type_letter, '', array(), array());
}
