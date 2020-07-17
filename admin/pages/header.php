<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo "index.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>mcgp</b></span>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['Admin_FULLNAME']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['Admin_FULLNAME']; ?>
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  
                  <div class="col-xs-4 text-center">
                    <a href="<?php echo "updateprofile.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]); ?>">Update Profile</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="<?php echo "changepassword.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]); ?>">Change Password</a>
                  </div>
          <div class="col-xs-4 text-center">
                    <a href="logout.php">Logout</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <small>MCGP</small>
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
          <p><?php echo $_SESSION['Admin_FULLNAME']; ?></p>
      
        </div>
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo "index.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
          </a>
          
        </li>
    
    <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Add Admin</span> <i class="fa fa-hand-o-down pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo "addadmin.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]); ?>"><i class="fa fa-user-plus"></i> Add Admin </a></li>
                  
          </ul>
        </li>
    
    <li class="treeview">
          <a href="#">
            <i class="fa fa-tree"></i> <span>Device Details</span> <i class="fa fa-hand-o-down pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo "adddevice.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]); ?>"><i class="fa fa-tree"></i> Add Device </a></li>
            <li><a href="<?php echo "rptdevice.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]); ?>"><i class="fa fa-times"></i> Display Device Details </a></li>
                  
          </ul>
        </li>
    
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Add User</span> <i class="fa fa-hand-o-down pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo "adduser.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]); ?>"><i class="fa fa-user-plus"></i> Add User </a></li>
      <li><a href="<?php echo "rptuser.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]); ?>"><i class="fa fa-user-times"></i> Update User </a></li>
                  
          </ul>
        </li>
    
     <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Crop Details</span> <i class="fa fa-hand-o-down pull-right"></i>
          </a>
          <ul class="treeview-menu">
      <li><a href="<?php echo "addcropinfo.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]); ?>"><i class="fa fa-user-times"></i> Add Crop Information</a></li>
                  
          </ul>
        </li>
       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
