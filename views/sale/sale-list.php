<div class="box">
  <div class="box-header">

    <h3 class="box-title">Vendas</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data-table" class="table table-bordered">
      <thead>
      <tr>
        <th>Data</th>
        <th>Total Compra</th>
        <th>Total Pago</th>
        <th>Troco</th>
        <th>Lucro</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php if(isset($sale)): ?>
        <?php foreach($sale as $saleItem): ?>
        <tr>
          <td><?php echo $saleItem["SaleDate"]; ?></td>
          <td><?php echo $saleItem["SaleTotal"]; ?></td>
          <td><?php echo $saleItem["SaleTotalPaid"]; ?></td>
          <td><?php echo $saleItem["SaleRest"]; ?></td>
          <td><?php echo $saleItem["SaleProfit"]; ?></td>
          <td style='width: 20px;'>
            <a class='fa fa-search-plus fa-2x' href="<?php echo BASE; ?>sale/view/<?php echo $saleItem["SaleID"]; ?>"></a>
          </td>   
        </tr>
        <?php endforeach; ?>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>