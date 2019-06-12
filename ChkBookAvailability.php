<?php
include 'config.php';
session_start();
$response = [];
if(!empty($_POST["bid"])) {

  $result = mysqli_query($con,"SELECT qty FROM tblbooks WHERE id='" . $_POST["bid"] . "'");
  $row = mysqli_fetch_array($result);
  $user_count = $row['qty'];
//echo $user_count;
  if($user_count<=0) {
    $response["success"] = 'true';
  }else{
    $response["success"] = 'false';
  }
}

exit(json_encode($response));
?>
