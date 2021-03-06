<?php
session_start();
// Forcibly clears all session variables to ensure none exist.
$_SESSION = [];

/*
====================================================================================================
                                        EXPECTED VARIABLES
====================================================================================================

$_POST: 
    > 'item_uid'    : id of an item scanned by the user. If formed correctly
    > 'sender'      : the relative path (relative to frontend/index.php) of the calling script

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

$item_uid = $_POST['item_uid']; // form: '{Number}' + {'B' | 'R' | 'D'}
$sender = $_POST['sender']; // address this script was invoked from
$destination = "Location: ../../src/" . $sender;

// returnToSender: String String String Array Array -> Void
// Sets session variables and returns to calling script. If
// database connection is active/open, closes it. Returns given status, error message,
// success message, rm info array, dispersion info array.
function returnToSender($status, $errMsg, $successMsg, $rm_info, $dispersion_info)
{
    // gets global reference
    global $destination, $con;

    // database connection has been attempted and succeeded
    if (isset($con) && $con) {
        $con->close();
    }

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
        returnToSender('', 'Connection to database failed.<br>Error: ' . $con->error, '', array(), array());
    }
}

// queryDatabase(): String -> Array
// Queries the database with the given query, returns array representing result if query
// was successful and return is non-empty
function queryDatabase($sql)
{
    global $con, $item_uid;

    $result = $con->query($sql);

    if (!$result) {
        // query failed
        returnToSender('', 'Database query failed: <br>uid:' . $item_uid . '<br>query: ' . $sql . '<br>Error: ' . $con->error, '', array(), array());
    }
    if ($result->num_rows < 1) {
        // return of query was empty
        returnToSender('', 'No matching entry in database found for uid: ' . $item_uid, '', array(), array());
    }

    // returns the return row
    return mysqli_fetch_array($result);
}

// Returns an error if item_uid is poorly formed
if (strlen($item_uid) < 2) {
    returnToSender('', 'Poorly formed uid:<br>' . $item_uid, '', array(), array());
}

// splits uid into number and letter representing item type
$uid_num = substr($item_uid, 0, -1);
$casted_uid_num = intval($item_uid);
$item_type = $item_uid[strlen($item_uid) - 1];

// ensures item type exists
switch ($item_type) {
    case "R":
        break;
    case "D":
        break;
    default:
        returnToSender('', 'Unrecognized item type for<br>UID: ' . $item_uid, '', array(), array());
}

// Returns an error if item_uid doesn't contain valid number
if ($casted_uid_num <= 0) {
    returnToSender('', 'UID\'s must be greater than 0:<br>' . $item_uid, '', array(), array());
}

// Attempts to connect to database
connectToDB();

// Builds query based on item type (last character in item_uid)
switch ($item_type) {
    case "R":
        $sql = "SELECT * FROM 29_RAW_INVENTORY_ARCHIVE WHERE uid=" . $casted_uid_num . "";
        returnToSender('info', '', '', queryDatabase($sql), array());
        break;
    case "D":
        $sql = "SELECT * FROM 29_Dispersion_Inventory_ARCHIVE WHERE uid=" . $casted_uid_num . "";
        returnToSender('info', '', '', array(), queryDatabase($sql));
        break;
    default:
        returnToSender('', 'Unrecognized item type for<br>UID: ' . $item_uid, '', array(), array());
}
