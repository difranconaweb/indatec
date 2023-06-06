<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 15OUT22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 15OUT22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 15OUT22



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 16OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 17OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 24MAR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */

require 'inc/conexao.php';


session_start();
$usuario = $_SESSION['usuario'];
$codigo  = $_SESSION['id'];
$data    = Date('d/m/Y');
$mes     = Date('m');
$hora    = Date('H:i:s');


// ## CRIANDO TRIGGER PARA OS PEDIDOS ## //
$sql = mysqli_query($con,"SELECT PED_NUM_PED FROM t0019");
while($obj = mysqli_fetch_array($sql))
{
    $pedido = $obj['PED_NUM_PED'];
}

$pedido = ($pedido+1);


// ## ABRINDO NOVO PEDIDO ## //
mysqli_query($con,"INSERT INTO t0019 (PED_NUM_PED) VALUES ('$pedido')");
// ## INSERINDO O NOVO PEDIDO NA TABELA DE RELATORIO ## //
mysqli_query($con,"INSERT INTO relatorio (relPedido, relCodigoCliente, relStatus, relEmail, relEndereco, relNumero, relCidade, relBairro, relTelefone, relContato, relData, relMes, relHora, relStatus1) VALUES ('$pedido',000,0,'comercial@indafire.ind.br','xxxxx','000','xxxx','xxxxx','(xx)xxxx-xxxx','xxxxx','$data','$mes','$hora',0)");
// PONTEIRO //
header('Location:form-wizard-pedido.php');
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

/*###########################################################################*/
/* ###  ARQUIVO DE PEDIDO COM GRID DE PEDIDOS  -     SISTEMA DE INDATEC  ### */
/*###########################################################################*/
?>