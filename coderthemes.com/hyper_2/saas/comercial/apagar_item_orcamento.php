<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 20ABR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 20ABR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 20ABR23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 20ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $numero    = $_GET['orcamento'];  // CARREGA O NUMERO DO ORÇAMENTO/PEDIDO  //
        

        // ## QUERY PARA O CONTEUDO NA TABELA DE MEMORIA ## //
        $sql = mysqli_query($con,"SELECT memDescricao FROM memoApagar WHERE memCodigoId = '$numero'");
        while($_sql = mysqli_fetch_array($sql))
        {
            $descricao = $_sql['memDescricao'];
        }

        // ## APAGANDO O REGISTRO DO ORÇAMENTO NA TABELA ## //
        mysqli_query($con,"DELETE FROM t0020 WHERE PED_ITEM_DESC_ITEM_PED = '$descricao' AND PED_ITEM_NUM_PED = '$numero'");

        // LIMPANDO A TABELA DE MEMORIA //
        mysqli_query($con,"TRUNCATE memoApagar");

        if(empty($sql))
        {// ERRO AO APAGAR O REGISTRO //
            print 0; 
        }

        else
        {// RETORNA SUCESSO AO APAGAR O REGISTRO //S
            print 1;
        }
?>