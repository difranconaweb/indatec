<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 26MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 26MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 26MAI23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



       
        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $empregado = $_REQUEST['empregado'];  // CARREGA NOME DO EMPREGADO  //
        $mes       = $_REQUEST['mes'];  // MES QUE DESEJA APAGAR NA TABELA //
       

        // ## QUERY PARA APAGAR O REGISTRO SELECIONADO ## //
         mysqli_query($con,"DELETE FROM carga_referencia WHERE carEmpregado = '$empregado' AND carMes = '$mes'");

         // ## APONTANDO PARA FORM CARGA HORARIA ## //
        header('Location:carga-hora.php');
    
?>