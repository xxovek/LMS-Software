<?php
include 'config.php';
session_start();
$response = [];

$sql = "SELECT sum(total_qty) AS MyCount FROM tblbooks
UNION ALL
SELECT COUNT(id) AS MyCount1 FROM tblauthors
UNION ALL
SELECT COUNT(id) AS MyCount2 FROM tblcategory
UNION ALL
SELECT COUNT(id) AS MyCount3 FROM teacher
UNION ALL
SELECT COUNT(id) AS MyCount4 FROM tblissuedbookdetails WHERE RetrunStatus = '0'
UNION ALL
SELECT COUNT(id) AS MyCount5 FROM tblstudents";

$result = mysqli_query($con,$sql) or die(mysqli_error($con));

if(mysqli_num_rows($result)>0){

  while ($row=mysqli_fetch_array($result)) {

    array_push($response,[
      'bcnt' => $row['MyCount']
]);

  }

}

mysqli_close($con);

exit(json_encode($response));

 ?>
