<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 27MAR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 27MAR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 27MAR23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28MAR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $pedido    = $_REQUEST['pedido'];  // CARREGA O NUMERO DO PEDIDO  //
        $ped       = $_GET['ped']; // NUMERO DO PEDIDO //
        $tabela    = $usuario.$codigo; // MONTANDO TABELA //

        
         if(empty($pedido))
         {
                 $sql = mysqli_query($con,"SELECT memCodigoId FROM memoApagar");
                 while($_sql = mysqli_fetch_array($sql))
                 {
                     $num = $_sql['memCodigoId'];
                 }

                // ## QUERY PARA APAGAR O PEDIDO DA TABELA ## //
                $sql = mysqli_query($con,"DELETE FROM t0019 WHERE PED_NUM_PED = '$num'");
                // ## APAGANDO DA TABELA DE ITENS OS EQUIPAMENTOS DESTE PEDIDO ## //
                mysqli_query($con,"DELETE FROM t0020 WHERE PED_ITEM_NUM_PED = '$num'");

                 // ## APAGANDO DA TABELA DE RELATÓRIO ## //
                mysqli_query($con,"DELETE FROM relatorio WHERE relPedido = '$num'");

                // ##  BUSCANDO O NUMERO DO ULTIMO REGISTRO ## //
                $ult = mysqli_query($con,"SELECT PED_NUM_PED FROM t0019");
                while($ult3 = mysqli_fetch_array($ult))
                {
                     $num = $ult3['PED_NUM_PED'];
                }
                
                // ##  APAGANDO DA MEMORIA DEDICADA ## //
                mysqli_query($con,"UPDATE $tabela SET coringa01 = '$num'");
         }
         
         else
         {
                // ## QUERY PARA APAGAR O PEDIDO DA TABELA ## //
                $sql = mysqli_query($con,"DELETE FROM t0019 WHERE PED_NUM_PED = '$pedido'");
                // ## APAGANDO DA TABELA DE ITENS OS EQUIPAMENTOS DESTE PEDIDO ## //
                mysqli_query($con,"DELETE FROM t0020 WHERE PED_ITEM_NUM_PED = '$pedido'");

                // ## APAGANDO DA TABELA DE RELATÓRIO ## //
                mysqli_query($con,"DELETE FROM relatorio WHERE relPedido = '$pedido'");

                 // ##  BUSCANDO O NUMERO DO ULTIMO REGISTRO ## //
                $ult = mysqli_query($con,"SELECT PED_NUM_PED FROM t0019");
                while($ult3 = mysqli_fetch_array($ult))
                {
                     $num = $ult3['PED_NUM_PED'];
                }

                // ##  APAGANDO DA MEMORIA DEDICADA ## //
                mysqli_query($con,"UPDATE $tabela SET coringa01 = '$num'");
         }
       
        // LIMPANDO A TABELA DE MEMORIA //
        mysqli_query($con,"TRUNCATE memoApagar");

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