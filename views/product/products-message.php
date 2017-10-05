<div class="box">
  <div class="box-header">
    <h3 class="box-title">Aviso de estoque</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data-table" class="table table-bordered">
      <thead>
      <tr>
        <th>Produto</th>
        <th>Qtd Minima</th>
        <th>Qtd em estoque</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($alert as $alertItem): ?>
      <tr>
        <td><?php echo $alertItem->ProductName ?></td>  
        <td><?php echo $alertItem->ProductAlert ?></td>  
        <td><?php echo $alertItem->ProductQtd ?></td>  
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>