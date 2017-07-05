
<?php

class server{
    public function __construct() {
        
    }
    
    public function getSoma($num1,$num2){
        return $num1+$num2;
    }
    
}

$params = array('uri'=>'gestaosaudeumc/pages/test/soma.php');
$server = new SoapServer(NULL, $params);
$server->setClass('soma');
$server->handle();


//phpinfo();
/*if(!isset($_GET["num1"]) or !isset($_GET["num2"])){
	exit();	
}
if (($_GET["num1"] === "") or ($_GET["num2"] === "")){
	exit();
}

$soma = $_GET["num1"]+$_GET["num2"];
header('Content-Type: application/xml');
$xml = '<?xml version="1.0"?>                                            ';
$xml .= '                                                                  ';
$xml .= ' <soap:Envelope                                                   ';
$xml .= ' xmlns:soap="http://www.w3.org/2003/05/soap-envelope/"            ';
$xml .= ' soap:encodingStyle="http://gestaosaudeumc.96.lt/pages/test/soma.php">    ';
$xml .= ' <soap:Body>                                                      ';
$xml .= '   <m:GetSoma xmlns:m="http://gestaosaudeumc.96.lt/pages/test/soma.php">        ';
$xml .= '     <m:Resultado>$resultado</m:Resultado>                        ';
$xml .= '   </m:GetSoma>                                                  ';
$xml .= ' </soap:Body>                                                     ';
$xml .= '                                                                  ';
$xml .= ' </soap:Envelope>												   ';	


echo $xml;
//http://localhost/tests/soma.php?num1=3&num2=4

*/
?>