<?php
include 'config.php';

$response = [];
$result = mysqli_query($con,"SELECT tblbooks.id,tblbooks.BookName,tblbooks.Lost_Count,tblcategory.id as cid,tblcategory.CategoryName,tblbooks.qty,tblbooks.total_qty,tblauthors.id as aid,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.publisher,tblbooks.ReleasedDate,tblbooks.BookPrice	FROM tblbooks,tblcategory,
  tblauthors WHERE tblbooks.Category = tblcategory.id AND tblauthors.id=tblbooks.Author;");
if(mysqli_num_rows($result) > 0)
{

  while($row=mysqli_fetch_array($result))
  {
    $sql1 = "SELECT  remarks FROM tblissuedbookdetails WHERE  remarks= 'ISSUED' AND BookId = '" . $row["id"] . "'";
    $result1 = mysqli_query($con,$sql1);
    $row1=mysqli_fetch_array($result1);
    if(mysqli_num_rows($result1) > 0)
    {
      $rem = $row1['remarks'];
    }
    else {
      $rem = "none";
    }
    array_push($response,[
      'id' => $row['id'],
      'BookName' => ucwords($row['BookName']),
      'qty' => $row['qty'],
      'lost_qty' => $row['Lost_Count'],
      'Category_id' => $row['cid'],
      'Author_id' => $row['aid'],
      'Category' => $row['CategoryName'],
      'Author' => $row['AuthorName'],
      'ISBNNumber' => $row['ISBNNumber'],
      'publisher' => $row['publisher'],
      'ReleasedDate' => $row['ReleasedDate'],
      'total_qty' => $row['total_qty'],
      'remarks' =>  $rem,
      'BookPrice' => $row['BookPrice']
]);
  }

exit(json_encode($response));
}
?>
