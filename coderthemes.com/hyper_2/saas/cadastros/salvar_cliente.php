<?php
/*   SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES - INDAIATUBA 10JUN22
     SISTEMA DESARROLLADO POR FRANCO VIEIRA MORALES - INDAIATUBA 10JUN22
     SYSTEM  DEVELOPED    BY  FRANCO VIEIRA MORALES - INDAIATUBA 10JUN22

     
     ÚLTIMA ALTERAÇÃO FRANCO VIEIRA MORALES - INDAIATUBA 31MAR23
     ÚLTIMA ALTERAÇÃO FRANCO VIEIRA MORALES - INDAIATUBA 03ABR23 - RES000101/13BR
                                                                   (19)3017-3460
                                                                   (19)99272-0159
                                                                   (19)99751-7645
     ARQUIVO PARA SALVAR REGISTRO DE CLIENTE  ####  */

     require 'inc/conexao.php';

     $data = Date('d/m/Y');
     $hora = Date('H:i:s');
 
     $razao       = strtoupper(trim($_GET['razao']));
     $fantasia    = strtoupper(trim($_GET['fantasia']));
     $tipoCliente = strtoupper(trim($_GET['tipoCliente']));
     $tipoServico = strtoupper(trim($_GET['tipoServico']));
     $cep         = trim($_GET['cep']);
     $cidade      = strtoupper(trim($_GET['cidade']));
     $estado      = strtoupper(trim($_GET['estado']));
     $endereco    = strtoupper(trim($_GET['endereco']));
     $bairro      = strtoupper(trim($_GET['bairro']));
     $numero      = trim($_GET['numero']);
     $email       = strtolower(trim($_GET['email']));
     $contato     = strtoupper(trim($_GET['contato']));
     $telefone    = trim($_GET['telefone']);
     $celular     = trim($_GET['celular']);
     $whatsapp    = trim($_GET['whatsapp']);
     $cnpj        = trim($_GET['cnpj']);
     $inscricao   = trim($_GET['inscricao']);
     $municipal   = trim($_GET['municipal']);
     $site        = strtolower(trim($_GET['site']));
     $comentarios = strtoupper(trim($_GET['comentarios']));
    

    // ## VERIFICANDO SE A VARIAVEL VEM CARREGADA COM CPF OU CNPJ ## //
     $count = strlen($cnpj);
     if($count == 11){$tipodoc = 'CPF';}else{$tipodoc = 'CNPJ';}

     // ## CRIANDO NESTE ROTINA A TRIGGER VISTO QUE NAO CONTÉM NA TABELA ## //
     $tri = mysqli_query($con,"SELECT CLI_COD_CLI FROM t0013");
     while($trig = mysqli_fetch_array($tri))
     {
         $trigger = $trig['CLI_COD_CLI'];
     }

     // SOMANDO UM VALOR A MAIS //
     $trigger = ($trigger+1);
     
     // ## SALVANDO REGISTRO DE CLIENTE ## //
     $sql = mysqli_query($con,"INSERT INTO t0013 (CLI_COD_EMP, CLI_COD_CLI, CLI_CPF_CNPJ, CLI_RAZ_SOC_CLI, CLI_NON_FANT_CLI, CLI_TIP_CLI, CLI_CEP_CLI, CLI_CID_CLI, CLI_UF_CLI, CLI_END_CLI, CLI_BAI_CLI, CLI_NUM_END_CLI, CLI_EMAIL_CONT_CLI, CLI_NOM_CONT_CLI, CLI_FONE_CLI, CLI_FONE1_CLI, CLI_FONE_WHATS_CLI, CLI_CNPJ_CLI, CLI_INSC_EST_CLI, CLI_INSC_MUN_CLI, CLI_SITE_CLI, CLI_OBS_GERAL_CLI) VALUES (1,'$trigger','$tipodoc','$razao','$fantasia','$tipoCliente','$cep','$cidade','$estado','$endereco','$bairro','$numero','$email','$contato','$telefone','$celular','$whatsapp','$cnpj','$inscricao','$municipal','$site','$comentarios')");
      
      // ## VERIFICA SE HOUVE ERRO AO SALVAR O REGISTRO  ## //
     if(empty($sql))
     {// ## IMPRIME VALOR ZERO CASO NÃO TENHA CONSEGUIDO SALVAR O REGISTRO  ## //
          print 0;
     }

     else
     {// ##  IMPRIME O VALOR HUM SE ESTIVER TUDO CERTO AO SALVAR O REGISTRO ## //
         print 1;
     }

?>     