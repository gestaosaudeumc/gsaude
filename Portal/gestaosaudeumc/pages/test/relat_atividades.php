<?php
include 'cabec.php';
$sql = "Select Count(*) as Ativ_Realiz,us.NOME as nome_func,us.ID_USUARIO as ID from atividades_x_colaborador ac 
inner join usuarios us on ac.COLABORADOR = us.ID_USUARIO  
GROUP by us.nome,us.ID_USUARIO";
$result = $db->query($sql);

/*
//TODO 

LISTAR DETALHE DA ATIVIDADE
http://allenfang.github.io/react-bootstrap-table/example.html#expand

*/


echo '
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Relatório de atividades por colaborador
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
                  <th>Nome Funcionario</th>
                  <th>Numero de atividades Realizadas</th>

				  </tr>';
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo '<tr>
							<td>'.$row["nome_func"].'</td>
							<td>'.$row["Ativ_Realiz"].'</td>
							<td><a href="relat_detalheAtividade?id='.$row["ID"].'">Informação Detalhada do colaborador</a></td>	
						</tr>';        
                    }
                } else {
                    echo '<tr><td></td><td></td><td></td></tr>';
                }
                
               echo '  
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>




    </div>

';




$db->close();

include 'footer.php';