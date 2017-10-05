<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="tab-1 active"><a href="#tab_1" data-toggle="tab">Editar</a></li>
    <li class="tab-2"><a href="#tab_2" data-toggle="tab">Alterar senha</a></li>
  </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        <?php foreach($user as $userItem): ?>
          <div class="box-header with-border">
            <h3 class="box-title">Por favor, atualize as informações abaixo</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label>Nome</label>
                <input type="text" name="UserName" value="<?php echo $userItem->UserName; ?>" class="form-control">
              </div>  
              <div class="form-group">
                <label>Login</label>
                <input type="text" name="UserLogin" value="<?php echo $userItem->UserLogin; ?>" class="form-control">
              </div> 
              <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="UserEmail" value="<?php echo $userItem->UserEmail; ?>" class="form-control">
              </div> 
              <div class="form-group">
                <label>Grupo</label>
                <select class="form-control" name="BunchID">
                  <?php foreach($bunch as $bunchItem): ?>
                  <option value="<?php echo $bunchItem->BunchID; ?>" <?php echo ($bunchItem->BunchID==$userItem->BunchID)?'selected="selected"':''; ?>><?php echo $bunchItem->BunchName; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>                                      
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary">Atualizar Usuário</button>
            </div>
          </form>
        <?php endforeach; ?>
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2">
        <form role="form" method="POST">
          <div class="box-body">    
            <div class="form-group">
              <label>Nova Senha</label>
              <input type="password" name="UserPass" class="form-control">
            </div> 
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" name="alter-pass" class="btn btn-primary">Alterar Senha</button>
            </div>                                
          </div>
        </form>  
      </div>
    </div>
  <!-- /.tab-content -->
</div>


