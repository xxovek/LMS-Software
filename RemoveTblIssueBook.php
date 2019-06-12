<?php
 include 'config.php';
$response = [];
$bookid = $_REQUEST['issue_id'];
$datetime = $_REQUEST['datetime'];


$sql = "DELETE FROM tblissuedbookdetails WHERE BookId='$bookid' and IssuesDate = '$datetime'";

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
