<?php

include "config.php";

session_start();
$check_fun_call = $_POST['check_fun_call'];
$book_id = $_POST['book_id'];
$response = array();

// echo $book_id;
//return status = 1 for after return book;
//return status = 0 for issue book

if( $check_fun_call== 1)
{
$guestname = $_POST['guestname'];
$guestcontact  = $_POST['contact'];
$guestaddress = $_POST['address'];

$sql = "INSERT INTO tblguest(BookId, guestname,guestcontact,guestaddress,RetrunStatus,fine)VALUES ('$book_id','$guestname','$guestcontact','$guestaddress','0','0')";
//echo $sql;

$sql1 = "UPDATE tblbooks SET qty = qty - 1 WHERE id = '$book_id'";
mysqli_query($con, $sql1);
// echo $sql1;

}
else {
  $remarks = $_POST['remark'];
  $issue_datetime = $_POST['issue_datetime'];
  $ReturnRemark = $_POST['ReturnRemark'];
  if ($remarks == 6 && $ReturnRemark === 'ISSUED') {//Book Lost asel
    $sql = "UPDATE tblguest SET remarks='BOOK LOST',RetrunStatus='1' WHERE BookId='$book_id'  and IssuesDate = '$issue_datetime'";
    $sql1 = "UPDATE tblbooks SET Lost_Count = Lost_Count  + 1  WHERE id = '$book_id'";
  //  echo $sql1 ;
    mysqli_query($con, $sql1);
  }
  else if( $remarks == 5  && $ReturnRemark === 'BOOK LOST'){// lost book return kartana
    $sql = "UPDATE tblguest SET remarks='ACCEPTED',RetrunStatus='1' WHERE BookId='$book_id'  and IssuesDate = '$issue_datetime'";
    $sql1 = "UPDATE tblbooks SET Lost_Count = Lost_Count  - 1  WHERE id = '$book_id'";
    mysqli_query($con, $sql1);
    $sql2 = "UPDATE tblbooks SET qty= qty + 1 WHERE id = '$book_id'";
      mysqli_query($con, $sql2);
  }
  else {//Accept book
    $sql = "UPDATE tblguest SET remarks='ACCEPTED',RetrunStatus='1' WHERE BookId='$book_id'  and IssuesDate = '$issue_datetime'";
    $sql1 = "UPDATE tblbooks SET qty= qty + 1 WHERE id = '$book_id'";
      mysqli_query($con, $sql1);
    //  echo $sql1;
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
