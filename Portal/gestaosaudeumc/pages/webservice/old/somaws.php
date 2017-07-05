<?php
require_once "../../libs/nusoap/lib/nusoap.php";

function getSoma($StringNumero) {
	//Espera receber números no seguinte formato 5_4
	// one 5 é o numero 1 e 4 o numero 2
	$numeros = explode("_", $StringNumero);
	if (count($numeros == 2)){
		return intval($numeros[0]) + intval($numeros[1]);
	}else{
		return "Necessário passar 2 numeros separados por underline";
	}
}

$server = new soap_server();
$server->configureWSDL("somaws", "urn:somaws");

$server->soap_defencoding = 'utf-8';

$server->register("getSoma",
			array("StringNumero" => "xsd:string"),
			array("return" => "xsd:int"),
			"urn:somaws",
			"urn:somaws#getSoma",
			"rpc",
			"encoded",
			"Soma numeros passados por parametro separado por _");
$server->service('php://input');
//$server->service($HTTP_RAW_POST_DATA);