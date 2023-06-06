<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 20OUT22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 20OUT22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 20OUT22



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 20OUT22 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';



session_start();
$usuario  = $_SESSION['usuario']; // NOME DO USUARIO //
$codigo   = $_SESSION['id'];      // CODIGO DO USUARIO //
$endereco = $_GET['endereco']; // CARREGAR O ENDEREÇO DIGITADO //
$data     = Date('d/m/Y'); // DATA  ATUAL //
$hora     = Date('H:i:s'); // HORA ATUAL //

//#############################################################################//
// ###  ARQUIVO DE CADASTRO DE ENDEREÇO DE ENTREGA  - SISTEMA DE INDATEC  ### //
//############################################################################//

    
    // BUSCANDO O NUMERO DO ULTIMO PEDIDO INSERIDO //
    $sql = mysqli_query($con,"SELECT lisNumero FROM listaPedidos WHERE lisData = '$data'");
    while($obj = mysqli_fetch_array($sql))
    {
       $pedido = $obj['lisNumero'];
    }
    // INSERINDO O ENDEREÇO PARA A ENTREGA //
    $ins = mysqli_query($con,"UPDATE listaPedidos SET lisEndereco = '$endereco' WHERE lisNumero = '$pedido'");

    if(empty($ins))
    {
        print 0;
    }
    
    else
    {
        print 1;
    }
?>
