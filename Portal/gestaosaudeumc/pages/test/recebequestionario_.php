<?php
include 'config.php';
session_start();

$Nquestionario      = $_POST["Nquestionario"];
$descQuestionario   = $_POST["descQuestionario"];
$questao1 	        = $_POST["q1"];
$questao2           = (isset($_POST["q2"])? $_POST["q2"] : '');
$questao3           = (isset($_POST["q3"])? $_POST["q3"] : '');
$questao4           = (isset($_POST["q4"])? $_POST["q4"] : '');
$questao5           = (isset($_POST["q5"])? $_POST["q5"] : '');
$questao6           = (isset($_POST["q6"])? $_POST["q6"] : '');
$questao7           = (isset($_POST["q7"])? $_POST["q7"] : '');
$questao8           = (isset($_POST["q8"])? $_POST["q8"] : '');
$questao9           = (isset($_POST["q9"])? $_POST["q9"] : '');
$questao10          = (isset($_POST["q10"])? $_POST["q10"] : '');

//https://www.w3schools.com/php/php_file_upload.asp

//TODO Validar conteúdo da campanha
/*    $sql = " 
    INSERT INTO questionarios(NOME_QUESTIONARIO, QUESTAO_1, QUESTAO_2, QUESTAO_3, QUESTAO_4, QUESTAO_5, QUESTAO_6, QUESTAO_7, QUESTAO_8, QUESTAO_9, QUESTAO_10)
    VALUES ('".$Nquestionario."','".$questao1."','".$questao2."','".$questao3."','".$questao4."'
        ,'".$questao5."','".$questao6."','".$questao7."','".$questao8."','".$questao9."','".$questao10."') ";

    if (!$result = $db->query($sql)) {
        $uploadOk = 0;
    }else {
        $uploadOk = 1;
    }

    $_SESSION["envioQuestionario"] = $uploadOk;

  header("location: questionario.php");
  exit();
*/

  echo $Nquestionario;

?>