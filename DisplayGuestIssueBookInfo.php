<?php
include "config.php";
$response = [];

$sql = "SELECT tblguest.id,tblguest.BookId,tblguest.guestname,tblguest.guestcontact,tblguest.guestaddress,
tblguest.IssuesDate, tblguest.ReturnDate,tblguest.RetrunStatus,
tblguest.fine,tblbooks.BookName,tblguest.remarks
FROM tblguest,tblbooks
where tblguest.BookId  = tblbooks.id";
// echo $sql;
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
  while ($row = mysqli_fetch_array($result)) {

        array_push($response,[
          'id'            =>  $row['id'],
          'BookId'        =>  $row['BookId'],
          'guestname'     =>  ucwords($row['guestname']),
          'guestcontact'  =>  $row['guestcontact'],
          'guestaddress'  =>  $row['guestaddress'],
          'IssuesDate'    =>  $row['IssuesDate'],
          'RetrunStatus'  =>  $row['RetrunStatus'],
          'remarks'       => $row['remarks'],
          'fine'          =>  $row['fine'],
          'BookName'      =>  ucwords($row['BookName'])
      ]);

  }
}
// $db->close();
exit(json_encode($response));
 ?>
