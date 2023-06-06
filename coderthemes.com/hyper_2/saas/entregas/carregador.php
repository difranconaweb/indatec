<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 23AGO22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 23AGO22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 23AGO22


   ULTIMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24AGO22
   ULTIMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22SET22
   ULTIMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23SET22
   ULTIMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15OUT22
   ULTIMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27OUT22
   ULTIMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26JAN23 - RES000101/13BR  
                                                                   19 99272-0159
                                                                   19 99751-7645 */



 // ###  ROTINA PARA REGISTRAR PEDIDOS COM DADOS DO CLIENTE E CARGA DO PEDIDO PARA A ENTREGA ### //

          session_start();
          require 'inc/conexao.php';
          

          $data = Date('d/m/Y');  // CARREGA A DATA
          $mes  = Date('m'); // CARREGA  O MES NO SERVIDOR  //
          $hora = Date('H:i:s');  // CARREGA A HORA

          $cont = mysqli_query($con,"SELECT lisCodigo FROM listaPedidos");
          $num  = mysqli_num_rows($cont); // QUANTIDADE DE REGISTRO PARA PASSAR PARA O LAÇO  FOR() //

          // ## BUSCANDO O PRIMEIRO REGISTRO NA TABELA ## //
          for($x=0; $x < $num; $x++)
          {
                $ped = mysqli_query($con,"SELECT lisNumero,lisCondicao FROM listaPedidos");
                while($_ped = mysqli_fetch_array($ped))
                {
                    $codigo   = $_ped['lisNumero']; // CODIGO DO PEDIDO //
                    $condicao = $_ped['lisCondicao']; // CODIGO DE CONDIÇÃO RETIRADA OU ENTREGA //
                }

                // ###  BUSCANDO O NUMERO DO CLIENTE   ### //
                $cli = mysqli_query($con,"SELECT PED_COD_CLI FROM t0019 WHERE PED_NUM_PED = '$codigo'");
                while($_cli = mysqli_fetch_array($cli))
                {
                    $cliente = $_cli['PED_COD_CLI']; // CODIGO DO CLIENTE  //
                }


                // CARREGANDO OS DADOS DO CLIENTE  //
                $dt = mysqli_query($con,"SELECT CLI_RAZ_SOC_CLI, CLI_END_CLI, CLI_NUM_END_CLI, CLI_BAI_CLI, CLI_CID_CLI, CLI_NOM_CONT_CLI, CLI_FONE_CLI, CLI_EMAIL_CONT_CLI FROM t0013 WHERE CLI_COD_CLI = '$cliente'");
                while($_dt = mysqli_fetch_array($dt))
                {
                      $nome     = $_dt['CLI_RAZ_SOC_CLI'];
                      $endereco = $_dt['CLI_END_CLI'];
                      $numero   = $_dt['CLI_NUM_END_CLI'];
                      $bairro   = $_dt['CLI_BAI_CLI'];
                      $cidade   = $_dt['CLI_CID_CLI'];
                      $contato  = $_dt['CLI_NOM_CONT_CLI'];
                      $telefone = $_dt['CLI_FONE_CLI'];
                      $email    = $_dt['CLI_EMAIL_CONT_CLI'];
                }


                // ## BUSCANDO O NOME DA CIDADE PARA A TROCA DO CODIGO DA CIDADE ## //
                $cid = mysqli_query($con,"SELECT MUN_NOME_MUN FROM t0027 WHERE MUN_COD_MUN = '$cidade'");
                while($_cid = mysqli_fetch_array($cid))
                {
                     $municipio = $_cid['MUN_NOME_MUN']; // PEGA O NOME DO MUNICIPIO //
                }

                // ## INSERE OS DADOS DO CLIENTE NO REGISTRO DE ENTREGA ## //
                mysqli_query($con,"INSERT INTO entregasCliente (entCodigo, entPedido, entCondicao, entCliente, entEmail, entEndereco, entNumero, entCidade, entBairro, entTelefone, entContato, entData, entHora) VALUES ('$cliente','$codigo','$condicao','$nome','$email','$endereco','$numero','$municipio','$bairro','$telefone','$contato','$data','$hora')");

                // ## ROTINA PARA INSERIR O PEDIDO NA TABELA DE RELATORIOS ## //
                mysqli_query($con,"INSERT INTO relatorio (relPedido,relCodigoCliente,relStatus,relCliente,relEmail,relEndereco,relNumero,relCidade,relBairro,relTelefone,relContato, relData,relMes,relHora) VALUES ('$codigo','$cliente','$condicao','$nome','$email','$endereco','$numero','$municipio','$bairro','$telefone','$contato',''$data,'$mes','$hora')");

                // REMOVENDO O PEDIDO DA TABELA DE LISTA DE PEDIDO PARA QUE O LAÇO TERMINE  //
                mysqli_query($con,"DELETE FROM listaPedidos WHERE lisNumero = '$codigo'");
          }

          print "REGISTROS CARREGADOS COM SUCESSO!!";
             
?>
        

        
         
