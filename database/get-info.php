<?php
session_start();

$item_uid = $_POST['item_uid']; // form: '{Number}' + {'B' | 'R' | 'D'}
$sender = $_POST['sender']; // address this script was invoked from
$destination = "Location: ../src/" . $sender;

// resetSessionVars: Void -> Void
// Resets all session variables and starts a new session (creates a clean slate)
function resetSessionVars()
{
    session_destroy();
    session_start();
}

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
    $resetSessionVars and resetSessionVars();
    // sets error message before return 
    $_SESSION['err_msg'] = $errMsg;
    // returns to calling script
    header($destination);
    exit();
}

// connectToDB(): String -> PDO
// Creates a PDO (PHP Data Object) connection to database
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
        returnToSender($con->error, true);
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
        returnToSender('Database query failed: <br> uid:' . $item_uid . '<br>query: ' . $sql . '<br>Error: ' . $con->error, true);
    }
    if ($result->num_rows < 1) {
        // return of query was empty
        returnToSender('No matching entry in database found for uid: ' . $item_uid, true);
    }
    return mysqli_fetch_array($result);
}

// Returns an error if item_uid is poorly formed
(strlen($item_uid) < 2) and returnToSender('Poorly formed uid: ' . $item_uid, true);

// splits uid into number and letter representing item type
$uid_num = substr($item_uid, 0, -1);
$casted_uid_num = intval($item_uid);
$item_type = $item_uid[strlen($item_uid) - 1];

// Returns an error if item_uid doesn't contain valid number
($casted_uid_num <= 0) and returnToSender('Poorly formed uid: ' . $item_uid, true);

// Attempts to connect to database
connectToDB();

// Builds query and queries the connected database
$sql = "SELECT * FROM 29_RAW_INVENTORY WHERE uid=" . $casted_uid_num . "";

$_SESSION['status'] = 'info';
$_SESSION['sender'] = $sender;
$_SESSION['err_msg'] = '';
$_SESSION['item_uid'] = $item_uid;
$_SESSION['item_rm'] = '';
$_SESSION['item_lot'] = '';
$_SESSION['item_name'] = $item_info['name'];
$_SESSION['item_exp_date'] = '';
$_SESSION['item_location'] = $item_info['location'];
$_SESSION['item_quantity_kg'] = '';
$_SESSION['item_container'] = '';
$_SESSION['item_notes'] = '';
returnToSender('', false);
