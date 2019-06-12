<?php

include "config.php";

$response = array();

$bookname1=$_POST['book_name1'];
$bookqty1=$_POST['book_qty1'];

$bookisbn1=$_POST['isbn_number1'];
$bookcat1=$_POST['book_cat1'];
$bookauthor1=$_POST['author_name1'];
$bookpublication1=$_POST['publication1'];
$bookreleaseddate1 = $_POST['Releasedate1'];
$bookedition1 = $_POST['edition1'];
$bookprice1 = $_POST['price1'];
$bookdesc1 = $_POST['book_desc1'];
$bookimage1 = $_REQUEST['bookimage1'];
$id=$_POST['booksid'];

$sql2 = "SELECT count(remarks) AS cnt2 FROM tblguest WHERE (remarks = 'ISSUED' OR remarks = 'BOOK LOST')  AND BookId = '$id'";
$result2 = mysqli_query($con,$sql2);

$sql1 = "SELECT count(remarks) AS cnt1 FROM tblissuedbookdetails WHERE (remarks = 'ISSUED' OR remarks = 'BOOK LOST')  AND BookId = '$id'";
$result1 = mysqli_query($con,$sql1);
  $sql="";
if(mysqli_num_rows($result1)>0)
{
  $row1 = mysqli_fetch_array($result1);

  if(mysqli_num_rows($result2)>0)
  {
    $row2 = mysqli_fetch_array($result2);
    $count = $row1['cnt1']+$row2['cnt2'];

    if($bookqty1 > $count)
    {
      $count = $bookqty1 - $count;
  $sql="UPDATE tblbooks SET BookName='$bookname1',total_qty='$bookqty1',qty='$count',Category='$bookcat1',Author='$bookauthor1',ISBNNumber='$bookisbn1',publisher='$bookpublication1',
  ReleasedDate='$bookreleaseddate1',Edition='$bookedition1',BookPrice='$bookprice1',BookDescription='$bookdesc1',BookImage='$bookimage1' WHERE id='$id'";
mysqli_query($con, $sql);
$response['success']  = 'true';
}
  else {
    $response['errors']  = 'false';
    $response['count'] = $count;
    
  }
    }
}

mysqli_close($con);
exit(json_encode($response));

?>
