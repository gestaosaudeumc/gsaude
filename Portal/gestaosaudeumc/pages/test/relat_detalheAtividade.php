<?php
 include 'cabec.php';

 if (isset($_GET["id"]) && $_GET["id"]>0){
    $id = $_GET["id"];

	 // Recupera informação de funcionário
	$sql = "
	SELECT ID_USUARIO,NOME FROM usuarios
	WHERE ID_USUARIO = ".$id."";
	$result = $db->query($sql);
	if ($result){
		while($row = $result->fetch_assoc()) {
			$nomeUsuario = $row["NOME"]; 
		}
	}else{
		echo "Sorry, the website is experiencing problems.";

        // Again, do not do this on a public site, but we'll show you how
        // to get the error information
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $db->errno . "\n";
        echo "Error: " . $db->error . "\n";
        exit;
	}
	 
	 $sql = "
	SELECT u.NOME,at.DESCRICAO,at.OBJETIVO,count(ATIVIDADE) nAtividades 
	FROM atividades_x_colaborador b 
	inner join atividades at on at.ID_ATIVIDADE = b.ATIVIDADE 
	inner join usuarios u on b.colaborador = u.ID_USUARIO 
	WHERE b.colaborador = ".$id." group by ATIVIDADE
	";
	$result = $db->query($sql);

 }else{
	header("location: relat_atividades.php");
	exit();
 }

echo '
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Relatório de atividades realizadas por : '.$nomeUsuario.'
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
                  <th>Número de praticas</th>
                  <th>Descrição da atividade</th>
                  <th>Objetivo da atividade</th>
                </tr>';
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
					echo '	<tr>					
								<td>'.$row["nAtividades"].'</td>
								<td>'.$row["DESCRICAO"].'</td>								
								<td>'.$row["OBJETIVO"].'</td>
							</tr>';        
                    }
                } else {
                    echo '<tr><td Style="text-align: center;">SEM RESULTADOS</td></tr>';
                }
                
               echo '  
              </tbody></table>
            </div>
          </div>

    </div>

';




$db->close();

include 'footer.php';