<?php foreach($purchase as $purchaseItem): ?>
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
          <input type="text" name="PurchaseData" class="form-control" value="<?php echo $purchaseItem['PurchaseData']; ?>" readonly>
        </div>  
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Referência</label>
          <input type="text" name="PurchaseRef" class="form-control" value="<?php echo $purchaseItem['PurchaseRef']; ?>" readonly>
        </div>       
      </div> 
    </div>
    <div class="row">
      <div class="col-md-12">
          <div class="table-responsive">
              <table id="poTable" class="table table-striped table-bordered">
                  <thead>
                      <tr class="active">
                          <th>Produto</th>
                          <th class="col-xs-2">Qtd</th>
                          <th class="col-xs-2">Custo Unitário</th>
                      </tr>
                  </thead>
                  <tbody class="productContainer">
                        <?php foreach($purchaseItem['Products'] as $productItem): ?>
                        <tr>
                              <td style="min-width:100px;"><?php echo $productItem['ProductName']; ?></td>
                              <td style="padding:2px;"><input class="form-control input-sm kb-pad text-center rquantity" value="<?php echo $productItem['PurchaseProductQtd']; ?>" readonly></td>
                              <td style="padding:2px;"><input class="form-control input-sm kb-pad text-center rquantity" value="<?php echo $productItem['PurchaseProductCost']; ?>" readonly></td>
                        </tr>
                        <?php endforeach; ?>
                  </tbody>
              </table>             
          </div>
      </div>
    </div> 
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Fornecedor</label>
            <input type="text" class="form-control" name="" value="<?php echo $purchaseItem['SupplierName']; ?>" readonly>
        </div>  
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Recebido</label>
            <input type="text" class="form-control" name="" value="<?php echo ($purchaseItem['PurchaseStatus'] == 1) ? 'Recebido' : 'Não Recebido'; ?>" readonly>
        </div>       
      </div> 
    </div> 
    <div style="margin: 0;">                      
        <a href="<?php echo $purchaseItem['PurchaseAttach']; ?>" download class="btn btn-app">
          <i class="fa fa-cloud-download"></i> Baixar Anexo
        </a>
    </div>
    <div class="form-group">
      <label>Detalhes</label>
      <textarea class="textarea" name="PurchaseDetail" disabled="disabled" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $purchaseItem['PurchaseDetail']; ?></textarea>
    </div>     
  </div>
  <div class="box-footer">
    <button type="submit" name="submit" class="btn btn-primary">Adicionar Produto</button>
  </div>
</form>
</div>
<?php endforeach; ?>