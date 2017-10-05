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
      <input type="text" name="UserName" class="form-control">
    </div>  
    <div class="form-group">
      <label>Login</label>
      <input type="text" name="UserLogin" class="form-control">
    </div> 
    <div class="form-group">
      <label>E-mail</label>
      <input type="email" name="UserEmail" class="form-control">
    </div> 
    <div class="form-group">
      <label>Senha</label>
      <input type="password" name="UserPass" class="form-control">
    </div> 
    <div class="form-group">
      <label>Grupo</label>
      <select class="form-control" name="BunchID">
        <option>Selecione</option>
        <?php foreach($bunch as $bunchItem): ?>
        <option value="<?php echo $bunchItem->BunchID; ?>"><?php echo $bunchItem->BunchName; ?></option>
        <?php endforeach; ?>
      </select>
    </div>                               
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" name="submit" class="btn btn-primary">Adicionar Usuário</button>
  </div>
</form>
</div>