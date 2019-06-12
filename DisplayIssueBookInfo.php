<?php
include "config.php";
session_start();
$response = [];

$sql = "SELECT tblissuedbookdetails.id,tblissuedbookdetails.BookId,tblissuedbookdetails.StudentID,
tblissuedbookdetails.IssuesDate, tblissuedbookdetails.ReturnDate,tblissuedbookdetails.RetrunStatus,
tblissuedbookdetails.fine,tblbooks.BookName,tblissuedbookdetails.remarks
FROM tblissuedbookdetails,tblbooks
where tblissuedbookdetails.BookId  = tblbooks.id";

$result = mysqli_query($con,$sql);
$id = "";
$fullname = "";
if(mysqli_num_rows($result)>0)
{

  while ($row = mysqli_fetch_array($result)) {

        $id = $row['StudentID'];
        if(is_numeric($row['StudentID']))
        {
          $sql1 = "SELECT teachername FROM teacher WHERE id = '$id'";
          $result1 = mysqli_query($con,$sql1);
          $row1 = mysqli_fetch_array($result1);
          $fullname = $row1['teachername'];
        }
        else {
          $sql1 = "SELECT FullName FROM tblstudents WHERE  StudentId = '$id'";
          $result1 = mysqli_query($con,$sql1);
          $row1 = mysqli_fetch_array($result1);
          $fullname = $row1['FullName'];
        }

        array_push($response,[
          'id'           =>  $row['id'],
          'BookId' =>  $row['BookId'],
          'StudentID'       =>  $row['StudentID'],
          'IssuesDate' =>  $row['IssuesDate'],
          'RetrunStatus' =>  $row['RetrunStatus'],
          'remarks' => $row['remarks'],
          'fine' =>  $row['fine'],
          'BookName' => ucwords( $row['BookName']),
          'teacherName' => ucwords($fullname)
      ]);

$id = "";
$fullname = "";

  }
}

exit(json_encode($response));
 ?>
