<?php
require_once "lib/nusoap.php";
 
class wsgestaosaude {

    public function registraUso($StringNumero) {

        $StringNumero = '{
            "questoes":[
                {
                    "colabid":"1",
                    "dtacesso":"20170608",
                    "pagina":"1"

                },

                {
                    "colabid":"1",
                    "dtacesso":"20170608",
                    "pagina":"1"

                },
                {
                    {"colabid":"1"},
                    {"dtacesso":"20170608"},
                    {"pagina":"1"}

                },
                {
                    {"colabid":"1"},
                    {"dtacesso":"20170608"},
                    {"pagina":"1"}

                },
                {
                    {"colabid":"1"},
                    {"dtacesso":"20170608"},
                    {"pagina":"1"}

                },
                {
                    {"colabid":"1"},
                    {"dtacesso":"20170608"},
                    {"pagina":"1"}

                },
            ]
        }';


        $dados = explode("_", $StringNumero);
        if (count($dados == 3)){
           $validacao = '0';

           // Tenta incluir no banco os dados passados
           $db = mysqli_connect('localhost','root','','u262445656_dbgs')
                    or die ('Could not connect to the database server' . mysqli_connect_error());
                mysqli_set_charset( $db, 'utf8' ); // Permite recebimento de acentos ex: ç,Á,ó e etc

            //adaptar a tabela criada
               $sql = "
                INSERT INTO tabela_acesso(usuario,  , nome, tipo_perfil)
                VALUES ('".$dados[0]."','".$dados[1]."','".$dados[2]."') 
                ";

               if ($result = $db->query($sql)) {
                   $validacao = '1';
               }

           //$retorno = '{"Soma":"'.strval(intval($dados[0]) + intval($dados[1])).'"}';
           //$retorno = "O Resultado da soma é: ".strval(intval($numeros[0]) + intval($numeros[1])) . "dwadaw";
           //$retorno = "<Webservice><resultado>".strval(intval($numeros[0]) + intval($numeros[1]))."</resultado></Webservice>";

           return array('type'=>$validacao);
        }else{
           return array('type'=>'0');
        }
    }
 
    public function getResult($StringNumero) {
        $numeros = explode("_", $StringNumero);
        if (count($numeros == 2)){
            $retorno = strval(intval($numeros[0]) + intval($numeros[1]));
            $retorno = '{"Soma":"'.strval(intval($numeros[0]) + intval($numeros[1])).'"}';
            //$retorno = "O Resultado da soma é: ".strval(intval($numeros[0]) + intval($numeros[1])) . "dwadaw";
            //$retorno = "<Webservice><resultado>".strval(intval($numeros[0]) + intval($numeros[1]))."</resultado></Webservice>";
           return array('type'=>$retorno);
        }else{
            return "Necessário passar 2 numeros separados por underline";
        }
    }

    public function validaUsu($StringUsuSenha) {
        $retorno = 0;
        $Dados = explode("_", $StringUsuSenha);
        if (count($Dados == 2)){
	    //     $db = mysqli_connect('mysql.hostinger.com.br','u262445656_gsusr','gestaosaude@123','u262445656_dbgs')
  
           $db = mysqli_connect('localhost','root','','u262445656_dbgs')
                or die ('Could not connect to the database server' . mysqli_connect_error());
            mysqli_set_charset( $db, 'utf8' ); // Permite recebimento de acentos ex: ç,Á,ó e etc

          $sql = "SELECT NOME FROM usuarios where CPF = '".strval($Dados[0])."' and PASSWORD = '".strval($Dados[1])."'";
          $result = $db->query($sql);
            
            if ($result->num_rows > 0) {
                //Usuario e senha Validos;
                $retorno = 1;
            }

            $retJson = '{"Status":"'.$retorno.'"}';
           return array('type'=>$retJson);
        }else{
            return array('type'=>$temp);
        } 
    }

	// Questionários
	public function retQuestionarios($usuario) {
        $retorno = 0;

        //$db = mysqli_connect('mysql.hostinger.com.br','u262445656_gsusr','gestaosaude@123','u262445656_dbgs')
  
        $db = mysqli_connect('localhost','root','','u262445656_dbgs')
            or die ('Could not connect to the database server' . mysqli_connect_error());
        mysqli_set_charset( $db, 'utf8' ); // Permite recebimento de acentos ex: ç,Á,ó e etc
		
        $sth = $db->query("SELECT * FROM questionarios ");
		//$sth = mysqli_query("SELECT * FROM atividades");
		$rows = array();

        while($r = $sth->fetch_assoc()) {
		//		while($r = mysqli_fetch_assoc($sth)) {
			$rows[] = $r;
		}
		$retJson = json_encode($rows);
		return array('type'=>$retJson);         
    }	
	
	
/*
    public function retQuestionarios($usuario) {
        $retorno = 0;
        
		$tempCabecJson = ' {"Questionarios":[';
		$tempItensJson =   l2
			  '{  
				 "ID":"1",
				 "nome":"Questionario 01",
				 "p1":"Pergunta 01",
				 "p2":"Pergunta 02",
				 "p3":"Pergunta 03"
			  },
			  {  
				 "ID":"2",
				 "nome":"Questionario 02",
				 "p1":"Pergunta 01",
				 "p2":"Pergunta 02",
				 "p3":"Pergunta 03"
			  },
			  {  
				 "ID":"3",
				 "nome":"Questionario 03",
				 "p1":"Pergunta 01",
				 "p2":"Pergunta 02",
				 "p3":"Pergunta 03"
			  }';
		$tempFimJson = ']}';
		$retJson = '{"Status":"'.$retorno.'"}';

		$retJson = $tempCabecJson.$tempItensJson.$tempFimJson;
        return array('type'=>$retJson);
         
    }
*/
	// Atividades
	public function retAtividades($usuario) {
        $retorno = 0;

        //$db = mysqli_connect('mysql.hostinger.com.br','u262445656_gsusr','gestaosaude@123','u262445656_dbgs')  
        $db = mysqli_connect('localhost','root','','u262445656_dbgs')
                or die ('Could not connect to the database server' . mysqli_connect_error());
            mysqli_set_charset( $db, 'utf8' ); // Permite recebimento de acentos ex: ç,Á,ó e etc
		
        $sth = $db->query("SELECT * FROM atividades");
		//$sth = mysqli_query("SELECT * FROM atividades");
		$rows = array();

        while($r = $sth->fetch_assoc()) {
		//		while($r = mysqli_fetch_assoc($sth)) {
			$rows[] = $r;
		}
		$retJson = json_encode($rows);
		return array('type'=>$retJson);         
    }
	
    // Fim classe
}
 
$server = new soap_server();
$server->configureWSDL("WebService Gestao Saude", "http://gestaosaudeumc.96.it/pages/webservice/wsgestaosaude");
//$server->configureWSDL("WebService Gestao Saude", "http://localhost/webservice/wsgestaosaude");
 
// Registros de WS 
//--> SOMA
$server->register("wsgestaosaude.getResult",
    array("type" => "xsd:string"),
    array("return" => "xsd:Array"),
    "http://gestaosaudeumc.96.it/pages/webservice/wsgestaosaude",
    "http://gestaosaudeumc.96.it/pages/webservice/wsgestaosaude#getResult",
    //"http://localhost/webservice/wsgestaosaude",
    //"http://localhost/webservice/wsgestaosaude#getResult",
    "rpc",
    "encoded",
    "Recebe 2 numeros separados por um _, ex: 2_5, entao ele soma 2 com 5");

//--> VALIDALOGIN
$server->register("wsgestaosaude.validaUsu",
    array("type" => "xsd:string"),
    array("return" => "xsd:Array"),
    //"http://gestaosaudeumc.96.it/pages/webservice/wsgestaosaude",
    //"http://gestaosaudeumc.96.it/pages/webservice/wsgestaosaude#validaUsu",
    "http://localhost/webservice/wsgestaosaude",
    "http://localhost/webservice/wsgestaosaude#validaUsu",
    "rpc",
    "encoded",
    "Recebe cpf e senha separados por um _, retorno : 1 se ok 0 se não");
 
//--> Envia Questionários
$server->register("wsgestaosaude.retQuestionarios",
    array("type" => "xsd:string"),
    array("return" => "xsd:Array"),
    //"http://gestaosaudeumc.96.it/pages/webservice/wsgestaosaude",
    //"http://gestaosaudeumc.96.it/pages/webservice/wsgestaosaude#retQuestionarios",
    "http://localhost/webservice/wsgestaosaude",
    "http://localhost/webservice/wsgestaosaude#retQuestionarios",
    "rpc",
    "encoded",
    "Recebe cpf e retornar um Json com todos os questionários do banco de dados");

//--> Envia Atividades
$server->register("wsgestaosaude.retAtividades",
    array("type" => "xsd:string"),
    array("return" => "xsd:Array"),
    //"http://gestaosaudeumc.96.it/pages/webservice/wsgestaosaude",
    //"http://gestaosaudeumc.96.it/pages/webservice/wsgestaosaude#retAtividades",
    "http://localhost/webservice/wsgestaosaude",
    "http://localhost/webservice/wsgestaosaude#retAtividades",
    "rpc",
    "encoded",
    "Retorna a lista de atividades cadastradas no portal");

@$server->service($HTTP_RAW_POST_DATA);


/*
		$tempItensJson =   
			  '{  
				 "ID":"1",
				 "nome":"Questionario 01",
				 "p1":"Pergunta 01",
				 "p2":"Pergunta 02",
				 "p3":"Pergunta 03"
			  }';
		$tempFimJson = ']}';
		*/
		/*
		$db = mysqli_connect('localhost','root','','u262445656_dbgs')
			or die ('Could not connect to the database server' . mysqli_connect_error());
        mysqli_set_charset( $db, 'utf8' ); // Permite recebimento de acentos ex: ç,Á,ó e etc
        
        $sql = "SELECT NOME FROM usuarios where CPF = '".strval($Dados[0])."' and PASSWORD = '".strval($Dados[1])."'";
        $result = $db->query($sql);
          
        if ($result->num_rows > 0) {
            //Usuario e senha Validos;
			$retorno = 1;
        }
			
		//$retJson = '{"Status":"'.$retorno.'"}';

		//$retJson = $tempCabecJson.$tempItensJson.$tempFimJson; 
		*/