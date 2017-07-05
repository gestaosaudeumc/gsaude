<?php

session_start();

session_destroy();
try{
	header("location: http://gestaosaudeumc.96.it/index.php");//http://localhost/cotaweb/index.php");
} catch(Exception $e){

}

try{
	header("location: http://localhost/gestaosaudeumc/index.php");
} catch(Exception $e){
	
}

exit();	
?>