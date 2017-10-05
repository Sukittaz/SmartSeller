<?php 
  $product     = new Product();
  $company     = new Company();
  $message     = $product->messageAlert();
  $numMessages = count($message);
  $img         = $company->selectById($_SESSION['User']['CompanyID']);
?>

<header class="main-header">
<!-- Logo -->
<a href="../../index2.html" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>S</b>MS</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Smart</b>Seller</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown messages-menu">
        <a href="<?php echo BASE; ?>product/message">
          <i class="fa fa-envelope-o"></i>
          <span class="label label-success"><?php echo $numMessages; ?></span>
        </a>
      </li>      
      <li class="dropdown tasks-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-flag-o"></i>
          <span class="label label-danger"></span>
        </a>
        <ul class="dropdown-menu">          
          <li class="header">
            <a href="<?php echo BASE; ?>lang/set/pt-br">
              Português
            </a>
          </li>
          <li class="header">
            <a href="<?php echo BASE; ?>lang/set/en">
              Inglês
            </a>
          </li>
        </ul>
      </li>
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo BASE.$img->CompanyImage; ?>" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $_SESSION['User']['UserName']; ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="<?php echo BASE.$img->CompanyImage; ?>" class="img-circle" alt="User Image">

            <p>
              <?php echo $_SESSION['User']['UserName']; ?>
              <small>Member since Nov. 2012</small>
            </p>
          </li>
          <li class="user-footer">
            <div class="pull-left">
              <a href="<?php echo BASE; ?>user/edit/<?php echo $_SESSION['User']['UserID']; ?>" class="btn btn-default btn-flat">Perfil</a>
            </div>
            <div class="pull-right">
              <a href="<?php echo BASE.'login/logout'; ?>" class="btn btn-default btn-flat">Sair</a>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
    </ul>
  </div>
</nav>
</header>