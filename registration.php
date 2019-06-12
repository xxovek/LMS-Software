<?php
include "config.php";
$response = [];
$name=$_POST['stname'];
$mobile=$_POST['mobileno'];
$address = $_POST['staddress'];
$chkFlag = $_POST['check'];
// echo $chkFlag;

if($chkFlag == '1')
{
  $sql1="INSERT INTO teacher(teachername,mobilenumber,address,status)VALUES('$name','$mobile','$address',0)";
  if (mysqli_query($con, $sql1))
  {
    $response['success']  = 'teacher';
  }
  else {
    $response['errors']  = 'yes';
  }

}
else if($chkFlag == '0')
{
$studentclass=$_POST['studentclass'];
$studentsection=$_POST['studentsection'];
$studentrollno=$_POST['rollno'];
$studentid=$studentclass.$studentsection.$studentrollno;
$sql="INSERT INTO tblstudents(StudentId,FullName,MobileNumber,class,section,rollno,status,address)VALUES('$studentid','$name','$mobile','$studentclass','$studentsection','$studentrollno',0,'$address')";
if (mysqli_query($con, $sql))
{
  $response['success']  = 'true';
}
else {
  $response['errors']  = 'yes';

}
}

  exit(json_encode($response));



?>
