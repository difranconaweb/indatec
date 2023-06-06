<?php

/*https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



session_start();
$usuario   = $_SESSION['usuario'];
$codigo    = $_SESSION['id'];
$data      = Date('d/m/Y');
$hora      = Date('H:y:s');
$mes       = Date('m');
$ano       = Date('Y');
$dia       = Date('d');



$cid = mysqli_query($con,"SELECT CLI_COD_CLI, CLI_DAT_CRIA_CLI FROM t0013 WHERE CLI_DAT_COMPOSE = ''");
/*while($cid3 = mysqli_fetch_array($cid))
{
    $codigo    = $cid3['CLI_CID_CLI'];

 
 
    $cidd = mysqli_query($con,"SELECT MUN_NOME_MUN FROM t0027 WHERE MUN_COD_MUN = '$codigo'");
    while($cidd3 = mysqli_fetch_array($cidd))
    {
       $cidade = $cidd3['MUN_NOME_MUN'];
    }

    mysqli_query($con,"UPDATE t0013 SET CLI_CID_CLI = '$cidade' WHERE CLI_CID_CLI = '$codigo'");
}*/


 while($cid3 = mysqli_fetch_array($cid))
 {
       $codigo  = $cid3['CLI_COD_CLI'];
       $dat     = $cid3['CLI_DAT_CRIA_CLI'];
       $createdat = substr($dat,0,7);
       mysqli_query($con,"UPDATE t0013 SET CLI_DAT_COMPOSE = '$createdat' WHERE CLI_COD_CLI = '$codigo'");
 }



/*     $dataCompleta  = $ano.'-'.$mes.'-'.$dia; // DATA DO DIA //
 
     // ## INSERINDO A UNIDADE MONETARIA ## //
     setlocale(LC_MONETARY,'pt_BR');

     // ## BUSCA NA TABELA DE MEMO A ULTIMA SEGUNDA FEIRA SALVA ## //
      $se = mysqli_query($con,"SELECT semData FROM semanaMemo ORDER BY semCodigo DESC LIMIT 1");
      while($_se = mysqli_fetch_array($se))
      {
          $segunda = $_se['semData'];
      }
      // ## FINAL DE BUSCA DE SEGUNDA FEIRA NA TABELA DE MEMORIA ## //





  // ## AQUI CARREGA A QUANTIDADE DE PEDIDOS DA SEMANA ## //
              $sq3 = mysqli_query($con,"SELECT PED_NUM_PED, PED_DAT_ABER_PED FROM `t0019` WHERE PED_DAT_ABER_PED BETWEEN '2023-03-01' AND '2023-03-14' AND PED_STATUS_PED = 'F' AND PED_COD_TIP_VEND IN(510201,510202)"); 
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


*/


// ## BUSCANDO INFORMAÇÕES DO USUARIO LOGADO ## //
/*$sql = mysqli_query($con,"SELECT funPrimNome,funCargo FROM funcionarios WHERE funCodigo = '$id'");
while($obj = mysqli_fetch_array($sql))
{
    $nome  = $obj['funPrimNome']; // NOME DO USUARIO //
    $cargo = $obj['funCargo'];    // CARGO DO USUARIO //
}
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

      // ESTA DATA VEM DO MES CORRENTE //
      $dataInit = $ano.'-'.$mes.'-01';
      $dataEnd  = $ano.'-'.$mes.'-'.$dia;

      
     // ESTA DATA VEM DO MES ANTERIOR //
      if($mes == 1){$mes = 12;$ano = $ano - 1;}else{$mes=($mes-1);$mes='0'.$mes;$ano=$ano;}
      $dataInit_ant = $ano.'-'.$mes.'-01';;
      $dataEnd_ant  = $ano.'-'.$mes.'-'.$dia;
// ############################################################################################################################################# //
      // ## AQUI CARREGA A QUANTIDADE DE PEDIDOS DO MÊS ATUAL ## //
      $sq3 = mysqli_query($con,"SELECT PED_NUM_PED, PED_DAT_ABER_PED FROM `t0019` WHERE PED_DAT_ABER_PED BETWEEN '$dataInit' AND '$dataEnd' AND PED_STATUS_PED = 'F' AND PED_COD_TIP_VEND IN(510201,510202)"); 
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

print $receitaA.'<br>';
      
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
      $fPerCres    = (100 / $fVal);
      $fPerCres    = number_format($fPerCres,2);
      
print $receitaAn;  */

      // ##  DEFININDO A SETA DE STATUS ## //
  /*    if($totalPedidos < 0){$index = 'mdi mdi-arrow-down-bold'; $cor = 'text-danger me-2';}else{$index = 'mdi mdi-arrow-up-bold';$cor = 'text-success me-2';}
      // ##  DEFININDO PERCENTUAL DA RECEITA ## //
      if($receitaAn > $receitaA){$indiceR = 'mdi mdi-arrow-down-bold'; $corR = 'text-danger me-2';}else{$indiceR = 'mdi mdi-arrow-up-bold';$corR = 'text-success me-2';}

// ## LIMPANDO AS TABELAS DE MEMORIA RELATORIOS  ## //
      mysqli_query($con,"TRUNCATE pedidosMemoReport");
      mysqli_query($con,"TRUNCATE pedidosMemoReport_1");

// ## FAZENDO TRATAMENTO DO DIA DA SEMANA ## //
    switch (date('D')) {
    case "Sun": // DOMINGO //
        $diaSemana = 1;
        break;
    case "Mon": // SEGUNDA FEIRA //
          $mon = mysqli_query($con,"SELECT PED_NUM_PED FROM t0019 WHERE PED_DAT_ABER_PED = '$dataEnd' ORDER BY PED_NUM_PED ASC");
          while($m3n = mysqli_fetch_array($mon))
          {

          }
        break;
    case "Tue": //TERÇA FEIRA //
        $diaSemana = 3;
        break;
    case "Wed": //QUARTA FEIRA //
        $diaSemana = 4;
        break;
    case "Thu": //QUINTA FEIRA //
        $diaSemana = 5;
        break;
    case "Fri": //SEXTA FEIRA //
        $diaSemana = 6;
        break;
    case "Sat": //SABADO //
        $diaSemana = 7;
        break;
    default: "ERRO AO CARREGAR O DIA DA SEMANA";break;
}
// ## FINAL DE TRATAMENTO DIA DA SEMANA   ## //

/*###########################################################################*/
/* ###  ARQUIVO DE PRIMEIRO ACESSO DASHBOARD   -     SISTEMA DE INDATEC  ### */
/*###########################################################################*/
?>