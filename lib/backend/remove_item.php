<?php
session_start();

/*
====================================================================================================
                                        EXPECTED VARIABLES
====================================================================================================

$_POST: 
    > 'sender'      : relative path (relative to frontend/index.php) of the calling script
    
$_SESSION:
    > 'rm_info'  : array of information about a raw material if one was scanned
    > 'dispersion_info'  : array of information about a dispersion if one was scanned

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
    
    > 'rm_info' :Array      
    : retrieved information about a raw material
    
    > 'dispersion_info' :Array
    : retrieved information about a dispersion

    ================================================================================================
*/

$sender = $_POST['sender']; // address this script was invoked from
$destination = "Location: ../../src/" . $sender; // calling script

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

// attempts to connect to database
connectToDB();

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
