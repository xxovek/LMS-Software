<?php
// include 'connection.php';
session_start();
$val=$_REQUEST['coppies'];
$item_id=$_REQUEST['books_id'];
// $val='10';
// $item_id ='22';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style>
    		*

        .split {
    height: 100%;
    width: 50%;
    position: fixed;
    z-index: 1;
    top: 0;
    overflow-x: hidden;
    padding-top: 20px;
}

.left {
    left: 0;
}

.right {
    right: 0;
}

    </style>
    </head>
<?php
if($val%2==0){
$val1=$val/2;
}
else {
$val1=($val+1)/2;
}
$var='';
$var='<div class="split left">';
echo $var;
for($i=0;$i<$val1;$i++){
$var='<img alt="Coding Sips" src="Generate_barcode.php?text='.$item_id.'&orientation=horizontal&size=60" style="width:15%;height:10%;"/>';
  echo $var;
  echo "<br/><br/>";

}
$var='</div>';

$val=$val-$val1;
$var='<div class="split right">';
echo $var;
for($i=0;$i<$val;$i++){
$var='<img alt="Coding Sips" src="Generate_barcode.php?text='.$item_id.'&orientation=horizontal&size=60" style="width:15%;height:10%;"/>
';
      echo $var;
      echo "<br><br/>";

    }
    $var='</div>';
?>
  </body>
</html>
