

 <?php
 include 'config.php';
 ?>
   <option values=""></option>
  <?php
 if($result = mysqli_query($con,"SELECT id, AuthorName FROM tblauthors"));
 {
   if(mysqli_num_rows($result)>0)
   {
     while($row=mysqli_fetch_array($result))
     {?>
     <option value='<?php echo $row['id'];?>'> <?php echo $row['AuthorName'];?>
      </option>
     <?php
     }
   }
 }
  ?>
