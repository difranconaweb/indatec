<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 24MAR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 24MAR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 24MAR23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27MAR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $descricao = $_GET['descricao'];  // CARREGA A DESCRIÇÃO DO ITEM NO ORÇAMENTO  //
        $pedido    = $_GET['pedido'];  // CARREGA NUMERO DO PEDIDO  //
        $tabela = $usuario.$codigo; // NOME DA TABELA //

        // ## QUERY PARA REGISTRAR O NUMERO DO ORÇAMENTO E A DESCRICÇÃO ## //
         mysqli_query($con,"UPDATE $tabela SET coringa01 = '$pedido'");

         print 1;
?>