<?php
include 'config.php';
session_start();
$response = [];
if(!empty($_POST["author"])) {
  $result = mysqli_query($con,"SELECT count(AuthorName) FROM tblauthors WHERE AuthorName='" . $_POST["author"] . "'");
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
