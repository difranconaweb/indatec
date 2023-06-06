<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 01JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 01JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 01JUN22



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 02JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08JUL22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10JUL22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26JUL22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27JUL22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26JAN23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06FEV23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07FEV23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13FEV23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15FEV23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16FEV23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 02MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 09MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 14MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 04ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 05ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 18ABR23 
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 11MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 15MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16MAI23- RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';
require 'inc/sentinela.php';


session_start();
$usuario   = $_SESSION['usuario'];
$codigo    = $_SESSION['id'];
$data      = Date('d/m/Y');
$hora      = Date('H:y:s');
$mes       = Date('m');
$ano       = Date('Y');
$dia       = Date('d');
$dataCompleta  = $ano.'-'.$mes.'-'.$dia; // DATA DO DIA //
$dataCompose   = $ano.'-'.$mes; // ESTA DATA VEM PARA CARREGAR APENAS OS CLIENTES DO MÊS CORRENTE //
$dataCompAnt   = $ano.'-'.'0'.$mess = ($mes - 1); // ESTA DATA VEM PARA CARREGAR APENAS OS CLIENTES DO MÊS CORRENTE //



// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
$sql = mysqli_query($con,"SELECT funPrimNome,funCargo, funFoto FROM funcionarios WHERE funCodigo = '$id'");
while($obj = mysqli_fetch_array($sql))
{
    $nome  = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $obj['funCargo'];    // CARGO DO USUARIO //
    $foto  = $obj['funFoto'];    // FOTO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

// ## ROTINA PARA CARREGAR A DATA E AJUSTAR EM CASO DE SEGUNDA FEIRA ## //

      // ESTA DATA VEM DO MES CORRENTE //
      $dataInit = $ano.'-'.$mes.'-01';
      $dataEnd  = $ano.'-'.$mes.'-'.$dia;

       // ## BUSCA NA TABELA DE MEMO A ULTIMA SEGUNDA FEIRA SALVA ## //
      $sg = mysqli_query($con,"SELECT semData FROM semanaMemo ORDER BY semCodigo DESC LIMIT 1");
      while($_sg = mysqli_fetch_array($sg))
      {
          $segund3 = $_sg['semData'];
      }
      // ## FINAL DE BUSCA DE SEGUNDA FEIRA NA TABELA DE MEMORIA ## //

      if($segund3 == $dataCompleta)
      {
           $sq3 = mysqli_query($con,"SELECT PED_NUM_PED, PED_DAT_ABER_PED FROM `t0019` WHERE PED_DAT_ABER_PED LIKE '$dataEnd'  AND PED_COD_TIP_VEND IN(510201,510202)"); 
      }

      else
      {
           $sq3 = mysqli_query($con,"SELECT PED_NUM_PED, PED_DAT_ABER_PED FROM `t0019` WHERE PED_DAT_ABER_PED BETWEEN '$dataInit' AND '$dataEnd' AND PED_STATUS_PED = 'F' AND PED_COD_TIP_VEND IN(510201,510202)");
      }
// ## FINAL DE AJUSTE DE DATA PARA CASOS COM SEGUNDA-FEIRA ## //

      
     // ESTA DATA VEM DO MES ANTERIOR //
      if($mes == 1){$mes = 12;$ano = $ano - 1;}else{$mes=($mes-1);$mes='0'.$mes;$ano=$ano;}
      $dataInit_ant = $ano.'-'.$mes.'-01';;
      $dataEnd_ant  = $ano.'-'.$mes.'-'.$dia;
// ############################################################################################################################################# //
      // ## AQUI CARREGA A QUANTIDADE DE PEDIDOS DO MÊS ATUAL ## //
      $num_mes = mysqli_num_rows($sq3); // ESTE VALOR CORRESPONDE AO MÊS CORRENTE //
      while($sq_3  = mysqli_fetch_array($sq3))
      {
              $numeroPedido = $sq_3['PED_NUM_PED'];
              $datAtual     = $sq_3['PED_DAT_ABER_PED'];
              mysqli_query($con,"INSERT INTO pedidosMemoReport (pedNumero,pedData,pedHora) VALUES ('$numeroPedido','$datAtual','$hora')");

              // ## BUSCANDO O VALOR TOTAL DOS PEDIDOS NO MES ATUAL  ## //
              $vlrCur = mysqli_query($con,"SELECT sum(PED_ITEM_TOTAL_ITEM) AS total FROM t0020 WHERE PED_ITEM_NUM_PED = '$numeroPedido'");
              while($cur = mysqli_fetch_array($vlrCur))
              {
                   $totalAtual = $cur['total']; // VALOR TOTAL DO PEDIDO NO MES CORRENTE //
              }
             // SALVANDO O VALOR TOTAL DO PEDIDO //
             mysqli_query($con,"UPDATE pedidosMemoReport SET pedValor = '$totalAtual' WHERE pedNumero = '$numeroPedido'");
      }
      //  PEGANDO A RECEITA DO MES ATUAL //
             $mesAtual = mysqli_query($con,"SELECT sum(pedValor) RECEITA_ATUAL FROM pedidosMemoReport");
             while($recA = mysqli_fetch_array($mesAtual))
             {
                  $receitaA = $recA['RECEITA_ATUAL'];
             }
             // ## INSERINDO A UNIDADE MONETARIA ## //
             setlocale(LC_MONETARY,'pt_BR');


      
// ############################################################################################################################################## //
      // ## AQUI CARREGA A QUANTIDADE DE PEDIDOS DO MES ANTERIOR ## //
      $sql = mysqli_query($con,"SELECT PED_NUM_PED, PED_DAT_ABER_PED FROM `t0019` WHERE PED_DAT_ABER_PED BETWEEN '$dataInit_ant' AND '$dataEnd_ant' AND PED_STATUS_PED = 'F' AND PED_COD_TIP_VEND IN(510201,510202)"); 
      $num_anterior = mysqli_num_rows($sql); // ESTE VALOR CORRESPONDE AO MÊS CORRENTE //
      while($sql_  = mysqli_fetch_array($sql))
      {
              $num3roP3dido = $sql_['PED_NUM_PED'];
              $datAnterior  = $sql_['PED_DAT_ABER_PED'];
              mysqli_query($con,"INSERT INTO pedidosMemoReport_1 (pedNumero,pedData,pedHora) VALUES ('$num3roP3dido','$datAnterior','$hora')");
              // ## BUSCANDO O VALOR TOTAL DOS PEDIDOS DO MES ANTERIOR  ## //
              $vlrCur3 = mysqli_query($con,"SELECT sum(PED_ITEM_TOTAL_ITEM) AS total FROM t0020 WHERE PED_ITEM_NUM_PED = '$num3roP3dido'");
              while($cur2 = mysqli_fetch_array($vlrCur3))
              {
                   $totalAtual_ = $cur2['total']; // VALOR TOTAL DO PEDIDO NO MES CORRENTE //
              }
             // SALVANDO O VALOR TOTAL DO PEDIDO //
             mysqli_query($con,"UPDATE pedidosMemoReport_1 SET pedValor = '$totalAtual_' WHERE pedNumero = '$num3roP3dido'");
      }

       //  PEGANDO A RECEITA DO MES ANTERIOR //
             $mesAnt = mysqli_query($con,"SELECT sum(pedValor) RECEITA_ANTERIOR FROM pedidosMemoReport_1");
             while($recAn = mysqli_fetch_array($mesAnt))
             {
                  $receitaAn = $recAn['RECEITA_ANTERIOR'];
             }

      // ## O RESULTADO DE AMBAS AS QUERIES VAI ENCONTRAR A DIFERENÇA ## //
      $total = ($num_mes - $num_anterior);
      $totalPedidos = $total;

      // ## ENCONTRANDO O CRESCIMENTO ENTRE OS DOIS MESES ## //
      $crescimento = ($receitaAn - $receitaA);
      $fVal        = ($receitaAn/$crescimento);
      $fPerCres    = ($fVal / 100);
      $fPerCres    = number_format($fPerCres,2);
      


      // ##  DEFININDO A SETA DE STATUS ## //
      if($totalPedidos < 0){$index = 'mdi mdi-arrow-down-bold'; $cor = 'text-danger me-2';}else{$index = 'mdi mdi-arrow-up-bold';$cor = 'text-success me-2';}
      // ##  DEFININDO PERCENTUAL DA RECEITA ## //
      if($receitaAn > $receitaA){$indiceR = 'mdi mdi-arrow-down-bold'; $corR = 'text-danger me-2';}else{$indiceR = 'mdi mdi-arrow-up-bold';$corR = 'text-success me-2';}

// ## LIMPANDO AS TABELAS DE MEMORIA RELATORIOS  ## //
      mysqli_query($con,"TRUNCATE pedidosMemoReport");
      mysqli_query($con,"TRUNCATE pedidosMemoReport_1");




// ## ESTA FUNÇÃO FOI DESENVOLVIDA PARA CARREGAR O VALOR DA SEMANA ## //
function semanal()
{
     require 'inc/conexao.php';

     $mes       = Date('m');
     $ano       = Date('Y');
     $dia       = Date('d');

     $dataCompleta  = $ano.'-'.$mes.'-'.$dia; // DATA DO DIA //
 
     // ## INSERINDO A UNIDADE MONETARIA ## //
     setlocale(LC_MONETARY,'pt_BR');

     // ## BUSCA NA TABELA DE MEMO A ULTIMA SEGUNDA FEIRA SALVA ## //
      $se = mysqli_query($con,"SELECT semData FROM semanaMemo ORDER BY semCodigo DESC LIMIT 1");
      while($_se = mysqli_fetch_array($se))
      {
          $segunda = $_se['semData'];
      }
      // ## FINAL DE BUSCA DE SEGUNDA FEIRA NA TABELA DE MEMORIA ## //

      if($segunda == $dataCompleta)
      {
           $sq3 = mysqli_query($con,"SELECT PED_NUM_PED, PED_DAT_ABER_PED FROM `t0019` WHERE PED_DAT_ABER_PED LIKE '$dataEnd'  AND PED_COD_TIP_VEND IN(510201,510202)"); 
      }

      else
      {
           $sq3 = mysqli_query($con,"SELECT PED_NUM_PED, PED_DAT_ABER_PED FROM `t0019` WHERE PED_DAT_ABER_PED BETWEEN '$dataInit' AND '$dataEnd' AND PED_STATUS_PED = 'F' AND PED_COD_TIP_VEND IN(510201,510202)");
      }
// ## FINAL DE AJUSTE DE DATA PARA CASOS COM SEGUNDA-FEIRA ## //



      // ## AQUI VERIFICA SE ESTAMOS NA SEGUNFA-FEIRA ## //
      if($segunda == $dataCompleta)
      {
             // ## AQUI CARREGA A QUANTIDADE DE PEDIDOS DA SEMANA ## //
              $sq3 = mysqli_query($con,"SELECT PED_NUM_PED, PED_DAT_ABER_PED FROM `t0019` WHERE PED_DAT_ABER_PED = '$dataCompleta' AND PED_STATUS_PED = 'F' AND PED_COD_TIP_VEND IN(510201,510202)"); 
              $num_mes = mysqli_num_rows($sq3); // ESTE VALOR CORRESPONDE AO MÊS CORRENTE //
              while($sq_3  = mysqli_fetch_array($sq3))
              {
                      $numeroPedido = $sq_3['PED_NUM_PED'];
                      $datAtual     = $sq_3['PED_DAT_ABER_PED'];
                      mysqli_query($con,"INSERT INTO pedidosMemoReport (pedNumero,pedData,pedHora) VALUES ('$numeroPedido','$datAtual','$hora')");

                      // ## BUSCANDO O VALOR TOTAL DOS PEDIDOS NO MES ATUAL  ## //
                      $vlrCur = mysqli_query($con,"SELECT sum(PED_ITEM_TOTAL_ITEM) AS total FROM t0020 WHERE PED_ITEM_NUM_PED = '$numeroPedido'");
                      while($cur = mysqli_fetch_array($vlrCur))
                      {
                           $totalAtual = $cur['total']; // VALOR TOTAL DO PEDIDO NO MES CORRENTE //
                      }
                     // SALVANDO O VALOR TOTAL DO PEDIDO //
                     mysqli_query($con,"UPDATE pedidosMemoReport SET pedValor = '$totalAtual' WHERE pedNumero = '$numeroPedido'");
              }
              //  PEGANDO A RECEITA DO MES ATUAL //
                     $mesAtual = mysqli_query($con,"SELECT sum(pedValor) RECEITA_ATUAL FROM pedidosMemoReport");
                     while($recA = mysqli_fetch_array($mesAtual))
                     {
                          $recSemana = $recA['RECEITA_ATUAL'];
                     }
                    
                     print money_format('%.2n',$recSemana);
                     mysqli_query($con,"TRUNCATE pedidosMemoReport"); // LIMPANDO A TABELA //
      }

      else
      {
             // ## AQUI CARREGA A QUANTIDADE DE PEDIDOS DA SEMANA ## //
              $sq3 = mysqli_query($con,"SELECT PED_NUM_PED, PED_DAT_ABER_PED FROM `t0019` WHERE PED_DAT_ABER_PED BETWEEN '$segunda' AND '$dataCompleta' AND PED_STATUS_PED = 'F' AND PED_COD_TIP_VEND IN(510201,510202)"); 
              $num_mes = mysqli_num_rows($sq3); // ESTE VALOR CORRESPONDE AO MÊS CORRENTE //
              while($sq_3  = mysqli_fetch_array($sq3))
              {
                      $numeroPedido = $sq_3['PED_NUM_PED'];
                      $datAtual     = $sq_3['PED_DAT_ABER_PED'];
                      mysqli_query($con,"INSERT INTO pedidosMemoReport (pedNumero,pedData,pedHora) VALUES ('$numeroPedido','$datAtual','$hora')");

                      // ## BUSCANDO O VALOR TOTAL DOS PEDIDOS NO MES ATUAL  ## //
                      $vlrCur = mysqli_query($con,"SELECT sum(PED_ITEM_TOTAL_ITEM) AS total FROM t0020 WHERE PED_ITEM_NUM_PED = '$numeroPedido'");
                      while($cur = mysqli_fetch_array($vlrCur))
                      {
                           $totalAtual = $cur['total']; // VALOR TOTAL DO PEDIDO NO MES CORRENTE //
                      }
                     // SALVANDO O VALOR TOTAL DO PEDIDO //
                     mysqli_query($con,"UPDATE pedidosMemoReport SET pedValor = '$totalAtual' WHERE pedNumero = '$numeroPedido'");
              }
              //  PEGANDO A RECEITA DO MES ATUAL //
                     $mesAtual = mysqli_query($con,"SELECT sum(pedValor) RECEITA_ATUAL FROM pedidosMemoReport");
                     while($recA = mysqli_fetch_array($mesAtual))
                     {
                          $recSemana = $recA['RECEITA_ATUAL'];
                     }
                    
                     print money_format('%.2n',$recSemana);
                     mysqli_query($con,"TRUNCATE pedidosMemoReport"); // LIMPANDO A TABELA //
      }
      // ## FINAL DE ROTINA DE BUSCA  ## //
     
}
// ## FINAL DE FUNÇÃO ## //
// ############################################################################################################################################################################################################ //
// ############################################################################################################################################################################################################ //
// ## ESTA FUNÇÃO FOI DESENVOLVIDA PARA CARREGAR O VALOR DA SEMANA ANTERIOR ## //
function semanaAnterior()
{
      require 'inc/conexao.php';

     $mes       = Date('m');
     $ano       = Date('Y');
     $dia       = Date('d');
 
     // ## INSERINDO A UNIDADE MONETARIA ## //
     setlocale(LC_MONETARY,'pt_BR');

     // ## BUSCA NA TABELA DE MEMO A SEGUNDA FEIRA DE UMA SEMANA ATRÁS SALVA ## //
      $se = mysqli_query($con,"SELECT semData FROM semanaMemo ORDER BY semCodigo DESC LIMIT 2");
      while($_se = mysqli_fetch_array($se))
      {
          $segundaAnterior = $_se['semData'];
      }

       // ## BUSCA NA TABELA DE MEMO A ÚLTIMA SEGUNDA FEIRA  SALVA ## //
      $se = mysqli_query($con,"SELECT semData FROM semanaMemo ORDER BY semCodigo DESC LIMIT 1");
      while($_se = mysqli_fetch_array($se))
      {
          $segunda = $_se['semData'];
      }

      // ## AQUI CARREGA A QUANTIDADE DE PEDIDOS DA SEMANA ## //
      $sq3 = mysqli_query($con,"SELECT PED_NUM_PED, PED_DAT_ABER_PED FROM `t0019` WHERE PED_DAT_ABER_PED BETWEEN '$segundaAnterior' AND '$segunda' AND PED_STATUS_PED = 'F' AND PED_COD_TIP_VEND IN(510201,510202)"); 
      $num_mes = mysqli_num_rows($sq3); // ESTE VALOR CORRESPONDE AO MÊS CORRENTE //
      while($sq_3  = mysqli_fetch_array($sq3))
      {
              $numeroPedido = $sq_3['PED_NUM_PED'];
              $datAtual     = $sq_3['PED_DAT_ABER_PED'];
              mysqli_query($con,"INSERT INTO pedidosMemoReport (pedNumero,pedData,pedHora) VALUES ('$numeroPedido','$datAtual','$hora')");

              // ## BUSCANDO O VALOR TOTAL DOS PEDIDOS NO MES ATUAL  ## //
              $vlrCur = mysqli_query($con,"SELECT sum(PED_ITEM_TOTAL_ITEM) AS total FROM t0020 WHERE PED_ITEM_NUM_PED = '$numeroPedido'");
              while($cur = mysqli_fetch_array($vlrCur))
              {
                   $totalAtual = $cur['total']; // VALOR TOTAL DO PEDIDO NO MES CORRENTE //
              }
             // SALVANDO O VALOR TOTAL DO PEDIDO //
             mysqli_query($con,"UPDATE pedidosMemoReport SET pedValor = '$totalAtual' WHERE pedNumero = '$numeroPedido'");
      }
      //  PEGANDO A RECEITA DO MES ATUAL //
             $mesAtual = mysqli_query($con,"SELECT sum(pedValor) AS RECEITA_PASSADA FROM pedidosMemoReport");
             while($recA = mysqli_fetch_array($mesAtual))
             {
                  $recSemana = $recA['RECEITA_PASSADA'];
             }
            
             print money_format('%.2n',$recSemana);
             mysqli_query($con,"TRUNCATE pedidosMemoReport"); // LIMPANDO A TABELA //
}

// ## FINAL DE FUNÇÃO ## //
// ############################################################################################################################################################################################################ //
// ############################################################################################################################################################################################################ //
// ## ESTA FUNÇÃO VEM PARA ORGANIZAR AS ENTREGAS ## //
function entregas()
{
     require 'inc/conexao.php';

     $mes       = Date('m');
     $ano       = Date('Y');
     $dia       = Date('d');
     $data      = Date('d/m/Y');
     $hora      = Date('H:i:s');
     $dataCompleta  = $ano.'-'.$mes.'-'.$dia; // DATA DO DIA //

     // ## VERIFICANDO SE CONSTA REGISTRO NA TABELA DE ENTREGA ## //
     $dt = mysqli_query($con,"SELECT lisData FROM listaPedidos");
     while($obj = mysqli_fetch_array($dt))
     {
          $lisData = $obj['lisData'];
     }

     // SE VIER VÁZIA ENTAO CARREGA A TABELA //
     if($lisData == '')
     {
         $ped = mysqli_query($con,"SELECT PED_NUM_PED, PED_COD_CLI, PED_RESPONSAVEL, PED_HOR_ULT_ALT_PED FROM t0019 WHERE PED_DAT_ABER_PED = '$dataCompleta'");
         while($con3 = mysqli_fetch_array($ped))
         {
              $num_cli  = $con3['PED_NUM_PED'];
              $cod_cli  = $con3['PED_COD_CLI'];
              $resp     = $con3['PED_RESPONSVEL'];
              $hor_cli  = $con3['PED_HOR_ULT_ALT_PED'];

              // BUSCANDO O ENDERECO DO CLIENTE //
              $end = mysqli_query($con,"SELECT CLI_END_CLI, CLI_NUM_END_CLI, CLI_CID_CLI FROM t0013 WHERE CLI_COD_CLI = '$cod_cli'");
              while($snd = mysqli_fetch_array($end))
              {
                  $endereco = $snd['CLI_END_CLI'];
                  $numero   = $snd['CLI_NUM_END_CLI'];
                  $cidade   = $snd['CLI_CID_CLI'];
              }

               $endereco = $endereco.', '.$numero.' - '.$cidade;               
              // ## SALVANDO OS REGISTROS DO DIA NA TABELA DE LISTA DE PEDIDO QUE VAI PARA A ENTREGA E RETIRADA ## //
              mysqli_query($con,"INSERT INTO listaPedidos (lisNumero,lisCliente,lisEndereco,lisData,lisHora,lisFuncionario) VALUES ('$num_cli','$cod_cli','$endereco','$data','$hor_cli','$resp')");
         }
     }

     else if($lisData != $data)
     {// ## SE A DATA FOR DIFERENTE, ENTAO LIMPA A TABELA E CARREGA COM OS DADOS DO DIA CORRENTE ## //
           mysqli_query($con,"TRUNCATE listaPedidos"); // LIMPANDO A TABELA //
           $ped = mysqli_query($con,"SELECT PED_NUM_PED, PED_COD_CLI, PED_RESPONSAVEL FROM t0019 WHERE PED_DAT_ABER_PED = '$dataCompleta'");
           while($con3 = mysqli_fetch_array($ped))
           {
                $num_cli  = $con3['PED_NUM_PED'];
                $cod_cli  = $con3['PED_COD_CLI'];
                $resp     = $con3['PED_RESPONSVEL'];

              // BUSCANDO O ENDERECO DO CLIENTE //
              $end = mysqli_query($con,"SELECT CLI_END_CLI, CLI_NUM_END_CLI, CLI_CID_CLI FROM t0013 WHERE CLI_COD_CLI = '$cod_cli'");
              while($snd = mysqli_fetch_array($end))
              {
                  $endereco = $snd['CLI_END_CLI'];
                  $numero   = $snd['CLI_NUM_END_CLI'];
                  $cidade   = $snd['CLI_CID_CLI'];
              }

                $endereco = $endereco.', '.$numero.' - '.$cidade;
                // ## SALVANDO OS REGISTROS DO DIA NA TABELA DE LISTA DE PEDIDO QUE VAI PARA A ENTREGA E RETIRADA ## //
                mysqli_query($con,"INSERT INTO listaPedidos (lisNumero,lisCliente,lisEndereco,lisData,lisHora,lisFuncionario) VALUES ('$num_cli','$cod_cli','$endereco','$data','$hor_cli','$resp')");
           }    
     }

     else
     {// ## CASO ESTEJA CARREGADA, ENTAO MANTÉM COMO ESTÁ ## //
           $lisData  = $lisData;
     }
}

/*###########################################################################*/
/* ###  ARQUIVO DE PRIMEIRO ACESSO DASHBOARD   -     SISTEMA DE INDATEC  ### */
/*###########################################################################*/
?>
<!DOCTYPE html>
    <html lang="pt">

    
<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:40:28 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Indafire - Equipamentos de Combate a Incendios</title><!-- Indafire - Equipamentos de Combate a Incendios  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Indafire Equipamentos de Combate a Incendios" name="description" />
        <meta content="Indafire" name="Franco V. Morales" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logoMenor.png">

        <!-- third party css -->
        <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        <?php entregas() ?><!-- CHAMANDO A FUNÇÃO PARA A CARGA DE TABELA DE ENTREGAS/RETIRADAS  -->
        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <script type="text/javascript">
          
    
        </script>
<style type="text/css">
  <style>
   
  </style>
</style>
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- INICIO DE PÁGINA -->
        <div class="wrapper">
            <!-- ========== INICIO DE BARRA LATERAL ESQUERDA ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="#" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo-indafire.jpg" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm.png" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- MENU LATERAL -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navegação</li>
                        <!-- ### VARIÁVEIS OCULTAS DO SISTEMA   ### -->
                        <input type="hidden" name="codigo" id="codigo" value="<?php print $codigo ?>"><!-- ## VARIAVEL OCULTA PARA CARREGAR O CÓDIGO/ID DO CLIENTE ## -->
                        <input type="hidden" name="nome" id="nome" value="<?php print $nome ?>"><!-- ## VARIÁVEL OCULTA PARA CARREGAR O NOME DO CLIENTE ## -->
                        <!-- ###  VARIÁVEIS OCULTAS DO SISTEMA  ### -->
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <!--span class="badge bg-success float-end">4</span-->
                                <span> Painel de Controle </span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">Analitico</a><!-- dashboard-analytics.html -->
                                    </li>
                                    <li>
                                        <a href="#">CRM</a><!-- dashboard-crm.html  -->
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-title side-nav-item">Menu</li>

                        <li class="side-nav-item">
                            <a href="calendario/apps-calendar.php" class="side-nav-link"><!-- apps-calendar.html -->
                                <i class="uil-calender"></i>
                                <span> Calendário </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="chat/pre-chat.php" class="side-nav-link"><!-- apps-chat.html  -->
                                <i class="uil-comments-alt"></i>
                                <span> Chat </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Comercial </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="comercial/apps-ecommerce-orcamento.php">Orçamentos</a>
                                    </li>
                                    <li>
                                        <a href="comercial/apps-ecommerce-products.php">Produtos</a><!-- apps-ecommerce-products.html -->
                                    </li>
                                    <li>
                                        <a href="comercial/apps-ecommerce-orders.php">Pedidos</a><!-- apps-ecommerce-orders.html  -->
                                    </li>
                                    <li>
                                        <a href="comercial/apps-ecommerce-customers.php">Clientes</a><!-- apps-ecommerce-customers.html -->
                                    </li>
                                    <li>
                                        <a href="#">Compras</a><!-- apps-ecommerce-shopping-cart.html  -->
                                    </li>
                                    <li>
                                        <a href="#">Verificação</a><!-- apps-ecommerce-checkout.html  -->
                                    </li>
                                    <li>
                                        <a href="#">Vendedores</a><!-- apps-ecommerce-sellers.html  -->
                                    </li>
                                </ul>
                            </div>
                        </li>

                         <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                                <i class="uil-document-layout-center"></i>
                                <span> Cadastros </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarForms">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="cadastros/form-elements.php">Clientes</a><!-- form-elements.html  -->
                                    </li>
                                    <li>
                                        <a href="cadastros/form-equipamentos.php">Equipamentos</a><!-- form-advanced.html  -->
                                    </li>
                                    <li>
                                        <a href="#">Fornecedores</a><!-- form-validation.html -->
                                    </li>
                                    <li>
                                        <a href="comercial/form-wizard-orcamento.php">Orçamentos</a><!-- form-wizard.html  -->
                                    </li>
                                    <li>
                                        <a href="comercial/form-wizard-pedido.php">Pedidos</a><!-- form-wizard.html  -->
                                    </li>
                                    <li>
                                        <a href="#">Arquivos Carregados</a><!-- form-fileuploads.html -->
                                    </li>
                                    <li>
                                        <a href="#">Reclamações</a><!-- form-editors.html -->
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="comercial/apps-oficina.php" class="side-nav-link">
                                <i class="uil-wrench"></i>
                                <span> Oficina </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarFinanceiro" aria-expanded="false" aria-controls="sidebarFinanceiro" class="side-nav-link">
                                <i class="uil-document-layout-center"></i>
                                <span> Recursos Humanos </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarFinanceiro">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="RH/carga-hora.php">Carga Horas</a><!-- form-elements.html  -->
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                                <i class="uil-envelope"></i>
                                <span> Email </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEmail">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">Entrada</a><!-- apps-email-inbox.html -->
                                    </li>
                                    <li>
                                        <a href="#">Ler Email</a><!-- apps-email-read.html -->
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span> Projetos </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarProjects">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">Lista</a><!-- apps-projects-list.html -->
                                    </li>
                                    <li>
                                        <a href="#">Detalhes</a><!-- apps-projects-details.html  -->
                                    </li>
                                    <li>
                                        <a href="#">Projetos Criados <span class="badge rounded-pill badge-success-lighten font-10 float-end">Novo</span></a><!-- apps-projects-add.html -->
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link"><!-- apps-social-feed.html -->
                                <i class="uil-rss"></i>
                                <span> Feed Notícias </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> Tarefas </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="entregas/index.php">Entregar Pedidos</a><!-- ROTINA PARA CADASTRAR PEDIDOS PARA A ENTREGA -->
                                    </li>
                                    <li>
                                        <a href="#">Lista</a><!-- apps-tasks.html -->
                                    </li>
                                    <li>
                                        <a href="#">Detalhes</a><!--  apps-tasks-details.html -->
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link"><!-- apps-file-manager.html  -->
                                <i class="uil-folder-plus"></i>
                                <span> Gerenciador Arquivos </span>
                            </a>
                        </li>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- INICIA O CONTEÚDO DA PÁGINA AQUI                               -->
            <!-- ============================================================== -->

            <div class="content-page">
               <div class="content"> 
<!--  ##############################################################################################################################################################################################  -->
                    <!-- ATENÇÃO - ATENÇÃO - AQUI COMEÇA O MODAL PARA MENSAGEM DE SAIR DO SISTEMA ##### -->
                    <!-- ALERTA MODAL DE AVISO -->
                    <div id="warning-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <div class="text-center">
                                        <i class="dripicons-warning h1 text-warning"></i>
                                        <h4 class="mt-2">Deseja sair do sistema?</h4>
                                        
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal" onclick="sim_sair()">Sim</button>
                                        <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Não</button>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
<!--  ##############################################################################################################################################################################################  -->


                    <!-- INICIO DA BARRA DO TOPO DA PÁGINA -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3">
                                        <input type="text" class="form-control" placeholder="Buscar ..." aria-label="Recipient's username">
                                    </form>
                                </div>
                            </li>
                            
                            <!--li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <span class="noti-icon-badge"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <!--div class="dropdown-item noti-title">
                                        <h5 class="m-0">
                                            <span class="float-end">
                                                <a href="javascript: void(0);" class="text-dark">
                                                    <small>Limpar Tudo</small>
                                                </a>
                                            </span>Notificação
                                        </h5>
                                    </div>

                                    <div style="max-height: 230px;" data-simplebar>
                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">1 min ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-account-plus"></i>
                                            </div>
                                            <p class="notify-details">Registro de novo usuário.
                                                <small class="text-muted">5 horas atrás</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Cristina Pride</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Hi, How are you? What about our next meeting</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">4 days ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Karen Robinson</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Wow ! this admin looks good and awesome design</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-heart"></i>
                                            </div>
                                            <p class="notify-details">Carlos Crouch liked
                                                <b>Admin</b>
                                                <small class="text-muted">13 days ago</small>
                                            </p>
                                        </a>
                                    </div>

                                    <!-- All-->
                                    <!--a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        Ver Tudo
                                    </a>

                                </div>
                            </li-->

                            <li class="dropdown notification-list d-none d-sm-inline-block">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-view-apps noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                                    <div class="p-2">
                                        <div class="row g-0">
                                            <!--div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/slack.png" alt="slack">
                                                    <span>Slack</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/github.png" alt="Github">
                                                    <span>GitHub</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                                    <span>Dribbble</span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row g-0">
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                                    <span>Bitbucket</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                                    <span>Dropbox</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/g-suite.png" alt="G Suite">
                                                    <span>G Suite</span>
                                                </a>
                                            </div-->
                                        </div> <!-- FINAL DE LINHA -->
                                    </div>

                                </div>
                            </li>

                            <li class="notification-list">
                                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="<?php print $foto; ?>" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?php print $nome; ?></span>
                                        <span class="account-position"><?php print $cargo; ?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Seja Bem vindo !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>Minha Conta</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-edit me-1"></i>
                                        <span>Configurações</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lifebuoy me-1"></i>
                                        <span>Suporte</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lock-outline me-1"></i>
                                        <span>Segurança Tela</span>
                                    </a>

                                    <!-- item-->

                                    <a href="javascript:void(0);" class="dropdown-item notify-item"><!--  -->
                                        <i class="mdi mdi-logout me-1"></i>
                                       
                                        <span onclick="deslogar()">Deslogar</span>
                                     </a>
                                </div>
                            </li>
                        </ul>

                       <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search dropdown d-none d-lg-block">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control dropdown-toggle"  placeholder="Digitar aqui..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn-primary" type="submit">Buscar</button>
                                </div>
                            </form>

                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Encontrar <span class="text-danger">17</span> resultados</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-notes font-16 me-1"></i>
                                    <span>Relatório Analitico</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-life-ring font-16 me-1"></i>
                                    <span>Como posso ajudar?</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-cog font-16 me-1"></i>
                                    <span>Configuração Perfil de Usuário</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">Usuários</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Erwin Brown</h5>
                                                <span class="font-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                                <span class="font-12 mb-0">Desenvolvedor</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Topbar -->
                    
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Painel Controle</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-5 col-lg-6">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Clientes mês atual</h5>
                                                <?php $num = mysqli_query($con,"SELECT * FROM t0013 WHERE CLI_DAT_COMPOSE = '$dataCompose'");
                                                      $num_clientes = mysqli_num_rows($num);
                                                      $numMes = mysqli_query($con,"SELECT CLI_COD_CLI FROM t0013 WHERE CLI_DAT_COMPOSE = '$dataCompAnt'");
                                                      $num_mes_ant = mysqli_num_rows($numMes);
                                                      
                                                        ?>
                                                <h3 class="mt-3 mb-3"><? print $num_clientes; ?></h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i><?php print $num_mes_ant; ?></span>
                                                    <span class="text-nowrap">Clientes no último mês</span> 
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-sm-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Numero de Pedidos">Pedidos mesmo periodo</h5>
                                                <?php $ped = mysqli_query($con,"SELECT * FROM `t0019` WHERE PED_DAT_ABER_PED BETWEEN '$dataInit' AND '$dataEnd'"); 
                                                      $num_pedidos = mysqli_num_rows($ped); ?>
                                                <h3 class="mt-3 mb-3"><?php print $num_pedidos; ?></h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="<?php print $cor; ?>"><i class="<?php print $index; ?>"></i><?php print $totalPedidos; ?></span>
                                                    <span class="text-nowrap">Desde o Último mês</span>
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-currency-usd widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Receita Atual</h5>
                                                <h3 class="mt-3 mb-3"><span id="receita"><?php print money_format('%.2n',$receitaA); ?></span></h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="<?php print $corR; ?>"><i class="<?php print $indiceR; ?>"><?php print $fPerCres.'%';  ?></i></span>
                                                    <span class="text-nowrap">Desde o Último mês</span>
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-sm-6">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-pulse widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Growth">Crescimento</h5>
                                                <h3 class="mt-3 mb-3"><?php print money_format('%.2n',$receitaAn); ?></h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-danger me-2"><i class="mdi mdi-arrow-up-bold"></i> 0.00%</span>
                                                    <span class="text-nowrap">Desde o Último mês</span>
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                            </div> <!-- end col -->

                            <div class="col-xl-7 col-lg-6">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Relatório Vendas</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Relatório Export</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Lucro</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Ação</a>
                                            </div>
                                        </div>
                                        <h4 class="header-title mb-3">Projeção Vs Atual</h4>

                                        <div dir="ltr">
                                            <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                                        </div>
                                            
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Relatório Vendas</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Relatório Export</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Lucro</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Ação</a>
                                            </div>
                                        </div>
                                        <h4 class="header-title mb-3">Receita</h4>

                                        <div class="chart-content-bg">
                                            <div class="row text-center">
                                                <div class="col-sm-6">
                                                    <p class="text-muted mb-0 mt-3">Semana Atual</p>
                                                    <h2 class="fw-normal mb-3">
                                                        <small class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
                                                        <span><?php semanal(); ?></span>
                                                    </h2>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="text-muted mb-0 mt-3">Semana Anterior</p>
                                                    <h2 class="fw-normal mb-3">
                                                        <small class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
                                                        <span><?php semanaAnterior(); ?></span>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dash-item-overlay d-none d-md-block" dir="ltr">
                                          <?php $hj = mysqli_query($con,"SELECT PED_NUM_PED FROM t0019 WHERE PED_DAT_ABER_PED = '$dataCompleta' AND PED_STATUS_PED = 'F' AND PED_COD_TIP_VEND IN(510201,510202)"); 
                                                while($hj3 = mysqli_fetch_array($hj))
                                                {
                                                     $n_code = $hj3['PED_NUM_PED'];
                                                     $hj_ = mysqli_query($con,"SELECT PED_ITEM_TOTAL_ITEM FROM t0020 WHERE PED_ITEM_NUM_PED = '$n_code'");
                                                     while($hj_3 = mysqli_fetch_array($hj_))
                                                     {
                                                        $pedItemTotal = $hj_3['PED_ITEM_TOTAL_ITEM'];  
                                                        mysqli_query($con,"INSERT INTO diaMemo (diaPedido,diaValor) VALUES ('$n_code','$pedItemTotal')");
                                                     }
                                                }
                                                 
                                                // ## PEGANDO O VALOR DO DIA ## //
                                                $dia3 = mysqli_query($con,"SELECT sum(diaValor) AS semana FROM diaMemo");
                                                while($_dia3 = mysqli_fetch_array($dia3))
                                                {
                                                    $mov_dia = $_dia3['semana'];
                                                }
                                                
                                                // LIMPANDO A TABELA DE MEMORIA DIA //
                                                mysqli_query($con,"TRUNCATE diaMemo");
                                               ?>
                                                
                                            <h5>Movimento Hoje: R$ <?php print money_format('%.2n',$mov_dia); ?></h5>
                                            <p class="text-muted font-13 mb-3 mt-2">Se aplica ao valores faturados na data de hoje...</p>
                                            <a href="javascript: void(0);" class="btn btn-outline-primary">Ver Declaração
                                                <i class="mdi mdi-arrow-right ms-2"></i>
                                            </a>
                                        </div>
                                        <div dir="ltr">
                                            <div id="revenue-chart" class="apex-charts mt-3" data-colors="#727cf5,#0acf97"></div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Relatório Vendas</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Relatório</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Lucro</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Ação</a>
                                            </div>
                                        </div>
                                        <h4 class="header-title">Receita por Trabalhos</h4>
                                        <div class="mb-4 mt-4">
                                            <div id="world-map-markers" style="height: 224px"></div>
                                        </div>

                                        <h5 class="mb-1 mt-0 fw-normal">Indaiatuba</h5>
                                        <div class="progress-w-percent">
                                            <span class="progress-value fw-bold">72k </span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <h5 class="mb-1 mt-0 fw-normal">Campinas</h5>
                                        <div class="progress-w-percent">
                                            <span class="progress-value fw-bold">39k </span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <h5 class="mb-1 mt-0 fw-normal">Salto</h5>
                                        <div class="progress-w-percent">
                                            <span class="progress-value fw-bold">25k </span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <h5 class="mb-1 mt-0 fw-normal">Itu</h5>
                                        <div class="progress-w-percent mb-0">
                                            <span class="progress-value fw-bold">61k </span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="#" class="btn btn-sm btn-link float-end">Export
                                            <i class="mdi mdi-download ms-1"></i>
                                        </a>
                                        <h4 class="header-title mt-2 mb-3">Produto mais Vendidos</h4>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap table-hover mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">ASOS Ridley High Waist</h5>
                                                            <span class="text-muted font-13">07 April 2018</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$79.49</h5>
                                                            <span class="text-muted font-13">Preço</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">82</h5>
                                                            <span class="text-muted font-13">Quantidade</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$6,518.18</h5>
                                                            <span class="text-muted font-13">Total</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Marco Lightweight Shirt</h5>
                                                            <span class="text-muted font-13">25 March 2018</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$128.50</h5>
                                                            <span class="text-muted font-13">Preço</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">37</h5>
                                                            <span class="text-muted font-13">Quantidade</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$4,754.50</h5>
                                                            <span class="text-muted font-13">Total</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Half Sleeve Shirt</h5>
                                                            <span class="text-muted font-13">17 March 2018</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$39.99</h5>
                                                            <span class="text-muted font-13">Preço</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">64</h5>
                                                            <span class="text-muted font-13">Quantidade</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$2,559.36</h5>
                                                            <span class="text-muted font-13">Total</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Lightweight Jacket</h5>
                                                            <span class="text-muted font-13">12 March 2018</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$20.00</h5>
                                                            <span class="text-muted font-13">Preço</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">184</h5>
                                                            <span class="text-muted font-13">Quantidade</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$3,680.00</h5>
                                                            <span class="text-muted font-13">Total</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">Marco Shoes</h5>
                                                            <span class="text-muted font-13">05 March 2018</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$28.49</h5>
                                                            <span class="text-muted font-13">Preço</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">69</h5>
                                                            <span class="text-muted font-13">Quantidade</span>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-14 my-1 fw-normal">$1,965.81</h5>
                                                            <span class="text-muted font-13">Total</span>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-xl-3 col-lg-6 order-lg-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Relatório Venda</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Relatório</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Lucro</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Ação</a>
                                            </div>
                                        </div>
                                        <h4 class="header-title">Total de Vendas</h4>

                                        <div id="average-sales" class="apex-charts mb-4 mt-4"
                                            data-colors="#727cf5,#0acf97,#fa5c7c,#ffbc00"></div>
                                       

                                        <div class="chart-widget-list">
                                            <p>
                                                <i class="mdi mdi-square text-primary"></i> Matriz
                                                <span class="float-end">$300.56</span>
                                            </p>
                                            <p>
                                                <i class="mdi mdi-square text-danger"></i> Filial
                                                <span class="float-end">$135.18</span>
                                            </p>
                                            <p>
                                                <i class="mdi mdi-square text-success"></i> Avalista
                                                <span class="float-end">$48.96</span>
                                            </p>
                                            <p class="mb-0">
                                                <i class="mdi mdi-square text-warning"></i> E-mail
                                                <span class="float-end">$154.02</span>
                                            </p>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-xl-3 col-lg-6 order-lg-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Relatório Vendas</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Relatórios</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Lucro</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Ação</a>
                                            </div>
                                        </div>
                                        <h4 class="header-title mb-2">Atividade Recente</h4>

                                        <div data-simplebar style="max-height: 419px;"> 
                                            <div class="timeline-alt pb-0">
                                                <div class="timeline-item">
                                                    <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                                                    <div class="timeline-item-info">
                                                        <a href="#" class="text-info fw-bold mb-1 d-block">You sold an item</a>
                                                        <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                                        <p class="mb-0 pb-2">
                                                            <small class="text-muted">5 minutes ago</small>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="timeline-item">
                                                    <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                                                    <div class="timeline-item-info">
                                                        <a href="#" class="text-primary fw-bold mb-1 d-block">Product on the Bootstrap Market</a>
                                                        <small>Dave Gamache added
                                                            <span class="fw-bold">Admin Dashboard</span>
                                                        </small>
                                                        <p class="mb-0 pb-2">
                                                            <small class="text-muted">30 minutes ago</small>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="timeline-item">
                                                    <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                                                    <div class="timeline-item-info">
                                                        <a href="#" class="text-info fw-bold mb-1 d-block">Robert Delaney</a>
                                                        <small>Te mandou mensagem
                                                            <span class="fw-bold">"Você está aí?"</span>
                                                        </small>
                                                        <p class="mb-0 pb-2">
                                                            <small class="text-muted">2 hours ago</small>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="timeline-item">
                                                    <i class="mdi mdi-upload bg-primary-lighten text-primary timeline-icon"></i>
                                                    <div class="timeline-item-info">
                                                        <a href="#" class="text-primary fw-bold mb-1 d-block">Audrey Tobey</a>
                                                        <small>Foto Carregada
                                                            <span class="fw-bold">"Erro.jpg"</span>
                                                        </small>
                                                        <p class="mb-0 pb-2">
                                                            <small class="text-muted">14 hours ago</small>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="timeline-item">
                                                    <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                                                    <div class="timeline-item-info">
                                                        <a href="#" class="text-info fw-bold mb-1 d-block">Você vendeu um item</a>
                                                        <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                                        <p class="mb-0 pb-2">
                                                            <small class="text-muted">16 hours ago</small>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="timeline-item">
                                                    <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                                                    <div class="timeline-item-info">
                                                        <a href="#" class="text-primary fw-bold mb-1 d-block">Product on the Bootstrap Market</a>
                                                        <small>Dave Gamache added
                                                            <span class="fw-bold">Admin Dashboard</span>
                                                        </small>
                                                        <p class="mb-0 pb-2">
                                                            <small class="text-muted">22 hours ago</small>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="timeline-item">
                                                    <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                                                    <div class="timeline-item-info">
                                                        <a href="#" class="text-info fw-bold mb-1 d-block">Robert Delaney</a>
                                                        <small>Te mandou uma mensagem
                                                            <span class="fw-bold">"Você está aí?"</span>
                                                        </small>
                                                        <p class="mb-0 pb-2">
                                                            <small class="text-muted">2 days ago</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end timeline -->
                                        </div> <!-- end slimscroll -->
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card-->
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Inicio Rodapé -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Indafire - Equipamentos de Combate a Incendios
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">Sobre</a>
                                    <a href="javascript: void(0);">Suporte</a>
                                    <a href="javascript: void(0);">Contato</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- final Rodapé -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <!--div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Configurações</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Personalizar </strong> Esquema de cores, menu barra lateral, etc.
                    </div>

                    <!-- Settings -->
                    <!--h5 class="mt-3">Coleção Cores</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Modo Claro</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Modo Escuro</label>
                    </div>
       

                    <!-- Width -->
                    <!--h5 class="mt-4">Largura</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                        <label class="form-check-label" for="fluid-check">Fluido</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Caixa</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <!--h5 class="mt-4">Barra Lateral Esquerda</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Padrão</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                        <label class="form-check-label" for="light-check">Claro</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Escuro</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixo</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensado</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Rolável</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reiniciar Padrão</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Comprar Agora</a>
                    </div>
                </div> <!-- end padding-->

            <!--/div>
        </div-->

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/apexcharts.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="assets/js/pages/demo.dashboard.js"></script>
        <!-- end demo js-->

        <!-- script para funções de arquivo-->
        <script src="assets/js/script.js"></script>
        <!-- final de script js-->
    </body>

<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 14:41:29 GMT -->
</html>