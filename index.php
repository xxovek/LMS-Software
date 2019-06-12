<?php
session_start();
include 'config.php';

// if(!empty($_POST["login"])) {
// 	$sql = "Select * from users where uname = '" . $_POST["username1"] . "' and password = '" . md5($_POST["password1"]) . "'";
// 	$result = mysqli_query($con,$sql);
// 	$user = mysqli_fetch_array($result);
// 	if($user) {
// 			$_SESSION["id"]		   = $user["id"];
//
// 			if(!empty($_POST["remember"])) {
// 				setcookie ("username1",$_POST["username1"],time()+ (365 * 24 * 60 * 60));
// 				setcookie ("password1",$_POST["password1"],time()+ (365 * 24 * 60 * 60));
// 			} else {
// 				if(isset($_COOKIE["username1"])) {
// 					setcookie ("username1","");
// 				}
// 				if(isset($_COOKIE["password"])) {
// 					setcookie ("password1","");
// 				}
// 			}
// 	} else {
// 		$message = "Invalid Login";
// 	}
// }

if(!isset($_SESSION['id']))
{
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="js/allfonts.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./index2.html"><b>LMS</b>Admin</a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your Work</p>

    <form action="./index2.html" id="loginForm" method="post">
        <span id="msg"></span>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" >Sign In</button>
        </div>

      </div>
    </form>

  </div>
</div>

<!-- jQuery 3 -->
<script src="./bower_components/jquery/dist/jquery.min.js"></script>
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  $("#loginForm").on("submit" , function(event){
    event.preventDefault();
    var response = [];
    $.ajax({
      url:"loginSuccess.php",
      method:"POST",
      data:$(this).serialize(),
      success:function(data){
        // alert(data);
          response = JSON.parse(data);

      if(response['success'] === 'true'){
          //alert("login Suceesfully");
          window.location = 'dashboard.php';
        }
        else {
          var msg="<div class='form-group has-feedback' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='red'> Please Enter Correct Username or password!</font></strong></div>";
            $('#msg').html(msg);
        }
      }
    });
  });
</script>
</body>
</html>

<?php }else{
  header("Location:dashboard.php");
}
?>
