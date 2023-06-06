<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 31MAR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 31MAR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 31MAR23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31MAR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $pesquisa  = $_REQUEST['pesquisa'];  // CARREGA O VALOR DA PESQUISA PARA A CARGA DA TABELA  //
        $codex     = $_REQUEST['ccli'];  // CARREGA O CODIGO DO  CLIENTE  //
        $tabela    = $usuario.$codigo; // CARREGA NESTA VARIÁVEL O NOME DA TABELA TEMPORÁRIA //


        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');
        $dataCompleta = $ano.'-'.$mes.'-'.$dia;

       
        // ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
        $sql = mysqli_query($con,"SELECT funPrimNome,funEmail FROM funcionarios WHERE funNome = '$usuario'");
        while($obj = mysqli_fetch_array($sql))
        {
            $funEmail = $obj['funEmail'];    // EMAIL DO USUARIO //
        }
        // ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //



        // ## VERIFICA NA VARIAVEL DE PONTEIRO SE CONSTA O NOME DO CLIENTE PARA A PESQUISA  ## //
        if(empty($codex))
        {
             // BUSCANDO O CLIENTE PARA ENCONTRAR SEU ID E SALVAR NA TABELA DE USUARIO //
            $cli = mysqli_query($con,"SELECT CLI_COD_CLI FROM t0013 WHERE CLI_RAZ_SOC_CLI = '$pesquisa'");
            while($_cli = mysqli_fetch_array($cli))
            {
                $codex = $_cli['CLI_COD_CLI'];
            }

            // ## SALVANDO AS INFORMAÇÕES NA TABELA DE DE USUARIO NUMERO  DO CLIENTE ## //
            mysqli_query($con,"UPDATE $tabela SET coringa01 = '$codex'");
        }

        else
        {
           // ## SALVANDO AS INFORMAÇÕES NA TABELA DE USUARIO NUMERO DO CLIENTE ## //
            mysqli_query($con,"UPDATE $tabela SET coringa01 = '$codex'");
        }
       
       
            // ## APONTANDO PARA A TELA DE CADASTRO DE CLIENTE ## //
            header('Location:form-elements.php');
      
    
?>