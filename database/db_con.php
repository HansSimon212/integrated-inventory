<?php

$con = mysqli_connect("208.109.166.118", "danielwilczak", "Dmw0234567", "LEI_Inventory");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>