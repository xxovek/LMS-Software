<?php
 include 'config.php';
$response = [];
$bookid = $_REQUEST['removebook'];
$aut_id = $_POST['aut_id'];
$cat_id = $_POST['cat_id'];

$sql = "DELETE FROM tblbooks WHERE id='$bookid'";

// $result = mysqli_query($con,$sql);

if(mysqli_query($con,$sql)){

  mysqli_query($con, "UPDATE tblcategory SET  Status = Status - 1 WHERE id = $cat_id");
  mysqli_query($con, "UPDATE tblauthors SET  Use_status = Use_status - 1 WHERE id = $aut_id");

$response['success'] = 'true';
}
else {
  $response['errors'] = 'false';

}
mysqli_close($con);
exit(json_encode($response));
 ?>
