
<?php
// sonali code issue book
include "config.php";
session_start();
$response = [];
$bookId = $_POST['bid'];

$sql = "SELECT tblbooks.BookName,tblbooks.Category,tblbooks.qty,tblbooks.Author,tblbooks.ISBNNumber,tblbooks.BookPrice,tblcategory.CategoryName,tblauthors.AuthorName
FROM tblbooks,tblcategory,tblauthors
WHERE tblbooks.id = '$bookId' and tblbooks.Category = tblcategory.id and tblbooks.Author = tblauthors.id ";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
  $row = mysqli_fetch_array($result);

        $response['BookName']     =  $row['BookName'];
        $response['CategoryName'] =  $row['CategoryName'];
        $response['AuthorName']   =  $row['AuthorName'];
        $response['book_qty']        =  $row['qty'];
        // $response['AuthorId']     =  $row['AuthorId'];

  }

exit(json_encode($response));

 ?>
