<?php
  include 'cabec.php';
  $popUp = "";

  //Checa Se existe a sessão
  if (isset($_SESSION["envioColab"])){
    if($_SESSION["envioColab"]==1){
      $popUp =   '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Novo Colaborador cadastrado com Sucesso!</h4>
                </div>' ;
    }else if($_SESSION["envioColab"]==0){
      $popUp =   '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                Por gentileza verifique os dados enviados no formulário, um erro foi encontrado
                </div>' ;
    }
    unset($_SESSION["envioColab"]);
  }


?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

    <div class="box box-info">
            <div class="box-header with-border">
              <?php echo $popUp; ?>
              <h3 class="box-title">Cadastro de novo Colaborador</h3>
              <br><small> Preencha as informações abaixo para que o novo colaborador consiga
                  acessar o portal e também contabilizar os dados de saúde </small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form" method="POST" action="recebeNovoColaborador.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="NomeCompleto">Nome Completo</label>
                  <input name= "nomeC" required type="text" class="form-control" id="inlineFormInput" placeholder="Digite aqui o nome">
                </div>
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input name= "email" required type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                    <input name= "password" type="password" class="form-control" id="inlineFormInputGroup" placeholder="Senha" required>
                </div>
                <!-- novos campos -->
                <div class="form-group">
                  <label for="Login">Login para acessar o portal e APP</label>
                  <input name= "login" required type="text" class="form-control" id="inlineFormInputGroup" placeholder="Login">
                </div>
                <div class="form-group">
                  <label for="Matricula">Matricula</label>
                  <input name= "matricula" required type="text" class="form-control" id="inlineFormInputGroup" placeholder="Numero Matricula">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">CPF</label>
                  <input name= "cpf" maxlength="11" required type="number" class="form-control" id="inlineFormInputGroup" placeholder="CPF">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Altura</label>
                  <input name= "altura" type="number" class="form-control" id="inlineFormInputGroup" placeholder="Altura">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Facebook</label>
                  <input name= "facebook" type="text" class="form-control" id="inlineFormInputGroup" placeholder="ID facebook">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Twitter</label>
                  <input name= "twitter" type="text" class="form-control" id="inlineFormInputGroup" placeholder="@nomeTwitter">
                </div>

                <!-- 0 homem , 1 mulher, 2 outros -->
                <div class="form-group">
                  <label for="exampleInputPassword1">Sexo</label>
                  <select name="sexo" class="form-control">
                    <option value="0">Homem</option>
                    <option value="1">Mulher</option>
                    <option value="2">Outros</option>
                  </select>
                </div>
                <div class="checkbox">
                  <label>
          					<input type="hidden" name="tipocolab" value="0">
          					<input type="checkbox" name="tipocolab" value="1"> O Colaborador é integrante do time médico?
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar Cadastro</button>
              </div>
            </form>

			<!-- Fim form -->
			</div>
    </section>
	</div>
<?php

  include 'footer.php';

?>
