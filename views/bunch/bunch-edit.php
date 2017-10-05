<?php foreach($bunch as $bunchItems): ?>
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
      <input type="text" name="BunchName" value="<?php echo $bunchItems['BunchName']; ?>" class="form-control">
    </div>       
    <div class="form-group">
      <label>Permissões</label>
      <select class="form-control select2" name="PermissionID[]" multiple="multiple" data-placeholder="Selecione as permissões" style="width: 100%;">
        <?php foreach($bunchItems['Permissions'] as $key => $permissionUser): ?>      
            <option value="<?php echo $permissionUser['PermissionID']; ?>" <?php echo (isset($permissionUser['Selected']) AND $permissionUser['PermissionName'] != '')?'selected="selected"':''; ?>><?php echo $permissionUser['PermissionName']; ?></option>
        <?php endforeach; ?>             
      </select>
    </div>              
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" name="submit" class="btn btn-primary">Editar Grupo</button>
  </div>
</form>
</div>
<?php endforeach; ?>