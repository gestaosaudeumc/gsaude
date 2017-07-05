<?php
   /*
   define('DB_SERVER', 'mysql.hostinger.com.br');
   define('DB_USERNAME', 'u262445656_gsusr');
   define('DB_PASSWORD', 'gestaosaude@123');
   */
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   
   define('DB_DATABASE', 'u262445656_dbgs');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE)
		or die ('Could not connect to the database server' . mysqli_connect_error());
	mysqli_set_charset( $db, 'utf8' ); // Permite recebimento de acentos ex: ç,Á,ó e etc
?>