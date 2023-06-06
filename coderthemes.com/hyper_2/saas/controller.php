<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 02JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 02JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 02JUN22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11JUL22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26JAN23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


/*###########################################################################*/
/* ###  ARQUIVO CONTROLADORA DO PONTEIRO       -   SISTEMA INDATEC       ### */
/*###########################################################################*/

/* ### INICIO DE ARQUIVO QUE SOMENTE FAZ A CHAMADA DO ARQUIVO COMISSIONADO DE ACORDO COM O VALOR DA TABELA PONTEIRO ###  */
/* ###  ROTINA PARA INICIAR CONEXÃO ### */
require 'inc/conexao.php';
//require 'inc/sentinela.php';


    session_start(); // INICIA A SESSÃO //
    $usuario  = $_SESSION['usuario']; // RECEBE A SESSÃO DA PAGINA DE LOGIN.PHP //
    $id       = $_SESSION['id']; // RECEBE O ID DO USUÁRIO //
    $data = Date('d/m/Y');  // CARREGA A DATA
    $hora = Date('H:i:s');  // CARREGA A HORA



   // ## BUSCA NA TABELA PONTEIRO O ENDEREÇO DA PRÓXIMA PÁGINA COM REFERENCIA AO USUÁRIO ## //
    $sql = mysqli_query($con,"SELECT ponPonteiro FROM ponteiro WHERE ponIdUser = '$id'");
    
    while($obj = mysqli_fetch_array($sql))
    {
        $objPonteiro = $obj["ponPonteiro"]; // AQUI ESTÁ O VALOR DO ENDEREÇO DA PROXIMA PÁGINA //
    }
        

    // ## VERIFICA QUAL É A PÁGINA SER CHAMADA  ## //
    if($objPonteiro == 0)
    {// ## VALOR DE 0 ENCERRA O LOGIN PARA ESTE  USUARIO ## //
     //   include_once("indatec/login/memoEncerrar.php?id='$id'");
      header("Location:http://www.indafire.ind.br");
    }
 
    else if($objPonteiro == 1)
    {// ## VALOR DE 1 APONTA PARA A ARQUIVO INDEX.PHP PARAA GERENCIA ## //
        include_once("index.php"); 
    }

    else if($objPonteiro == 2)
    {// ## VALOR DE 2 APONTA PARA O ARQUIVO DESIGNADO PARA COMERCIAL ## //
        include_once("indexComercial.php"); 
    }

    else if($objPonteiro == 3)
    {// ## VALOR DE 3 APONTA PARA O ARQUIVO DESIGNADO PARA PROJETOS ## //
        include_once("indexProjetos.php"); 
    }

    else if($objPonteiro == 4)
    {// ## VALOR DE 4 APONTA PARA O ARQUIVO DESIGNADO PARA FINANCEIRO ## //
        include_once("indexFinanceiro.php"); 
    }

    else if($objPonteiro == 5)
    {// ## VALOR DE 5 APONTA PARA O ARQUIVO FOMR-WIZARD-ORCAMENTO ## //
        include_once("comercial/form-wizard-orcamento.php");
    }

    else
    {
       header("Location:http://www.indafire.ind.br");
    }
?>