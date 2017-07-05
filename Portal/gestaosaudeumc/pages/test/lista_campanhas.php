<?php
 include 'cabec.php';
 
$sql = "SELECT ID_CAMPANHA,TITULO,TEXTO_CAMPANHA,CAMINHO_IMAGEM FROM campanhas";
$result = $db->query($sql);

echo '
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Relatório de Campanhas Cadastradas
      </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">

<div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nome Campanha</th>
                  <th>Descrição</th>
                  <th>Imagem</th>
                </tr>';
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        //echo "id: " . $row["id"]. " - Name: " . $row["email"]. " " . $row["perfil"]. "<br>";

					echo '	<tr>					
								<td>'.$row["ID_CAMPANHA"].'</td>
								<td>'.$row["TITULO"].'</td>
								<td>'.$row["TEXTO_CAMPANHA"].'</td>
								<td>'.(!empty($row["CAMINHO_IMAGEM"]) ? '<img height="90" width="90" src="'.$row["CAMINHO_IMAGEM"].'" class="img-circle" alt="User Image">' : '').'</td>
							</tr>';        
                        
                    }
                } else {
                    echo '<tr><td><td><td><td></tr>';
                }
                
               echo '  
              </tbody></table>
            </div>
          </div>




    </div>

';




$db->close();

include 'footer.php';