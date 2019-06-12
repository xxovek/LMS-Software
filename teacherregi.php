
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
  <title>Teacher Registration</title>
  <!-- jQuery 3 -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="Generic_Functions.js"></script>
  <link rel="stylesheet" href="js/allfonts.css">
  <!-- <script src="js/responsive-tab.js"></script> -->
  <script src="js/all_function.js"></script>
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
  <?php include "header.php"; ?>
</header>

  <aside class="main-sidebar">
    <?php include "sidebar.php" ; ?>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1 class="text-center">
        TEACHER REGISTRATION
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Registration</li>
      </ol>
    </section>

    <!-- <section class="col-lg-2  connectedSortable">
      <button type="button" class="btn bg-purple margin" style="float:left" id="btn1">New Category</button>
      </section> -->

      <section class="col-lg-2  connectedSortable">
        <button type="button" class="btn bg-purple margin" style="float:left;border-color: red" id="addstudent">New Teacher</button>
      </section>


      <div class="row">
        <div class="col-sm-12"></div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
    <div class="box box-info"  id="StudentForm" style="display:none;">
      <div class="box-header with-border">
        <h3 class="box-title">Register New Teacher</h3>
      </div>
      <!-- Default box -->

          <form id="registeration" class="form-horizontal" method="POST">
            <fieldset>
                  <div class="box-body">
                <div class="row">
                  <div class="col-sm-4"> </div>
                  <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label" for="Name"> <strong>Name</strong><font color="red">*</font>:</label>
                  <font color="red"><span id="error_name" style="float:bottom"></span></font>
                  <input type="text" class="form-control" name="stname" id="stname" placeholder="Enter Name" onkeypress="return isAlphakey(event,this);" autocomplete="off"  />
                </div> <!-- /controls -->
              </div>
              <div class="col-sm-4"> </div>
            </div>
              <div class="row">
                <div class="col-sm-12">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4"> </div>
                <div class="col-sm-4">
                <div class="form-group">

                  <label class="control-label" for="mobile number"><strong>Mobile Number</strong><font color="red">*</font>:</label>
                  <font color="red"><span id="error_mobilenumber" style="float:bottom"></span></font>

      <input type="text" class="form-control" name="studentmobilenumber" placeholder="Enter Mobile Number" pattern="^[789]\d{9}$" id="studentmobno" onkeypress="return isNumberKey(event);" autocomplete="off"  />
                </div> <!-- /controls -->
              </div>
            </div>

              <div class="row">
                <div class="col-sm-12">
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4"> </div>
                <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="address"><strong>Address</strong><font color="red">*</font>:</label>
                <font color="red"><span id="error_address" style="float:bottom"></span></font>
                  <textarea rows="2" name="studentaddress" class="form-control" id="studentaddress" placeholder="Enter Address" autocomplete="off"  ></textarea>
              </div> <!-- /control-group -->
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-sm-4">

            </div>
          <div class="col-sm-4" >
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
             <button type="button" class="btn btn-default" onclick="window.location.reload();">Cancel</button>
           </div>
           <div class="col-sm-4">
           </div>
         </div> -->
         <div class="box-footer">
           <button type="button" class="btn btn-default pull-right" onclick="window.location.reload();" >Cancel</button>
           <button type="submit"  class="btn btn-info pull-left">Save</button>
         </div>
       </div>
     </fieldset>
    </form>
     </div>
              </div>
            </div>



            <div class="row">
              <div class="col-sm-12"></div>
              <div class="col-md-2"></div>
              <div class="col-md-8">
            <div class="box box-info"  id="StudentUpdateForm" style="display:none;">
              <!-- Default box -->
              <div class="box-header with-border">
                <h3 class="box-title">Update Teacher Information</h3>
              </div>

                  <form id="updateregisteration" class="form-horizontal" method="POST">
                    <fieldset>
                          <div class="box-body">
                        <div class="row">
                          <div class="col-sm-4"> </div>
                          <div class="col-sm-4">
                        <div class="form-group">
                          <label class="control-label" for="Name"> <strong>Name</strong><font color="red">*</font>:</label>
                          <font color="red"><span id="error_name1" style="float:bottom"></span></font>

                          <input type="text" class="form-control" name="stname1" id="stname1" placeholder="Enter Name" onkeypress="return isAlphakey(event,this);" autocomplete="off"  />
                          <input type="hidden" id="studentsid" name="studentsid" autocomplete="off"/>

                        </div> <!-- /controls -->

                      </div>
                      <div class="col-sm-4"> </div>
                    </div>

                      <div class="row">
                        <div class="col-sm-12">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-4">
                        <div class="form-group">

                          <label class="control-label" for="mobile number"><strong>Mobile Number</strong><font color="red">*</font>:</label>
                          <font color="red"><span id="error_mobilenumber1" style="float:bottom"></span></font>
                          <input type="text" class="form-control" name="studentmobilenumber1" id="studentmobno1" placeholder="Enter Mobile Number" pattern="^[789]\d{9}$"  autocomplete="off"  />
                        </div> <!-- /controls -->
                      </div>
                    </div>

                      <div class="row">
                        <div class="col-sm-12">
                        </div>
                      </div>
                      <div class="row">

                        <div class="col-sm-12">


                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-4">
                      <div class="form-group">
                        <label class="control-label" for="address"><strong>Address</strong><font color="red">*</font>:</label>
                        <font color="red"><span id="error_address1" style="float:bottom"></span></font>
                          <textarea rows="2" name="studentaddress1"  id="studentaddress1" class="form-control" placeholder="Enter Address" autocomplete="off"></textarea>
                      </div>

                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-sm-4"></div>
                  <div class="col-sm-4" >
                    <button type="submit" class="btn btn-primary" value="save">Submit</button>
                     <button type="submit" class="btn btn-default" onclick="window.location.reload();">Cancel</button>
                   </div>
                   <div class="col-sm-4"></div>
                 </div> -->
                 <div class="box-footer">
                   <button type="button" class="btn btn-default pull-right" onclick="window.location.reload();" >Cancel</button>
                   <button type="submit"  class="btn btn-info pull-left">Update</button>
                 </div>
               </div>
             </fieldset>
           </form>
             </div>
                      </div>
                    </div>


                    <section class="content" id="teachertableDiv" style="display:none">
                      <div class="box" >
                        <div class="box-header">
                          <h3 class="text-center">All Teachers List </h3>
                        </div>
                        <div class="box-body table-responsive">
                          <table id="teacherinfotable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th class="text-center"  style="width:3%;">Sr. No.</th>
                              <th class="text-center"  style="width:3%;">Library Id</th>
                              <th class="text-center"  >Full Name</th>
                              <th class="text-center"  >Mobile Number</th>
                              <th class="text-center" >Address</th>
                              <th class="text-center" >Action</th>
                            </tr>
                            </thead>
                            <tbody id="teachertabledata">
                              </tbody>
                          </table>
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
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  display_teachers();
$("#teachertableDiv").show();
$("#StudentUpdateForm").hide();
  $("#StudentForm").hide();

});

// $('.select2').select2({
//          allowClear: true,
//          placeholder: "Select Here"
//      });

     $('#registeration').on("submit", function(event) {
       event.preventDefault();
       var name = document.getElementById("stname").value;
       var mobileno = document.getElementById("studentmobno").value;
       var check = '1';
       var staddress = document.getElementById("studentaddress").value;

        if (name === "") {
            $("#error_name").html("<font color='red'>Name Required</font>");
        } else {
            $("#error_name").html("");
            if (mobileno === "") {
                $("#error_mobilenumber").html("<font color='red'>Mobile Number Required</font>");
            } else {
                $("#error_mobilenumber").html("");
                      if (staddress === "") {
                          $("#error_address").html("<font color='red'>Required Address</font>");
                      } else {
                          $("#error_address").html("");
                          $.ajax({
                              url: "registration.php",
                              method: "POST",
                              data:{stname:name,mobileno:mobileno,staddress:staddress,check:check},
                              success: function(data) {
                                var response = JSON.parse(data);
                                  if(response['success'] === 'teacher')
                                  {
                                     $("#registeration").trigger("reset");
                                     window.location.reload();
                                }
                                else{

                                }
                              }
                          });
                  }
              }
            }

                });

                $('#updateregisteration').on("submit", function(event) {
                  var studentsid = document.getElementById("studentsid").value;
                  var name1 = document.getElementById("stname1").value;
                  var mobileno1 = document.getElementById("studentmobno1").value;
                   var check = '1';
                  var staddress1 = document.getElementById("studentaddress1").value;
                   event.preventDefault();
                   if (name1 === "") {
                       $("#error_name1").html("<font color='red'>Name Required</font>");
                   } else {
                       $("#error_name1").html("");
                       if (mobileno1 === "") {
                           $("#error_mobilenumber1").html("<font color='red'>Mobile Number Required</font>");
                       } else {
                           $("#error_mobilenumber1").html("");
                                 if (staddress1 === "") {
                                     $("#error_address1").html("<font color='red'>Required Address</font>");
                                 } else {
                                     $("#error_address1").html("");
                                     $.ajax({
                                         url: "updatestudentinfo.php",
                                         method: "POST",
                                         data:{studentsid:studentsid,stname1:name1,mobileno1:mobileno1,staddress1:staddress1,check:check},
                                         success: function(data) {
                                            var response = JSON.parse(data);
                                          if(response['success'] === 'teacher')
                                             {
                                                 $("#updateregisteration").trigger("reset");
                                                 window.location.reload();
                                           }
                                           else{}
                                         }
                                     });
                                   }
                         }
                       }
              });

  function display_teachers() {
    var response =[];
    var delBtn = '';
      $.ajax({
          type: "POST",
          url: "display_teacher.php",
      }).done(function(data) {
        if(!(data))
        {
          $("#teachertabledata").html('<tr class="text-center"><td></td><td></td><td class="text-center" style="color:black;">No data available in table</td></tr>');
        }
          response = JSON.parse(data);
          var count = Object.keys(response).length;

          for (var i = 0; i < count; i++)
           {
               var teacher_id = parseInt(response[i]['id']);
             if(response[i]['status'] > '0')
              delBtn = '<button type="button" disabled class="label label-danger" style="display:none" title="Delete after Book Return" name="submit"  id="' + teacher_id + '" onClick="removeteacher(' + teacher_id + ');" ><i class="fa fa-trash"></i></button>';
              else {
                delBtn = '<button type="button" class="label label-danger" title="Remove Book" name="submit"  id="' + teacher_id + '" onClick="removeteacher(' + teacher_id + ');" ><i class="fa fa-trash"></i></button>';
              }

              $('#teachertabledata').append('<tr><td  class="text-center" >'+(i + 1)+'</td><td class="text-center" >' + response[i]['id'] + '</td><td class="text-center" >' + response[i]['teachername'] + '</td><td class="text-center" >' + response[i]['mobilenumber'] + '</td><td class="text-center" >' + response[i]['address'] +
              '</td> <td class="text-center" ><div class="btn-group"><button type="button" class="label label-success " data-toggle="collapse" title="Update Teacher Information" data-target="#hidecustomerfield" name="submit" onclick="updateteacherinformation(' + teacher_id + ');"><i class="fa fa-edit"></i></button>'+delBtn+'</div></td></tr>');
          }
          $('#teacherinfotable').DataTable({
             dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          });

      }).fail(function(jqXHR, textStatus) {
          alert('Request Failed');
      });
    }


    function removeteacher(param)
    {
      // alert(param);
      var t = confirm("Do You want to delete the teacher permanantly!");
      if (t == true) {
                $.ajax({
                url:"deleteteacher.php",
                async: false,
                cache: false,
                method:"POST",
                data:({removeteacher:param}),
                success:function(data)
                {

                //  $("#"+param).closest('tr').remove();
                  window.location.reload();
                }
                });
    } else {
      alert("Not Deleted");
      window.location.reload();
    }

  }
    function updateteacherinformation(param){
     $("#StudentUpdateForm").show();
    $("#teachertableDiv").hide();
    $("#addstudent").hide();
    $.ajax({
    url: "fetch_teacherinformation.php",
    async: false,
    cache: false,
    method: "POST",
    data: ({
    teacherid: param
    }),
    success: function(data) {
    var response = JSON.parse(data);
    $("#studentsid").val(response['teacherid']);
    $("#stname1").val(response['teachername']);
    $("#studentmobno1").val(response['mobilenumber']);
    $("#studentaddress1").val(response['address']);
    }
    });
    }

    $("#addstudent").click(function() {
    $("#addstudent").hide();
    $("#StudentForm").show();
    $("#teachertableDiv").hide();
    });

</script>
</body>
</html>
<?php }
else {
  header("Location:index.php");
} ?>
