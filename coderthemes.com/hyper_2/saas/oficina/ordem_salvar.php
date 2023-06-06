<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 12MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 12MAI23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23 - RES000101/13BR  

https://www.free-css.com/free-css-templates
   
ARQUIVO PARA SALVAR O REGISTRO SELECIONADO PARTINDO DO ARQUIVO ASSP-OFICINA.PHP */


require 'inc/conexao.php';


session_start();
$usuario  = $_SESSION['usuario'];
$codigo   = $_SESSION['id'];

$ordem    = $_GET['ordem'];  // CARREGA O CODIGO ID DA ORDEM SELECIONADA NA TELA APPS-OFICINA.PHP  //
$tabela   = $usuario.$codigo; // CRIANDO O NOME DA TABELA PARA ENCONTRAR NA BASE DE DADOS //


// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$sql = mysqli_query($con,"SELECT funPrimNome,funCargo,funFoto FROM funcionarios WHERE funCodigo = '$codigo'");
while($obj = mysqli_fetch_array($sql))
{
    $nome  = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $obj['funCargo'];    // CARGO DO USUARIO //
    $foto  = $obj['funFoto'];     // FOTO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

// ## BUSCANDO O NUMERO DO CLIENTE ## //
$cli = mysqli_query($con,"SELECT PED_COD_CLI FROM t0019 WHERE PED_NUM_PED = '$ordem'");
while($_cli = mysqli_fetch_array($cli))
{
    $cliente = $_cli['PED_COD_CLI'];
}

// SALVANDO O REGISTRO SELECIONADO DENTRO DA TABELA DE USUÁRIO //
mysqli_query($con,"UPDATE $tabela SET coringa01 = '$ordem', coringa02 = '$cliente'");

print 1;

?>
