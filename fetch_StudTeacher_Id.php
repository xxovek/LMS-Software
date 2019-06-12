<?php
include 'config.php';
?>
  <option values=""></option>
 <?php
if($result = mysqli_query($con,"SELECT id,teachername FROM teacher "));
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {?>
    <option value='<?php echo $row['id'];?>'> <?php echo $row['id']." ".ucwords($row['teachername']);?></option>
    <?php
    }
  }
}

if($result = mysqli_query($con,"SELECT StudentId,FullName FROM tblstudents"));
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {?>
    <option value='<?php echo $row['StudentId'];?>'> <?php echo $row['StudentId']." ".ucwords($row['FullName']);?></option>
    <?php
    }
  }
}
 ?>
