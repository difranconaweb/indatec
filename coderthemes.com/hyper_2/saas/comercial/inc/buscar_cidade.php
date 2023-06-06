<?php
  require 'conexao.php';
    $UF  = $_GET['uf'];

    $sql = mysql_query("SELECT 'SELECIONE' FROM cidades  UNION SELECT cidCidades AS 'SELECIONE' FROM `cidades` WHERE cidUF = '$UF'");
   // $resultado = sprintf ('<option value="%s">SELECIONE %s</option>', 0, $option);
    $obj = mysql_fetch_array($sql);
    $num_cidades = mysql_num_rows($sql);


for($j=0;$j<$num_cidades;$j++){
	$dados = mysql_fetch_array($sql);
	$cidade= "<option value='".$dados['SELECIONE']."'>".$dados['SELECIONE'] ."</option>";
    print utf8_encode($cidade);
}
?>
