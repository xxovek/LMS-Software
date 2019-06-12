<?php
include 'config.php';
// session_start();
$response = [];

$studTech_id = $_POST['rollNum'];

if(is_numeric($studTech_id)){
  $sql="SELECT teachername,mobilenumber FROM teacher where id='$studTech_id'";
  //echo $sql ;
  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
  {
    $row = mysqli_fetch_array($result);
          $response['FullName']     =  $row['teachername'];
          $response['mobilenumber'] =  $row['mobilenumber'];
    }
}
else{
  $sql="SELECT FullName,MobileNumber,class,section,rollno,address FROM tblstudents where StudentId ='$studTech_id'";
  //echo $sql ;

  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
  {
    $row = mysqli_fetch_array($result);

          $response['FullName']     =  $row['FullName'];
          $response['mobilenumber'] =  $row['MobileNumber'];
          $response['class']   =  $row['class'];
          $response['rollno']        =  $row['rollno'];
          // $response['AuthorId']     =  $row['AuthorId'];

    }

}
  mysqli_close($con);
  exit(json_encode($response));
 ?>
