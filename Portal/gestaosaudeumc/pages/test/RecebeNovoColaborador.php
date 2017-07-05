<?php
include 'config.php';


$nome 	= $_POST["nomeC"];
$email	= $_POST["email"];
$pass	= $_POST["password"];
$perfil	= $_POST["tipocolab"];

session_start();

//TODO Validar conteúdo da campanha
    $sql = "
    INSERT INTO usuarios(email, password, nome, tipo_perfil)
    VALUES ('".$email."','".$pass."','".$nome."','".$perfil."') ";

    if (!$result = $db->query($sql)) {
        $uploadOk = 0;
    }else {
        $uploadOk = 1;
    }

    $_SESSION["envioColab"] = $uploadOk;

  header("location: novoColaborador.php");
  exit();

?>