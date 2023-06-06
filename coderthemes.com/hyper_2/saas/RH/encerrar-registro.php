<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 17MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 17MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 17MAI23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 18MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 29MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';


session_start();
$usuario   = $_SESSION['usuario'];
$codigo    = $_SESSION['id'];
$data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
$empregado = $_REQUEST['empregado']; // CARREGA O NOME DO EMPREGADO //
$matricula = $_REQUEST['matricula']; // MATRICULA DO EMPREGADO //

      

        
        // BUSCANDO O REGISTRO DO MES E INSERINDO TUDO NA TABELA DE HISTÓRICO ## //
        $list =  mysqli_query($con,"SELECT * FROM carga_horaria WHERE carFuncionario = '$empregado' AND carMatricula = '$matricula'");
        while($list3 = mysqli_fetch_array($list))
        {
               $carMatricula     = $list3['carMatricula'];
               $carFuncionario   = $list3['carFuncionario'];
               $carEntrada       = $list3['carEntrada'];
               $carAlmocoEntrada = $list3['carAlmocoEntrada'];
               $carAlmocoSaida   = $list3['carAlmocoSaida'];
               $carIntervaloIn   = $list3['carIntervaloIn'];
               $carIntervaloOut  = $list3['carIntervaloOut'];
               $carSaida         = $list3['carSaida'];
               $carData          = $list3['carData'];
               $carExtra         = $list3['carExtra'];
               $carAtraso        = $list3['carAtraso'];
               $carHora          = $list3['carHora'];
               $carMinuto        = $list3['carMinuto'];
               $carDtData        = $list3['carDtData'];
               $carMes           = $list3['carMes'];
               $carResponsavel   = $list3['carResponsavel'];
               

              // ## INSERINDO OS REGISTROS NA TABELA DE HISTORICO ## //
              mysqli_query($con,"INSERT INTO carga_historico (carMatricula,carFuncionario,carEntrada,carAlmocoEntrada,carAlmocoSaida,carIntervaloIn,carIntervaloOut,carSaida,carData,carExtra,carAtraso,carHora,carMinuto,carDtData,carMes,carResponsavel) VALUES ('$carMatricula','$carFuncionario','$carEntrada','$carAlmocoEntrada','$carAlmocoSaida','$carIntervaloIn','$carIntervaloOut','$carSaida','$carData','$carExtra','$carAtraso','$carHora','$carMinuto','$carDtData','$carMes','$carResponsavel')");
        }
        
        

        // ## CONVERTENDO A DATA EM LITERAL ## //
         $mes = substr($carDtData,3,-5);
         $ano = substr($carDtData,6);

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

        // PAUSA PARA O LAÇO ACIMA TERMINAR O PROCESSO DE TROCA //
        sleep(3);

       // ## BUSCANDO OS VALORES DA TABELA DE HISTÓRICO ## //
        $his = mysqli_query($con,"SELECT carFuncionario, sum(carExtra) AS EXTRA, sum(carAtraso) AS ATRASO, carResponsavel FROM  carga_historico WHERE carFuncionario = '$carFuncionario' AND carDtData = '$data'");
        while($h3s = mysqli_fetch_array($his))
        {
             $funcionario = $h3s['carFuncionario'];
             $extras      = $h3s['EXTRA'];
             $atrasos     = $h3s['ATRASO'];
             $responsavel = $h3s['carResponsavel'];
        }



          // ## TRANSFORMANDO MINUTOS EM HORA COM CENTESIMO APÓS A VIRGULA ## //
          if($extras > 60)
          {
              $sExtras = ($extras / 60);
              $sExtras = number_format($sExtras,2);
          }

          else
          {
              $sExtras = ($extras / 60);
              $sExtras = number_format($sExtras,2);
          }

          if($atrasos > 60)
          {
              $sAtrasos = ($atrasos / 60);
              $sAtrasos = number_format($sAtrasos,2);
          }
          else
          {
              $sAtrasos = ($atrasos / 60);
              $sAtrasos = number_format($sAtrasos,2);
          }
       // ## FINAL DE TRANSOFMRAÇÃO MINUTOS EM HORAS ## //

        // ## CRIANDO REGISTRO PARA A REFERENCIA DA COLEÇÃO DE REGISTROS ## //
         mysqli_query($con,"INSERT INTO carga_referencia (carEmpregado,carMes,carAno,carMinuto,carExtras,carFinalExtras,carAtrasos,carFinalAtrasos,carResponsavel) VALUES ('$funcionario','$mes','$ano','$sMinutos','$extras','$sExtras','$atrasos','$sAtrasos','$responsavel')");

       // ## LIMPANDO A TABELA QUE RECEBE OS DADOS DO FRONT ## //
         mysqli_query($con,"TRUNCATE carga_horaria");  
       // ## FINAL DE LIMPA TABELA RECEBE DADOS ## //

       // ## REMOVENDO O NOME DO FUNCIONARIO DA TABELA DE NOME DO MES ## //
         mysqli_query($con,"DELETE FROM nome_do_mes WHERE nome = '$funcionario'");


        // ## APONTANDO PARA FORM CARGA HORARIA ## //
       header('Location:carga-hora.php');
       print "Aguarde um momento..."
?>