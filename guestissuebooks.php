<?php
session_start();
if(isset($_SESSION['id'])){
include 'config.php';
$uid = $_SESSION['id'];
$fullname = $_SESSION['FullName'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
  <title>Issued Transactions</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="js/allfonts.css">
  <script src="Generic_Functions.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="modal fade" id="returnissuebook">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Do You Want to return this book?</h4>
        </div>
        <div class="modal-body">
          <form class="" id="retbookForm" method="post">

              <div class="row">
                <div class="col-sm-12"></div>
              </div>
            <div class="form-group">
              <label>Remark <font color="red" size="3px"><sup>*</sup></font></label><br>

              <select class="form-control select2" style="width:50%;" name="remarks1"  id="remarks" autocomplete="off" >
                <option value="5">NoChange/Accept</option>
                  <option value="6">Lost/Missing</option>
              </select>
              <input type="hidden" id="returnb" />
              <input type="hidden" id="issue_datetime" />
              <input type="hidden" id="ReturnRemarks" />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" >Cancel</button>
          <input type="submit" class="btn btn-primary" onclick="bookreturn();"value="Ok"></input>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="modal fade" id="returnissuebook">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Do You Want to return this book?</h4>
        </div>
        <div class="modal-body">
          <form class="" id="retbookForm" method="post">
              <div class="row">
                <div class="col-sm-12"></div>
              </div>
            <div class="form-group">
              <label>Remark <font color="red" size="3px"><sup>*</sup></font></label><br>
              <select class="form-control select2"  style="width:50%;" name="remarks1"  id="remarks" autocomplete="off" >
                <option value="5">NoChange/Accept</option>
                  <option value="6">Lost/Missing</option>
              </select>
              <input type="hidden" id="returnb" />
              <input type="hidden" id="issue_datetime" />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal" >Cancel</button>
          <input type="submit" class="btn btn-info pull-left" onclick="bookreturn();"value="Ok"></input>
        </div>
      </div>
    </div>
  </div> -->

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
        ISSUE BOOKS INFORMATION
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Issue Books</li>
      </ol>
    </section>
    <section class="col-lg-2  connectedSortable">
      <div class="row">
          <div class="btn-group-horizontal">
        <button type="button" class="btn bg-purple margin" style="float:left;border-color: red" id="btn2">Issue Book For Guest</button>
        </div>
      </div>
  </section>
<div class="row">
  <div class="col-sm-12"></div>
  <div class="col-md-2"></div>

<div class="col-md-8">
  <div class="box box-info" id="GuestIssueBookFormDiv" style="display:none">
    <div class="box-header with-border">
      <h3 class="box-title">Issue Book Information</h3>
    </div>

    <form class="form" id="GuestIssueBookForm">
      <div class="box-body">
          <div class="row">

          <div class="col-sm-5">
            <div class="form-group">
              <label>BOOK ID: <font color="red" size="3px"><sup>*</sup></font></label>
              <strong id="book-availability-status" style="float:right" ></strong><br>
            <input type="text" class="form-control" autocomplete="off" id="book_id" name="book_id" onchange="ChkbookQtyAvailability(this.value);" placeholder="Book Id">
              <span id="error_bookId_input1" style= "float:left"></span>
          </div>
        </div>

      </div>


      <div class="row" id="bookInfoDiv" style="display:none">
      <div class="col-sm-4">
        <div class="form-group">
            <label >Book Name: </label>
            <span id="book_name"></span>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label >Book Category: </label>
              <span id="book_cat"></span>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label >Book Author: </label>
                <span id="book_aut"></span>
              </div>
            </div>
      </div>

      <div class="row">
          <div class="col-sm-12">
              <h3 class="box-title">Guest Information</h3>
          </div>
      </div>

                    <div class="row">

                      <div class="col-sm-5">
                       <div class="form-group">
                         <label>Guest Name :<font color="red" size="3px"><sup>*</sup></font></label>
                         <!-- <strong id="id-availability-status" style="float:right" ></strong><br> -->
                           <!-- <input type="text" class="form-control" autocomplete="off" id="receiverId" name="receiverId" onblur="ChkstudTechRollAvailability(this.value);" placeholder="Enter Id"> -->
                           <input type="text" class="form-control" autocomplete="off" id="receiverId1" name="receiverId1"  placeholder="Enter Name" required>
                             <span id="error_guest_input" style= "float:left"></span>
                         </div>
                       </div>
                       <div class="col-sm-1"></div>
                       <div class="col-sm-4">
                        <div class="form-group">
                          <label>Contact :<font color="red" size="3px"><sup>*</sup></font></label>

                            <input type="text" class="form-control" autocomplete="off" id="GuestContact" name="GuestContact" pattern="^[789]\d{9}$" required  placeholder="Enter Contact" >
                              <span id="error_contact_input" style= "float:left"></span>
                          </div>
                        </div>


                    </div>

                  <div class="row">
                    <div class="col-sm-5">
                     <div class="form-group">
                       <label>Address :</label>
                         <textarea rows="2" name="guestaddress"  id="guestaddress" class="form-control" placeholder="Enter Address" autocomplete="off"  ></textarea>
                         <!-- value for fetch_bookInfo_Id function -->
                       </div>
                     </div>
                    </div>
      </div>

      <div class="box-footer">
        <button type="button" class="btn btn-default pull-right" onclick="window.location.reload();" >Cancel</button>
        <button type="submit"  class="btn btn-info pull-left">Issue For Guest</button>
      </div>
    </form>
</div>
</div>
</div>

<section class="content" id="IssueBook_tblDiv1">
  <div class="row">
          <div class="box">
            <div class="box-header">
              <h3 class="text-center">All Issued Books List</h3>
            </div>
            <div class="box-body table-responsive">
              <table id="IssueBook_tbl" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Sr. No.</th>
                  <th class="text-center">Book ID</th>
                  <th class="text-center">Book Name</th>
                  <th class="text-center">Guest Id</th>
                  <th class="text-center">Guest Name</th>
                  <th class="text-center">Guest Contact</th>
                  <th class="text-center">Guest Address</th>
                  <th class="text-center">Issue Date</th>
                  <th class="text-center">Status Return/Issue</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody id="IssuedBooktbldata"></tbody>
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
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    DisplayIssueBookInfo();
});

$('select').select2({
    allowClear: true,
    placeholder: "Select here"
});



function DisplayIssueBookInfo(){
  var response = [];
  var editBtn = '';
  var delBtn = '';

  $.ajax({
      type: "POST",
      url: "DisplayGuestIssueBookInfo.php",
  }).done(function(data) {
   // alert(data);
   if(data != '[]')
   {
     response = JSON.parse(data);
     var count = Object.keys(response).length;
     for (var i = 0; i < count; i++) {
     var issue_id = parseInt(response[i]['BookId']);
     var date1 = moment(new Date(response[i]['IssuesDate'])).format("DD-MM-YYYY");
       if((response[i]['RetrunStatus']) === '0'){
          editBtn = '<button type="button" id="return'+issue_id +'" class="label label-warning" title="Edit For Accept Book" onClick="returnBook(\''+ issue_id +'\',\''+ response[i]['remarks'] +'\',\''+ response[i]['IssuesDate'] +'\');" ><i class="fa fa-edit"></i></button>';
          delBtn = '<button type="button" disabled class="label label-danger" style="display:none" title="Delete After Return"  name="submit"><i class="fa fa-trash"></i></button>';
       }
       else{
        editBtn='<button class="label label-primary" id="returnbook'+ issue_id +'" title="Returned" style="display:none" ><i class="fa fa-check"></i></button>';
        delBtn = '<button type="button" class="label label-danger" title="Delete" onClick="RemoveTblIssueBook(\''+ issue_id +'\',\''+response[i]['IssuesDate']+'\');" name="submit"><i class="fa fa-trash"></i></button>';
       }

         if ((response[i]['remarks'])==='BOOK LOST' && (response[i]['RetrunStatus']) === '1') {
           delBtn = '<button type="button" disabled class="label label-danger" style="display:none" title="Cant Delete Lost Book"  name="submit"><i class="fa fa-trash"></i></button>';
           editBtn = '<button type="button" id="return'+issue_id +'" class="label label-warning" title="Edit For Accept" onClick="returnBook(\''+ issue_id +'\',\''+response[i]['remarks']+'\',\''+response[i]['IssuesDate']+'\');" ><i class="fa fa-edit"></i></button>';
         }

   $('#IssuedBooktbldata').append('<tr><td class="text-center">'+(i + 1)+
   '</td><td class="text-center">'
       +response[i]['BookId']+'</td><td class="text-center">'
       +response[i]['BookName']+'</td><td class="text-center">'
       +response[i]['id']+'</td><td class="text-center">'
       +response[i]['guestname']+'</td><td class="text-center">'
       +response[i]['guestcontact']+'</td><td class="text-center">'
       +response[i]['guestaddress']+'</td><td class="text-center">'
       +date1+'</td><td class="text-center">'
       +response[i]['remarks']+'</td><td class="text-center"><div class="btn-group">'
       +editBtn+
       '<button class="label label-primary" style="display:none;"><i class="fa fa-check"></i></button>'
       +delBtn+
       '</div></td></tr>');
       }

     $("#IssueBook_tbl").DataTable({
       dom: 'Bfrtip',
       buttons: [
           'copy', 'csv', 'excel', 'pdf', 'print'
       ]
     });
   }

else {}
});

}


function returnBook(bookid,ReturnRemark,datetime)
{
    $("#returnb").val(bookid);
    $("#issue_datetime").val(datetime);
    $("#ReturnRemarks").val(ReturnRemark);

    if(ReturnRemark === 'BOOK LOST')
    {
      var op = document.getElementById("remarks").getElementsByTagName("option");
      op[1].disabled = true;
    }

    $('#returnissuebook').modal('show');
}

function bookreturn()
{
var check_fun_call = 0;
var remarkVal = document.getElementById('remarks').value;
var book_id = $("#returnb").val();
var issue_datetime = $("#issue_datetime").val();
var ReturnRemark = $("#ReturnRemarks").val();

  $.ajax({
    url:"insert_guestissueBook_req.php",
    method:"POST",
    data:{book_id:book_id,remark:remarkVal,check_fun_call:check_fun_call,issue_datetime:issue_datetime,ReturnRemark:ReturnRemark},
    success:function(data){
    // alert(data);
      response = JSON.parse(data);
      if(response['success'])
      {
          window.location.reload();
          $('#returnissuebook').modal('hide');
          $('#return'+book_id).hide();
          $('#returnbook'+book_id).show();
  }
  else {
    $('#return'+book_id).show();
  }
    }
  });
}

$("#GuestIssueBookForm").on("submit" , function(event){
  event.preventDefault();
  var check_fun_call = 1;
  var book_id = document.getElementById('book_id').value;
  var guestname = document.getElementById('receiverId1').value;
  var contact = document.getElementById('GuestContact').value;
  var address = document.getElementById('guestaddress').value;

if((book_id === "" || book_id === null)){
  $("#error_bookId_input1").html("<font color='red' size='3'>Enter Book ID</font>");
}
  else if(guestname === "" || guestname === null){
    $("#error_bookId_input1").html("");
    $("#error_guest_input").html("<font color='red' size='3'>Enter Guest Name</font>");
  }
  else if(contact === "" || contact === null){
    $("#error_guest_input").html("");
    $("#error_contact_input").html("<font color='red' size='3'>Enter Guest Contact</font>");
  }
  else {
    $("#error_contact_input").html("");
    $.ajax({
        url:"insert_guestissueBook_req.php",
        method:"POST",
        data:({book_id:book_id,guestname:guestname,check_fun_call:check_fun_call,contact:contact,address:address}),
        success: function(){
          //alert("suucess");
          window.location.reload();
        }
    });
  }

});


$("#btn2").click(function() {
    $("#IssueBook_tblDiv1").hide();
    $("#GuestIssueBookFormDiv").show();
      $("#btn2").hide();
});

function RemoveTblIssueBook(bookid,datetime){
// alert(bookid);
  var remMsg = confirm("Do You want to delete the student permanantly!");
    if (remMsg == true) {
  $.ajax({
    url:"RemoveGuestIssueBook.php",
    async: false,
    cache: false,
    method:"POST",
    data:({bookid:bookid,datetime:datetime}),
    success:function(){
    //$("#"+param).closest('tr').remove();
    window.location.reload();
    }
  });

  }
}



</script>

</body>
</html>


<?php }
else {
  header("Location:index.php");
} ?>
