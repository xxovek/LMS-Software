<?php

include "config.php";
session_start();
$check_fun_call = $_POST['check_fun_call'];
$category = $_POST['category'];
//echo $check_fun_call ;

if( $check_fun_call== 0 )
{
$sql = "INSERT INTO tblcategory(CategoryName) VALUES ('$category')";
}else {
  $sql = "UPDATE tblcategory SET CategoryName = '$category' WHERE id = '$check_fun_call'";
}
mysqli_query($con,$sql);
mysqli_close($con);
 ?>
