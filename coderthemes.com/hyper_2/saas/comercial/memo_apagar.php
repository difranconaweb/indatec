<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 20MAR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 20MAR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 20MAR23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 20ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $descricao = $_GET['descricao'];  // CARREGA A DESCRIÇÃO DO ITEM NO ORÇAMENTO  //
        $numero    = $_GET['numero'];  // CARREGA NUMERO DO ORÇAMENTO  //
        

        // ## QUERY PARA REGISTRAR O NUMERO DO ORÇAMENTO E A DESCRICÇÃO ## //
         mysqli_query($con,"INSERT INTO memoApagar (memDescricao, memCodigoId) VALUES ('$descricao','$numero')");

         // ## RETORNO ## //
         print 1;
?>