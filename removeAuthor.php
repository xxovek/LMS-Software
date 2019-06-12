<?php

include "config.php";
session_start();

$Author_id = $_POST['Author_id'];
$sql = "DELETE FROM tblauthors WHERE id = $Author_id";
mysqli_query($con,$sql);
// exit(json_encode($))
 ?>
