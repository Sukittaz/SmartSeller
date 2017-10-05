<div style="padding-bottom: 10px;">
  <a style="width: 110px;" href="<?php echo BASE; ?>supplier/add" class="btn btn-info">
    <i class="fa fa-plus"></i> Criar
  </a>  
</div>

<div class="box">
  <div class="box-header">

    <h3 class="box-title">Fornecedores</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data-table" class="table table-bordered">
      <thead>
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>CNPJ</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($supplier as $supplierItem): ?>
      <tr>
        <td><?php echo $supplierItem->SupplierName; ?></td>
        <td><?php echo $supplierItem->SupplierEmail; ?></td>
        <td><?php echo $supplierItem->SupplierPhone; ?></td>
        <td><?php echo $supplierItem->SupplierCNPJ; ?></td>
        <td style='width: 80px;'>
          <a class='fa fa-search-plus fa-2x' href="<?php echo BASE; ?>supplier/view/<?php echo $supplierItem->SupplierID; ?>"/>
          <a class='fa fa-pencil-square fa-2x' href="<?php echo BASE; ?>supplier/edit/<?php echo $supplierItem->SupplierID; ?>"/>
          <a class='fa fa-trash fa-2x' href="<?php echo BASE; ?>supplier/delete/<?php echo $supplierItem->SupplierID; ?>"/>
        </td>   
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>