<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Por favor, atualize as informações abaixo</h3>
</div>
<form role="form" method="POST" enctype="multipart/form-data">
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Data</label>
          <input type="text" name="ExpenseDate" class="form-control" value="<?php echo date('Y/m/d H:i'); ?>">
        </div>  
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Referência</label>
          <input type="text" name="ExpenseRef" class="form-control">
        </div>       
      </div> 
    </div>
    <div class="form-group">
      <label>Valor Pago</label>
      <input type="text" name="ExpenseValue" class="form-control">
    </div>      
    <div class="form-group">
        <label for="attachment">Anexo</label>                            
        <input type="file" name="ExpenseAttach" class="form-control tip" id="attachment">
    </div>
    <div class="form-group">
      <label>Detalhes</label>
      <textarea class="textarea" name="ExpenseDetail" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
    </div>     
  </div>
  <div class="box-footer">
    <button type="submit" name="submit" class="btn btn-primary">Adicionar Despesa</button>
  </div>
</form>
</div>