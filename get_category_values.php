<?php
include 'config.php';
?>
  <option values=""></option>
 <?php
if($result = mysqli_query($con,"SELECT id,CategoryName FROM tblcategory"));
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {?>
    <option value='<?php echo $row['id'];?>'> <?php echo $row['CategoryName'];?>
     </option>
    <?php
    }
  }
}
 ?>
