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

// returnToSender: String Boolean -> Void
// Sets error message session variable and returns to calling script. If
// database connection is active/open, closes it.
function returnToSender($errMsg, $resetSessionVars)
{
    // gets global reference
    global $destination, $con;
    // closes database conn. if conn. has been attempted and succeeded
    isset($con) and $con and $con->close();
    // clears all session variables if requested
    $resetSessionVars and $_SESSION = [];
    // sets error message before return 
    $_SESSION['err_msg'] = $errMsg;
    // returns to calling script
    header($destination);
    exit();
}

// returnErrorToSender: String -> Void
// Returns the given error message to calling script. If database connection
// is active/open, closes it. Resets all session vars.
function returnErrorToSender($errMsg)
{
    returnToSender($errMsg, true);
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
        returnErrorToSender($con->error);
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
        returnErrorToSender('Database query failed: <br> uid:' . $item_uid . '<br>query: ' . $sql . '<br>Error: ' . $con->error);
    }
    if ($result->num_rows < 1) {
        // return of query was empty
        returnErrorToSender('No matching entry in database found for uid: ' . $item_uid);
    }
    // returns the return row
    return mysqli_fetch_array($result);
}

// Returns an error if item_uid is poorly formed
(strlen($item_uid) < 2) and returnErrorToSender('Poorly formed uid: ' . $item_uid);

// splits uid into number and letter representing item type
$uid_num = substr($item_uid, 0, -1);
$casted_uid_num = intval($item_uid);
$item_type = $item_uid[strlen($item_uid) - 1];

// Returns an error if item_uid doesn't contain valid number
($casted_uid_num <= 0) and returnErrorToSender('Poorly formed uid: ' . $item_uid);

// Attempts to connect to database
connectToDB();

// Builds query based on item type (last character in item_uid)
switch ($item_type) {
    case "R":
        $sql = "SELECT * FROM 29_RAW_INVENTORY WHERE uid=" . $casted_uid_num . "";
        $_SESSION['status'] = 'info';
        $_SESSION['rm_info'] = queryDatabase($sql);
        returnToSender('', false);
        break;
    case "D":
        $sql = "SELECT * FROM 29_Dispersion_Inventory WHERE uid=" . $casted_uid_num . "";
        $_SESSION['status'] = 'info';
        $_SESSION['dispersion_info'] = queryDatabase($sql);
        returnToSender('', false);
        break;
    default:
        returnErrorToSender("Unrecognized item type: " . $item_type);
}

// Builds query and queries the connected database
