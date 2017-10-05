<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SmartSeller</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Global CSS -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/global.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo BASE; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo BASE; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo BASE; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo BASE; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo BASE; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo BASE; ?>bower_components/select2/dist/css/select2.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Header -->
    <?php include 'header.php' ?>
    <!-- SideBar -->
    <?php include 'sidebar.php' ?>
    <div class="content-wrapper">
        <section class="content">
            <?php $this->loadViewInTemplate($viewName, $viewData, $viewFolder); ?>
        </section>
    </div>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- Control Sidebar -->
</div>
<script type="text/javascript">var BASE = '<?php echo BASE; ?>'</script>
<!-- jQuery 3 -->
<script src="<?php echo BASE; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BASE; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo BASE; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo BASE; ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE; ?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo BASE; ?>assets/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo BASE; ?>bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="<?php echo BASE; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo BASE; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Global JS -->
<script src="<?php echo BASE; ?>assets/js/global.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo BASE; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="<?php echo BASE; ?>bower_components/select2/dist/js/select2.full.min.js"></script>



<script src="<?php echo BASE; ?>/plugins/input-mask/jquery.maskMoney"></script>

</body>
</html>
