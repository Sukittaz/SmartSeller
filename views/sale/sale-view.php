<?php foreach($sale as $saleItem): ?>
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Por favor, atualize as informações abaixo</h3>
</div>
  <div class="box-body">
    <div class="form-group">
      <label>Data</label>
      <input type="text" name="PurchaseData" class="form-control" value="<?php echo $saleItem['SaleDate']; ?>" readonly>
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
                        <?php foreach($saleItem['Products'] as $productItem): ?>
                        <tr>
                              <td style="min-width:100px;"><?php echo $productItem['ProductName']; ?></td>
                              <td style="padding:2px;"><input class="form-control input-sm kb-pad text-center rquantity" value="<?php echo $productItem['SaleProductQtd']; ?>" readonly></td>
                              <td style="padding:2px;"><input class="form-control input-sm kb-pad text-center rquantity" value="<?php echo $productItem['SaleProductPrice']; ?>" readonly></td>
                        </tr>
                        <?php endforeach; ?>
                  </tbody>
              </table>             
          </div>
      </div>
    </div> 
    <div class="form-group">
      <label>Total Compra</label>
      <input type="text" name="PurchaseData" class="form-control" value="<?php echo $saleItem['SaleTotal']; ?>" readonly>
    </div>
    <div class="form-group">
      <label>Total Pago</label>
      <input type="text" name="PurchaseData" class="form-control" value="<?php echo $saleItem['SaleTotalPaid']; ?>" readonly>
    </div>
    <div class="form-group">
      <label>Troco</label>
      <input type="text" name="PurchaseData" class="form-control" value="<?php echo $saleItem['SaleRest']; ?>" readonly>
    </div>     
    <div class="form-group">
      <label>Detalhes</label>
      <textarea class="textarea" name="PurchaseDetail" disabled="disabled" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $saleItem['SaleDetail']; ?></textarea>
    </div>     
  </div>
</div>
<?php endforeach; ?>