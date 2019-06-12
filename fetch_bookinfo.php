


<?php
// anuja tblbooks code
include 'config.php';
$bookid = $_REQUEST['bookid'];

$sql="SELECT tblbooks.BookName,tblbooks.total_qty,tblcategory.id as catid,tblauthors.id as autid,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.publisher,tblbooks.ReleasedDate,tblbooks.Edition,tblbooks.BookPrice,tblbooks.BookDescription FROM tblbooks,tblcategory,tblauthors where tblbooks.id='$bookid'
AND tblbooks.Category = tblcategory.id AND tblauthors.id=tblbooks.Author ";
$result = mysqli_query($con,$sql);
$response = array();

if(mysqli_num_rows($result)>0)
{
  $row=mysqli_fetch_array($result);
  $response['Bookid'] = $bookid;
  $response['BookName'] = $row['BookName'];
  $response['BookQty'] = $row['total_qty'];
  $response['Categoryid'] = $row['catid'];
  $response['Authorid'] = $row['autid'];
  $response['Category'] = $row['CategoryName'];
  $response['Author'] = $row['AuthorName'];
  $response['ISBNNumber'] = $row['ISBNNumber'];
  $response['publisher'] = $row['publisher'];
  $response['ReleasedDate'] = $row['ReleasedDate'];
  $response['Edition'] = $row['Edition'];
  $response['BookPrice'] = $row['BookPrice'];
  $response['BookDescription'] = $row['BookDescription'];
}
mysqli_close($con);

exit(json_encode($response));
 ?>
