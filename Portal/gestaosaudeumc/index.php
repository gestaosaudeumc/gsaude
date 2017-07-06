<?php
if (!empty($_POST)) {
  die("<pre>" . print_r($_POST, true) . "</pre>");
}

session_start();

try{
  if (isset($_SESSION['logado'])){
    if ($_SESSION['logado']==1){

    try{
      header("location: http://gestaosaudeumc.96.it/pages/test/starter.php");//http://localhost/cotaweb/index.php");
    } catch(Exception $e){}
    try{
      header("location: http://localhost/gestaosaudeumc/pages/test/starter.php");
    } catch(Exception $e){}

    }
  }
}catch(Exception $e){}
// se logado direcionar para pagina starter
//if ($_SESSION['logado'] == 1){}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestao Saude | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>


  <!-- Código para Login AJAX -->
	<script type="text/javascript">

		$(document).ready(function(){
			$('#errolog').hide(); //Esconde o elemento com id errolog
			$('#formlogin').submit(function(){ 	//Ao submeter formulário
				var usuario=$('#usuario').val();	//Pega valor do campo usuario
				var password=$('#password').val();	//Pega valor do campo senha
				$.ajax({			//Função AJAX
					url:"pages/test/valida.php",			//Arquivo php
					type:"post",				//Método de envio
					data: "usuario="+usuario+"&password="+password,	//Dados
					success: function (result){			//Sucesso no AJAX
								if(result==1){
									location.href='pages/test/starter.php'	//Redireciona
								}else{

									$("#errolog").fadeTo(1000, 500).slideUp(500, function(){
										$("#errolog").slideUp(500);
									});
								}
							}
				})
				return false;	//Evita que a página seja atualizada
			})
		})

	</script>


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Gestão</b>Saúde
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Coloque seus dados abaixo para entrar</p>

	<div id="errolog" class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Usuário ou senha incorretos</strong>
	</div>
    <form id="formlogin" method="post">
      <div class="form-group has-feedback">
      <input id="usuario" type="text" class="form-control" placeholder="Usuario" required >
      <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control" placeholder="Password" required >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      <p style="color:red" id="senhainc" ></p>
      </div>

      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">

          <button  class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
<!-- Por enquanto sem login por Social Media
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
-->
    </div>
    <!-- /.social-auth-links -->

    <!-- TODO Fazer pagina
    <a href="#">Esqueci minha senha</a><br>
    <!--
      <a href="register.html" class="text-center">Cadastre-se</a>
    -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
