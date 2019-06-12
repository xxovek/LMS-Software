<?php
 include 'config.php';
$response = [];
$studid = $_REQUEST['removestudent'];

$sql = "DELETE FROM tblstudents WHERE id='$studid'";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) === '1')
{
$response['success'] = 'true';
}
else {
  $response['errors'] = 'false';

}
mysqli_close($con);
exit(json_encode($response));
 ?>
