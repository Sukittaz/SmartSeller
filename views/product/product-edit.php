<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Por favor, atualize as informações abaixo</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="POST">
  <div class="box-body">
    <div class="form-group">
      <label>Nome</label>
      <input type="text" name="ProductName" value="<?php echo $product->ProductName; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Código</label> você pode usar o código de barras do produto como código
      <input type="text" name="ProductCode" value="<?php echo $product->ProductCode;  ?>" class="form-control">
    </div>   
    <div class="form-group">
      <label>Categoria</label>
      <select class="form-control" name="CategoryID">
        <?php foreach($category as $categoryItem): ?>
        <option value="<?php echo $categoryItem->CategoryID; ?>" <?php echo ($categoryItem->CategoryID==$product->CategoryID)?'selected="selected"':''; ?>><?php echo $categoryItem->CategoryName; ?></option>
        <?php endforeach; ?>
      </select>
    </div>   
    <div class="form-group">
      <label>Tipo do cálculo</label>
      <input type="text" name="ProductTypeCalc" value="<?php echo ($product->ProductTypeCalc == 0)?'Peso':'Quantidade'; ?>" class="form-control" readonly>
    </div>       
    <div class="form-group">
      <label>Custo</label>
      <input type="text" name="ProductCost" value="<?php echo $product->ProductCost; ?>" class="form-control">
    </div>      
    <div class="form-group">
      <label>Preço</label>
      <input type="text" name="ProductPrice" value="<?php echo $product->ProductPrice; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Quantidade</label>
      <input type="text" name="ProductQtd" value="<?php echo $product->ProductQtd; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Alerta de quantidade mínima</label>
      <input type="text" name="ProductAlert" value="<?php echo $product->ProductAlert; ?>" class="form-control">
    </div>  
    <div class="form-group">
      <label>Detalhes</label>
      <textarea class="textarea" name="ProductDetail" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $product->ProductDetail; ?></textarea>
    </div>     
  </div>
  <div class="box-footer">
    <button type="submit" name="submit" class="btn btn-primary">Editar Produto</button>
  </div>  
</form>
</div>