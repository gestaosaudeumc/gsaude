<?php

$retorno = (isset($_GET["check"])? $_GET["check"] : '');

echo '<br>'.$retorno;

$retornoz = (isset($_GET["check1"])? $_GET["check1"] : '');

//echo '<br>'.$retorno.'<br>'.$retornoz;

if (!EMPTY($retorno)){
	echo 'teste';
}else{
	echo 'naoretornou';
}
 
?>