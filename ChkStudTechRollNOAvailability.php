<?php
include 'config.php';
session_start();
$response = [];

if(!empty($_POST["rollNum"])) {

  $id = $_POST["rollNum"];

  if(is_numeric($id))
  {
    $sql1 = "SELECT id FROM teacher WHERE id = '$id'";
    $result1 = mysqli_query($con,$sql1);
    $row1 = mysqli_fetch_array($result1);
    $user_count = $row1['id'];

    if($user_count<=0) {
      $response["success"] = 'true';
    }else{
      $response["success"] = 'false';
    }
  }
  else {
    $sql1 = "SELECT StudentId FROM tblstudents WHERE  StudentId = '$id'";
    $result1 = mysqli_query($con,$sql1);
    $row1 = mysqli_fetch_array($result1);
    $user_count = $row1['StudentId'];

    if($user_count<=0) {
      $response["success"] = 'true';
    }else{
      $response["success"] = 'false';
    }
  }

}

exit(json_encode($response));
?>
