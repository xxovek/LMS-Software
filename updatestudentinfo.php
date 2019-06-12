<?php
include "config.php";
$response = array();
$id= $_POST['studentsid'];
$name= $_POST['stname1'];
$mobile= $_POST['mobileno1'];
$address = $_POST['staddress1'];
$chkFlag = $_POST['check'];

if($chkFlag == '1')
{
  $sql="UPDATE teacher SET teachername='$name',mobilenumber='$mobile',address='$address'  WHERE id='$id'";
  if (mysqli_query($con, $sql))
  {
    $response['success']  = 'teacher';
  }
  else {
    $response['errors']  = 'yes';
  }
}
else if($chkFlag == '0') {
  $studclass=$_POST['studentclass1'];
  $studsection=$_POST['studentsection1'];
  $studrollno=$_POST['rollno1'];
  $studentid=$studclass.$studsection.$studrollno;
$sql="UPDATE tblstudents SET StudentId='$studentid' ,FullName='$name',MobileNumber='$mobile',class='$studclass',section='$studsection',rollno='$studrollno',address='$address'
WHERE id='$id'";
if (mysqli_query($con, $sql))
{
  $response['success']  = 'true';
}
else {
  $response['errors']  = 'yes';
}
}

mysqli_close($con);
exit(json_encode($response));
?>
