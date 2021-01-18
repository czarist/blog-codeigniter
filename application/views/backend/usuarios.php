<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?php echo 'Administrar ' . $subtitulo; ?></h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <?php echo 'adicionar novo ' . $subtitulo; ?>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <?php
              echo validation_errors('<div class="alert alert-danger">', '</div>');
              echo form_open('admin/usuarios/inserir');
              ?>
              <div class="form-group">
                <label id="txt-nome">Nome do Usuário</label>
                <input id="txt-nome" name="txt-nome" type="text" class="form-control" placeholder="Digite o nome do Usuário">
              </div>
              <div class="form-group">
                <label id="txt-email">E-mail do Usuário</label>
                <input id="txt-email" name="txt-email" type="email" class="form-control" placeholder="Digite o email do Usuário">
              </div>
              <div class="form-group">
                <label id="txt-historico">Histórico do Usuário</label>
                <textarea id="txt-historico" name="txt-historico" type="text" class="form-control" placeholder="Digite o histórico do Usuário" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label id="txt-user">User</label>
                <input id="txt-User" name="txt-User" type="text" class="form-control" placeholder="Digite o User do Usuário">
              </div>
              <div class="form-group">
                <label id="txt-senha">Senha</label>
                <input id="txt-senha" name="txt-senha" type="password" class="form-control" placeholder="Digite sua senha">
              </div>
              <div class="form-group">
                <label id="txt-confir-senha">Confirmar senha</label>
                <input id="txt-confir-senha" name="txt-confir-senha" type="password" class="form-control" placeholder="Confirme sua senha">
              </div>
              <button type="submit" class="btn btn-default">Cadastrar</button>
              <?php
              echo form_close();
              ?>
            </div>
          </div>
          <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <?php echo 'Alterar ' . $subtitulo . ' existente'; ?>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <?php
              $this->table->set_heading('Foto', 'Nome do Usuario', 'Alterar', 'Excluir');
              foreach ($usuarios as $usuario) {
                $nomeuser = $usuario->nome;
                $fotouser = 'foto';
                $alterar = anchor(base_url('admin/usuario/alterar/' . md5($usuario->id)), '<i class="fa fa-refresh fa-fw"></i>Alterar');
                $excluir = anchor(base_url('admin/usuario/excluir/' . md5($usuario->id)), '<i class="fa fa-remove fa-fw"></i>Excluir');
                $this->table->add_row($fotouser, $nomeuser, $alterar, $excluir);
              };
              $this->table->set_template(array(
                "table_open" => "<table class='table table-striped'>"
              ));
              echo $this->table->generate();
              ?>
            </div>
          </div>
          <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
  </div>
  <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>

<!-- <form role="form">
                <div class="form-group">
                  <label>Titulo</label>
                  <input class="form-control" placeholder="Entre com o texto">
                </div>
                <div class="form-group">
                  <label>Foto Destaque</label>
                  <input type="file">
                </div>
                <div class="form-group">
                  <label>Conteúdo</label>
                  <textarea class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                  <label>Selects</label>
                  <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-default">Cadastrar</button>
                <button type="reset" class="btn btn-default">Limpar</button>
              </form> -->