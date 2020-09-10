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
    global $destination, $pdo;

    if ($pdo) {
        $pdo = NULL;
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
    $db = parse_url(getenv("DATABASE_URL"));

    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));
}

// queryDatabase(): String -> Array
// Queries the database with the given query, returns array representing result if query
// was successful and return is non-empty
function queryDatabase($sql)
{
    global $pdo, $item_uid, $casted_uid_num;
    echo "<h1>before prepare</h1>";

    $stmt = $pdo->prepare($sql);
    echo "<h1>before execute</h1>";

    $stmt->execute([$casted_uid_num]);
    echo "<h1>before fetch</h1>";

    $result = $stmt->fetch();

    if (!$result) {
        echo "<h1>Query failed</h1>";
        exit();

        // query failed
        returnToSender('', 'Database query failed: <br>uid:' . $item_uid . '<br>query: ' . $sql, '', array(), array());
    }

    echo "<h1>Reached after query fail check.</h1>";
    exit();
    // returns the return row
    return $pdo->fetch();
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
        $sql = "SELECT * FROM 29_RAW_INVENTORY WHERE uid=" . "?" . "";
        returnToSender('info', '', '', queryDatabase($sql), array());
        break;
    case "D":
        $sql = "SELECT * FROM 29_Dispersion_Inventory WHERE uid=" . "?" . "";
        returnToSender('info', '', '', array(), queryDatabase($sql));
        break;
    default:
        returnToSender('', 'Unrecognized item type for<br>UID: ' . $item_uid, '', array(), array());
}
