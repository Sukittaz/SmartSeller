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
          <input type="text" name="ExpenseDate" class="form-control" value="<?php echo $expense->ExpenseDate; ?>" readonly>
        </div>  
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Referência</label>
          <input type="text" name="ExpenseRef" class="form-control" value="<?php echo $expense->ExpenseRef; ?>" readonly>
        </div>       
      </div> 
    </div>
    <div class="form-group">
      <label>Valor Pago</label>
      <input type="text" name="ExpenseValue" class="form-control" id="money" value="<?php echo $expense->ExpenseValue; ?>" readonly data-thousands="." data-decimal="," data-prefix="R$ ">
    </div>      
    <div style="margin: 0;">                      
        <a href="<?php echo $expense->ExpenseAttach; ?>" download class="btn btn-app">
          <i class="fa fa-cloud-download"></i> Baixar Anexo
        </a>
    </div>
    <div class="form-group">
      <label>Detalhes</label>
      <textarea class="textarea" disabled="disabled" name="ExpenseDetail" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $expense->ExpenseDetail; ?></textarea>
    </div>     
  </div>
</form>
</div>