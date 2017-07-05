<?php
 include 'cabec.php';
$sql = "SELECT id_usuario,email,nome,tipo_perfil FROM usuarios";
$result = $db->query($sql);

echo '
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Lista de Colaboradores cadastrados
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
                  <th>Nome</th>
                  <th>Email</th>
                  <th style="width: 50px">Perfil</th>
                </tr>';
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        //echo "id: " . $row["id"]. " - Name: " . $row["email"]. " " . $row["perfil"]. "<br>";

					echo '	<tr>
								<td>'.$row["id_usuario"].'</td>
								<td>'.$row["nome"].'</td>
								<td>'.$row["email"].'</td>
								<td>'.($row["tipo_perfil"] ==1 ? 'Médico' : 'Colaborador').'</td>
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