<?php
require_once "../../libs/nusoap/lib/nusoap.php";
 
class soma {
 
    public function getResultado($numeros) {
        $numeros = explode("_", $StringNumero);
		if (count($numeros == 2)){
			return intval($numeros[0]) + intval($numeros[1]);
		}else{
			return "Necessário passar 2 numeros separados por underline";
		} 
    }
}
 
$server = new soap_server();
$server->configureWSDL("somaservice", "http://localhost/gestaosaudeumc/somaservice");
 
$server->register("soma.getResultado",
    array("type" => "xsd:string"),
    array("return" => "xsd:int"),
    "http://localhost/gestaosaudeumc/somaservice",
    "http://localhost/gestaosaudeumc/somaservice#getResultado",
    "rpc",
    "encoded",
    "Pegar soma de numeros separados");
 
@$server->service($HTTP_RAW_POST_DATA);