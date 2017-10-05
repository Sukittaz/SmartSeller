<div style="padding-bottom: 10px;">
  <a style="width: 110px;" href="<?php echo BASE; ?>expense/add" class="btn btn-info">
    <i class="fa fa-plus"></i> Criar
  </a>  
</div>

<div class="box">
  <div class="box-header">

    <h3 class="box-title">Despesas</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data-table" class="table table-bordered">
      <thead>
      <tr>
        <th>Referência</th>
        <th>Data</th>
        <th>Valor Pago</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($expense as $expenseItem): ?>
      <tr>
        <td><?php echo $expenseItem->ExpenseRef; ?></td>
        <td><?php echo $expenseItem->ExpenseDate; ?></td>
        <td><?php echo $expenseItem->ExpenseValue; ?></td>
        <td style='width: 80px;'>
          <a class='fa fa-search-plus fa-2x' href="<?php echo BASE; ?>expense/view/<?php echo $expenseItem->ExpenseID; ?>"/>
          <a class='fa fa-pencil-square fa-2x' href="<?php echo BASE; ?>expense/edit/<?php echo $expenseItem->ExpenseID; ?>"/>
          <a class='fa fa-trash fa-2x' href="<?php echo BASE; ?>expense/delete/<?php echo $expenseItem->ExpenseID; ?>"/>
        </td>   
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>