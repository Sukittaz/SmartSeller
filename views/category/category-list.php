<div style="padding-bottom: 10px;">
  <a style="width: 110px;" href="<?php echo BASE; ?>category/add" class="btn btn-info">
    <i class="fa fa-plus"></i> Criar
  </a>  
</div>

<div class="box">
  <div class="box-header">

    <h3 class="box-title">Categorias</h3>
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
      <?php foreach($category as $categoryItem): ?>
      <tr>
        <td><?php echo $categoryItem->CategoryName; ?></td>
        <td style='width: 60px;'>
          <a class='fa fa-search-plus fa-2x' href="<?php echo BASE; ?>category/view/<?php echo $categoryItem->CategoryID; ?>"/>
          <a class='fa fa-pencil-square fa-2x' href="<?php echo BASE; ?>category/edit/<?php echo $categoryItem->CategoryID; ?>"/>
        </td>   
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>