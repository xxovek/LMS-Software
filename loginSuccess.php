<?php
include 'config.php';
session_start();
$uname = $_REQUEST['username'];
$password = $_REQUEST['password'];
// echo $password;
$response = [];

$sql = "SELECT * FROM admin WHERE UserName = '$uname' and Password = '$password'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)==1)
 {
   $row = mysqli_fetch_array($result) ;

   $uname     = $row['UserName'];
   $email  = $row['AdminEmail'];
   $fullname = $row['FullName'];
   $id = $row['id'];

 $_SESSION['UserName']   = $uname;
 $_SESSION['AdminEmail']   = $email;
 $_SESSION['FullName']   = $fullname;
 $_SESSION['id']   = $id;
 $response['success'] = 'true';
 }
else {
  $response['success'] = 'false';
}
mysqli_close($con);

exit(json_encode($response));
 ?>
