<?php
include 'config.php';
$studentid = $_REQUEST['studentid'];
$response = array();

$sql="SELECT FullName,MobileNumber,class,section,rollno,address FROM tblstudents where id='$studentid'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
  $row=mysqli_fetch_array($result);
  $response['FullName'] = $row['FullName'];
  $response['MobileNumber'] = $row['MobileNumber'];
  $response['studentsclass'] = $row['class'];
  $response['section'] = $row['section'];
  $response['rollno'] = $row['rollno'];
  $response['address'] = $row['address'];
  $response['Studentid'] = $studentid;

}
mysqli_close($con);

exit(json_encode($response));
 ?>
