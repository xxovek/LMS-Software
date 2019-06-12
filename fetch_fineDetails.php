<?php
include 'config.php';
session_start();
$response = [];
$id = 1 ;

$sql = "SELECT * FROM admin WHERE id ='$id'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
 $row = mysqli_fetch_array($result);

 $response['days'] = $row['issueLimitDays'];
 $response['fineAmt'] = $row['fineAmt'];
}
mysqli_close($con);
exit(json_encode($response));
 ?>
