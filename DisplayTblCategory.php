<?php
include "config.php";
session_start();
$response = [];

$sql = "SELECT id, CategoryName, Status, CreationDate, UpdationDate FROM tblcategory";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
  while ($row = mysqli_fetch_array($result)) {
      array_push($response,[
        'id'           =>  $row['id'],
        'CategoryName' =>  ucwords($row['CategoryName']),
        'Status'       =>  $row['Status'],
        'CreationDate' =>  $row['CreationDate'],
        'UpdationDate' =>  $row['UpdationDate']
    ]);
  }
}

exit(json_encode($response));

 ?>
