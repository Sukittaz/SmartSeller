<?php 
$permission = new Permission();
$company    = new Company();
$img        = $company->selectById($_SESSION['User']['CompanyID']);
?>

<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel (optional) -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="<?php echo BASE.$img->CompanyImage; ?>") }}" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
        <p><?php echo $_SESSION['User']['UserName']; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>

  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
  <?php if($permission->hasPermission(1) != false): ?>
    <li>
      <a href="">
        <i class="fa fa-dashboard"></i> <span><?php $this->lang->get('DASHBOARD') ?></span>
      </a>
    </li> 
  <?php endif; ?>  
  <?php if($permission->hasPermission(2) != false): ?>
    <li>
      <a href="<?php echo BASE; ?>sale/cashier">
        <i class="fa fa-money"></i> <span><?php $this->lang->get('CASHIER') ?></span>
      </a>
    </li> 
  <?php endif; ?>  
  <?php if($permission->hasPermission(3) != false): ?>
    <li>
      <a href="<?php echo BASE; ?>product">
        <i class="fa fa-barcode"></i> <span><?php $this->lang->get('PRODUCTS') ?></span>
      </a>
    </li>  
  <?php endif; ?>   
  <?php if($permission->hasPermission(4) != false): ?>         
    <li>
      <a href="<?php echo BASE; ?>category">
        <i class="fa fa-folder"></i> <span><?php $this->lang->get('CATEGORIES') ?></span>
      </a>
    </li>  
  <?php endif; ?> 
  <?php if($permission->hasPermission(5) != false): ?>                         
    <li>
      <a href="<?php echo BASE; ?>sale">
        <i class="fa fa-shopping-cart"></i> <span><?php $this->lang->get('SALES') ?></span>
      </a>
    </li> 
  <?php endif; ?>  
  <?php if($permission->hasPermission(6) != false): ?>                         
    <li>
      <a href="<?php echo BASE; ?>purchase">
        <i class="fa fa-plus"></i> <span><?php $this->lang->get('SHOPPING') ?></span>
      </a>
    </li> 
  <?php endif; ?> 
  <?php if($permission->hasPermission(7) != false): ?>                                
    <li>
      <a href="<?php echo BASE; ?>expense">
        <i class="fa fa-window-minimize"></i> <span><?php $this->lang->get('EXPENSES') ?></span>
      </a>
    </li> 
  <?php endif; ?>     
  <?php if($permission->hasPermission(8) != false): ?>                                
    <li class="treeview">
      <a href="#">
        <i class="fa fa-users"></i>
        <span><?php $this->lang->get('PEOPLE') ?></span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo BASE; ?>bunch"><i class="fa fa-circle-o"></i> <?php $this->lang->get('GROUPS') ?></a></li>
        <li><a href="<?php echo BASE; ?>user"><i class="fa fa-circle-o"></i> <?php $this->lang->get('USERS') ?></a></li>
        <li><a href="<?php echo BASE; ?>costumer"> <i class="fa fa-circle-o"></i> <?php $this->lang->get('CUSTOMERS') ?></a></li>
        <li><a href="<?php echo BASE; ?>supplier"><i class="fa fa-circle-o"></i> <?php $this->lang->get('PROVIDERS') ?></a></li>
      </ul>
    </li>   
  <?php endif; ?>   
  <?php if($permission->hasPermission(9) != false): ?>                                          
    <li class="treeview">
      <a href="#">
        <i class="fa fa-bar-chart-o"></i>
        <span><?php $this->lang->get('REPORTS') ?></span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo BASE; ?>report/dailyReport"><i class="fa fa-circle-o"></i> <?php $this->lang->get('REPORTDAY') ?></a></li>
        <li><a href="<?php echo BASE; ?>report/monthlyReport"><i class="fa fa-circle-o"></i> <?php $this->lang->get('REPORTMON') ?></a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> <?php $this->lang->get('REPORTPROD') ?></a></li>
      </ul>
    </li> 
  <?php endif; ?> 
    <?php if($permission->hasPermission(10) != false): ?>                                          
    <li class="treeview">
      <a href="#">
        <i class="fa fa-cogs"></i>
        <span><?php $this->lang->get('CONFIGURATION') ?></span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo BASE.'company/edit/'.$_SESSION['User']['CompanyID']; ?>"><i class="fa fa-circle-o"></i> <?php $this->lang->get('COMPANY') ?></a></li>
      </ul>
    </li> 
    <?php endif; ?> 
  </ul>
</section>
<!-- /.sidebar -->
</aside>

