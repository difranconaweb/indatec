<?php



require 'inc/conexao.php';

/*$minuto = -305;

$final = $minuto*(-1);
$dtTabela = '2023-05-23';
$carDtData = '22/05/2023';

/*if($minuto > 60)
{print "maior"."</br>";
    $final = ($minuto / 60);
}

else
{print "menor"."</br>";
    $min   = ($minuto*100);
    $final = ($min/60);
}*/


// ## CONVERTENDO A DATA EM LITERAL ## //
/*$mes = substr($carDtData,3,-5);
$ano = substr($carDtData,6);
$dia = substr($carDtData,0,-8);
$dia."-".$mes."-".$ano;
$data3 = '2023-05-12';

 $atrasos = -129;

  print   $sAtrasos = ($atrasos*(-1));*/


/* $sql = mysqli_query($con,"SELECT * FROM carga_historico WHERE carFuncionario = 'FRANCO'");
  while($obj = mysqli_fetch_array($sql))
  {
        $matricula    = $obj['carMatricula'];
        $funcionario  = $obj['carFuncionario'];
        $entrada      = $obj['carEntrada'];
        $almocoEnt    = $obj['carAlmocoentrada'];
        $almocoSai    = $obj['carAlmocoSaida'];
        $$intervaloIn = $obj['carIntervaloIn'];
        $intervaloOut = $obj['carIntervaloOut'];
        $saida        = $obj['carSaida'];
        $data         = $obj['carData'];
        $extra        = $obj['carExtra'];
        $atraso       = $obj['carAtraso'];
        $hora         = $obj['carHora'];
        $minuto       = $obj['carMinuto'];
        $dtData       = $obj['carDtData'];
        $responsavel  = $obj['carResponsavel'];

        mysqli_query($con,"INSERT INTO carga_horaria (carMatricula,carFuncionario,carEntrada,carAlmocoEntrada,carAlmocoSaida,carIntervaloIn,carIntervaloOut,carSaida,carData,carExtra,carAtraso,carHora,carMinuto,carDtData,carResponsavel) VALUES ('$matricula','$funcionario','$entrada','$almocoEnt','$almocoSai','$intervaloIn','$intervaloOut','$saida','$data','$extra','$atraso','$hora','$minuto','$dtData','$responsavel')");
  }

 
mysqli_query($con,"DELETE FROM carga_historico WHERE carFuncionario = 'FRANCO'");*/



 /* session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];*/
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $entrada   = '07:19';//$_REQUEST['entrada'];  // ## CARREGA O HORARIO DA ENTRADA ## //
        $entradain = '11:31';//$_REQUEST['entradain']; // ## CARREGA O HORÁRIO DA ENTRADA ALMOÇO ## //
        $saidain   = '12:22';//$_REQUEST['saidain']; // ## CARREGA O HORARIO SAIDA ALMOÇO ## //
        $saida     = '16:59';//$_REQUEST['saida']; // ## CARREGA O HORÁRIO DA SAIDA ## //
        $empregado = 'FRANCO';//$_REQUEST['empregado']; // ## CARREGA O NOME DO EMPREGADO ## //
        $matricula = 1;//$_REQUEST['matricula']; // ## CARREGA A MATRICULA DO EMPREGADO ## //
        $data3     = '2023-05-18';//$_REQUEST['data']; // ## CARREGA A DATA DO REGISTRO NO SISTEMA DE PONTO ## //
        

// ######################################################################################################################## //
// ######################################################################################################################## //      

        // ## FUNÇÃO PARA UMA HORA A MENOS DE SEXTA A FEIRA ## /
        function vendredi($data3)
        {
           require 'inc/conexao.php';
           
           // ## BUSCANDO NA TABELA O DIA CORRESPONDENDE AO DA SEXTA FEIRA ## //
           $dt = mysqli_query($con,"SELECT sexData FROM sextaMemo WHERE sexData = '$data3'");
           while($dta = mysqli_fetch_array($dt))
           {
               $sexData = $dta['sexData'];
           }

            // VERIFICA SE A DATA É SEXTA E SE CASO FOR, REDUZ A CARGA HORÁRIA ## //
            if(empty($sexData)){$carga = 540;}else{$carga  = 480;}

            return $carga;
        }

       $diario = vendredi($data3);
        // ## FINAL DE FUNÇÃO DE SEXTA FEIRA ## //

// ######################################################################################################################## //
// ######################################################################################################################## //        

    // ## FUNÇÃO PARA CALCULO DE HORÁRIO ENTRADA ## //
        function entrada($entrada)
        {
             $cont  = substr($entrada,-5,2);
             $cont3 = substr($entrada,3);
             $entrada = ($cont*60+$cont3);
             $tol = 435; // VALOR MAX DE REFERÊNCIA PARA A ENTRADA SEM CONTAR ATRÁSO (VALOR EM MIN) //
             if($entrada <= $tol)
             {
                 $entrada = 420;
             }

             else
             {
                 $entrada = $entrada;
             }  

             return $entrada;         
        }
    // ## FINAL DE FUNÇÃO HORÁRIO ENTRADA ## // 
// ##################################################################################################### //
// ##################################################################################################### //


   // ## FUNÇÃO PARA CALCULO DE HORÁRIO ENTRADA ATRASO ## //
        function entradaAtraso($entrada)
        {
             $cont  = substr($entrada,-5,2);
             $cont3 = substr($entrada,3);
             $entrada = ($cont*60+$cont3);
             $tol = 435; // VALOR MAX DE REFERENCIA PARA A ENTRADA SEM CONTRAR ATRÁSO (VALOR EM MIN) //
             if($entrada > $tol)
             {
                 $entrada = ($entrada - 420);
             }
             else
             {
                $entrada = 0;
             }
             
             return $entrada;
        }
    // ## FINAL DE FUNÇÃO HORÁRIO ENTRADA ATRASO ## // 
// ##################################################################################################### //
// ##################################################################################################### //


   // ## FUNÇÃO PARA CALCULO DE HORARIO DE ENTRADA E SAIDA DE ALMOÇO ## //
        function almoco($entradain,$saidain)
        {
          // VALOR DE ENTRADA DE ALMOÇO //
          $contin  = substr($entradain,-5,2);
          $contin3 = substr($entradain,3);
          $entrada = ($contin*60+$contin3);

          // VALOR DE SAIDA DE ALMOÇO //
          $contout  = substr($saidain,-5,2);
          $contout3 = substr($saidain,3);
          $saida    = ($contout*60+$contout3);
          $almoco   = ($saida - $entrada);
         
          return $almoco;
        }
// ##################################################################################################### //
// ##################################################################################################### //

  // ## FUNÇÃO PARA CALCULO DE HORARIO DE ENTRADA E SAIDA DE ALMOÇO ATRASO ## //
        function almocoAtraso($entradain,$saidain)
        {
          // VALOR DE ENTRADA DE ALMOÇO //
          $contin  = substr($entradain,-5,2);
          $contin3 = substr($entradain,3);
          $entrada = ($contin*60+$contin3);

          // VALOR DE SAIDA DE ALMOÇO //
          $contout  = substr($saidain,-5,2);
          $contout3 = substr($saidain,3);
          $saida    = ($contout*60+$contout3);
          $tol      = 60; // TOLERANCIA DO HORÁRIO DE ALMOÇO //
          $almoco   = ($saida - $entrada);

          if($almoco > $tol)
           {
               $almoco = ($almoco - $tol);
           }
           else
           {
              $almoco = 0;
           }
          return $almoco;
        }
// ##################################################################################################### //
// ##################################################################################################### //


  // ## FUNÇÃO PARA CALCULO DE HORÁRIO DE SAIDA ## //
        function saida($saida)
        {
            $cont  = substr($saida,-5,2);
            $cont3 = substr($saida,3);
            $saida = ($cont*60+$cont3);
            return $saida; 
        }
// ##################################################################################################### //
// ##################################################################################################### //

   // ## FUNÇÃO PARA CALCULO DE HORÁRIO DE SAIDA PERDA ## //
        function saidaPerda($saida)
        {
            $cont  = substr($saida,-5,2);
            $cont3 = substr($saida,3);
            $tol   = 1020; // NAO HÁ TOLERANCIA E APENAS HORÁRIO DE SAIDA //
            $saida = ($cont*60+$cont3);

            if($saida < $tol)
             {
                 $saida = ($tol - $saida);
             }
             else
             {
                $saida = ($saida - 1020);
             }
            
            return $saida; 
        }
// ##################################################################################################### //
// ##################################################################################################### //

    // ## VARIÁVEL CARREGA O VALOR TOTAL DO DIA DE TRABALHO ## //
    $total = (saida($saida) - entrada($entrada) - almoco($entradain,$saidain));

   

    // ## FUNÇÃO PARA VALOR ACUMULADO DE HORAS EXTRAS ## //
        function acumuladoExtra($total,$diario)
        {
          // ENCONTRA AQUI O VALOR DA DIFERENÇA DA HORA EXTRA //
               $totalExtra = ($total - $diario);
               if($totalExtra < 0)
               {
                   $totalExtra = (ABS($totalExtra));
               }

               else
               {
                  $totalExtra = $totalExtra;
               }
            
               return $totalExtra;
        }
    // ## FINAL DE FUNÇÃO ACUMULADO DE HORAS EXTRAS ## //
// ##################################################################################################### //
// ##################################################################################################### //
     $vEntradaAtraso   = (entradaAtraso($entrada) + almocoAtraso($entradain,$saidain) + saidaPerda($saida));

    // ## FUNÇÃO PARA CALCULAR O ATRASO ## //
        function acumuladoAtraso($total,$diario)
        {
          // ENCONTRA AQUI O VALOR DA DIFERENÇA DO ATRASO //
            $totalAtraso = ($diario - $total);
            if($totalAtraso < 0)
            {
                $totalAtraso = ABS($totalAtraso);
            }

            else
            {
                $totalAtraso = $totalAtraso;
            }

            return $totalAtraso;
        }
    // ## FINAL DE FUNÇÃO QUE CALCULA O ATRASO ## //
// ##################################################################################################### //
// ##################################################################################################### //

      
          // ## CARREGANDO VARIÁVEIS COM VALOR DAS  FUNÇÕES ## //
          $vEntrada         = entrada($entrada);
          $vAlmoco          = almoco($entradain,$saidain);
          $vSaida           = saida($saida);
          $vAcumuladoExtra  = acumuladoExtra($total,$diario);
          $vAcumuladoAtraso = acumuladoAtraso($total,$diario);
         // ## FINAL DE COLEÇÃO DE VARIÁVEIS ## // 

 print $vEntradaAtraso."-".almoco($entradain,$saidain);    
?>