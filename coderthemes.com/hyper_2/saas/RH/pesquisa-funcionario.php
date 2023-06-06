<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 15MAI23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 15MAI23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 15MAI23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



        session_start();
        $usuario   = $_SESSION['usuario'];
        $codigo    = $_SESSION['id'];
        $data      = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //
        $nome      = $_REQUEST['nome'];  // ## CARREGA O NOME DO FUNCIONÁRIO ## //
        $numero    = $_REQUEST['numero']; // ## CARREGA O NUMERO DO FUNCIONÁRIO ## //
        $tabela    = $usuario.$codigo; // ## CRIANDO O NOME DA TABELA ## //
    

// ##################################################################################################################################### // 
// ##################################################################################################################################### // 
       
        // ## BUSCANDO INFORMAÇÕES DO FUNCIONÁRIO ## //
        $sql = mysqli_query($con,"SELECT funNome,funCodigo FROM funcionarios WHERE funNome = '$nome' OR funCodigo = '$numero'");
        while($obj = mysqli_fetch_array($sql))
        {
            $funCodigo = $obj['funCodigo'];  // CÓDIGO DO FUNCIONÁRIO //
            $funNome   = $obj['funNome'];    // NOME DO FUNCIONÁRIO //
        }
        // ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

        // ## SALVANDO A PESQUISA NA TABELA DE USUÁRIO NO CAMPO DE CORINGA01 ## //
         mysqli_query($con,"UPDATE $tabela SET coringa01 = '$funCodigo'");

        // ## FINAL DE ROTINA PARA SALVAR PESQUISA TABELA USUÁRIO ## //


        // ## APONTANDO PARA FORM CARGA HORARIA ## //
        header('Location:carga-hora.php');
    
?>