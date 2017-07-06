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
              <h3 class="box-title">Cadastro de metas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!-- Inicio dados formulário -->

            <!-- form start -->
            <form role="form" method="POST" action="recebeAtividade.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Título</label>
                  <input name= "nomeM" required type="text" class="form-control" id="inlineFormInput" placeholder="Digite aqui o título da premiação">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Descrição da meta</label>
				          <textarea required name="descricaoMeta" class="form-control" rows="3" placeholder="Descreva aqui o objetivo da premiação"></textarea>
                </div>

                <!-- TODO colocar aqui um campo para um numerico e um select com data, hora, minuto -->
                <div class="form-group">
                  <label for="Periodo">Selecione o período para completar:</label>
                  <div class="input-group">
                    <input type="number" min="1" required name="numPeriodo" class="form-control">
                    <div class="input-group-addon">
                      <select name="MedidaEscolhida" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected">Horas</option>
                        <option>Minutos</option>
                        <option>Dias</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- TODO select com um ou mais premiações -->
                <div class="form-group">
                  <label for="Periodo">Selecione a premiação por completar essa Meta:</label>
                  <select name="Premiacao" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <?php
                    $flagLooping = true;
                    $sql = "
                    SELECT nome_premiacao FROM `phh_premiacao`
                    ";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          if ($flagLooping){
                            echo '<option selected="selected">'.$row["nome_premiacao"].'</option>';
                            $flagLooping = false;
                          }else{
                            echo '<option>'.$row["nome_premiacao"].'</option>';
                          }
                        }
                    }else{
                      echo '<option selected="selected">Nao Existe premicao</option>';
                    }
                  ?>
                  </select>
                </div>

                <div class="form-group">
                  Premiação relacionada a :
                  <label> Completar Desafios
                    <input type="radio" name="r1" class="minimal" checked="">
                  </label>
                  &nbsp &nbsp&nbsp&nbsp&nbsp
                  <label> Completar Metas
                    <input type="radio" name="r2" class="minimal">
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
            <input type="hidden" name="tipoForm" value="1">
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
