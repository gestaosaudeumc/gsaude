<?php
include 'config.php';
$nCampanha      = $_POST["txtNomCampanha"];
$txtCampanha    = $_POST["txtCampanha"];

//https://www.w3schools.com/php/php_file_upload.asp
session_start();

if (!empty($_FILES["fileToUpload"]["name"])){
	
	$target_dir = "../../dist/campanhas/";

	//TODO 
	$target_file = $target_dir . date('his-jmy_') .basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.<br>";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}else{
	// Se nao foi enviado imagem assume a variavel de check como 1 e a imagem como default
	$uploadOk = 1; 
	$target_file = '../../dist/campanhas/default.jpg';
}

// Cria Arquivo com informações da Campanha
//TODO Validar conteúdo da campanha
if ($uploadOk==1){
    // Perform an SQL query
	
    $sql = "INSERT INTO campanhas(TITULO,TEXTO_CAMPANHA,CAMINHO_IMAGEM) 
        VALUES ('".$nCampanha."','".$txtCampanha."','".$target_file."')";

    if (!$result = $db->query($sql)) {
        // Oh no! The query failed. 
        echo "Sorry, the website is experiencing problems.";

        // Again, do not do this on a public site, but we'll show you how
        // to get the error information
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $db->errno . "\n";
        echo "Error: " . $db->error . "\n";
        exit;
    }else {
        echo "Query OK";
        
    }


}


  $_SESSION["envioCampanha"] = $uploadOk;

  header("location: campanha.php");
  exit();
?>