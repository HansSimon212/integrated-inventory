<?php

session_start();

$item_uid = $_POST['item_uid'];

$status = $_POST['status'];

$sender = $_POST['sender'];

$item_name = $_POST['item_name'];

$item_location = $_POST['item_location'];

$new_item_location = $_POST['new_item_location'];

$err_msg = $_POST['err_msg'];



// converts uid to int for security/verification

$casted_new_location = intval($new_item_location);

require("db_con.php");



if ($casted_new_location > 0) {

    $sql = "UPDATE 29_RAW_INVENTORY SET location=" . $casted_new_location . " WHERE uid=" . $item_uid . "";

    $result = $con->query($sql);



    // database query was successful

    if ($result == TRUE) {

        $_SESSION['status'] = 'success';

        $_SESSION['sender'] = $sender;

        $_SESSION['err_msg'] = '';

        $_SESSION['item_uid'] = $item_uid;

        $_SESSION['item_rm'] = '';

        $_SESSION['item_lot'] = '';

        $_SESSION['item_name'] = $item_name;

        $_SESSION['item_exp_date'] = '';

        $_SESSION['item_location'] = $new_item_location;

        $_SESSION['item_quantity_kg'] = '';

        $_SESSION['item_container'] = '';

        $_SESSION['item_notes'] = '';

    } // Return to info page with error

    else {

        $_SESSION['status'] = 'info';

        $_SESSION['sender'] = $sender;

        $_SESSION['err_msg'] = 'Database query failed: <br> uid:' . $item_uid . '<br>query: ' . $sql . '<br>Error: ' . $con->error;

        $_SESSION['item_uid'] = $item_uid;

        $_SESSION['item_rm'] = '';

        $_SESSION['item_lot'] = '';

        $_SESSION['item_name'] = $item_name;

        $_SESSION['item_exp_date'] = '';

        $_SESSION['item_location'] = $item_location;

        $_SESSION['item_quantity_kg'] = '';

        $_SESSION['item_container'] = '';

        $_SESSION['item_notes'] = '';

    }

} // Invalid new location. Return to info page.

else {

    $_SESSION['status'] = 'info';

    $_SESSION['sender'] = $sender;

    $_SESSION['err_msg'] = 'Invalid new location. Please enter a positive integer.';

    $_SESSION['item_uid'] = $item_uid;

    $_SESSION['item_rm'] = '';

    $_SESSION['item_lot'] = '';

    $_SESSION['item_name'] = $item_name;

    $_SESSION['item_exp_date'] = '';

    $_SESSION['item_location'] = $item_location;

    $_SESSION['item_quantity_kg'] = '';

    $_SESSION['item_container'] = '';

    $_SESSION['item_notes'] = '';

}



// Closes database connection

$con->close();

// Returns to calling page

$destination = "Location: ../src/" . $sender;

header($destination);
