<?php
include 'config.php';
session_start();
$response = [];
if(!empty($_POST["category"])) {
  $result = mysqli_query($con,"SELECT count(CategoryName) FROM tblcategory WHERE CategoryName='" . $_POST["category"] . "'");
  $row = mysqli_fetch_array($result);
  $user_count = $row[0];
  if($user_count>0) {
    $response["success"] = 'true';
  }else{
    $response["success"] = 'false';
  }
}

exit(json_encode($response));
?>
