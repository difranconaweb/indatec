<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 22MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 22MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 22MAI23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 25MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario     = $_SESSION['usuario'];
        $codigo      = $_SESSION['id'];
        $data        = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $inicial     = $_REQUEST['inicial'];  // ## CARREGA A DATA INCIAL ## //
        $final       = $_REQUEST['final']; // ## CARREGA A DATA FINAL ## //
        $divirgencia = $_REQUEST['divirgencia']; // ## CARREGA A DIVIRGENCIA ## //
        $empregado   = $_REQUEST['empregado']; // ## CARREGA O NOME DO EMPREGADO ## //
        $matricula   = $_REQUEST['matricula']; // ## CARREGA A MATRICULA ## //
       


       
// ##################################################################################################### //
// ##################################################################################################### //
       
       
        // ## SALVANDO OS DADOS NA TABELA ## //
        $sql = mysqli_query($con,"INSERT INTO carga_horaria (carMatricula,carFuncionario,carEntrada,carAlmocoEntrada,carAlmocoSaida,carintervaloIn,carIntervaloOut,carSaida,carData,carExtra,carAtraso,carHora,carMinuto,carDtData,carResponsavel) VALUES ('$matricula','$empregado','$divirgencia','$divirgencia','$divirgencia','$divirgencia','$divirgencia','$divirgencia','$inicial','0','0','','','$data','$usuario')");
       

        // ## APONTANDO PARA FORM CARGA HORARIA ## //
        header('Location:carga-hora.php');
    
?>