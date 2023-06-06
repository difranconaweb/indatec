<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 31MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 31MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 31MAI23


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';


session_start();
$usuario   = $_SESSION['usuario'];
$codigo    = $_SESSION['id'];
$data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
$empregado = $_REQUEST['empregado']; // CARREGA O NOME DO EMPREGADO //
$mes       = $_REQUEST['mes']; // MES QUE DESEJA ALTERAR //

      
  
        
        // BUSCANDO O REGISTRO DO MES E INSERINDO TUDO NA TABELA DE HISTÓRICO ## //
        $list =  mysqli_query($con,"SELECT * FROM carga_historico WHERE carFuncionario = '$empregado' AND carMes = '$mes'");
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
               $carResponsavel   = $list3['carResponsavel'];
               

              // ## INSERINDO OS REGISTROS NA TABELA DE HISTORICO ## //
              mysqli_query($con,"INSERT INTO carga_horaria (carMatricula,carFuncionario,carEntrada,carAlmocoEntrada,carAlmocoSaida,carIntervaloIn,carIntervaloOut,carSaida,carData,carExtra,carAtraso,carHora,carMinuto,carDtData,carResponsavel) VALUES ('$carMatricula','$carFuncionario','$carEntrada','$carAlmocoEntrada','$carAlmocoSaida','$carIntervaloIn','$carIntervaloOut','$carSaida','$carData','$carExtra','$carAtraso','$carHora','$carMinuto','$carDtData','$carResponsavel')");
        }

        // ## INSERINDO O FUNCIONARIO NA TABELA DE NOME DO MES ## //
          mysqli_query($con,"INSERT INTO nome_do_mes (nome,mes) VALUES ('$empregado','$mes')");
        // ## FINAL DE ROTINA DE TABELA NOME DO MES ## //
        
        
        // ## REMOVENDO O RELATÓRIO EM RESUMO DA TABELA DE CARGA REFERENCIA ## //
           mysqli_query($con,"DELETE FROM carga_referencia WHERE carEmpregado = '$empregado' AND carMes = '$mes'");
        // ## FINAL DE ROTINA REMOVER CARGA REFERRENCIA ## //


        // ## APONTANDO PARA FORM CARGA HORARIA ## //
        header('Location:carga-hora.php');
        print "Aguarde um momento..."
?>