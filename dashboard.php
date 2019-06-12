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
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
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
      <h1>
        DASHBOARD
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 id="bcnt"></h3>

              <p>Total Books</p>
            </div>

            <a href="books.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3 id="issuBookcnt"></h3>

              <p>Issue Books</p>
            </div>

            <a href="issuebooks.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 id="studCnt" ></h3>

              <p>Registered Students</p>
            </div>

            <a href="studtechreg.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3 id="techCnt"></h3>

              <p>Registered Teachers</p>
            </div>

            <a href="teacherregi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3 id="Catcnt"></h3>

              <p>Total Category</p>
            </div>

            <a href="category.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3 id="AutCnt"></h3>

              <p>Total Authors</p>
            </div>

            <a href="authors.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <section class="col-lg-2  connectedSortable"></section>
        <section class="col-lg-8 connectedSortable">

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Books Images</h3>
            </div>
            <div class="box-body">

              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <!-- <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li> -->
                  <!-- <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li> -->
                  <!-- <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li> -->
                  <!-- <li data-target="#carousel-example-generic" data-slide-to="5" class=""></li> -->
                  <!-- <li data-target="#carousel-example-generic" data-slide-to="6" class=""></li> -->
                </ol>

                <div class="carousel-inner">
                  <div class="item active">
                    <img src="images/l1.jpg" alt="First slide">

                    <div class="carousel-caption">
                      First Slide
                    </div>
                  </div>
                  <!-- <div class="item">
                    <img src="images/l3.jpeg" style="width:100%" alt="Second slide">

                    <div class="carousel-caption">
                      Second Slide
                    </div>
                  </div> -->
                  <!-- <div class="item">
                    <img src="images/l4.jpeg"style="width:100%"  alt="Third slide">

                    <div class="carousel-caption">
                      Third Slide
                    </div>
                  </div> -->
                  <!-- <div class="item">
                    <img src="images/l5.jpeg" style="width:100%" alt="Fourth slide">

                    <div class="carousel-caption">
                      Fourth Slide
                    </div>
                  </div> -->
                  <div class="item">
                    <img src="images/l6.jpg"  alt="fifth slide">

                    <div class="carousel-caption">
                      Second Slide
                    </div>
                  </div>
                  <!-- <div class="item">
                    <img src="images/l7.jpeg" style="width:100%" alt="sixth slide">

                    <div class="carousel-caption">
                      sixth Slide
                    </div>
                  </div> -->
                  <!-- <div class="item">
                    <img src="images/l9.jpeg" style="width:100%" alt="seventh slide">

                    <div class="carousel-caption">
                      seventh Slide
                    </div>
                  </div> -->
                </div>

                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>




            </div>
          </div>

        </section>

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

<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>

<script type="text/javascript">

function countAll(){
var response = [];
$.ajax({
  url:"dashboardAllCount.php",
  type:"POST",
  data:"",
  success:function (data){
  //  alert(data);
    response = JSON.parse(data);
// alert(response[0]['bcnt']);
if( response[0]['bcnt'] == null)
{
    response[0]['bcnt'] = 0;
    $("#bcnt").html(response[0]['bcnt']);
}
else {
  $("#bcnt").html(response[0]['bcnt']);
}

  $("#AutCnt").html(response[1]['bcnt']);
  $("#Catcnt").html(response[2]['bcnt']);
  $("#techCnt").html(response[3]['bcnt']);
  $("#issuBookcnt").html(response[4]['bcnt']);
  $("#studCnt").html(response[5]['bcnt']);

  }
});

}

$(document).ready(function(){
  countAll();
});

</script>

</body>
</html>
<?php }
else {
  header("Location:index.php");
} ?>
