<?php
include 'config.php';

$nAtividade 	= $_POST["nomeM"];
$Objetivo	= $_POST["descricaoMeta"];


session_start();

    $sql = "
    INSERT INTO atividades(DESCRICAO, OBJETIVO)
    VALUES ('".$nAtividade."','".$Objetivo."') ";

//INSERT INTO `phh_item`( `nome`, `descricao`, `tipo`, `pontuacao_xp`, `imagem`) VALUES ('teste','descricao','1','2',123)

    if (!$result = $db->query($sql)) {
        $uploadOk = 0;
    }else {
        $uploadOk = 1;
    }

    $_SESSION["envioAti"] = $uploadOk;

  header("location: atividades.php");
  exit();

?>
