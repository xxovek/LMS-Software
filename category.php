<?php
session_start();
if(isset($_SESSION['id'])){
  include 'config.php';
$uid = $_SESSION['id'];
$fullname = $_SESSION['FullName'];
 //echo $fullname ;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
  <title>Books Categories</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="Generic_Functions.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="js/allfonts.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
  <?php include "header.php" ; ?>
</header>
  <aside class="main-sidebar">

    <?php include "sidebar.php" ; ?>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1 class="text-center">
        CATEGORY INFORMATION
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Category</li>
      </ol>
    </section>


  <section class="col-lg-2  connectedSortable">
    <button type="button" class="btn bg-purple margin" style="float:left;border-color: red" id="btn1">New Category</button>
    </section>

    <div class="row">

      <div class="col-sm-12"></div>
      <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="box box-info" id="CategoryFormDiv" style="display:none">
      <div class="box-header with-border">
        <h3 class="box-title">Book Category</h3>
      </div>

      <form class="form" id="categoryForm">
        <div class="box-body">

          <div class="form-group">
            <div class="col-sm-10">
              <label for="Category_val" >Book Category: <font color="red" size="3px"><sup>*</sup></font></label>
              <strong id="category-availability-status" style="float:right" ></strong><br>
              <input type="text" class="form-control" autocomplete="off" id="Category_val" onblur="ChkCategoryAvailability(this.value,0);" placeholder="Book Category Name">
                <span id="category_input" style= "float:left"></span>
            </div>
          </div>

        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-left" >Save</button>

          <button type="button" class="btn btn-default pull-right"  onclick="window.location.reload();" >Cancel</button>
        </div>
      </form>
    </div>
</div>
</div>




<section class="content" id="CategoryTableDiv">
  <div class="row">

          <div class="box">
            <div class="box-header">
              <h3 class="text-center" >All Book Category List</h3>
            </div>
            <div class="box-body table-responsive">
              <table id="Category_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center" style="width:8%">Sr. No.</th>
                  <th class="text-center" >Book Category Name</th>
                  <th class="text-center" style="width:15%">Creation Date</th>
                    <th class="text-center" style="width:20%">Action</th>

                </tr>
                </thead>
                <tbody id="Categorytabledata"></tbody>

              </table>
            </div>
          </div>

  </div>
</section>

  </div>
  <footer class="main-footer">

    <strong>Copyright &copy; 2018 <a href="www.xxovek.com">Xxovek</a>.</strong> All rights
    reserved.
  </footer>

<?php include "settingsRightSidebar.php"; ?>
  <div class="control-sidebar-bg"></div>
</div>

<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<link rel="stylesheet" href="datatables/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="datatables/css/buttons.dataTables.min.css">
<script src="datatables/datatables.min.js"></script>
<script src="datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="datatables/datatables-init.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  DisplayCategory();
  // $("#CategoryFormDiv").hide();
});


function DisplayCategory(){
  var response = [];
  var delBtn = '';
  $.ajax({
      type: "POST",
      url: "DisplayTblCategory.php",
  }).done(function(data) {
    // alert(data);
      response = JSON.parse(data);
      var count = Object.keys(response).length;
      for (var i = 0; i < count; i++) {
      var category_id = parseInt(response[i]['id']);
      var date1 = moment(new Date(response[i]['CreationDate'])).format("DD-MM-YYYY");

      if (response[i]['Status'] > '0') {
        delBtn = '<button type="button" disabled class="label label-danger" style="display:none" title="Category Name Used For Book" onClick="RemoveTblCategory(' + category_id + ');" name="submit"><i class="fa fa-trash"></i></button>';
      }
      else {
        delBtn = '<button type="button" class="label label-danger" title="Delete" onClick="RemoveTblCategory(' + category_id + ');" name="submit"><i class="fa fa-trash"></i></button>';
      }

      //alert(date1);

  $('#Categorytabledata').append('<tr><td  class="text-center">'+(i + 1)+'</td><td  class="text-center" id="CatName'+category_id+'">'+response[i]['CategoryName']+'</td><td class="text-center">'
  +date1+'</td><td class="text-center"><div class="btn-group"><button type="button" id="update'+ category_id +'" class="label label-success"  title="Edit"  name="submit" onClick="UpdateTblCat(' + category_id +');"><i class="fa fa-edit"></i></button><button class="label label-primary" id="save'+ category_id +'" onclick="saveTblCat('+ category_id +');" style="display:none;"><i class="fa fa-check"></i></button>'+delBtn+'</div></td></tr>');

      }

      $("#Category_table").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });

  }).fail(function(jqXHR, textStatus) {
      alert('Request Failed');
  });

}

function UpdateTblCat(param){
  $('#CatName'+param).attr('contenteditable','true');
  $('#CatName'+param).css("border", "3px solid blue");

  $('#update'+param).hide();
  $('#save'+param).show();
}

function saveTblCat(param){
    var categoryNm =$('#CatName'+param).html();
    var categorytemp = categoryNm.replace(/[&]nbsp[;]/gi,"");
    var removeBR = categorytemp.replace(/[<]br[>]/gi,"");
    var category = removeBR;
    var bool = ChkCategoryAvailability(category,param);
    if( bool == '1')
    {
      alert("Already Exists");
      window.location.reload();
    }else if (category == "") {
      alert ("Fill Text");
    }
    else{
    $.ajax({
      url:"insert_category.php",
      method:"POST",
      data:({category:category,check_fun_call:param}),
      success:function(data){
      $('#save'+param).hide();
      $('#update'+param).show();
      $('#CatName'+param).attr('contenteditable','false');
      $('#CatName'+param).css("border", "3px white");
      }
    });
}
}

function RemoveTblCategory(param){
//alert(param);
var b = confirm("Do You want to delete the book permanantly!");
if (b == true) {

$.ajax({
  url:"removeCategory.php",
  method:"POST",
  data:({category_id:param}),
  success:function(){
    alert("Deleted Successfully.");
    window.location.reload();
  }
});
}else {
}
}


$("#btn1").click(function() {
    $("#CategoryTableDiv").hide();
    $("#btn1").hide();
    $("#CategoryFormDiv").show();
});


$("#categoryForm").on("submit" , function(event){
var check_fun_call = 0;
var categoryNm = $("#Category_val").val();
var trimmed = categoryNm.trim();
var category = trimmed.replace(/\s+/g, " ");

event.preventDefault();
if (category === "" || category === null) {
  //alert(category);
    $("#category_input").html("<font color='red' size='3'>Enter Category</font>");
}
else{
  $("#category_input").html("");

  $.ajax({
    url:"insert_category.php",
    method:"POST",
    data:({category:category,check_fun_call:check_fun_call}),
    success:function(data){
      //alert(data);
      alert("Category Saved Successfully.");
      window.location.reload();
    }
  });

}
});


</script>

</body>
</html>

<?php }
else {
  header("Location:index.php");
} ?>
