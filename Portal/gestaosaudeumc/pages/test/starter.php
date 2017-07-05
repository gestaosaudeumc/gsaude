<?php	include 'cabec.php'; 

$sql = "SELECT count(*) as nUsuarios FROM usuarios";
$result = $db->query($sql);
while($row = $result->fetch_assoc()) {
    $nusu = $row["nUsuarios"];
}

$db->close();

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Seja bem vindo ao portal de Gestão de Saúde <br>
      <small>Selecione ao lado uma rotina para navegar</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12"><br>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $nusu ?></h3>
              <p>Novos registros de colaboradores</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="lista_colaboradores.php" class="small-box-footer">
              Mais informações <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

          <!-- /.box -->
        </div>
 	  </section>
 
<?php include 'footer.php'; ?>