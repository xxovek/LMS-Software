<?php

include "config.php";
$response = array();
$bookname=$_POST['book_name'];
$bookisbn=$_POST['isbn_number'];
$bookcat=$_POST['book_cat'];
$bookauthor=$_POST['author_name'];
$bookpublication=$_POST['publication'];
$bookreleaseddate = $_POST['Releasedate'];
$bookedition = $_POST['edition'];
$bookprice = $_POST['price'];
$bookdesc = $_POST['book_desc'];
$bookqty = $_POST['book_qty'];

$bookimage = $_REQUEST['bookimage1'];

$sql="INSERT INTO tblbooks(BookName,Category,Author,ISBNNumber,total_qty,qty,publisher,ReleasedDate,Edition,BookPrice,BookDescription,BookImage)
VALUES('$bookname','$bookcat','$bookauthor','$bookisbn','$bookqty','$bookqty','$bookpublication','$bookreleaseddate','$bookedition','$bookprice','$bookdesc','$bookimage')";

  if (mysqli_query($con, $sql)) {
   $last_id = mysqli_insert_id($con);
   $response['bookid'] = $last_id;

  mysqli_query($con, "UPDATE tblcategory SET  Status = Status + 1 WHERE id = $bookcat");
  mysqli_query($con, "UPDATE tblauthors SET  Use_status = Use_status + 1 WHERE id = $bookauthor");

  //  $cat_status_change = "";
   
   $response['success']  = 'true';

} else {
    $response['errors']  = 'false';

}
mysqli_close($con);
exit(json_encode($response));

?>
