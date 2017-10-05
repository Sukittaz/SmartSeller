<style type="text/css">

.td-center, .spans { 
  text-align:center;
  padding: 0px !important;
  text-transform: uppercase;
  font-size: 8px;
}

@media print {
  #print, #main-footer { display: none; }
}

h5 {
  font-size: 11px;
}

.td-left{
  text-align: left !important;
  font-size: 8px;
  padding: 0px !important;

}
</style>

<div style="text-align: center;" >
    <table class="table" style="width: 300px; margin: auto;">
        <tbody>
            <tr>
              <td class="td-center"><?php echo $company->CompanyName; ?></td>
            </tr>
            <tr>
              <td class="td-center"><?php echo $company->CompanySocialName; ?></td>
            </tr>
            <tr>
              <td class="td-center"><?php echo $company->CompanyAddres.', '.$company->CompanyAddresNumber.' - '.$company->CompanyCity; ?></td>
            </tr>
            <tr>
              <td class="td-center">CNPJ.: <?php echo $company->CompanyCNPJ; ?></td>
            </tr>                                               
        </tbody>
    </table>
    <h5>CUPOM NÃO FISCAL</h5>   
    <span class="spans">----------------------------------------------------------------------------------------</span>   
    <h5>DETALHES DA VENDA</h5>
    <table class="table" style="width: 200px; margin: auto;">
        <tbody>
            <?php foreach($saleExtract as $saleExtractItem): ?>
              <?php foreach($saleExtractItem['Products'] as $saleExtractProduct): ?>
              <tr>
                <td class="td-left"><?php echo $saleExtractProduct['ProductName']; ?></td>
                <td class="td-left"><?php echo $saleExtractProduct['SaleProductQtd'].' X '.$saleExtractProduct['SaleProductPrice']; ?></td>
                <td class="td-left"><?php echo number_format($saleExtractProduct['SaleProductQtd'] * $saleExtractProduct['SaleProductPrice'], 2, ',', '.'); ?></td>
              </tr>
              <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <span class="spans">----------------------------------------------------------------------------------------</span>   
    <table class="table" style="width: 200px; margin: auto;">
        <tbody>
            <?php foreach($saleExtract as $saleExtractItem): ?>
              <tr>
                <td class="td-left">QTD. TOTAL DE ITENS</td>
                <td class="td-left"><?php echo $saleExtractItem['SaleQtd']; ?></td>
              </tr>
              <tr>
                <td class="td-left">VALOR TOTAL (R$)</td>
                <td class="td-left"><?php echo $saleExtractItem['SaleTotal']; ?></td>
              </tr>
              <tr>
                <td class="td-left">TOTAL PAGO</td>
                <td class="td-left"><?php echo $saleExtractItem['SaleTotalPaid']; ?></td>
              </tr> 
              <tr>
                <td class="td-left">TROCO</td>
                <td class="td-left"><?php echo $saleExtractItem['SaleRest']; ?></td>
              </tr> 
            <?php endforeach; ?>                              
        </tbody>
    </table>    
    <span class="spans">----------------------------------------------------------------------------------------</span>
    <h5>VOLTE SEMPRE</h5>
    <span class="spans">----------------------------------------------------------------------------------------</span></br></br>
    <button type="submit" name="submit" class="btn btn-primary" id="print">Imprimir</button> 
</div>     