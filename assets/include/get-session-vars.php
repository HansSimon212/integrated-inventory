<?php
// Starts a session so the $_SESSION variables can be retrieved
session_start();

/*
 * $_SESSION variables:
 * - status: one of {'scanning', 'info', 'success'}
 * - sender
 * - err_msg: error message passed to be displayed in browser
 * - item_uid
 * - item_rm
 * - item_lot
 * - item_name
 * - item_exp_date
 * - item_location
 * - item_quantity_kg
 * - item_container
 * - item_notes
 */

$status = $_SESSION['status'];
$sender = $_SESSION['sender'];
$err_msg = $_SESSION['err_msg'];
$item_uid = $_SESSION['item_uid'];
$item_rm = $_SESSION['item_rm'];
$item_lot = $_SESSION['item_lot'];
$item_name = $_SESSION['item_name'];
$item_exp_date = $_SESSION['item_exp_date'];
$item_location = $_SESSION['item_location'];
$item_quantity_kg = $_SESSION['item_quantity_kg'];
$item_container = $_SESSION['item_container'];
$item_notes = $_SESSION['item_notes'];

// Unsets all items after they've been copied
unset($_SESSION['status']);
unset($_SESSION['sender']);
unset($_SESSION['err_msg']);
unset($_SESSION['item_uid']);
unset($_SESSION['item_rm']);
unset($_SESSION['item_lot']);
unset($_SESSION['item_name']);
unset($_SESSION['item_exp_date']);
unset($_SESSION['item_location']);
unset($_SESSION['item_quantity_kg']);
unset($_SESSION['item_container']);
unset($_SESSION['item_notes']);
?>