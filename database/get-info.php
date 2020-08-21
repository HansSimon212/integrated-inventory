<?php
session_start();

require("db_con.php");

$item_uid = $_POST['item_uid']; // form: '{Number}' + {'B' | 'R' | 'D'}
$sender = $_POST['sender']; // address this script was invoked from

// Returns an error if item_uid is poorly formed
if (strlen($item_uid) < 2) {
    $_SESSION['err_msg'] = 'Poorly formed uid: ' . $item_uid;
    // Closes database connection
    $con->close();
    // Returns to calling page
    $destination = "Location: ../src/" . $sender;
    header($destination);
    exit();
}

// splits uid into number and letter representing item type
$uid_num = substr($item_uid, 0, -1);
$casted_uid_num = intval($item_uid);
$item_type = $item_uid[strlen($item_uid) - 1];

// Returns an error if item_uid doesn't contain valid number
if ($casted_uid_num <= 0) {
    $_SESSION['err_msg'] = 'Poorly formed uid: ' . $item_uid;
    // Closes database connection
    $con->close();
    // Returns to calling page
    $destination = "Location: ../src/" . $sender;
    header($destination);
    exit();
}

$sql = "SELECT * FROM 29_RAW_INVENTORY WHERE uid=" . $casted_uid_num . "";

$result = $con->query($sql);

// Was database query completed successfully?
if ($result == TRUE) {
    // Was an entry with the given UID found?
    if ($result->num_rows > 0) {
        $item_info = mysqli_fetch_array($result);
        $_SESSION['status'] = 'info';
        $_SESSION['sender'] = $sender;
        $_SESSION['err_msg'] = '';
        $_SESSION['item_uid'] = $item_uid;
        $_SESSION['item_rm'] = '';
        $_SESSION['item_lot'] = '';
        $_SESSION['item_name'] = $item_info['trade_Name'];
        $_SESSION['item_exp_date'] = '';
        $_SESSION['item_location'] = $item_info['location'];
        $_SESSION['item_quantity_kg'] = '';
        $_SESSION['item_container'] = '';
        $_SESSION['item_notes'] = '';
    } else {
        // No entries found. Returns to scanning
        $_SESSION['err_msg'] = 'No matching entry in database found for uid: ' . $item_uid;
    }
} // Query unsuccessful. Returns to scanning
else {
    $_SESSION['err_msg'] = 'Database query failed: <br> uid:' . $item_uid . '<br>query: ' . $sql . '<br>Error: ' . $con->error;
}
// Closes database connection
$con->close();
// Returns to calling page
$destination = "Location: ../src/" . $sender;
header($destination);
