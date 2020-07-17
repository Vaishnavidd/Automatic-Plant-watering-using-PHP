<meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo "index.php?page_owner=".base64_encode($_SESSION["VALID_USER"]); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MCGP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MCGP</b> </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle fa fa-gears" data-toggle="dropdown">
            <img src="../../dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs "><?php echo $_SESSION["User_FULLNAME"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                 <?php echo $_SESSION["User_FULLNAME"];  ?>
                  <small>MCGP</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    
                  </div>
                  
                 
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo "profile.php?page_owner=".base64_encode($_SESSION["VALID_USER"]); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
        <div class="pull-left">
                  <a href="<?php echo "changepassword.php?page_owner=".base64_encode($_SESSION["VALID_USER"]); ?>" class="btn btn-default btn-flat">Password</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
        
        
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["User_FULLNAME"]; ?></p>
          </div>
      </div>
      <!-- search form -->
      <br />
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        
        <li>
          <a href="<?php echo "index.php?page_owner=".base64_encode($_SESSION["VALID_USER"]); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
          </a>
          
        </li>
    
    <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Update Password</span> <i class="fa fa-hand-o-down pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo "changepassword.php?page_owner=".base64_encode($_SESSION["VALID_USER"]); ?>"><i class="fa fa-expeditedssl"></i> Update Password </a></li>
                  
          </ul>
        </li>
    
    <li class="treeview">
          <a href="#">
            <i class="fa fa-list-ol"></i> <span>Crop Information </span> <i class="fa fa-hand-o-down pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo "rptmy.php?page_owner=".base64_encode($_SESSION["VALID_USER"]); ?>"><i class="fa  fa-calendar-plus-o"></i> My Crop Information  </a></li>
      
                  
          </ul>
        </li>
          
        
       
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

