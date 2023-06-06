<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 02JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 02JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 02JUN22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


/*###########################################################################*/
/* ###  ARQUIVO PARA PONTEIRO                -        SISTEMA INDATEC    ### */
/*###########################################################################*/

// ### INICIO DE CONTROLE E DISTRIBUIÇÃO DE FUNÇÕES DE TODO O SISTEMA ###  //
// ###  ROTINA PARA INICIAR A CONEXAO ### //
require 'inc/conexao.php';
require 'inc/sentinela.php';


    session_start(); // INICIA A SESSÃO //
    $ponteiro = $_REQUEST['sender']; // RECEBE NESTA VARIÁVEL O NOME DO USUARIO QUE VEM DO JAVASCRIPT NA PASTA MENU //
    $pesquisa = $_REQUEST['pesquisa']; // RECEBE NESTA VARIÁVEL O VALOR DA PESQUISA, QUE VEM COM O ID DO CLIENTE OU DA PESQUISA //
    $id       = $_REQUEST['id']; // RECEBE O ID DO CLIENTE COMO O INDICE //
    $usuario  = $_SESSION['usuario']; // CARREGA A VARIÁVEL COM O NOME DO CLIENTE POR SESSÃO //

    // PEGANDO O HORARIO E A DATA NO SERVIDOR //
    $data = Date('d/m/Y');
    $hora = Date('H:i:s');

    // ## SALVA O VALOR NA TABELA PARA INDICAR QUAL A TELA ## //
    // VALOR - 1  PARA TELA DE ABERTURA/INDEX
     

    // ## ATUALIZA A TABELA DE PONTEIRO  ## //
    mysqli_query($con,"UPDATE ponteiro SET ponPonteiro = '$ponteiro',ponPesquisa = '$pesquisa',ponDataInicial = '$data',ponHora = '$hora',ponIdUser = '$id' WHERE ponIdUser = '$id'");


   
    // APONTA PARA O ARQUIVO DE CONTROLE //
    header('Location:controller.php');
  
   // ## FINAL DE ENDEREÇAMENTO ## //

?>