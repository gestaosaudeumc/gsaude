<?php
 include 'cabec.php';
$sql = "SELECT * FROM atividades";
$result = $db->query($sql);

echo '
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Lista de Atividades cadastradas
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
                  <th style="width: 10px">#ID</th>
                  <th>Descrição</th>
                  <th>Objetivo</th>
                 </tr>';
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        //echo "id: " . $row["id"]. " - Name: " . $row["email"]. " " . $row["perfil"]. "<br>";

						echo '	<tr>
									<td>'.$row["ID_ATIVIDADE"].'</td>
									<td>'.$row["DESCRICAO"].'</td>
									<td>'.$row["OBJETIVO"].'</td>
								</tr>';        
                        
                    }
                } else {
                    echo '<tr><td><td><td></tr>';
                }
                
               echo '  
              </tbody></table>
            </div>
          </div>
    </div>

';




$db->close();

include 'footer.php';