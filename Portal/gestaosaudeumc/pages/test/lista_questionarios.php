<?php
include 'cabec.php';
$sql = "
	SELECT * FROM `questionarios`
";
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
                  <th style="width: 10px">#ID</th>
				  <th>Nome Questionário</th>
                  <th>Questão 1</th>
                  <th>Questão 2</th>
                  <th>Questão 3</th>
                  <th>Questão 4</th>
                  <th>Questão 5</th>
                  <th>Questão 6</th>
                  <th>Questão 7</th>
                  <th>Questão 8</th>
                  <th>Questão 9</th>
                  <th>Questão 10</th>				  
				  </tr>';
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo '<tr>
							<td>'.$row["ID_QUESTIONARIO"].'</td>
							<td>'.$row["NOME_QUESTIONARIO"].'</td>
							<td>'.$row["QUESTAO_1"].'</td>
							<td>'.$row["QUESTAO_2"].'</td>
							<td>'.$row["QUESTAO_3"].'</td>
							<td>'.$row["QUESTAO_4"].'</td>
							<td>'.$row["QUESTAO_5"].'</td>
							<td>'.$row["QUESTAO_6"].'</td>
							<td>'.$row["QUESTAO_7"].'</td>
							<td>'.$row["QUESTAO_8"].'</td>
							<td>'.$row["QUESTAO_9"].'</td>
							<td>'.$row["QUESTAO_10"].'</td>
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