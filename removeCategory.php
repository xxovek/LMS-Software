<?php

include "config.php";
session_start();

$category_id = $_POST['category_id'];
$sql = "DELETE FROM tblcategory WHERE id = $category_id";
mysqli_query($con,$sql);
// exit(json_encode($))
 ?>
