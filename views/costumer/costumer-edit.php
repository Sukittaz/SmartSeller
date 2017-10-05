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
      <input type="text" name="CostumerName" value="<?php echo $costumer->CostumerName; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>CPF</label>
      <input type="text" name="CostumerCPF" value="<?php echo $costumer->CostumerCPF; ?>" class="form-control">
    </div>       
    <div class="form-group">
      <label>E-mail</label>
      <input type="email" name="CostumerEmail" value="<?php echo $costumer->CostumerEmail; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Telefone</label>
      <input type="text" name="CostumerPhone" value="<?php echo $costumer->CostumerPhone; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>CEP</label>
      <input type="text" name="CostumerCEP" value="<?php echo $costumer->CostumerCEP; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Endereço</label>
      <input type="text" name="CostumerAddres" value="<?php echo $costumer->CostumerAddres; ?>" class="form-control">
    </div>  
    <div class="form-group">
      <label>Nº</label>
      <input type="text" name="CostumerAddresNumber" value="<?php echo $costumer->CostumerAddresNumber; ?>" class="form-control" >
    </div>  
    <div class="form-group">
      <label>Bairro</label>
      <input type="text" name="CostumerNeigh" value="<?php echo $costumer->CostumerNeigh; ?>" class="form-control">
    </div>      
    <div class="form-group">
      <label>Cidade</label>
      <input type="text" name="CostumerCity" value="<?php echo $costumer->CostumerCity; ?>" class="form-control">
    </div>           
    <div class="form-group">
      <label>Detalhes</label>
      <textarea class="textarea" name="CostumerDetail" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $costumer->CostumerDetail; ?></textarea>
    </div>     
  </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" name="submit" class="btn btn-primary">Editar Cliente</button>
  </div>
</form>
</div>