<?php
  include 'cabec.php';
  $popUp = "";

  //Checa Se existe a sessão
  if (isset($_SESSION["envioAti"])){
    if($_SESSION["envioAti"]==1){
      $popUp =   '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Nova Atividade cadastrada!</h4>
                </div>' ;
    }else if($_SESSION["envioAti"]==0){
      $popUp =   '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                Por gentileza verifique os dados enviados no formulário, um erro foi encontrado
                </div>' ;
    }
    unset($_SESSION["envioAti"]);
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
              <h3 class="box-title">Cadastro de premiação</h3>
              <!--
                <br><small> Preencha as informações abaixo para que a nova atividade esteja disponível para os colaboradores </small>
              -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!-- Inicio dados formulário -->

            <!-- form start -->
            <form role="form" method="POST" action="recebeAtividade.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Título</label>
                  <input name= "nomeA" required type="text" class="form-control" id="inlineFormInput" placeholder="Digite aqui o título da premiação">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Objetivo</label>
				          <textarea required name="obj" class="form-control" rows="3" placeholder="Descreva aqui o objetivo da premiação"></textarea>
                </div>

                <div class="form-group">
                  Premiação relacionada a :
                  <label> Completar Desafios
                    <input type="radio" name="r1" class="minimal" checked="">
                  </label>
                  &nbsp &nbsp&nbsp&nbsp&nbsp
                  <label> Completar Metas
                    <input type="radio" name="r1" class="minimal">
                  </label>
                </div>

                <div class="form-group">
                  <label for="numPontos">Número de pontos</label>
                  <p class="help-block">Mínimo = 1, Máximo = 9</p>
				          <input type="number" min="1" max="9" required name="numPontos" class="form-control">
                </div>
              <div class="form-group">
                <label for="ImagemCampanha">Imagem Desafio</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <p class="help-block">Tamanho máximo 500kb</p>
              </div>

            <!-- /.box-body -->
            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
          </form>

			<!-- Fim form -->
			</div>
    </section>
	</div>
<?php

  include 'footer.php';

?>
