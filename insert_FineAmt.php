<?php
include 'config.php';
session_start();
// $response = [];
$id = 1 ;
$Days = $_POST["Days"];
$FineAmt = $_POST["FineAmtPerDay"];
$sql = "UPDATE admin SET issueLimitDays='$Days',fineAmt='$FineAmt' WHERE id = '$id'";
$result = mysqli_query($con,$sql);
mysqli_close($con);
?>
