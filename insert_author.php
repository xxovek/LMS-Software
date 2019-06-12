<?php

include "config.php";
session_start();
$check_fun_call = $_POST['check_fun_call'];
$author_name = $_POST['author_name'];
$trimmed = trim($author_name," ");
if( $check_fun_call== 0)
{
$sql = "INSERT INTO tblauthors(AuthorName) VALUES ('$trimmed')";
}
else {
  $sql = "UPDATE tblauthors SET AuthorName = '$trimmed' WHERE id = '$check_fun_call'";
}
mysqli_query($con,$sql);
mysqli_close($con);
 ?>
