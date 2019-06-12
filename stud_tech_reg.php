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
  <title>Registration</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="js/allfonts.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <header class="main-header">
    <?php include "header.php" ; ?>
  </header>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php include "sidebar.php" ; ?>

    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <section class="content-header">
      <h1 class="text-center">
        REGISTRATION
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Registration</li>
      </ol>
    </section>


    <section class="col-lg-2  connectedSortable">
      <button type="button" class="btn bg-purple margin" style="float:left" id="addstudent">New Student / Teacher</button>
      <!-- <div id="data"></div> -->
      </section>
      <div class="row">
      <div class="col-sm-12">

        <ul class="nav nav-tabs" id="st">
   <li class=" active" id="ss" ><a  data-toggle="tab" href="#studentactive" onclick="showstudentactive(this);">Student</a></li>
   <li id="tt" ><a data-toggle="tab" href="#teacheractive"  onclick="showteacheractive(this);">Teacher</a></li>

 </ul>
      </div>
    </div>

    <!-- Main content -->
    <section class="content"  id="StudentForm" style="display:none;">

      <!-- Default box -->
      <div class="box">

        <div class="box-body">

          <form id="registeration" class="form-horizontal" method="POST">
            <fieldset>
              <div class="row">
              <div class="col-sm-12">
              </div>
            </div>
            <div class="box box-primary">
              <div class="row">
                <div class="col-sm-4"> </div>
                <div class="col-sm-4">
              <div class="box-header with-border">
                <h3 class="box-title">Registration</h3>
              </div>
            </div>
            <div class="col-sm-4"> </div>
          </div>
            </div>
                  <div class="box-body">
                <div class="row">
                  <div class="col-sm-4"> </div>
                  <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label" for="Name"> <strong>Name</strong><font color="red">*</font>:</label>
                  <font color="red"><span id="error_name" style="float:bottom"></span></font>

                  <input type="text" class="form-control" name="stname" id="stname" placeholder="Enter Name" onkeypress="return isAlphakey(event);" autocomplete="off"  />
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

                  <input type="text" class="form-control" name="studentmobilenumber" placeholder="Enter Mobile Number" pattern="^[789]\d{9}$" id="studentmobno" autocomplete="off"  />
                </div> <!-- /controls -->
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4"> </div>
              <div class="col-sm-4">
              <div class="form-group">
                <div class="checbox">
                <strong>Student</strong><font color="red">*</font>: <input type="checkbox" name="myCheck" id="myCheck" style="margin-right: 30px"  onclick="myFunction()">
                <strong>Teacher</strong><font color="red">*</font>: <input type="checkbox" name="myCheck1"  id="myCheck1"  onclick="myFunction1()">
                <font color="red"><span id="error_st" style="float:bottom"></span></font>
              </div>
              </div>
            </div>
            </div>

              <div class="row">
                <div class="col-sm-12">
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4"> </div>
                <div class="col-sm-4">
              <div class="form-group" id="sclass" style="display:none">
                <label class="control-label" for="class"><strong>Class</strong><font color="red">*</font>:</label>
                <font color="red"><span id="error_class" style="float:bottom"></span></font>
                  <select class="form-control select2" style="width:100%;" name="studentclass"  id="studclass" autocomplete="off" >
                    <option values=""></option>
                      <option value="5">v</option>
                    <option value="6">vi</option>
                    <option value="7">vii</option>
                  </select>

              </div>
                </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4"> </div>
                    <div class="col-sm-4">
              <div class="form-group" id="tclass" style="display:none">
                <label class="control-label" for="address"><strong>Section</strong><font color="red">*</font>:</label>
                <font color="red"><span id="error_section" style="float:bottom"></span></font>
                  <select class="form-control select2" style="width:100%;"   name="studentsection"    id="studsection" autocomplete="off" >
                    <option values=""></option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                  </select>
              </div> <!-- /control-group -->
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4"> </div>
            <div class="col-sm-4">
              <div class="form-group" id="rclass" style="display:none">
                <label class="control-label" for="rollno"><strong>Roll Number</strong><font color="red">*</font>:</label>
                <font color="red"><span id="error_rollno" style="float:bottom"></span></font>

                  <input type="text" class="form-control" name="rollno" id="studrollno"  placeholder="Enter Rollno" onkeypress="return isNumberKey(event);" autocomplete="off"  />

              </div> <!-- /control-group -->
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
          <div class="row">
            <div class="col-sm-4">

            </div>
          <div class="col-sm-4" >
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
             <button type="submit" class="btn btn-default" onclick="window.location.reload();">Cancel</button>
           </div>
           <div class="col-sm-4">
           </div>
         </div>
       </div>
     </fieldset>
   </form>
     </div>
              </div>
            </section>


            <section class="content"  id="StudentUpdateForm" style="display:none;">
              <!-- Default box -->
              <div class="box">
                <div class="box-body">
                  <form id="updateregisteration" class="form-horizontal" method="POST">
                    <fieldset>
                      <div class="row">
                      <div class="col-sm-12">
                      </div>
                    </div>
                    <div class="box box-primary">
                      <div class="row">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-4">
                      <div class="box-header with-border">
                        <h3 class="box-title">Registration</h3>
                      </div>
                    </div>
                    <div class="col-sm-4"> </div>

                  </div>
                    </div>
                          <div class="box-body">


                        <div class="row">
                          <div class="col-sm-4"> </div>
                          <div class="col-sm-4">
                        <div class="form-group">
                          <label class="control-label" for="Name"> <strong>Name</strong><font color="red">*</font>:</label>
                          <font color="red"><span id="error_name1" style="float:bottom"></span></font>

                          <input type="text" class="form-control" name="stname1" id="stname1" placeholder="Enter Name" onkeypress="return isAlphakey(event);" autocomplete="off"  />
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
                      <div class="col-sm-4"> </div>
                      <div class="col-sm-4">
                      <div class="form-group">
                        <div class="checbox">
                        <strong>Student</strong><font color="red">*</font>: <input type="checkbox" name="studentmyCheck" id="studentmyCheck" style="margin-right: 30px"  onclick="myFunction()">
                        <strong>Teacher</strong><font color="red">*</font>: <input type="checkbox" name="studentmyCheck1"  id="studentmyCheck1"  onclick="myFunction1()">
                        <font color="red"><span id="error_st1" style="float:bottom"></span></font>
                      </div>
                      </div>
                    </div>
                    </div>

                      <div class="row">
                        <div class="col-sm-12">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-4">
                      <div class="form-group" id="sclass1">
                        <label class="control-label" for="class"><strong>Class</strong><font color="red">*</font>:</label>
                        <font color="red"><span id="error_class1" style="float:bottom"></span></font>
                          <select class="form-control select2" style="width:100%;" name="studentclass1"  id="studclass1" autocomplete="off" >
                            <option values=""></option>
                              <option value="5">v</option>
                            <option value="6">vi</option>
                            <option value="7">vii</option>
                          </select>

                      </div>
                        </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4"> </div>
                            <div class="col-sm-4">
                      <div class="form-group" id="tclass1" >
                        <label class="control-label" for="address"><strong>Section</strong><font color="red">*</font>:</label>
                        <font color="red"><span id="error_section1" style="float:bottom"></span></font>
                          <select class="form-control select2" style="width:100%;"   name="studentsection1"  id="studsection1" autocomplete="off" >
                            <option values=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                          </select>
                      </div> <!-- /control-group -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4"> </div>
                    <div class="col-sm-4">
                      <div class="form-group" id="rclass1" >
                        <label class="control-label" for="rollno"><strong>Roll Number</strong><font color="red">*</font>:</label>
                        <font color="red"><span id="error_rollno1" style="float:bottom"></span></font>

                          <input type="text" class="form-control" name="rollno1" id="studrollno1"  placeholder="Enter Rollno" onkeypress="return isNumberKey(event);" autocomplete="off"  />

                      </div> <!-- /control-group -->
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
                          <textarea rows="2" name="studentaddress1"  id="studentaddress1" class="form-control" placeholder="Enter Address" autocomplete="off"  ></textarea>

                      </div> <!-- /control-group -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">


                    </div>
                  <div class="col-sm-4" >
                    <button type="submit" class="btn btn-primary" value="save">Submit</button>
                     <button type="submit" class="btn btn-default" onclick="window.location.reload();">Cancel</button>
                   </div>
                   <div class="col-sm-4">


                   </div>
                 </div>
               </div>
             </fieldset>
           </form>
             </div>
                      </div>
                    </section>


                    <div id="studentactive" class="tab-pane fade in active">

                    <section class="content" id="studenttable">

                      <div class="box" >
                        <div class="box-header">
                          <h3 class="text-center">All Student Registration List </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                          <table id="studentinfotable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th class="text-center">Sr. No.</th>
                              <th class="text-center"> Id</th>
                              <th class="text-center"> Library Id</th>

                              <th class="text-center"> Name</th>
                              <th class="text-center">Mobile Number</th>
                              <th class="text-center">Class</th>
                              <th class="text-center">Section </th>
                              <th class="text-center">Roll No </th>
                              <th class="text-center">Address</th>
                              <th class="text-center">Action</th>

                            </tr>
                            </thead>
                            <tbody id="studenttabledata">

                              </tbody>

                              <!-- <tfoot>
                              <tr>
                                <th class="text-center">Sr. No.</th>
                                <th class="text-center"> Id</th>
                                <th class="text-center"> Library Id</th>
                                <th class="text-center"> Name</th>
                                <th class="text-center">Mobile Number</th>
                                <th class="text-center">Class</th>
                                <th class="text-center">Section </th>
                                <th class="text-center">Roll No </th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Action</th>
                              </tr>
                              </tfoot> -->

                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </section>
                  </div>

                  <div id="teacheractive" class="tab-pane fade ">
                    <section class="content" id="teachertable" style="display:none;">
                      <div class="box" >
                        <div class="box-header">
                          <h3 class="text-center">All Teacher Registration List </h3>
                        </div>
                        <div class="box-body table-responsive">
                          <table id="teacherinfotable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th class="text-center">Sr. No.</th>
                              <th class="text-center">Teacher Id</th>
                              <th class="text-center"> Name</th>
                              <th class="text-center">Mobile Number</th>
                              <th class="text-center">Address</th>
                              <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody id="teachertabledata">
                              </tbody>
                              <!-- <tfoot>
                              <tr>
                                <th class="text-center">Sr. No.</th>
                                <th class="text-center">Teacher Id</th>
                                <th class="text-center"> Name</th>
                                <th class="text-center">Mobile Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Action</th>

                              </tr>
                              </tfoot> -->

                          </table>
                        </div>
                      </div>
                    </section>
                  </div>
            </div>





        <footer class="main-footer">
          <!-- <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
          </div> -->
          <strong>Copyright &copy; 2018 <a href="www.xxovek.com">Xxovek</a>.</strong> All rights
          reserved.
        </footer>

        <!-- Control Sidebar -->
      <?php include "settingsRightSidebar.php"; ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>


<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="js/all_function.js"></script>

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
<script>

function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var checkBox1 = document.getElementById("myCheck1");

    var text = document.getElementById("sclass");
    var text1 = document.getElementById("tclass");
    var text2 = document.getElementById("rclass");

    if (checkBox.checked == true){
        text.style.display = "block";
        text1.style.display = "block";
        text2.style.display = "block";

        checkBox1.checked = false;
    }
    else {
      text.style.display = "none";
      text1.style.display = "none";
      text2.style.display = "none";

   }
}
function myFunction1() {
  var checkBox = document.getElementById("myCheck");

    var checkBox1 = document.getElementById("myCheck1");
    if (checkBox1.checked == true){
        sclass.style.display = "none";
        tclass.style.display = "none";
        rclass.style.display = "none";

        checkBox.checked = false;
    }

}
$("#addstudent").click(function() {
$("#studenttable").hide();
    $("#addstudent").hide();
    $("#teachertable").hide();
    $("#st").hide();

    $("#StudentForm").show();
});

function updatestudentinformation(param){
$("#studenttable").hide();
$("#StudentUpdateForm").show();
$("#addstudent").hide();
$("#st").hide();
$("#StudentForm").hide();

$.ajax({
url: "fetch_studentinfo.php",
async: false,
cache: false,
method: "POST",
data: ({
studentid: param
}),
success: function(data) {
var response = JSON.parse(data);
$("#studentsid").val(response['Studentid']);
$("#stname1").val(response['FullName']);
$("#studentmobno1").val(response['MobileNumber']);
  document.getElementById("studentmyCheck").checked = true;
  document.getElementById("studentmyCheck1").disabled = true;
$("#studclass1").append("<option value=" + response['studentsclass'] + " selected=selected>" + response['studentsclass'] + "</option>");
 $("#studsection1").append("<option value=" + response['section'] + " selected=selected>" + response['section'] + "</option>");
$("#studentaddress1").val(response['address']);
$("#studrollno1").val(response['rollno']);

}
});
}

function updateteacherinformation(param){
$("#studenttable").hide();
$("#StudentUpdateForm").show();
$("#addstudent").hide();
$("#teachertable").hide();
$("#st").hide();
$("#StudentForm").hide();

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
  document.getElementById("studentmyCheck").disabled = true;
  $("#sclass1").hide();
  $("#rclass1").hide();
  $("#tclass1").hide();
  document.getElementById("studentmyCheck1").checked = true;
$("#studentaddress1").val(response['address']);

}
});
}

  function removestudent(param)
  {
    var s = confirm("Do You want to delete the student permanantly!");
    if (s == true) {
              $.ajax({
              url:"deletestudent.php",
              async: false,
              cache: false,
              method:"POST",
              data:({removestudent:param}),
              success:function(data)
              {
                $("#"+param).closest('tr').remove();
                  window.location.reload();
              }
              });
  } else {
    window.location.reload();
  }

  }
  function removeteacher(param)
  {

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
                $("#"+param).closest('tr').remove();
                  window.location.reload();
              }
              });
  } else {
    window.location.reload();
  }

  }

function showstudentactive()
{
$('#studenttable').show();
  $('#teachertable').hide();
  $("#StudentUpdateForm").hide();

      $("#StudentForm").hide();
    $("#addstudent").show();
}
function showteacheractive()
{
  $("#StudentUpdateForm").hide();

      $("#StudentForm").hide();
    $("#addstudent").show();
  $('#teachertable').show();
  $('#studenttable').hide();
}
function display_students() {
  // $("#studenttabledata").html(' ');
  var response=[];
    $.ajax({
        type: "POST",
        url: "displaystudents.php",
    }).done(function(data) {
      // alert(data);
      if(!(data))
      {
        $("#studenttabledata").html('<tr class="text-center"><td></td><td></td><td></td><td></td><td class="text-center" style="color:black;">No data available in table</td></tr>');

      }

        response = JSON.parse(data);
        var count = Object.keys(response).length;

        for (var i = 0; i < count; i++)
         {
            var student_id = parseInt(response[i]['id']);
            $('#studenttabledata').append('<tr><td  class="text-center">'+(i + 1)+'</td><td class="text-center">' + response[i]['id'] + '</td><td class="text-center">' + response[i]['Studentid'] + '</td><td class="text-center"><button type="button" class="btn btn-link" data-toggle="collapse" title="Update Book Information" data-target="#demo" onclick="updatestudentinformation(' + student_id + ');">' + response[i]['FullName'] + '</button></td><td class="text-center">' + response[i]['MobileNumber'] + '</td><td class="text-center">' + response[i]['class1'] + '</td><td class="text-center">' + response[i]['section'] +
            '</td><td class="text-center">' + response[i]['rollno'] + '</td><td class="text-center">' + response[i]['address'] + '</td> <td class="text-center"><div class="btn-group"><button type="button" class="btn btn-success " data-toggle="collapse" title="Update Student Information" data-target="#hidecustomerfield" name="submit"  onclick="updatestudentinformation(' + student_id + ');"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger" title="Remove Student" name="submit"  id="' + student_id + '" onClick="removestudent(' + student_id + ');" ><i class="fa fa-trash"></i></button></div></td></tr>');

        }
        $("#studentinfotable").DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        });

    }).fail(function(jqXHR, textStatus) {
        alert('Request Failed');
    });
  }
  function display_teachers() {
    var response =[];
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
              $('#teachertabledata').append('<tr><td  class="text-center">'+(i + 1)+'</td><td class="text-center">' + response[i]['id'] + '</td><td class="text-center"><button type="button" class="btn btn-link" data-toggle="collapse" title="Update Teacher Information" data-target="#demo" onclick="updateteacherinformation(' + teacher_id + ');">' + response[i]['teachername'] + '</button></td><td class="text-center">' + response[i]['mobilenumber'] + '</td><td class="text-center">' + response[i]['address'] +
              '</td> <td class="text-center"><div class="btn-group"><button type="button" class="btn btn-success " data-toggle="collapse" title="Update Teacher Information" data-target="#hidecustomerfield" name="submit" onclick="updateteacherinformation(' + teacher_id + ');"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger" title="Remove Book" name="submit"  id="' + teacher_id + '" onClick="removeteacher(' + teacher_id + ');" ><i class="fa fa-trash"></i></button></div></td></tr>');


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


$(document).ready(function(){
    display_students();
    display_teachers();

$("#StudentUpdateForm").hide();
    $("#StudentForm").hide();

    $('.select2').select2({
             allowClear: true,
             placeholder: "Select Here"
         });
       });

         $('#registeration').on("submit", function(event) {
           var name = document.getElementById("stname").value;
           var mobileno = document.getElementById("studentmobno").value;
           var check = document.getElementById("myCheck");
           var check11 = document.getElementById("myCheck1");
           var studentclass = document.getElementById("studclass").value;
           var studentsection = document.getElementById("studsection").value;
           var studentrollno = document.getElementById("studrollno").value;
           var staddress = document.getElementById("studentaddress").value;

            event.preventDefault();
            if (name === "") {
                $("#error_name").html("<font color='red'>Name Required</font>");
            } else {
                $("#error_name").html("");
                if (mobileno === "") {
                    $("#error_mobilenumber").html("<font color='red'>Mobile Number Required</font>");
                } else {
                    $("#error_mobilenumber").html("");
                    if ((check.checked === false) && (check11.checked === false)) {
                        $("#error_st").html("<font color='red'>Required to Select either Student or Teacher</font>");
                    } else {
                        $("#error_st").html("");

                if(check.checked === true)
                {
              if (studentclass === "") {
                  $("#error_class").html("<font color='red'>Required to Select Class of student</font>");
              } else {
                  $("#error_class").html("");
                  if (studentsection === "") {
                      $("#error_section").html("<font color='red'>Required to Select section</font>");
                  } else {
                      $("#error_section").html("");
                          if (studentrollno === "") {
                              $("#error_rollno").html("<font color='red'>Required to Select Rollno</font>");
                          } else {
                              $("#error_rollno").html("");

                            }
                          }
                        }
                          }
                          if (staddress === "") {
                              $("#error_address").html("<font color='red'>Required Address</font>");
                          } else {
                              $("#error_address").html("");

                              $.ajax({
                                  url: "registration.php",
                                  method: "POST",
                                  data: $('#registeration').serialize(),
                                  success: function(data) {
                                     response = JSON.parse(data);
                                      if(response['success'] === 'true')
                                      {
                                        $("#registeration")[0].reset();

                                      window.location.reload();
                                    }
                                      else if(response['success'] === 'teacher')
                                      {
                                        $("#teachertable").show();
                                          $("#addstudent").show();
                                        $("#studenttable").hide();
                                        $("#StudentUpdateForm").hide();
                                            $("#StudentForm").hide();
                                          $("#registeration").trigger("reset");
                                          window.location.reload();
                                    }
                                  }
                              });
                            }
                  }
                }
              }

                    });


                    $('#updateregisteration').on("submit", function(event) {
                      var name1 = document.getElementById("stname1").value;
                      var mobileno1 = document.getElementById("studentmobno1").value;
                      var studentclass1= document.getElementById("studclass1").value;
                      var studcheck = document.getElementById("studentmyCheck");
                      var teachercheck = document.getElementById("studentmyCheck1");
                      var studentsection1 = document.getElementById("studsection1").value;
                      var studentrollno1 = document.getElementById("studrollno1").value;
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
                               if ((studcheck.checked === false)  &&(teachercheck.checked === false)) {
                                   $("#error_st1").html("<font color='red'>Required to Select Student or teacher</font>");
                               } else {
                                   $("#error_st1").html("");

                           if(studcheck.checked === true)
                           {
                         if (studentclass1 === "") {
                             $("#error_class1").html("<font color='red'>Required to Select Class of student</font>");
                         } else {
                             $("#error_class1").html("");
                             if (studentsection1 === "") {
                                 $("#error_section1").html("<font color='red'>Required to Select section</font>");
                             } else {
                                 $("#error_section1").html("");
                                     if (studentrollno1 === "") {
                                         $("#error_rollno1").html("<font color='red'>Required to Select Rollno</font>");
                                     } else {
                                         $("#error_rollno1").html("");

                                       }
                                     }
                                   }
                                     }
                                     if (staddress1 === "") {
                                         $("#error_address1").html("<font color='red'>Required Address</font>");
                                     } else {
                                         $("#error_address1").html("");


                                         $.ajax({
                                             url: "updatestudentinfo.php",
                                             method: "POST",
                                             data: $('#updateregisteration').serialize(),
                                             success: function(data) {

                                                var response = JSON.parse(data);
                                                 if(response['success'] === 'true')
                                                 {
                                                   $("#updateregisteration")[0].reset();

                                                 window.location.reload();
                                               }
                                                 else if(response['success'] === 'teacher')
                                                 {

                                                   $("#teachertable").show();
                                                   $("#addstudent").show();
                                                   $("#st").show();
                                                   $("#studenttable").hide();
                                                   $("#StudentUpdateForm").hide();
                                                       $("#StudentForm").hide();
                                                     $("#updateregisteration").trigger("reset");

                                                     window.location.reload();


                                               }
                                             }
                                         });
                                       }
                             }
                           }
                         }

                               });
    // $('.sidebar-menu').tree()


</script>
</body>
</html>

<?php }
else {
  header("Location:index.php");
} ?>
