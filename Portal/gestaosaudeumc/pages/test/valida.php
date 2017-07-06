<?php
require 'config.php';

session_start();		//Inicia seção
$_SESSION['logado'] = 0;

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

		if (!isset($_POST['usuario']) or !isset($_POST['password']) ) {
			// Variáveis não recebidas
			echo 0;
			exit;
		}


		$myusername = mysqli_real_escape_string($db,$_POST['usuario']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']);

		$row_cnt = 0; // Zera variável caso não encontrado

    $query = "SELECT tipo,nome,id_usuario FROM p_user  where  ";
    $query .= " login = '$myusername' ";
    $query .= " and senha = '$mypassword' ";

    if ($result = mysqli_query($db, $query)) {

			if (mysqli_num_rows($result) > 0) {

        // Recuperar data de unix
        //mysql> SELECT FROM_UNIXTIME(1447430881);
        //-> '2015-11-13 10:08:01'

        // Seta variáveis iniciais de usuário
          $_SESSION['login_user'] = $myusername;
          $_SESSION['logado'] = 1;

          $row = mysqli_fetch_assoc($result);
          $_SESSION['nome']=$row["nome"];
          $_SESSION['perfil']=$row["tipo"];
          $_SESSION['IDUSUARIO']=$row["id_usuario"];

          // close result set
          mysqli_free_result($result);
          echo 1;	//Responde sucesso ao AJAX

			}else {
				echo 0; // Retorna 0 no AJAX
			}
		}

   }else{
	   echo 0; // Retorna 0 no AJAX
   }
?>
