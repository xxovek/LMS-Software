
<a href="index.php" class="logo">
  <span class="logo-mini"><b>L</b>MS</span>
  <span class="logo-lg"><b>Library</b>MS</span>
</a>

<nav class="navbar navbar-static-top">
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

      <li class="dropdown user user-menu">
        <a href="#">
          <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
          <span class="hidden-xs"><?php echo $fullname;?></span>

        </a>
        <ul class="dropdown-menu">
          <li class="user-footer"></li>
        </ul>

      </li>

      <li>
        <!-- <div > -->
          <a href="logout.php" class="btn btn-warning">Sign Out</a>
        <!-- </div> -->
      </li>
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    </ul>
  </div>
</nav>
