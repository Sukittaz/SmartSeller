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
          <input type="text" name="PurchaseData" class="form-control" value="<?php echo date('Y/m/d H:i'); ?>">
        </div>  
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Referência</label>
          <input type="text" name="PurchaseRef" class="form-control">
        </div>       
      </div> 
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="searchProductPurchase" data-type="searchProduct" placeholder="Pesquisa do produto por código ou nome" autocomplete="off">
    </div>
    <div class="row">
      <div class="col-md-12">
          <div class="table-responsive">
              <table id="poTable" class="table table-striped">
                  <thead>
                      <tr class="active">
                        <th class="col-xs-2 thCashier" style="width: 10px">Produto</th>
                        <th class="col-xs-2 thCashier">Qtd</th>
                        <th class="col-xs-2 thCashier">Custo Unitário</th>
                        <th class="col-xs-2 thCashier">Subtotal</th>
                        <th class="col-xs-2 thCashier"></i></th>     
                      </tr>
                  </thead>
                  <tbody class="productContainer">
                      <tr>
                          <td colspan="5" class="trDefault">Adicionar o produto através de pesquisa no campo acima</td>
                      </tr>
                  </tbody>
                  <tfoot>
                      <tr class="active">
                        <th class="thCashier">Total </th>
                        <th class="col-xs-2 thCashier"></th>
                        <th class="col-xs-2 thCashier"></th>
                        <th class="col-xs-2 thCashier"><span class="thTotalValue"></span></th>   
                        <th class="col-xs-2 thCashier"></th>   
                      </tr>
                  </tfoot>
              </table>             
          </div>
      </div>
    </div> 
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Fornecedor</label>
          <select class="form-control" name="SupplierID">
            <option>Selecione</option>
            <?php foreach($supplier as $supplierItem): ?>
            <option value="<?php echo $supplierItem->SupplierID; ?>"><?php echo $supplierItem->SupplierName; ?></option>
            <?php endforeach; ?>
          </select>
        </div>  
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Recebido</label>
          <select name="PurchaseStatus" class="form-control select2 tip select2-hidden-accessible" required="required" style="width:100%;" tabindex="-1" aria-hidden="true">
            <option value="1">Recebido</option>
            <option value="0">Não recebido ainda</option>
          </select>
        </div>       
      </div> 
    </div> 
    <div class="form-group">
        <label for="attachment">Anexo</label>                            
        <input type="file" name="PurchaseAttach" class="form-control tip" id="attachment">
    </div>
    <div class="form-group">
      <label>Detalhes</label>
      <textarea class="textarea" name="PurchaseDetail" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
    </div>     
  </div>
  <div class="box-footer">
    <button type="submit" name="submit" class="btn btn-primary">Adicionar Produto</button>
  </div>
</form>
</div>