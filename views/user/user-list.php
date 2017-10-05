<div style="padding-bottom: 10px;">
  <a style="width: 110px;" href="<?php echo BASE; ?>user/add" class="btn btn-info">
    <i class="fa fa-plus"></i> Criar
  </a>  
</div>

<div class="box">
  <div class="box-header">

    <h3 class="box-title">Usuários</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data-table" class="table table-bordered">
      <thead>
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Grupo</th>
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($user as $userItem): ?>
      <tr>
        <td><?php echo $userItem->UserName; ?></td>
        <td><?php echo $userItem->UserEmail; ?></td>
        <td><?php echo $userItem->BunchName; ?></td>
        <td style='width: 80px;'>
          <a class='fa fa-search-plus fa-2x' href="<?php echo BASE; ?>user/view/<?php echo $userItem->UserID; ?>"/>
          <a class='fa fa-pencil-square fa-2x' href="<?php echo BASE; ?>user/edit/<?php echo $userItem->UserID; ?>"/>
          <a class='fa fa-trash fa-2x' href="<?php echo BASE; ?>user/delete/<?php echo $userItem->UserID; ?>"/>
        </td>   
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>