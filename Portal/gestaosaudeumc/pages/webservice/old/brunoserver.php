<?php
require_once "../../libs/nusoap/lib/nusoap.php";
 
class somabruno {
 
    public function getResult($type) {
        return "olá ".$type
    }
}
 
$server = new soap_server();
$server->configureWSDL("foodservice", "http://www.greenacorn-websolutions.com/foodservice");
 
$server->register("somabruno.getResult",
    array("type" => "xsd:string"),
    array("return" => "xsd:string"),
    "http://www.greenacorn-websolutions.com/foodservice",
    "http://www.greenacorn-websolutions.com/foodservice#getFood",
    "rpc",
    "encoded",
    "Get food by type");
 
@$server->service($HTTP_RAW_POST_DATA);