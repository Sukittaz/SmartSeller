<div style="padding-bottom: 10px;">
  <a style="width: 110px;" href="<?php echo BASE; ?>costumer/add" class="btn btn-info">
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
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Nº</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($costumer as $costumerItem): ?>
      <tr>
        <td><?php echo $costumerItem->CostumerName; ?></td>
        <td><?php echo $costumerItem->CostumerEmail; ?></td>
        <td><?php echo $costumerItem->CostumerPhone; ?></td>
        <td><?php echo $costumerItem->CostumerAddres; ?></td>
        <td><?php echo $costumerItem->CostumerAddresNumber; ?></td>
        <td style='width: 80px;'>
          <a class='fa fa-search-plus fa-2x' href="<?php echo BASE; ?>costumer/view/<?php echo $costumerItem->CostumerID; ?>"/>
          <a class='fa fa-pencil-square fa-2x' href="<?php echo BASE; ?>costumer/edit/<?php echo $costumerItem->CostumerID; ?>"/>
          <a class='fa fa-trash fa-2x' href="<?php echo BASE; ?>costumer/delete/<?php echo $costumerItem->CostumerID; ?>"/>
        </td>   
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>