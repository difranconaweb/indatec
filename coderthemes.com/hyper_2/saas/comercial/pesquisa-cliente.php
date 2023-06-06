<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 03NOV22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 03NOV22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 03NOV22



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28MAR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $pesquisa  = $_REQUEST['pesquisa'];  // CARREGA O VALOR DA PESQUISA PARA A CARGA DA TABELA  //
        $email     = $_REQUEST['email'];  // CARREGA O EMAIL DO USUARIO PARA ENCONTRA-LO NA TABELA DE PONTEIRO  //
        $codex     = $_REQUEST['ccli'];  // CARREGA O CODIGO DO  CLIENTE  //
        $numero    = $_REQUEST['numero']; 
        $param     = $_REQUEST['param'];// CARREGA O NUMERO DO ORÇAMENTO/PEDIDO - ATENÇÃO : SE VIER VALENDO 01 VAI PARA ORÇAMENTO SE VIER VALENDO 02 VAI PARA PEDIDO // 
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
        if(empty($pesquisa) AND empty($codex))
        {
            $sql = mysqli_query($con,"SELECT PED_COD_CLI FROM t0019");
            while($obj = mysqli_fetch_array($sql))
            {
                $codCli = $obj['PED_COD_CLI']; // CODIGO DO CLIENTE //
            }
            // ## SALVANDO AS INFORMAÇÕES NA TABELA DE PONTEIRO ## //
            mysqli_query($con,"UPDATE ponteiro SET ponPesquisa = '$codCli' WHERE ponResponsavel = '$email'");
        }

        else
        {
            $sql = mysqli_query($con,"SELECT CLI_COD_CLI, CLI_RAZ_SOC_CLI, CLI_EMAIL_CONT_CLI FROM t0013 WHERE CLI_COD_CLI = '$codex' OR CLI_RAZ_SOC_CLI LIKE '%$pesquisa%'");
            while($obj = mysqli_fetch_array($sql))
            {
                $razao  = $obj['CLI_RAZ_SOC_CLI']; // NOME DO CLIENTE //
                $codex  = $obj['CLI_COD_CLI']; // CODIGO DO CLIENTE //
                $email  = $obj['CLI_EMAIL_CONT_CLI']; // CARREGA O EMAIL DO CLIENTE QUE VEM DA PESQUISA //
            }

           // ## INSERINDO O CLIENTE PESQUISADO NO ORÇAMENTO/PEDIDO QUE ESTÁ ABERTO ## //
            mysqli_query($con,"UPDATE t0019 SET   PED_COD_CLI = '$codex', PED_EMAIL_CLI_PED = '$email' WHERE PED_NUM_PED = '$numero'");

            // ## INSERINDO O CLIENTE NA TABELA DE RELATORIO PESQUISADO NO ORÇAMENTO/PEDIDO QUE ESTÁ ABERTO ## //
            mysqli_query($con,"UPDATE relatorio SET   relCodigoCliente = '$codex', relCliente = '$razao', relEmail = '$email' WHERE relPedido = '$numero'");

           // ## SALVANDO AS INFORMAÇÕES NA TABELA DE PONTEIRO ## //
            mysqli_query($con,"UPDATE ponteiro SET ponPesquisa = '$codex' WHERE ponResponsavel = '$funEmail'");
        }
       
        // ## VERIFICANDO PARA QUAL ARQUIVO DEVE APONTAR VALOR 01 ORCAMENTO E VALOR 02 PEDIDO ## //
        if($param == 1)
        {
             // ## APONTANDO PARA A TELA DE ORÇAMENTO ## //
             header('Location:form-wizard-orcamento.php');
        }

        else
        {
            // ## APONTANDO PARA A TELA DE ORÇAMENTO ## //
            header('Location:form-wizard-pedido.php');
        }
    
?>