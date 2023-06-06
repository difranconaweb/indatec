<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 22MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 22MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 22MAI23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



       
        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $numero    = $_REQUEST['numero'];  // CARREGA NUMERO DO REGISTRO QUE FOI INSERIDO NA TABELADE CARGA_HORARIA  //
       

        // ## QUERY PARA APAGAR O REGISTRO SELECIONADO ## //
         mysqli_query($con,"DELETE FROM carga_horaria WHERE carCodigo = '$numero'");

         // ## APONTANDO PARA FORM CARGA HORARIA ## //
        header('Location:carga-hora.php');
    
?>