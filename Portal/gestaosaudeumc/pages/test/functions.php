<?php
// Arquivo de functions PHP para ser carregado no cabeçalho da pagina
function regLog($mensagem,$usuario,$pagina){
  include 'config.php'; // conecta banco de dados

  $erro = 1;

  $query = "  INSERT INTO `P_Historico`(`pag`, `acao`, `id_usuario`) ";
  $query .= " VALUES ('$pagina','$mensagem',$usuario) ";
  if (!$result = $db->query($query)) {
      $erro = 0;
  }

  return $erro;
}
?>
