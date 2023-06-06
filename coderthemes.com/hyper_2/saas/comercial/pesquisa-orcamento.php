<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 03NOV22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 03NOV22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 03NOV22



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03NOV22 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';


        session_start();
        $usuario  = $_SESSION['usuario'];
        $codigo   = $_SESSION['id'];
        $data     = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $pesquisa = $_REQUEST['pesquisa'];  // CARREGA O VALOR DA PESQUISA PARA A CARGA DA TABELA  //
        $email    = $_REQUEST['email'];  // CARREGA O EMAIL DO USUARIO PARA ENCONTRA-LO NA TABELA DE PONTEIRO  //


        // ## SALVANDO AS INFORMAÇÕES NA TABELA DE PONTEIRO ## //
        mysqli_query($con,"UPDATE ponteiro SET ponPesquisa = '$pesquisa' WHERE ponResponsavel = '$email'");

        // ## APONTANDO PARA A TELA DE ORÇAMENTO ## //
        header('Location:form-wizard-orcamento.php');
?>