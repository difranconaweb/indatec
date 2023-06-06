<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 03ABR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 03ABR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 03ABR23


   
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */
//Garantir que seja lido sem problemas
  require 'inc/conexao.php';
header("Content-Type: text/plain");

//Capturar CNPJ
$cnpj = $_GET["cnpj"];

// ## VERIFICANDO SE JÁ CONSTA O CADASTRO NA BASE ## //
$sql = mysqli_query($con,"SELECT CLI_CNPJ_CLI FROM t0013 WHERE CLI_CNPJ_CLI  = '$cnpj'");
while($_sql = mysqli_fetch_array($sql))
{
    $cnpj3 = $_sql['CLI_CNPJ_CLI'];
}
// ## VERIFICA SE O CNPJ JÁ CONSTA NA TABELA
if(empty($cnpj3))
{    
	//Criando Comunicação cURL
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://www.receitaws.com.br/v1/cnpj/".$cnpj);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Descomente esta linha apenas se você não usar HTTPS, ou se estiver testando localmente
	$retorno = curl_exec($ch);
	curl_close($ch);

	$retorno = json_decode($retorno); //Ajuda a ser lido mais rapidamente
	echo json_encode($retorno, JSON_PRETTY_PRINT);
}

else
{
    print 0;
}

?>