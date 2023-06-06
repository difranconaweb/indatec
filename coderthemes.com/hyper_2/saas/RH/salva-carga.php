<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 15MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 15MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 15MAI23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 17MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 18MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 30MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $entrada   = $_REQUEST['entrada'];  // ## CARREGA O HORARIO DA ENTRADA ## //
        $entradain = $_REQUEST['entradain']; // ## CARREGA O HORÁRIO DA ENTRADA ALMOÇO ## //
        $saidain   = $_REQUEST['saidain']; // ## CARREGA O HORARIO SAIDA ALMOÇO ## //
        $saida     = $_REQUEST['saida']; // ## CARREGA O HORÁRIO DA SAIDA ## //
        $empregado = $_REQUEST['empregado']; // ## CARREGA O NOME DO EMPREGADO ## //
        $matricula = $_REQUEST['matricula']; // ## CARREGA A MATRICULA DO EMPREGADO ## //
        $data3     = $_REQUEST['data']; // ## CARREGA A DATA DO REGISTRO NO SISTEMA DE PONTO ## //
        

  // ## CONVERTENDO A DATA EM LITERAL ## //
         $mes = substr($carDtData,3,-5);

         // ## ROTINA DE SWITCH PARA CARREGAR A DATA DO MES EM LITERAL ## //
         switch($mes)
         {
              case "01":
                $mes = 'JAN';
              break;

              case "02":
                $mes = 'FEV';
              break;

              case "03":
                $mes = 'MAR';
              break;

              case "04":
                $mes = 'ABR';
              break;

              case "05":
                $mes = 'MAI';
              break;

              case "06":
                $mes = 'JUN';
              break;

              case "07":
                $mes = 'JUL';
              break;

              case "08":
                $mes = 'AGO';
              break;

              case "09":
                $mes = 'SET';
              break;

              case "10":
                $mes = 'OUT';
              break;

              case "11":
                $mes = 'NOV';
              break;

              case "12":
                $mes = 'DEZ';
              break;
              default:
              print "Não consta mês : erro ";
         }
        // ## FINAL DE SWITCH ## //
;


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
                   $totalExtra = 0;
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


    // ## FUNÇÃO PARA CALCULAR O ATRASO ## //
        function acumuladoAtraso($total,$diario)
        {
          // ENCONTRA AQUI O VALOR DA DIFERENÇA DO ATRASO //
            $totalAtraso = ($diario - $total);
            if($totalAtraso < 0)
            {
                $totalAtraso = 0;
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
          $vEntradaAtraso   = entradaAtraso($entrada);
          $vAlmoco          = almoco($entradain,$saidain);
          $vAlmocoAtraso    = almocoAtraso($entradain,$saidain);
          $vSaida           = saida($saida);
          $vSaidPerda       = saidaPerda($saida);
          $vAcumuladoExtra  = acumuladoExtra($total,$diario);
          $vAcumuladoAtraso = ($vEntradaAtraso + $vAlmocoAtraso + $vSaidaPerda);
         // ## FINAL DE COLEÇÃO DE VARIÁVEIS ## // 
       
    
        // ## SALVANDO OS DADOS NA TABELA ## //
        $sql = mysqli_query($con,"INSERT INTO carga_horaria (carMatricula,carFuncionario,carEntrada,carAlmocoEntrada,carAlmocoSaida,carIntervaloIn,carIntervaloOut,carSaida,carData,carExtra,carAtraso,carHora,carMinuto,carDtData,carMes,carResponsavel) VALUES ('$matricula','$empregado','$entrada','$entradain','$saidain','0:00','0:00','$saida','$data3','$vAcumuladoExtra','$vAcumuladoAtraso','$hora','$total','$data','$mes','$usuario')");
       

        // ## APONTANDO PARA FORM CARGA HORARIA ## //
        header('Location:carga-hora.php');
    
?>