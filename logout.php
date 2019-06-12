<?php
session_start();
unset($_SESSION['UserName']);
unset($_SESSION['id']);
unset( $_SESSION['AdminEmail']);
session_destroy();
header("Location:./index.php");
 ?>
