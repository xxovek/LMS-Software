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
  <title>Student Registration</title>
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
    <?php include "sidebar.php"; ?>
  </aside>
<div class="content-wrapper">

  <section class="content-header">
    <h1 class="text-center">
      STUDENTS REGISTRATION
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Registration</li>
    </ol>
  </section>

  <section class="col-lg-2  connectedSortable">
    <button type="button" class="btn bg-purple margin" style="float:left;border-color:red" id="addstudent">New Student</button>
  </section>

  <div class="row">
    <div class="col-sm-12"></div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
  <div class="box box-info" id="StudentForm" style="display:none;">
    <!-- Default box -->
    <div class="box-header with-border">
      <h3 class="box-title">Register New Student</h3>
    </div>

        <form id="registeration" class="form" method="POST">
          <fieldset>
                <div class="box-body">
              <div class="row">
                <div class="col-sm-2"> </div>
                <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="Name"> <strong>Name</strong><font color="red">*</font>:</label>
                <font color="red"><span id="error_name" style="float:bottom"></span></font>
                <input type="text" class="form-control" name="stname" id="stname" placeholder="Enter Name" onkeypress="return isAlphakey(event,this);" autocomplete="off"  />
              </div> <!-- /controls -->
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="mobile number"><strong>Mobile Number</strong><font color="red">*</font>:</label>
                <font color="red"><span id="error_mobilenumber" style="float:bottom"></span></font>
                <input type="text" class="form-control" name="studentmobilenumber" placeholder="Enter Mobile Number" pattern="^[789]\d{9}$" onkeypress="return isNumberKey(event);" id="studentmobno" autocomplete="off"  />
              </div>
            </div>
          </div>
            <div class="row">
              <!-- <div class="col-sm-12">
              </div> -->
            </div>
            <div class="row">
              <div class="col-sm-2"> </div>
              <div class="col-sm-4">
                <div class="form-group" id="sclass">
                  <label class="control-label" for="class"><strong>Class</strong><font color="red">*</font>:</label>
                  <font color="red"><span id="error_class" style="float:bottom"></span></font>
                    <select class="form-control select2" style="width:100%;" name="studentclass"  id="studclass" autocomplete="off" >
                    <option values=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group" id="tclass">
                <label class="control-label" for="address"><strong>Section</strong><font color="red">*</font>:</label>
                <font color="red"><span id="error_section" style="float:bottom"></span></font>
                  <select class="form-control select2" style="width:100%;"   name="studentsection"    id="studsection" autocomplete="off" >
                              <option values=""></option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="D">D</option>
                              <option value="E">E</option>
                              <option value="F">F</option>
                  </select>
              </div>
          </div>
          </div>

            <div class="row">

            </div>

            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-4">
                <div class="form-group" id="rclass">
                  <label class="control-label" for="rollno"><strong>Roll Number</strong><font color="red">*</font>:</label>
                  <font color="red"><span id="error_rollno" style="float:bottom"></span></font>
                    <input type="text" class="form-control" name="rollno" id="studrollno"  placeholder="Enter Rollno" onkeypress="return isNumberKey(event);" autocomplete="off"  />
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label" for="address"><strong>Address</strong><font color="red">*</font>:</label>
                  <font color="red"><span id="error_address" style="float:bottom"></span></font>
                    <textarea rows="2" name="studentaddress" class="form-control" id="studentaddress" placeholder="Enter Address" autocomplete="off"  ></textarea>
                </div>
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
              <h3 class="box-title">Update Student Information</h3>
            </div>

                <form id="updateregisteration" class="form" method="POST">
                  <fieldset>
                        <div class="box-body">
                      <div class="row">
                        <div class="col-sm-2"> </div>
                        <div class="col-sm-4">
                      <div class="form-group">
                        <label class="control-label" for="Name"> <strong>Name</strong><font color="red">*</font>:</label>
                        <font color="red"><span id="error_name1" style="float:bottom"></span></font>
                        <input type="text" class="form-control" name="stname1" id="stname1" placeholder="Enter Name" onkeypress="return isAlphakey(event,this);" autocomplete="off"  />
                        <input type="hidden" id="studentsid" name="studentsid"/>
                      </div> <!-- /controls -->
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="control-label" for="mobile number"><strong>Mobile Number</strong><font color="red">*</font>:</label>
                        <font color="red"><span id="error_mobilenumber1" style="float:bottom"></span></font>
                        <input type="text" class="form-control" name="studentmobilenumber1" id="studentmobno1" placeholder="Enter Mobile Number" pattern="^[789]\d{9}$"  autocomplete="off"  />
                      </div>
                    </div>
                  </div>
                    <div class="row"></div>
                    <div class="row">
                      <div class="col-sm-2"> </div>
                      <div class="col-sm-4">
                        <div class="form-group" id="sclass1">
                          <label class="control-label" for="class"><strong>Class</strong><font color="red">*</font>:</label>
                          <font color="red"><span id="error_class1" style="float:bottom"></span></font>
                            <select class="form-control select2" style="width:100%;" name="studentclass1"  id="studclass1" autocomplete="off" >
                                <option values=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group" id="tclass1" >
                        <label class="control-label" for="address"><strong>Section</strong><font color="red">*</font>:</label>
                        <font color="red"><span id="error_section1" style="float:bottom"></span></font>
                          <select class="form-control select2" style="width:100%;" name="studentsection1"  id="studsection1" autocomplete="off" >
                              <option values=""></option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="D">D</option>
                              <option value="E">E</option>
                              <option value="F">F</option>
                          </select>
                      </div>
                  </div>
                  </div>

                    <div class="row">

                    </div>

                    <div class="row">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-4">
                        <div class="form-group" id="rclass1" >
                          <label class="control-label" for="rollno"><strong>Roll Number</strong><font color="red">*</font>:</label>
                          <font color="red"><span id="error_rollno1" style="float:bottom"></span></font>

                            <input type="text" class="form-control" name="rollno1" id="studrollno1"  placeholder="Enter Rollno" onkeypress="return isNumberKey(event);" autocomplete="off"  />
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="control-label" for="address"><strong>Address</strong><font color="red">*</font>:</label>
                          <font color="red"><span id="error_address1" style="float:bottom"></span></font>
                            <textarea rows="2" name="studentaddress1"  id="studentaddress1" class="form-control" placeholder="Enter Address" autocomplete="off"  ></textarea>
                        </div>
                      </div>
                        </div>
                <!-- <div class="row">
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4" >
                    <button type="submit" class="btn btn-primary" value="save">Submit</button>
                     <button type="submit" class="btn btn-default" onclick="goBack();">Cancel</button>
                   </div>
                 <div class="col-sm-4">
                 </div>
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

                  <section class="content" id="studenttableDiv">

                    <div class="box" >
                      <div class="box-header">
                        <h3 class="text-center">All Students List </h3>
                      </div>

                      <div class="box-body table-responsive">
                        <table id="studentinfotable"  class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th class="text-center" style="width:5%;">Sr. No.</th>
                            <th class="text-center" style="width:10%"> Library Id</th>
                            <th class="text-center" style="width:15%">Full Name</th>
                            <th class="text-center" style="width:10%">Mobile Number</th>
                            <th class="text-center" style="width:5%">Class</th>
                            <th class="text-center" style="width:30%">Address</th>
                            <th class="text-center" style="width:10%">Action</th>

                          </tr>
                          </thead>
                          <tbody id="studenttabledata"></tbody>
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

$("#StudentUpdateForm").hide();
    $("#StudentForm").hide();
display_students();
});

$('.select2').select2({
         allowClear: true,
         placeholder: "Select Here"
     });


     $('#registeration').on("submit", function(event) {
       event.preventDefault();
       var name = document.getElementById("stname").value;
       var mobileno = document.getElementById("studentmobno").value;
       var check = '0';
       //alert(check);
       var studentclass = document.getElementById("studclass").value;
       var studentsection = document.getElementById("studsection").value;
       var studentrollno = document.getElementById("studrollno").value;
       var staddress = document.getElementById("studentaddress").value;
        if (name === "") {
            $("#error_name").html("<font color='red'>Name Required</font>");
        } else {
            $("#error_name").html("");
            if (mobileno === "") {
                $("#error_mobilenumber").html("<font color='red'>Mobile Number Required</font>");
            } else {
                $("#error_mobilenumber").html("");
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
                      if (staddress === "") {
                          $("#error_address").html("<font color='red'>Required Address</font>");
                      } else {
                          $("#error_address").html("");

                          $.ajax({
                              url: "registration.php",
                              method: "POST",
                              data: {stname:name,mobileno:mobileno,check:check,studentclass:studentclass,studentsection:studentsection,rollno:studentrollno,staddress:staddress},
                              success: function(data) {
                                 response = JSON.parse(data);
                                  if(response['success'] === 'true')
                                  {
                                    $("#registeration").trigger("reset");
                                    window.location.reload();
                                }
                                  else
                                  {

                                }
                              }
                          });
                        }
                      }
                    }
                  }
                    }
              }

          });


                $('#updateregisteration').on("submit", function(event) {
                  event.preventDefault();
                  var studentsid = document.getElementById("studentsid").value;
                  var stname1 = document.getElementById("stname1").value;
                  var mobileno1 = document.getElementById("studentmobno1").value;
                  var studentclass1= document.getElementById("studclass1").value;
                  var check = '0';
                  var studentsection1 = document.getElementById("studsection1").value;
                  var rollno1 = document.getElementById("studrollno1").value;
                  var staddress1 = document.getElementById("studentaddress1").value;
                   if (stname1 === "") {
                       $("#error_name1").html("<font color='red'>Name Required</font>");
                   } else {
                       $("#error_name1").html("");
                       if (mobileno1 === "") {
                           $("#error_mobilenumber1").html("<font color='red'>Mobile Number Required</font>");
                       } else {
                           $("#error_mobilenumber1").html("");
                     if (studentclass1 === "") {
                         $("#error_class1").html("<font color='red'>Required to Select Class of student</font>");
                     } else {
                         $("#error_class1").html("");
                         if (studentsection1 === "") {
                             $("#error_section1").html("<font color='red'>Required to Select section</font>");
                         } else {
                             $("#error_section1").html("");
                                 if (rollno1 === "") {
                                     $("#error_rollno1").html("<font color='red'>Required to Select Rollno</font>");
                                 } else {
                                     $("#error_rollno1").html("");
                                 if (staddress1 === "") {
                                     $("#error_address1").html("<font color='red'>Required Address</font>");
                                 } else {
                                     $("#error_address1").html("");

                                     $.ajax({
                                         url: "updatestudentinfo.php",
                                         method: "POST",
                                         data:{studentsid:studentsid,stname1:stname1,mobileno1:mobileno1,staddress1:staddress1,studentclass1:studentclass1,studentsection1:studentsection1,rollno1:rollno1,check:check},
                                         success: function(data) {
                                            var response = JSON.parse(data);

                                             if(response['success'] === 'true')
                                             {
                                               $("#updateregisteration")[0].reset();
                                             window.location.reload();
                                           }
                                             else {
                                               $("#error_rollno1").html("Roll NO Already Exists");
                                                $("#studrollno1").val("");
                                             }
                                         }
                                     });
                                   }
                                 }
                               }
                             }

                               }
                         }

              });


     function display_students() {
       var delbtn = '';
       var response=[];
         $.ajax({
             type: "POST",
             url: "displaystudents.php",
         }).done(function(data) {
           // alert(data);
           if(!(data)){
             $("#studenttabledata").html('<tr class="text-center"><td></td><td></td><td></td><td></td><td class="text-center" style="color:black;">No data available in table</td></tr>');
           }
           else {
             response = JSON.parse(data);
             var count = Object.keys(response).length;
             for (var i = 0; i < count; i++)
              {
                 var student_id = parseInt(response[i]['id']);
                //  alert(response[i]['status']);

                 if (response[i]['status'] > '0') {
                   delBtn ='<button type="button" disabled class="label label-danger" style="display:none" title="Delete After Book Return" name="submit"  id="' + student_id + '" onClick="removestudent(' + student_id + ');" ><i class="fa fa-trash"></i></button>';
                 }
                 else{
                   delBtn ='<button type="button" class="label label-danger" title="Delete Book" name="submit"  id="' + student_id + '" onClick="removestudent(' + student_id + ');" ><i class="fa fa-trash"></i></button>';
                 }

                 $('#studenttabledata').append('<tr><td  class="text-center">'+(i + 1)+'</td><td class="text-center">' + response[i]['Studentid'] + '</td><td class="text-center">' + response[i]['FullName'] + '</td><td class="text-center">' + response[i]['MobileNumber'] + '</td><td class="text-center">'
                  + response[i]['class1'] +'</td><td class="text-center" >'+ response[i]['address'] +'</td> <td class="text-center"><div class="btn-group"><button type="button" class="label label-success " data-toggle="collapse" title="Update Student Information" data-target="#hidecustomerfield" name="submit"  onclick="updatestudentinformation(' + student_id + ');"><i class="fa fa-edit"></i></button>'+delBtn+'</div></td></tr>');

             }
             $("#studentinfotable").DataTable({
               dom: 'Bfrtip',
               buttons: [
                   'copy', 'csv', 'excel', 'pdf', 'print'
               ]
             });

           }


         }).fail(function(jqXHR, textStatus) {
             alert('Request Failed');
         });
       }

         function removestudent(param){
           var s = confirm("Delete Student Permanantly..?? If You delete This record, All Transaction Records will be lost");
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

         function updatestudentinformation(param){
         $("#StudentUpdateForm").show();
         $("#addstudent").hide();
         $("#studenttableDiv").hide();

         $.ajax({
         url: "fetch_studentinfo.php",
         async: false,
         cache: false,
         method: "POST",
         data: {
         studentid: param
         },
         success: function(data) {
         var response = JSON.parse(data);
         $("#studentsid").val(response['Studentid']);
         $("#stname1").val(response['FullName']);
         $("#studentmobno1").val(response['MobileNumber']);
         $("#studclass1").append("<option value=" + response['studentsclass'] + " selected=selected>" + response['studentsclass'] + "</option>");
          $("#studsection1").append("<option value=" + response['section'] + " selected=selected>" + response['section'] + "</option>");
         $("#studentaddress1").val(response['address']);
         $("#studrollno1").val(response['rollno']);
         }
         });
         }

         $("#addstudent").click(function() {
         $("#addstudent").hide();
         $("#StudentForm").show();
         $("#studenttableDiv").hide();
         });

     </script>

     </body>
     </html>

     <?php }
     else {
       header("Location:index.php");
     } ?>
