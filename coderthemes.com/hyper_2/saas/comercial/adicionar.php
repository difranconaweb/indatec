<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 07NOV22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 07NOV22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 07NOV22



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27MAR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

// ## ROTINA PARA INSERIR REGISTRO DE EQUIPAMENTO AO ORÇAMENTO OU PEDIDO  ## //
require 'inc/conexao.php';


        session_start();
        $usuario         = $_SESSION['usuario'];
        $codigo          = $_SESSION['id'];
        $data            = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $numero          = $_GET['numero'];  // CARREGA O NUMERO DO ORÇAMENTO  //
        $quantidade      = $_GET['quantidade'];  // QUANTIDADE  //
        $codeEquipamento = $_GET['codeEquipamento'];  // CODIGO DO EQUIPAMENTO //
        $equipamento     = $_GET['equipamento'];  // NOME E DESCRICAO DO EQUIPAMENTO //

        // TIMER //
        $hora = date('H:i:s');
        $dia  = date('d');
        $mes  = date('m');
        $ano  = date('Y');
        $dataCompleta = $ano.'-'.$mes.'-'.$dia;
       // ############### // 
        

        // ## QUERY PARA SALVAR O REGISTRO EM TABELA ## //
        $sql = mysqli_query($con,"INSERT t0020 (PED_ITEM_COD_EMP, PED_ITEM_NUM_PED, PED_ITEM_COD_ITEM,  PED_ITEM_DESC_ITEM_PED, PED_ITEM_QTD_ITEM, PED_ITEM_VAL_UN_ITEM, PED_ITEM_VAL_UN_ITEM_DESC_TAB, PED_ITEM_TOTAL_ITEM, PED_ITEM_COD_USU_ULT_ALT_PED, PED_ITEM_DAT_ULT_ALT_PED, PED_ITEM_HOR_ULT_ALT_PED) VALUES (1,'$numero','$codeEquipamento','$equipamento','$quantidade','','','','$usuario','$dataCompleta','$hora')");

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