<?php
include 'config.php';
$teacherid = $_REQUEST['teacherid'];

$sql="SELECT teachername,mobilenumber,address FROM teacher where id='$teacherid'";
$result = mysqli_query($con,$sql);
$response = array();

if(mysqli_num_rows($result)>0)
{
  $row=mysqli_fetch_array($result);
  $response['teacherid'] = $teacherid;
  $response['teachername'] = $row['teachername'];
  $response['mobilenumber'] = $row['mobilenumber'];
  $response['address'] = $row['address'];
}
mysqli_close($con);

exit(json_encode($response));
 ?>
