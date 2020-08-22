<?php
session_start();

/*
====================================================================================================
                                        EXPECTED VARIABLES
====================================================================================================

$_POST: 
    > 'sender'      : relative path (relative to frontend/index.php) of the calling script
    > 'item_type'   : scanned item's type (one of 'R', 'D', .... more to be added)
    > 'new_item_location' : new location for the scanned item
    
$_SESSION:
    > 'info_array'  : array of retrieved information about the scanned item

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
$info_array = $_SESSION['info_array'];
$item_type = $_POST['item_type'];
$new_item_location = $_POST['new_item_location'];
$item_uid = $info_array['uid'];

$destination = "Location: ../../src/" . $sender; // calling script

// resetSessionVars: Void -> Void
// Resets all session variables and starts a new session (creates a clean slate)
function resetSessionVars()
{
    session_destroy();
    session_start();
}

// returnToSender: String String Boolean -> Void
// Sets error message session variable and returns to calling script. If
// database connection is active/open, closes it. Returns with given status
function returnToSender($status, $errMsg, $resetSessionVars)
{
    // gets global reference
    global $destination, $con;
    // closes database conn. if conn. has been attempted and succeeded
    isset($con) and $con and $con->close();
    // clears all session variables if requested
    $resetSessionVars and resetSessionVars();

    $_SESSION['err_msg'] = $errMsg;
    $_SESSION['status'] = $status;

    // returns to calling script
    header($destination);
    exit();
}

// returnToSenderSuccess: String Boolean -> Void 
// Returns to calling script with success message
function returnToSenderSuccess($successMsg)
{
    // gets global reference
    global $destination, $con;
    // closes database conn. if conn. has been attempted and succeeded
    isset($con) and $con and $con->close();
    // clears all session variables if requested
    resetSessionVars();

    $_SESSION['err_msg'] = '';
    $_SESSION['status'] = 'success';
    $_SESSION['success_msg'] = $successMsg;

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
        returnToSender('info', $con->error, false);
    }
}

// queryDatabase(): String -> Array
// Queries the database with the given query, returns array representing result if query
// was successful and return is non-empty
function queryDatabase($sql)
{
    global $con, $item_uid;

    $result = $con->query($sql);

    if (!$result || mysqli_connect_errno()) {
        returnToSender('info', 'Database query failed: <br> uid:' . $item_uid . '<br>query: ' . $sql . '<br>Error: ' . $con->error, false);
    }
}

// Attempts to connect to database
connectToDB();

// Builds query based on item type (last character in item_uid)
switch ($item_type) {
    case "R":
        $sql = "UPDATE 29_RAW_INVENTORY SET location=" . $new_item_location . " WHERE uid=" . $item_uid . "";
        queryDatabase($sql);
        returnToSenderSuccess('Successfully moved<br>' . $info_array['name'] . '<br>to<br>Rack ' . $new_item_location);
        break;
    case "D":
        $sql = "UPDATE 29_Dispersion_Inventory SET location=" . $new_item_location . " WHERE uid=" . $item_uid . "";
        queryDatabase($sql);
        returnToSenderSuccess('Successfully moved<br>' . $info_array['name'] . '<br>to<br>Rack ' . $new_item_location);
        break;
    default:
        returnToSender('', "Unrecognized item type: " . $item_type, true);
}
