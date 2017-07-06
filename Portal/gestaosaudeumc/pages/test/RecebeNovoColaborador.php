<?php
include 'config.php';

$nome 	          = $_POST["nomeC"];
$email	          = $_POST["email"];
$pass	            = $_POST["password"];
$perfil	          = $_POST["tipocolab"];
$matricula_fk     = $_POST["matricula"];
$cpf              = $_POST["cpf"];
$facebook         = $_POST["facebook"];
$twitter          = $_POST["twitter"];
$sexo             = $_POST["sexo"];
$altura           = $_POST["altura"];
$data_criacao     = date("Ymd");//date_default_timezone_get();//$_POST["tipocolab"];
$login            = $_POST["login"];

session_start();

$sql = "
INSERT INTO phh_colaborador (
  matricula_fk, nome, senha, cpf, email, facebook,
  twitter, sexo, altura, data_criacao)

VALUES (
  '$matricula_fk',
  '$nome',
  '$pass',
  '$cpf',
  '$email',
  '$facebook',
  '$twitter',
  '$sexo',
  '$altura',
  '$data_criacao');
";

    if (!$result = $db->query($sql)) {
        $uploadOk = 0;
    }else {
        $uploadOk = 1;
    }

/* Query  User */
//    INSERT INTO p_user(id_usuario, login, senha, nome, tipo, data_criacao, matricula_fk) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
$sql = "
INSERT INTO p_user(login, senha, nome, tipo, data_criacao, matricula_fk)
VALUES (
  '$login',
  '$pass',
  '$nome',
  '$perfil',
  '$data_criacao',
  '$matricula_fk');
";

echo $sql;
die();

    if (!$result = $db->query($sql)) {
        $uploadOk = 0;
    }else {
        $uploadOk = 1;
    }


    $_SESSION["envioColab"] = $uploadOk;

  header("location: novoColaborador.php");
  exit();

?>
