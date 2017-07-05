<?php
require 'config.php';

session_start();		//Inicia seção
$_SESSION['logado'] = 0;

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
		if (!isset($_POST['email']) or !isset($_POST['password']) ) {
			// Variáveis não recebidas
			echo 0;
			exit;
		}
	  
		$myusername = mysqli_real_escape_string($db,$_POST['email']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

		$row_cnt = 0; // Zera variável caso não encontrado
	  
		if ($result = mysqli_query($db, "SELECT nome,email,TIPO_PERFIL,ID_USUARIO from USUARIOS where email = '$myusername' and password = '$mypassword'")) {

			if (mysqli_num_rows($result) > 0) {
	     
                            // Seta variáveis iniciais de usuário
                            $_SESSION['login_user'] = $myusername;
                            $_SESSION['logado'] = 1;
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['nome']=$row["nome"];
                            $_SESSION['email']=$row["email"];
                            $_SESSION['perfil']=$row["TIPO_PERFIL"];
                            $_SESSION['IDUSUARIO']=$row["ID_USUARIO"];
                            
                            
                            
                            /* close result set */
                            mysqli_free_result($result);	

                            echo 1;	//Responde sucesso
			
			}else {
				echo "SELECT nome,email,TIPO_PERFIL,ID_USUARIO from USUARIOS where email = '$myusername' and password = '$mypassword'";
				echo 0; // Retorna 0 no AJAX
			}
		}
   
   }else{
	   echo 0; // Retorna 0 no AJAX
   }
?>