<?php
include 'config.php';


$nAtividade 	= $_POST["nomeA"];
$Objetivo	= $_POST["obj"];

session_start();

//TODO Validar conteúdo da campanha
    $sql = "
    INSERT INTO atividades(DESCRICAO, OBJETIVO)
    VALUES ('".$nAtividade."','".$Objetivo."') ";

    if (!$result = $db->query($sql)) {
        $uploadOk = 0;
    }else {
        $uploadOk = 1;
    }

    $_SESSION["envioAti"] = $uploadOk;

  header("location: atividades.php");
  exit();

?>