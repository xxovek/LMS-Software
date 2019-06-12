
<?php
session_start();
if(isset($_SESSION['id'])){
  include 'config.php';
$uid = $_SESSION['id'];
$fullname = $_SESSION['FullName'];
// echo $fullname ;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
  <title>Books Authors</title>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css"> -->


    <link rel="stylesheet" href="js/allfonts.css">
    <script src="./Generic_Functions.js"></script>

  <style media="screen">
  input::-ms-clear {
  	display: none;
  }
  </style>
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
        AUTHORS INFORMATION
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Authors</li>
      </ol>
    </section>

    <section class="col-lg-2  connectedSortable">
      <button type="button" class="btn bg-purple margin" style="float:left;border-color: red" id="btn1">New Author</button>
      </section>


      <div class="row">

        <div class="col-sm-12"></div>
        <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="box box-info" id="AuthorFormDiv" style="display:none">
          <div class="box-header with-border">
            <h3 class="box-title">Book Author</h3>
          </div>
          <form class="form" id="AuthorForm">
            <div class="box-body">
              <div class="form-group">
                <div class="col-sm-10">
                  <label for="author_name" >Author Name: <font color="red" size="3px"><sup>*</sup></font></label>
                  <strong id="author-availability-status" style="float:right" ></strong><br>
                  <input type="text" class="form-control" autocomplete="off" id="author_name" name="author_name" onblur="ChkAuthorAvailability(this.value,0);" placeholder="Book Author Name">
                    <span id="error_author_name" style= "float:left"></span>
                </div>
              </div>

            </div>

            <div class="box-footer">
              <button type="button" class="btn btn-default pull-right" onclick="window.location.reload();" >Cancel</button>
              <button type="submit" class="btn btn-info pull-left">Save</button>
            </div>

          </form>

  </div>
  </div>
</div>


  <section class="content" id="AuthorTableDiv">
    <div class="row">

            <div class="box">
              <div class="box-header">
                <h3 class="text-center">All Authors List</h3>
              </div>

              <div class="box-body table-responsive">
                <table id="Author_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center" style="width:8%">Sr. No.</th>
                    <th class="text-center">Book Author Name</th>
                    <th class="text-center"  style="width:15%">Cration Date</th>
                    <th class="text-center"  style="width:20%">Action</th>
                  </tr>
                  </thead>
                  <tbody id="Authortabledata"></tbody>
                </table>
              </div>
            </div>

    </div>
  </section>


</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">

    <strong>Copyright &copy; 2018 <a href="www.xxovek.com">Xxovek</a>.</strong> All rights
    reserved.
  </footer>

<?php include "settingsRightSidebar.php"; ?>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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
<!-- Select2 -->
<!-- <script src="bower_components/select2/dist/js/select2.full.min.js"></script> -->
<script src="dist/js/adminlte.min.js"></script>

<script src="dist/js/demo.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  $("#AuthorFormDiv").hide();
    DisplayAuthors();
});

function DisplayAuthors(){
  // alert("ok");
  var delBtn = '';
  var response = [];
  $.ajax({
      type: "POST",
      url: "DisplayTblAuthors.php",
  }).done(function(data) {
  // alert(data);
      response = JSON.parse(data);
      var count = Object.keys(response).length;
      for (var i = 0; i < count; i++) {
      var author_id = parseInt(response[i]['id']);
      var date1 = moment(new Date(response[i]['creationDate'])).format("DD-MM-YYYY");;
      // label label-warning pull-right
      if (response[i]['use_status'] > '0') {
        delBtn = '<button type="button" disabled class="label label-danger pull-right" style="display:none" title="Author Name Used For Book" onClick="RemoveTblAuthor(' + author_id + ');" name="submit"><i class="fa fa-trash"></i></button>';
      }
      else {
        delBtn = '<button type="button" class="label label-danger pull-right" title="Delete" onClick="RemoveTblAuthor(' + author_id + ');" name="submit"><i class="fa fa-trash"></i></button>';
      }

  $('#Authortabledata').append('<tr><td class="text-center">'+(i + 1)+'</td><td class="text-center" id="AutName'+author_id+'">'+response[i]['AuthorName']+'</td><td class="text-center" >'
      +date1+
      '</td><td class="text-center"><div class="btn-group"><button type="button" id="update'+author_id +'" class="label label-success"  title="Edit"  name="submit" onClick="UpdateTblAut(' + author_id +');"><i class="fa fa-edit"></i></button><button class="label label-primary" id="save'+ author_id +'" onclick="saveTblAut('+ author_id +');" style="display:none;"><i class="fa fa-check"></i></button>'+delBtn+'</div></td></tr>');

      }

      $("#Author_table").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });

  }).fail(function(jqXHR, textStatus) {
      alert('Request Failed');
  });

}


function UpdateTblAut(param){
  $('#AutName'+param).attr('contenteditable','true');
  $('#AutName'+param).css("border", "3px solid blue");
  $('#update'+param).hide();
  $('#save'+param).show();
}

function saveTblAut(param){
    var authorNm =$('#AutName'+param).html();
    var authorTemp = authorNm.replace(/[&]nbsp[;]/gi,"");
    var removeBR = authorTemp.replace(/[<]br[>]/gi,"");
    var author = removeBR;
    var bool = ChkAuthorAvailability(author,param);

    if( bool == '1')
    {
      alert("Already Exists");
      window.location.reload();

    }else if (author == "") {
      alert ("Fill Text");
    }
    else{
    $.ajax({
      url:"insert_author.php",
      method:"POST",
      data:({author_name:author,check_fun_call:param}),
      success:function(data){
        //alert("Updated Successfully.");

      $('#save'+param).hide();
      $('#update'+param).show();
      $('#AutName'+param).attr('contenteditable','false');
      $('#AutName'+param).css("border", "3px white");
      }
    });
}
}

function RemoveTblAuthor(param){
//alert(param);
var b = confirm("Do You want to delete the book permanantly!");
if (b == true) {
$.ajax({
  url:"removeAuthor.php",
  method:"POST",
  data:({Author_id:param}),
  success:function(){
    alert("Deleted Successfully.");
    window.location.reload();
  }
});
}else {
}

}


$("#btn1").click(function() {
// alert("ok");
    $("#AuthorTableDiv").hide();
    $("#btn1").hide();
    $("#AuthorFormDiv").show();
});


$("#AuthorForm").on("submit" , function(event){
var authorNm = $("#author_name").val();
var trimmed = authorNm.trim();
var author_name = trimmed.replace(/\s+/g, " ");

event.preventDefault();
if (author_name === "" || author_name === null) {
  //alert(category);
    $("#error_author_name").html("<font color='red' size='3'>Enter Author Name</font>");
   }
else{
  $("#error_author_name").html("");

  $.ajax({
    url:"insert_author.php",
    method:"POST",
    data:({author_name:author_name}),
    success:function(){
    //  alert("Saved Successfully.");
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
