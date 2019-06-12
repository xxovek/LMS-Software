<?php

include 'config.php';

$response = [];

$sql = "SELECT id,teachername,mobilenumber,address,status FROM teacher";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0)
{
  while($row=mysqli_fetch_array($result))
  {
    array_push($response,[
      'id' => $row['id'],
      'teachername' => ucwords($row['teachername']),
      'mobilenumber' => $row['mobilenumber'],
      'status' => $row['status'],
      'address' => ucwords($row['address'])
    ]);
  }

exit(json_encode($response));
}


 ?>
