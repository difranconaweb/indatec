<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 29MAR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 29MAR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 29MAR23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 29MAR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $numero    = $_REQUEST['numero'];  // CARREGA O NUMERO DE VALOR ZERO  //
        

        
        
                 $sql = mysqli_query($con,"SELECT memCodigoId FROM memoApagar");
                 while($_sql = mysqli_fetch_array($sql))
                 {
                     $num = $_sql['memCodigoId'];
                 }

                // ## QUERY PARA APAGAR O CLIENTE DA TABELA ## //
                $sql = mysqli_query($con,"DELETE FROM t0013 WHERE CLI_COD_CLI = '$num'");
        
        // LIMPANDO A TABELA DE MEMORIA //
        mysqli_query($con,"TRUNCATE memoApagar");

        // ## SE TUDO DER CERTO VOLTA VALOR 1 SENAO VALOR 00  ## //
        if(empty($sql))
        {
             print 0;
        }

        else
        {
             print 1;
        }
?>