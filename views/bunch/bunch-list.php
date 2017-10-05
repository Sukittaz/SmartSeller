<div style="padding-bottom: 10px;">
  <a style="width: 110px;" href="<?php echo BASE; ?>bunch/add" class="btn btn-info">
    <i class="fa fa-plus"></i> Criar
  </a>  
</div>

<div class="box">
  <div class="box-header">

    <h3 class="box-title">Grupos</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data-table" class="table table-bordered">
      <thead>
      <tr>
        <th>Nome</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($bunch as $bunchItem): ?>
      <tr>
        <td><?php echo $bunchItem->BunchName; ?></td>
        <td style='width: 60px;'>
          <a class='fa fa-search-plus fa-2x' href="<?php echo BASE; ?>bunch/view/<?php echo $bunchItem->BunchID; ?>"/>
          <a class='fa fa-pencil-square fa-2x' href="<?php echo BASE; ?>bunch/edit/<?php echo $bunchItem->BunchID; ?>"/>
        </td>   
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>