<?php

include "config.php";
session_start();
$check_fun_call = $_POST['check_fun_call'];
$book_id = $_POST['book_id'];
$response = array();
// echo $book_id;
//return status = 1 for after return book;
//return status = 0 for issue book

if( $check_fun_call== 0 )
{
  $receiverId = $_POST['receiverId'];
$sql = "INSERT INTO tblissuedbookdetails( BookId, StudentID, RetrunStatus, fine) VALUES ('$book_id','$receiverId','0','0')";
// echo $sql;

$sql1 = "UPDATE tblbooks SET qty = qty - 1 WHERE id = '$book_id'";
mysqli_query($con, $sql1);

            if(is_numeric($receiverId)){
              $sql2 = "UPDATE teacher SET status = status + 1 WHERE id = '$receiverId'";
              mysqli_query($con, $sql2);
            }
          else {
            $sql2 = "UPDATE tblstudents SET Status = status + 1 WHERE StudentId = '$receiverId'";
            mysqli_query($con, $sql2);
          }

}
else {
  $remarks = $_POST['remark'];
  //echo $remarks ;
  $issue_datetime = $_POST['issue_datetime'];
  $studentId = $_POST['StudentID'];
  $RetrunRemarks = $_POST['RetrunRemarks'];
  // echo $RetrunRemarks ;
  if ($remarks == 6 && $RetrunRemarks === 'ISSUED') {//Book Lost jhale tr
    $sql = "UPDATE tblissuedbookdetails SET remarks='BOOK LOST',RetrunStatus='1' WHERE BookId='$book_id'  and IssuesDate = '$issue_datetime'";
    $sql1 = "UPDATE tblbooks SET Lost_Count = Lost_Count  + 1  WHERE id = '$book_id'";
    mysqli_query($con, $sql1);

    if(is_numeric($studentId)){
      $sql2 = "UPDATE teacher SET status = status  WHERE id = '$studentId'";
      mysqli_query($con, $sql2);
    }
    else {
      $sql2 = "UPDATE tblstudents SET Status = status  WHERE StudentId = '$studentId'";
      mysqli_query($con, $sql2);
    }

  }
  else if($remarks == 5  && $RetrunRemarks === 'BOOK LOST'){// lost book return kartana
    $sql = "UPDATE tblissuedbookdetails SET remarks='ACCEPTED',RetrunStatus='1' WHERE BookId='$book_id'  and IssuesDate = '$issue_datetime'";
  //  echo $sql ;
    $sql1 = "UPDATE tblbooks SET qty= qty + 1 WHERE id = '$book_id'";
    mysqli_query($con, $sql1);
    $sql2 = "UPDATE tblbooks SET Lost_Count = Lost_Count  - 1  WHERE id = '$book_id'";
    mysqli_query($con, $sql2);
        if(is_numeric($studentId)){
            $sql2 = "UPDATE teacher SET status = status - 1 WHERE id = '$studentId'";
            mysqli_query($con, $sql2);
          }
          else {
            $sql2 = "UPDATE tblstudents SET Status = status - 1 WHERE StudentId = '$studentId'";
            mysqli_query($con, $sql2);
          }
    }
    else{//Accept book
      $sql = "UPDATE tblissuedbookdetails SET remarks='ACCEPTED',RetrunStatus='1' WHERE BookId='$book_id'  and IssuesDate = '$issue_datetime'";
      // echo $sql ;
      $sql1 = "UPDATE tblbooks SET qty= qty + 1 WHERE id = '$book_id'";
      mysqli_query($con, $sql1);
      if(is_numeric($studentId)){
          $sql2 = "UPDATE teacher SET status = status - 1 WHERE id = '$studentId'";
          mysqli_query($con, $sql2);
        }
        else {
          $sql2 = "UPDATE tblstudents SET Status = status - 1 WHERE StudentId = '$studentId'";
          mysqli_query($con, $sql2);
        }
    }

}

if (mysqli_query($con, $sql))
{
  $response['success']  = 'true';
}
else {
  $response['errors']  = 'false';

}

// mysqli_query($con,$sql);
mysqli_close($con);
exit(json_encode($response));

 ?>
