<?php
// Starts a session so the $_SESSION variables can be retrieved
session_start();

/*
-----------------------------------------------
            $_SESSION variables:
-----------------------------------------------
- status :String
- err_msg :String
- success_msg :String
- rm_info :Array
- dispersion_info :Array
*/

$status = (isset($_SESSION['status']) ? $_SESSION['status'] : '');
$err_msg = (isset($_SESSION['err_msg']) ? $_SESSION['err_msg'] : '');
$success_msg = (isset($_SESSION['success_msg']) ? $_SESSION['success_msg'] : '');
$rm_info = (isset($_SESSION['rm_info']) ? $_SESSION['rm_info'] : array());
$dispersion_info = (isset($_SESSION['dispersion_info']) ? $_SESSION['dispersion_info'] : array());

// clears all session variables
$_SESSION = [];
