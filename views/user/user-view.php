<?php foreach($user as $userItem): ?>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Por favor, atualize as informações abaixo</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="POST">
  <div class="box-body">
    <div class="form-group">
      <label>Nome</label>
      <input type="text" name="UserName" value="<?php echo $userItem->UserName; ?>" class="form-control" readonly>
    </div>  
    <div class="form-group">
      <label>Login</label>
      <input type="text" name="UserLogin" value="<?php echo $userItem->UserLogin; ?>" class="form-control" readonly>
    </div> 
    <div class="form-group">
      <label>E-mail</label>
      <input type="email" name="UserEmail" value="<?php echo $userItem->UserEmail; ?>" class="form-control" readonly>
    </div> 
    <div class="form-group">
      <label>Fornecedor</label>
        <input type="text" class="form-control" value="<?php echo $userItem->BunchName; ?>" readonly>
    </div>                        
  </div>
  <!-- /.box-body -->
</form>
</div>
<?php endforeach; ?>