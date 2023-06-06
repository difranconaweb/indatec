<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 29MAR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 29MAR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 29MAR23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 30MAR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $numero    = $_REQUEST['numero'];  // CARREGA O NUMERO DO CLIENTE  //
        

        // ## QUERY PARA APAGAR O CLIENTE DA TABELA ## //
        $sql = mysqli_query($con,"DELETE FROM t0013 WHERE CLI_COD_CLI = '$numero'");
        
        // PONTEIRO //
        header('Location:form-elements.php');
        // ## FINAL DE ROTINA DE APAGAR CLIENTES ## //
?>