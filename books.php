
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
  <title>Books Details</title>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="js/allfonts.css">
  <script src="Generic_Functions.js"></script>
  <script src="js/all_function.js"></script>

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
        BOOK INFORMATION
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#"></a></li> -->
        <li class="active">Books Information</li>
      </ol>
    </section>
    <section class="col-lg-2  connectedSortable">
      <button type="button" class="btn bg-purple margin" style="float:left;border-color: red" id="addbookbutton">New Books</button>
      <!-- <div id="data"></div> -->
      </section>

    <!-- Main content -->

    <div class="row">
      <div class="col-sm-12"></div>
      <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="box box-info" id="BookForm" style="display:none;">
      <!-- Default box -->
      <div class="box-header with-border">
        <h3 class="box-title">Add Book Information</h3>
      </div>
          <form id="Book_info_Form" class="form-horizontal" method="POST">
            <fieldset>
                  <div class="box-body">
                <div class="row">
                  <div class="col-sm-1"> </div>
                  <div class="col-sm-5">
                <div class="form-group">
                  <label class="control-label" for="author"> <strong>Book Title</strong><font color="red">*</font>:</label>
                  <font color="red"><span id="error_book_name" style="float:bottom"></span></font>
                  <input type="text" class="form-control"  id="book_name" name="book_name" placeholder="Enter Book Title"  autocomplete="off"  />
                </div> <!-- /controls -->

              </div>
              <div class="col-sm-1"> </div>
              <div class="col-sm-4">
            <div class="form-group">
              <label class="control-label" for="isbn"> <strong>Book ISBN Number</strong>:</label>

              <input type="text" class="form-control"   id="isbn_number" name="isbn_number" placeholder="Enter Book Title"  autocomplete="off"  />
            </div> <!-- /controls -->

          </div>
          <div class="col-sm-1"> </div>

            </div>


              <div class="row">
                <div class="col-sm-1"> </div>
                <div class="col-sm-5">
                  <div class="form-group">
                    <label class="control-label" for="author name"> <strong>Author Name </strong><font color="red">*</font>:</label>
                    <font color="red"><span id="error_author_name" style="float:bottom"></span></font>
                  <!-- <select class="form-control select2" style="width:100%;"  id="author_name" name="author_name" autocomplete="off" >
                    <option values=""></option>
                    <option value="14">Service Tax(14%)</option>
                    <option value="18">Service Tax(18%)</option>
                  </select> -->
                  <select class="form-control select2" style="width:100%;" id="author_name" name="author_name" ></select>
                </div>
              </div>
                <div class="col-sm-1"> </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label" for="Category"> <strong>Category</strong><font color="red">*</font>:</label>
                    <font color="red"><span id="error_category" style="float:bottom"></span></font>
                  <select class="form-control select2" style="width:100%;" id="book_cat" name="book_cat" ></select>
                </div>
              </div>
            </div>

              <div class="row">
                <div class="col-sm-1"> </div>
                <div class="col-sm-5">
              <div class="form-group" >
                <label class="control-label" for="Publication"><strong>Publisher</strong></label>
                <input type="text" class="form-control" id="publication" name="publication" placeholder="Enter Publisher Name " autocomplete="off"  />

              </div>
                </div>
                <div class="col-sm-1"> </div>
                <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label" for="date released"><strong>Date Released</strong></label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" placeholder="Enter Released Date" name="Releasedate" id="Releasedate" autocomplete="off"  />
                  </div>
                  <!-- /.input group -->
                </div>
              </div>

                  </div>

                  <div class="row">
                    <div class="col-sm-1"> </div>
                    <div class="col-sm-5">
                  <div class="form-group" >
                    <label class="control-label" for="Edition"><strong>Edition</strong></label>
                    <input type="text" class="form-control" id="edition" name="edition" placeholder="Enter Edition"  autocomplete="off"  />

                  </div>
                    </div>
                    <div class="col-sm-1"> </div>
                    <div class="col-sm-4">
                      <div class="form-group" >
                        <label class="control-label" for="price"><strong>price</strong><font color="red">*</font>:</label>
                        <font color="red"><span id="error_book_price" style="float:bottom"></span></font>
                      <div class="input-group">
                        <div class="input-group-addon">
                          ₹
                        </div>
                        <input type="text" class="form-control"id="price" name="price" placeholder="Enter Price "  onkeypress="return Amountfloat(this.id,event);" autocomplete="off"  data-mask  />
                        <div class="input-group-addon">
                          .00
                        </div>
                      </div>
                    </div>
                    </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-1"> </div>
                        <div class="col-sm-5">
                          <div class="form-group" >
                            <label for="bookDescription"><strong>Book Description</strong></label>
                            <textarea class="form-control" rows="2" id="book_desc" name="book_desc"></textarea>
                          </div>

                        </div>
                        <div class="col-sm-1"> </div>
                        <div class="col-sm-4">
                        <!-- <div class="form-group">
                          <label for="bookimage"> Book Image</label>
                          <input type="file" id="book_image" name="book_image">

                        </div> -->
                        <div class="form-group" >
                          <label for="quantity"><strong>Book quantity</strong><font color="red">*</font>:</label>
                            <font color="red"><span id="error_book_qty" style="float:bottom"></span></font>
                          <input type="text" class="form-control"  id="book_qty" name="book_qty" onkeypress="return isNumberKey(event);"/>
                        </div>
                          </div>
                          <div class="col-sm-2"> </div>

                        </div>
                        <div class="row">
                          <div class="col-sm-1"></div>
                          <div class="col-sm-5">
                        <div class="form-group" >
                          <label for="book_barcode"><strong>Scan Book Barcode </strong></label>
                          <!-- <textarea class="form-control" rows="2" id="book_desc" name="book_desc"></textarea> -->
                          <input type="text" class="form-control"  id="book_barcode" name="book_barcode" onkeypress="return isNumberKey(event);"/>
                        </div>
                          </div>
                          <div class="col-sm-1"></div>
                          <div class="col-sm-3"></div>
                          <div class="col-sm-2"> </div>
                         </div>
          <!-- <div class="row">
            <div class="col-sm-4">
            </div>
          <div class="col-sm-4" >
            <button type="submit" class="btn btn-primary" >Save</button>
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
            <div class="box box-info" id="UpdateBookForm" style="display:none;">
              <!-- Default box -->
              <div class="box-header with-border">
                <h3 class="box-title">Update Book Information</h3>
              </div>
                  <form id="Update_Book_Info" class="form-horizontal" method="POST">
                    <fieldset>
                      <div class="row">
                      <div class="col-sm-12">
                      </div>
                    </div>
                          <div class="box-body">
                        <div class="row">
                          <div class="col-sm-1"> </div>
                          <div class="col-sm-5">
                        <div class="form-group">
                          <label class="control-label" for="author"> <strong>Book Title</strong><font color="red">*</font>:</label>
                          <font color="red"><span id="error_book_name1" style="float:bottom"></span></font>

                          <input type="text" class="form-control"  id="book_name1" name="book_name1" placeholder="Enter Book Title"  autocomplete="off"  />
                          <input type="hidden" id="booksid" name="booksid" autocomplete="off"/>
                        </div> <!-- /controls -->

                      </div>
                      <div class="col-sm-1"> </div>
                      <div class="col-sm-4">
                    <div class="form-group">
                      <label class="control-label" for="isbn"> <strong>Book ISBN Number</strong>:</label>

                      <input type="text" class="form-control"   id="isbn_number1" name="isbn_number1" placeholder="Enter Book Title"  autocomplete="off"  />
                    </div> <!-- /controls -->

                  </div>
                  <div class="col-sm-1"> </div>
                    </div>
                      <div class="row">
                        <div class="col-sm-1"> </div>
                        <div class="col-sm-5">
                          <div class="form-group">
                            <label class="control-label" for="author name"> <strong>Author Name </strong><font color="red">*</font>:</label>
                            <font color="red"><span id="error_author_name1" style="float:bottom"></span></font>
                          <select class="form-control select2" style="width:100%;"  id="author_name1" name="author_name1" autocomplete="off" >

                          </select>
                        </div>
                      </div>
                        <div class="col-sm-1"> </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                          <label class="control-label" for="Category"> <strong>Category</strong><font color="red">*</font>:</label>
                          <font color="red"><span id="error_category1" style="float:bottom"></span></font>
                        <select class="form-control select2" style="width:100%;"  id="book_cat1" name="book_cat1" autocomplete="off" >
                        </select>
                      </div>
                      </div>
                    </div>

                      <div class="row">
                        <div class="col-sm-1"> </div>
                        <div class="col-sm-5">
                      <div class="form-group" >
                        <label class="control-label" for="Publication"><strong>Publisher</strong></label>
                        <input type="text" class="form-control" id="publication1" name="publication1" placeholder="Enter Publisher Name " autocomplete="off"  />

                      </div>
                        </div>
                        <div class="col-sm-1"> </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                          <label class="control-label" for="date released"><strong>Date Released</strong></label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" placeholder="Enter Released Date" name="Releasedate1" id="Releasedate1" autocomplete="off"  />
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div>

                          </div>

                          <div class="row">
                            <div class="col-sm-1"> </div>
                            <div class="col-sm-5">
                          <div class="form-group" >
                            <label class="control-label" for="Edition"><strong>Edition</strong></label>
                            <input type="text" class="form-control" id="edition1" name="edition1" placeholder="Enter Edition"  autocomplete="off"  />

                          </div>
                            </div>
                            <div class="col-sm-1"> </div>
                            <div class="col-sm-4">
                              <div class="form-group" >
                                <label class="control-label" for="price"><strong>price</strong><font color="red">*</font>:</label>
                                <font color="red"><span id="error_book_price1" style="float:bottom"></span></font>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  ₹
                                </div>
                                <input type="text" class="form-control"id="price1" name="price1" placeholder="Enter Price "  onkeypress="return Amountfloat(this.id,event);" autocomplete="off"  data-mask  />
                                <div class="input-group-addon">
                                  .00
                                </div>
                              </div>
                            </div>
                            </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-5">


                                   <div class="form-group" >
                                     <label for="bookDescription"><strong>Book Description</strong></label>
                                     <textarea class="form-control" rows="2" id="book_desc1" name="book_desc1"></textarea>
                                   </div>
                                </div>
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-4">
                                <!-- <div class="form-group">
                                  <label for="bookimage"> Book Image</label>
                                  <input type="file" id="book_image1" name="book_image1">

                                </div> -->
                                <div class="form-group" >
                                 <label for="quantity"><strong>Book quantity</strong><font color="red">*</font>:</label>
                                   <font color="red"><span id="error_book_qty1" style="float:bottom"></span></font>
                                 <input type="text" class="form-control"  id="book_qty1" name="book_qty1" onkeypress="return isNumberKey(event);"/>
                                </div>
                                  </div>
                                  <div class="col-sm-1"> </div>

                                </div>
                                <!-- <div class="row">
                                  <div class="col-sm-2"> </div>
                                  <div class="col-sm-3">

                                  </div>
                                  <div class="col-sm-1"> </div>
                                  <div class="col-sm-3">

                                    </div>
                                    <div class="col-sm-2"> </div>

                                  </div> -->

                  <!-- <div class="row">
                    <div class="col-sm-4"></div>
                  <div class="col-sm-4" >
                    <button type="submit" class="btn btn-primary" >SAVE</button>
                     <button type="button" class="btn btn-default" onclick="window.location.reload();">Cancel</button>
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
            <section class="content" id="booktable">

              <div class="box">
                <div class="box-header">
                  <h3 class="text-center">All Books List </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="bookinfotable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <!-- <th class="text-center">Sr. No.</th> -->
                      <th class="text-center">Book ID</th>
                      <th class="text-center">Book Name</th>
                      <th class="text-center">ISBN No</th>
                      <th class="text-center">Total Qty</th>
                      <th class="text-center">Available Qty</th>
                      <th class="text-center">Lost Qty</th>
                      <th class="text-center">Category</th>
                      <th class="text-center">Author </th>
                      <th class="text-center">Publication </th>
                      <!-- <th class="text-center">Released Date</th> -->
                      <!-- <th class="text-center">Book Price </th> -->
                      <th class="text-center">ACTION </th>
                    </tr>
                    </thead>
                    <tbody id="booktabledata"></tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </section>
            <div class="modal fade" id="generatebarcode">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Do You Want to Generate Barcode for this Book?</h4>
                  </div>
                  <div class="modal-body">
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#coll_div">Generate Barcode</button>

                    <div id="coll_div" class="collapse">
                      <div class="form-group">
                      <strong  id="num_cnt1" >Number Of Barcode Copies</strong>
                      <input type="text" class="form-control" id="copy_cnt" name="copy_cnt" Placeholder="Enter Required number of copies" onkeypress="return isNumberKey(event);" maxlength="3" required>
                      <!-- <button type="button" class="btn btn-success" onclick="insert_barcode(1);">Ok</button> -->
                    </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="window.location.reload();">NO</button>
                    <input type="hidden" id="bookid"></input>
                    <input type="submit" class="btn btn-primary" value="YES" onclick="insert_barcode();"></input>
                  </div>
                </div>
              </div>
            </div>
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
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
<script>

$("#addbookbutton").click(function() {
$("#booktable").hide();
    $("#addbookbutton").hide();
    $("#BookForm").show();
});

function insert_barcode(){//last inserted book_id

  var books_id = document.getElementById('bookid').value;
  var No_of_copies = $("#copy_cnt").val();
     window.open("barcode_sample.php?coppies="+No_of_copies+"&books_id="+books_id+"","_blank");
     window.location.reload();
    }

    function generate_barcode_btn(books_id){
      var No_of_copies = 1;
         window.open("barcode_sample.php?coppies="+No_of_copies+"&books_id="+books_id+"","_blank");
         window.location.reload();
        }


function updatebookinformation(param)
{
  $("#booktable").hide();
$("#UpdateBookForm").show();
$("#addbookbutton").hide();

  $("#BookForm").hide();

$.ajax({
    url: "fetch_bookinfo.php",
    async: false,
    cache: false,
    method: "POST",
    data: ({
        bookid: param
    }),
    success: function(data) {
      response = JSON.parse(data);

      $("#booksid").val(response['Bookid']);
        $("#book_name1").val(response['BookName']);
        $("#book_qty1").val(response['BookQty']);
        $("#book_cat1").append("<option value=" + response['Categoryid'] + " selected=selected>" + response['Category'] + "</option>");
         $("#author_name1").append("<option value=" + response['Authorid'] + " selected=selected>" + response['Author'] + "</option>");
        $("#isbn_number1").val(response['ISBNNumber']);
        $("#publication1").val(response['publisher']);
        $("#Releasedate1").val(response['ReleasedDate']);
            $("#edition1").val(response['Edition']);
            $("#price1").val(response['BookPrice']);
            $("#book_desc1").val(response['BookDescription']);

    }
});
}
function display_books() {
  var delBtn = '';
  var book_id = '';
  var response = [];

    $.ajax({
        type: "POST",
        url: "displaybooks.php",
    }).done(function(data) {
    // alert(data);
      if(!(data)){
        $("#booktabledata").html('<tr class="text-center"><td></td><td></td><td></td><td></td><td class="text-center" style="color:black;">No data available in table</td></tr>');
      }
        response = JSON.parse(data);
        var count = Object.keys(response).length;
        var qtySum = 0;
        // alert(response['status'])
        for (var i = 0; i < count; i++)
         {
            book_id = parseInt(response[i]['id']);
            qtySum = parseInt(response[i]['qty']) + parseInt(response[i]['lost_qty']);

            if(qtySum != response[i]['total_qty']){
              delBtn ='<button type="button" disabled class="label label-danger" style="display:none"  onClick="removebook(' + book_id + ');" title="Books Issued Cant Delete" name="submit"><i class="fa fa-trash"></i></button>';
                }
              else {
                delBtn ='<button type="button" class="label label-danger"  onClick="removebook(' + book_id + ","+response[i]['Category_id'] +","+response[i]['Author_id']+ ');" title="Delete" name="submit"><i class="fa fa-trash"></i></button>';
              }
            $('#booktabledata').append('<tr><td class="text-center">' + response[i]['id'] + '</td><td class="text-center"><button type="button" class="btn btn-link" data-toggle="collapse" title="Update Book Information" data-target="#demo" onclick="updatebookinformation(' + book_id + ');">' + response[i]['BookName'] + '</button></td><td class="text-center">' + response[i]['ISBNNumber'] +
              '</td><td class="text-center">'+response[i]['total_qty']+'</td><td class="text-center">' + response[i]['qty'] + '</td><td class="text-center">'+response[i]['lost_qty']+'</td><td class="text-center">'
            + response[i]['Category'] + '</td><td class="text-center">' + response[i]['Author'] +
  '</td><td class="text-center">' + response[i]['publisher'] + '</td><td class="text-center"><div class="btn-group"><button type="button" class="label label-warning" data-toggle="collapse" title="Generate Barcode" name="submit" onClick="generate_barcode_btn(' + book_id + ');"><i class="fa fa-barcode"></i></button><button type="button" class="label label-success " data-toggle="collapse" title="Update Book Information" data-target="#hidecustomerfield" name="submit" onClick="updatebookinformation(' + book_id + ');"><i class="fa fa-edit"></i></button>'+delBtn+'</div></td></tr>');
        }
        $('#bookinfotable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

    }).fail(function(jqXHR, textStatus) {
        alert('Request Failed');
    });
  }




    function removebook(bookid,cat_id,aut_id){
      // alert(cat_id)
      var b = confirm("Do You want to delete the book permanantly!");
      if (b == true) {
                $.ajax({
                url:"deletebook.php",
                async: false,
                cache: false,
                method:"POST",
                data:({removebook:bookid,cat_id:cat_id,aut_id:aut_id}),
                success:function(data){
                  $("#"+bookid).closest('tr').remove();
                    window.location.reload();
                }
                });
    } else {
      window.location.reload();
    }

    }


  jQuery(document).ready(function($) {

      display_category();

      display_authors();
    $("#booktable").show();
$("#UpdateBookForm").hide();

    $("#BookForm").hide();


    display_books();

    $('.select2').select2({
             allowClear: true,
             placeholder: "Select Here"
         });


         $('#Book_info_Form').on("submit", function(event){

           var bookname = document.getElementById("book_name").value;
           var bookcategory = document.getElementById("book_cat").value;
           var bookauthor = document.getElementById("author_name").value;
           var bookprice = document.getElementById("price").value;
           var bookquantity = document.getElementById("book_qty").value;


            event.preventDefault();
            if (bookname === "") {
                $("#error_book_name").html("<font color='red'>Book Name Required</font>");
            } else {
                $("#error_book_name").html("");

                    if (bookcategory === "") {
                        $("#error_category").html("<font color='red'>Required to Select Book Category</font>");
                    } else {
                        $("#error_category").html("");

                          if (bookauthor === "") {
                              $("#error_author_name").html("<font color='red'>Required to Select Book Author</font>");
                          } else {
                              $("#error_author_name").html("");
                              if (bookprice === "") {
                                  $("#error_book_price").html("<font color='red'>Required to select Book Price</font>");
                              } else {
                                  $("#error_book_price").html("");
                                  if (bookquantity === "") {
                                      $("#error_book_qty").html("<font color='red'>Required Book Quantity</font>");
                                  } else {
                                      $("#error_book_qty").html("");

                              $.ajax({
                                  url: "insertbooks.php",
                                  method: "POST",
                                 data : $("#Book_info_Form").serialize() +"&bookimage1=bookimage",
                                  success: function(data) {
                                    var response = JSON.parse(data);
                                    if(response['success'] === 'true'){
                                    $("#bookid").val(response['bookid']);
                                    $('#generatebarcode').modal('show');
                                  }
                                  else if(response['errors'] === 'false') {
                                    alert("Book is Not Inserted..Try Again ");
                                  }
                                  }
                              });
                            }
                          }
                }
              }
            }
                    });




                    $('#Update_Book_Info').on("submit", function(event)
                    {
                      var bookname1 = document.getElementById("book_name1").value;
                      var bookcategory1 = document.getElementById("book_cat1").value;
                      var bookauthor1 = document.getElementById("author_name1").value;
                      var bookprice1 = document.getElementById("price1").value;
                      var bookqty1 = document.getElementById("book_qty1").value;

                      // var bookimage11 = document.getElementById("book_image1").value;

                       event.preventDefault();
                       if (bookname1 === "") {
                           $("#error_book_name1").html("<font color='red'>Book Name Required</font>");
                       } else {
                           $("#error_book_name1").html("");

                               $("#error_isbn_input1").html("");
                               if (bookcategory1 === "") {
                                   $("#error_category1").html("<font color='red'>Required to Select Book Category</font>");
                               } else {
                                   $("#error_category1").html("");

                                     if (bookauthor1 === "") {
                                         $("#error_author_name1").html("<font color='red'>Required to Select Book Author</font>");
                                     } else {
                                         $("#error_author_name1").html("");
                                         if (bookprice1 === "") {
                                             $("#error_book_price1").html("<font color='red'>Required to select Book Price</font>");
                                         } else {
                                             $("#error_book_price1").html("");
                                             if (bookqty1 === "") {
                                                 $("#error_book_qty1").html("<font color='red'>Required Book Quantity</font>");
                                             } else {
                                                 $("#error_book_qty1").html("");

                                         $.ajax({
                                             url: "updatebooks.php",
                                             method: "POST",
                                            data : $("#Update_Book_Info").serialize() +"&bookimage1=bookimage11",
                                             success: function(data) {
                                               var response = JSON.parse(data);
                                               if(response['success'] === 'true')
                                               {
                                               window.location.reload();
                                               }

                                              else if(response['errors'] === 'false')
                                              {
                                                alert('Book Quantity Must be Greater Than ISSUED '+response['count']+',Try Again');

                                              }

                                             }
                                         });
                                       }
                                     }
                           }
                         }
                       }
                               });
                    //Date picker
                    $('#Releasedate').datepicker({
                      autoclose: true
                    });
                    $('#Releasedate1').datepicker({
                      autoclose: true
                    });


  });
</script>
</body>
</html>
<?php }
else {
  header("Location:index.php");
} ?>
