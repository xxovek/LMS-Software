


<section class="sidebar">

  <ul class="sidebar-menu" data-widget="tree">
    <li class="header" id="Navigation">MAIN NAVIGATION</li>

    <li class="active" id="dashboard">
      <a href="dashboard.php">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
      </a>
      </li>

    <!-- <li id="Registration1" >
      <a href="studtechreg.php">
        <i class="fa fa-users"></i>
        <span>Registration</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-green">new</small>
        </span>
      </a>
    </li> -->


    <li class="treeview" id="Registration1">
      <a href="#">
        <i class="fa fa-users"></i> <span>Registration</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="studtechreg.php"><i class="fa fa-user"></i>Student</a></li>
        <li><a href="teacherregi.php"><i class="fa fa-user"></i>Teacher</a></li>
      </ul>
    </li>

    <li id="Categories">
      <a href="category.php">
        <i class="fa fa-clone"></i> <span>Categories</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-red">new</small>
        </span>
      </a>
    </li>

    <li id="Authors">
      <a href="authors.php">
        <i class="fa fa-user"></i> <span>Authors</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-yellow">new</small>
        </span>
      </a>
    </li>

    <li id="Books">
      <a href="books.php">
        <i class="fa fa-book"></i> <span>Books</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-light-blue">new</small>
        </span>
      </a>
    </li>

    <li id="Transactions">
      <a href="issuebooks.php">
        <i class="fa fa-exchange"></i> <span>Transactions</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-aqua">new</small>
        </span>
      </a>
    </li>

    <li id="Guest">
      <a href="guestissuebooks.php">
        <i class="fa fa-exchange"></i> <span>Guest</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-aqua">new</small>
        </span>
      </a>
    </li>

  </ul>
</section>


<script type="text/javascript">
$('li').removeClass('active');
    var regex = /[a-z]+.php/g;
    var input = location.pathname;
       if(regex.test(input)) {
          var matches = input.match(regex);
          $('a[href="'+matches[0]+'"]').closest('li').addClass('active');
       }
</script>
