<form role="form" method="POST">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-body ">
      	<div class="form-group">
  	      <select class="form-control" name="CostumerID">
            <option value="0">Selecione um cliente</option>
  	        <?php foreach($costumer as $costumerItem): ?>
  	        <option value="<?php echo $costumerItem->CostumerID; ?>"><?php echo $costumerItem->CostumerName; ?></option>
  	        <?php endforeach; ?>
  	      </select>
      	</div>
        <div class="form-group">
          <input type="text" class="form-control" id="searchSaleWait" data-type="searchSaleWait" placeholder="Pesquisa vendas em espera pela referência" autocomplete="off">
        </div>        
  	    <div class="form-group">
  	      <input type="text" class="form-control" id="searchProductCashier" data-type="searchProduct" placeholder="Pesquisa do produto por código ou nome" autocomplete="off">
  	    </div>
        	<div class="table-responsive" style="height: 272px;">
            <table id="poTable" class="table table-striped">
                <thead>
                    <tr class="active">
        			        <th class="col-xs-2 thCashier" style="width: 10px">Produto</th>
                      <th class="col-xs-2 thCashier">Qtd</th>
        			        <th class="col-xs-2 thCashier">Preço</th>
        			        <th class="col-xs-2 thCashier">Subtotal</th>
        			        <th class="col-xs-2 thCashier"></th>                      
                    </tr>
                </thead>
                <tbody class="productContainer">
                <?php if(!isset($saleRestore)): ?>
                    <tr>
                        <td colspan="5" class="trDefault" style="text-align: center;">
                          Adicionar o produto através de pesquisa no campo acima.
                        </td>
                    </tr>
                <?php endif; ?>  
                <?php if(isset($saleRestore)): ?>
                  <?php foreach($saleRestore as $saleRestoreItem): ?>
                    <?php foreach($saleRestoreItem['Products'] as $saleRestoreProducts): ?>
                      <tr class="trProducts">
                        <td style="min-width:100px;">
                          <span><?php echo $saleRestoreProducts['ProductName']; ?></span>
                        </td>
                        <td style="padding:2px;">
                          <input type="hidden" name="ProductID[]" value='<?php echo $saleRestoreProducts['ProductID'] ?>'>
                          <input class="form-control input-sm kb-pad text-center rquantity" name="ProductQtd[]" value='<?php echo $saleRestoreProducts['SaleProductQtd'] ?>'>
                        </td>
                        <td style="padding:2px; min-width:80px;">
                          <input class="form-control input-sm kb-pad text-center rprice" type="text" name="ProductPrice[]" value='<?php echo $saleRestoreProducts['SaleProductPrice'] ?>' readonly>
                        </td>
                        <input name="ProductCost[]" type="hidden" value='<?php echo $saleRestoreProducts['SaleProductCost'] ?>'>
                        <td class="subTotal"></td>
                        <td class="text-center"><i class="fa fa-trash-o tip pointer spodel trash" title="Remove"></i></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
                <?php endif; ?>                  
                </tbody>
                <tfoot>
                    <tr class="active">                  
                    	<th class="thCashier">Total a Pagar</th>
                    	<th class="col-xs-2 thCashier"></th>
                    	<th class="col-xs-2 thCashier"></th>
                    	 <th class="col-xs-2 thCashier"><span class="thTotalValue"></span></th>   
                    	<th class="col-xs-2 thCashier"></th>
                    </tr>
                </tfoot>
            </table>             
        	</div>
        	</br>        
      		<div class="col-md-5">
      			<button type="button" class="btn btn-block btn-flat btn-warning btn-lg" data-toggle="modal" data-target="#modal-wait">Aguardar</button>
            <a href="<?php BASE?>"><button type="button" class="btn btn-block btn-flat btn-danger btn-lg">Cancelar</button></a>    
      		</div>
      		<div class="col-md-7">
          	<button type="button" class="btn btn-block btn-flat btn-success btn-lg btn-pay" style="height: 90px;" data-toggle="modal" data-target="#modal-success">Pagamento</button>	 
            <!-- /.modal Cashier -->
            <div class="modal modal-success fade" id="modal-success">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pagamento</h4>
                  </div>
                  <div class="modal-body">
                    <label>Valor Pago</label>
                    <input type="text" class="form-control totalPaid" autofocus>
                    <label>Pagar em</label>
                    <select class="form-control" name="SalePayment">
                      <option value="D">Dinheiro</option>
                      <option value="C">Crédito</option>
                      <option value="E">Debito</option>
                    </select>  
                    <label>Detalhes</label>
                    <input type="text" class="form-control" name="SaleDetail">   
                    </br>           
                    <table id="poTable" class="table">
                      <tr>
                        <td>Total Itens</td>
                        <td><input type="text" class="totalQtd inputCashier" name="SaleQtd" readonly></td>
                      </tr>                     
                      <tr>
                        <td>Total a Pagar</td>
                        <td><input type="text" class="totalCost inputCashier" name="SaleTotal" readonly></td>
                      </tr>                     
                      <tr>
                        <td>Total Pago</td>
                        <td><input type="text" class="tdTotalPaid inputCashier" name="SaleTotalPaid" readonly ></td>
                      </tr>
                      <tr>
                        <td>Troco</td>
                        <td><input type="text" class="rest inputCashier" name="SaleRest" readonly></td>
                      </tr>                      
                    </table>                           
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="extract" class="btn btn-outline" onsubmit="return openPopup()">Enviar e emitir cupom</button>
                    <button type="submit" name="submit" class="btn btn-outline">Enviar</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal Cashier -->    
            <!-- /.modal Wait -->
            <div class="modal modal-success fade" id="modal-wait">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pagamento</h4>
                  </div>
                  <div class="modal-body">
                    <p>Tipo de referência Nota</p>

                    <div class="form-group">
                      <label for="reference_note">Nota de referência</label>          
                      <input type="text" name="SaleRefWait" value="" class="form-control" aria-haspopup="true" role="textbox">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                    <input class="btn btn-outline" type="submit" name="submit" formaction="<?php echo BASE; ?>sale/wait" value="Enviar">
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal Wait -->                             
      		</div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Vendas em espera</h3>
    </div>    
      <div class="box-body " style="height: 510px;"> 
        <table id="data-table" class="table table-bordered">
          <thead>
          <tr>
            <th>Referência</th>
            <th>Recuperar Venda</th>
          </tr>
          </thead>
          <tbody>
          <?php if(isset($saleWait)): ?>
            <?php foreach($saleWait as $saleWaitItem): ?>
            <tr>
              <td><?php echo $saleWaitItem['SaleRefWait']; ?></td> 
              <td><a class='fa fa-pencil-square fa-2x' href="<?php echo BASE; ?>sale/updateSale/<?php echo $saleWaitItem['SaleID']; ?>"/></a></td>
            </tr>
            <?php endforeach; ?>
          <?php endif; ?>
          </tbody>
        </table>        
      </div>
    </div>
  </div>
</form>