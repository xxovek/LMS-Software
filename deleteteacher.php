<?php
 include 'config.php';
$response = [];
$teacher = $_REQUEST['removeteacher'];

$sql = "DELETE FROM teacher WHERE id='$teacher'";

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
