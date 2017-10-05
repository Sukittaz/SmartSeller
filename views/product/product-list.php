<div style="padding-bottom: 10px;">
  <a style="width: 110px;" href="<?php echo BASE; ?>product/add" class="btn btn-info">
    <i class="fa fa-plus"></i> Criar
  </a>  
</div>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Produtos</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data-table" class="table table-bordered">
      <thead>
      <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Custo</th>
        <th>Categoria</th>
        <th>Código</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($product as $productItem): ?>
      <tr>
        <td><?php echo $productItem->ProductName; ?></td>
        <td><?php echo $productItem->ProductPrice; ?></td>
        <td><?php echo $productItem->ProductCost; ?></td>
        <td><?php echo $productItem->CategoryName; ?></td>
        <td><?php echo $productItem->ProductCode; ?></td>
        <td style='width: 60px;'>
          <a class='fa fa-search-plus fa-2x' href="<?php echo BASE; ?>product/view/<?php echo $productItem->ProductID; ?>"/>
          <a class='fa fa-pencil-square fa-2x' href="<?php echo BASE; ?>product/edit/<?php echo $productItem->ProductID; ?>"/>
        </td>   
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>