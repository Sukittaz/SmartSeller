<div style="padding-bottom: 10px;">
  <a style="width: 110px;" href="<?php echo BASE; ?>purchase/add" class="btn btn-info">
    <i class="fa fa-plus"></i> Criar
  </a>  
</div>

<div class="box">
  <div class="box-header">

    <h3 class="box-title">Compras</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data-table" class="table table-bordered">
      <thead>
      <tr>
        <th>Referência</th>
        <th>Data</th>
        <th>Fornecedor</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php if(isset($purchase)): ?>
        <?php foreach($purchase as $purchaseItem): ?>
        <tr>
          <td><?php echo $purchaseItem['PurchaseRef']; ?></td>
          <td><?php echo $purchaseItem['PurchaseData']; ?></td>
          <td><?php echo $purchaseItem['SupplierName']; ?></td>
          <td><?php echo ($purchaseItem['PurchaseStatus'] == 1) ? 'Recebido' : 'Não Recebido'; ?></td>
          <td style='width: 20px;'>
            <a class='fa fa-search-plus fa-2x' href="<?php echo BASE; ?>purchase/view/<?php echo $purchaseItem['PurchaseID']; ?>"/>
          </td>   
        </tr>
        <?php endforeach; ?>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>