<?php

$newLocation = $_GET["newLocation"];
$uid = $_GET["uid"];


$uid = $_GET["uid"];

// Create connection
$conn = mysqli_connect("208.109.166.118", "danielwilczak", "Dmw0234567", "LEI_Inventory");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "UPDATE 29_RAW_INVENTORY SET location=" . $newLocation . " WHERE uid=" . $uid . "";

if ($conn->query($sql) === TRUE) {
    header("Location: info.php?uid=" . $uid . "") ;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?> 