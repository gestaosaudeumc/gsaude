<?php
	include 'cabec.php';
  $popUp = "";

  //Checa Se existe a sessão
  if (isset($_SESSION["envioCampanha"])){
    if($_SESSION["envioCampanha"]==1){
      $popUp =   '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Campanha enviada com Sucesso!</h4>
                </div>' ;     
    }else if($_SESSION["envioCampanha"]==0){
      $popUp =   '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                Por gentileza verifique os dados enviados no formulário, um erro foi encontrado
                </div>' ;     
    }
    unset($_SESSION["envioCampanha"]);
  }


?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <?php echo $popUp; ?>
            <h3 class="box-title">Digite abaixo as informações da campanha</h3>
          </div>

            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="recebeCampanha.php"  method="post" enctype="multipart/form-data">
				<!-- text input -->
                <div class="form-group">
                  <label>Nome da Campanha</label>
                  <input name="txtNomCampanha" type="text" class="form-control" placeholder="Digite aqui o nome da campanha" required>
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Digite a descrição da campanha</label>
                  <textarea class="form-control" rows="3" placeholder="Escreva aqui detalhes da campanha" name="txtCampanha" required></textarea>
                </div>
				        <div class="form-group">
                  <label for="ImagemCampanha">Imagem Campanha</label>
                  <input type="file" name="fileToUpload" id="fileToUpload">
                  <p class="help-block">São permitos apenas anexo de um único arquivo por campanha</p>
                </div> 
              <div class="box-footer">
                <input type="submit" value="Enviar Campanha" name="submit">
                <!--<button class="btn btn-primary">Submit</button>-->
              </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
 	  </section>

<?php 

	include 'footer.php';

?>