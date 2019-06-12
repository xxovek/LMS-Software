<?php

include 'config.php';

$response = [];
$sql = "SELECT id,StudentId,FullName,MobileNumber,class,Status,section,rollno,address FROM tblstudents";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0)
{
  while($row=mysqli_fetch_array($result))
  {
    array_push($response,[
      'id' => $row['id'],
      'Studentid' => $row['StudentId'],
      'FullName' => ucwords($row['FullName']),
      'MobileNumber' => $row['MobileNumber'],
      'class1' => $row['class'],
      'section' => $row['section'],
      'rollno' => $row['rollno'],
      'status' => $row['Status'],
      'address' => ucwords($row['address'])

]);
  }

exit(json_encode($response));
}


 ?>
