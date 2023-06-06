<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 18ABR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 18ABR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 18ABR23


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 18ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';
//require 'inc/sentinela.php';


session_start();
$usuario   = $_SESSION['usuario'];
$codigo    = $_SESSION['id'];
$data      = Date('d/m/Y');
$hora      = Date('H:y');
$mes       = Date('m');
$ano       = Date('Y');
$dia       = Date('d');


// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$sql = mysqli_query($con,"SELECT funPrimNome,funCargo,funFoto,funEmail,funTelefone,funCidade,funUF FROM funcionarios WHERE funCodigo = '$codigo'");
while($obj = mysqli_fetch_array($sql))
{
    $nome     = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo    = $obj['funCargo'];    // CARGO DO USUARIO //
    $foto     = $obj['funFoto'];    // FOTO DO USUARIO //
    $email    = $obj['funEmail'];
    $telefone = $obj['funTelefone'];
    $cidade   = $obj['funCidade'];
    $uf       = $obj['funUF'];
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

// VARIÁVEL COM  O NOME DA TABELA //
$tabela1 = strtoupper($nome).'1';
$tabela  = strtoupper($nome).'_chat';


// ## CRIANDO  TABELA TEMPOARIA DE CHAT ## //
$pri =  mysqli_query($con,"CREATE TABLE IF NOT EXISTS $tabela (codigo INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(50) NOT NULL, texto VARCHAR(300) NOT NULL, nomeConvidado VARCHAR(50), textoConvidado VARCHAR(300), hora CHAR(10) NOT NULL, data CHAR(10) NOT NULL, chave CHAR(50) NOT NULL, coringa char(20) NOT NULL)");

// ## LIMPANDO A TABELA CASO ELA JÁ EXISTA PARA NÃO DUPLICAR REGISTRO ## //
mysqli_query($con,"DELETE FROM $tabela");


// ## ENCAMINHANDO À TELA DE CHAT  ## //
header('Location:apps-chat.php');

?>