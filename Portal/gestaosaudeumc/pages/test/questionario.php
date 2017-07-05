<?php
  include 'cabec.php';
  // Verifica se foi preenchido informações do formulário e então carrega dinamicamente
  if(!empty($_POST)){
    $nQuestionarios     =   $_POST["Nquestionario"];
    $descQuestionario   =   $_POST["descQuestionario"];
    $numQuest           =   $_POST["numQuest"];
    $rPost = true;
  }

  $popUp = "";

  //Checa Se existe a sessão
  if (isset($_SESSION["envioQuestionario"])){
    if($_SESSION["envioQuestionario"]==1){
      $popUp =   '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Questionário enviado com Sucesso!</h4>
                </div>' ;     
    }else if($_SESSION["envioQuestionario"]==0){
      $popUp =   '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                Por gentileza verifique os dados enviados no formulário abaixo, um erro foi encontrado
                </div>' ;     
    }
    unset($_SESSION["envioQuestionario"]);
  }



?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Criar novo Questionário</h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="box box-success">
          <?php echo $popUp; ?>
            <!-- /.box-header -->
            <div class="box-body">
              <form  role="form" action=<?php 
              if (!isset($numQuest)){
                echo htmlspecialchars($_SERVER["PHP_SELF"]);
              }else{
                echo 'recebeQuestionario.php';
                echo ' onsubmit="return validaQuestoes(this)"';
              }
              ?> method="post">
                <!-- text input -->
                <div class="form-group">
                  <label>Nome do Questionário</label>
                  <input required name="Nquestionario" type="text" class="form-control"  value=<?php echo (isset($nQuestionarios)? $nQuestionarios : '')  ;?>
                  >
                </div>
                <!-- text input -->
                <div class="form-group">
                  <label>Descrição do questionário</label>
                  <input required name="descQuestionario" type="text" class="form-control" placeholder="Escreva aqui a descrição do questionário" value=<?php echo (isset($descQuestionario)? $descQuestionario : '')  ;?> >
                </div>
                <!-- text input -->
                <?php if (!isset($numQuest)){
                  
                  echo '
                    <div class="form-group">
                      <label>Infome o número de questões do questionário</label>
                      <input name="numQuest" min="1" max="10" type="number" class="form-control" placeholder="1" required>
                    </div>
                  ';
                }else{
                    echo '
                    <div class="form-group">
                      <input name="numQuest" type="hidden" value="'.$numQuest.'">
                    </div>
                    ';

                  for ($i = 1; $i <= $numQuest; $i++) {            
                      echo '
                      <div class="form-group">
                        <label>Questão número '.$i.'</label>
                        <input require name="q'.$i.'" type="text" class="form-control" placeholder="" >
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="Qualitativa'.$i.'"> Com justificativa ? 
                        </label>
                      </div><br>';
                  }
                }

                if (!isset($numQuest)){
                  echo '
                    <div class="box-footer">
                      <input type="submit" value="Insira as questões do questionário" name="submit">
                      <!--<button class="btn btn-primary">Submit</button>-->
                    </div>';
                }else{
                  echo '
                    <div class="box-footer">
                      <input type="submit" value="Enviar Questionário" name="submit">
                      <!--<button class="btn btn-primary">Submit</button>-->
                    </div>';
                }
                ?>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          <!-- /.box -->
  
    </section>

<script>
  function validaQuestoes(form){
    if (form.q1.value == '' 
      || form.q2.value == '' 
      || form.q3.value == ''
      || form.q4.value == ''
      || form.q5.value == ''
      || form.q6.value == ''
      || form.q7.value == ''
      || form.q8.value == ''
      || form.q9.value == ''
      || form.q10.value == ''
      ){
      window.alert("Algum campo está em branco");
      return false;
    }
  }
</script>

<?php 
  include 'footer.php';
?>