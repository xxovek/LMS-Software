<?php
include "config.php";
session_start();
$response = [];

$sql = "SELECT id,AuthorName,creationDate,Use_status,UpdationDate FROM tblauthors";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
  while ($row = mysqli_fetch_array($result)) {
      array_push($response,[
        'id'           =>  $row['id'],
        'AuthorName'   =>  ucwords($row['AuthorName']),
        'use_status'   =>  $row['Use_status'],
        'creationDate' =>  $row['creationDate'],
        'UpdationDate' =>  $row['UpdationDate']
    ]);
  }
}
exit(json_encode($response));

 ?>
