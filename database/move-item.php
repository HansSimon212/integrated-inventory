<?php
session_start();

$sender = $_POST['sender']; // address this script was invoked from
$info_array = $_SESSION['info_array'];
$item_type = $_POST['item_type'];
$new_item_location = $_POST['new_item_location'];
$item_uid = $info_array['uid'];

$destination = "Location: ../src/" . $sender; // calling script

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
        returnToSender('success', '', false);
        break;
    case "D":
        $sql = "UPDATE 29_Dispersion_Inventory SET location=" . $new_item_location . " WHERE uid=" . $item_uid . "";
        queryDatabase($sql);
        returnToSender('success', '', false);
        break;
    default:
        returnToSender('', "Unrecognized item type: " . $item_type, true);
}
