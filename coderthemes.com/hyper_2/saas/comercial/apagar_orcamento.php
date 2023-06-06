<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 07NOV22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 07NOV22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 07NOV22



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 20ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $orcamento = $_REQUEST['numero'];  // CARREGA O NUMERO DO ORÇAMENTO  //
        $num       = $_GET['orc']; // NUMERO DO ORÇAMENTO //
        

        
         if(empty($orcamernto))
         {
                 $sql = mysqli_query($con,"SELECT memCodigoId FROM memoApagar");
                 while($_sql = mysqli_fetch_array($sql))
                 {
                     $num = $_sql['memCodigoId'];
                 }

                // ## QUERY PARA APAGAR O ORÇAMENTO DA TABELA ## //
                $sql = mysqli_query($con,"DELETE FROM t0019 WHERE PED_NUM_PED = '$num'");
                // ## APAGANDO DA TABELA DE ITENS OS EQUIPAMENTOS DESTE PEDIDO ## //
                mysqli_query($con,"DELETE FROM t0020 WHERE PED_ITEM_NUM_PED = '$num'");
         }
         
         else
         {
                // ## QUERY PARA APAGAR O ORÇAMENTO DA TABELA ## //
                $sql = mysqli_query($con,"DELETE FROM t0019 WHERE PED_NUM_PED = '$orcamento'");
                // ## APAGANDO DA TABELA DE ITENS OS EQUIPAMENTOS DESTE PEDIDO ## //
                mysqli_query($con,"DELETE FROM t0020 WHERE PED_ITEM_NUM_PED = '$orcamento'");
         }
       
        // LIMPANDO A TABELA DE MEMORIA //
        mysqli_query($con,"TRUNCATE memoApagar");
//
        // ## SE TUDO DER CERTO VOLTA VALOR 1 SENAO VALOR 00  ## //
        if(empty($sql))
        {
             print 0;
        }

        else
        {
             print 1;
        }
?>