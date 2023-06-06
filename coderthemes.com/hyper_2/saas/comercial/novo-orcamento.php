<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 04NOV22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 04NOV22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 04NOV22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22MAR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
CRIANDO NOVO ORÇAMENTO   */

require 'inc/conexao.php';


session_start();
$usuario = $_SESSION['usuario'];
$codigo  = $_SESSION['id'];
$orc     = $_REQUEST['orcamento'];

// ## CRIANDO DATA DE ABERTURA DE NOVO ORÇAMENTO ## //
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$dataCompleta = $ano.'-'.$mes.'-'.$dia;

// ## CRIANDO TRIGGER PARA OS PEDIDOS ## //
$sql = mysqli_query($con,"SELECT PED_NUM_PED FROM t0019");
while($obj = mysqli_fetch_array($sql))
{
    $pedido = $obj['PED_NUM_PED'];
}

$pedido = ($pedido+1);


// ## ABRINDO NOVO PEDIDO ## //
mysqli_query($con,"INSERT INTO t0019 (PED_COD_EMP, PED_NUM_PED, PED_DAT_ABER_PED, PED_DAT_PED_CLI_PED, PED_RESPONSAVEL) VALUES (1,'$pedido','$dataCompleta','$dataCompleta','$usuario')");
header('Location:form-wizard-orcamento.php');
// ## FINAL DE BUSCAR INFORMAÇÕES USUÁRIO    ## //

// ########################################################################## //
// ###  ARQUIVO DE ORÇAMENTO COM GRID DE ORÇAMENTOS - SISTEMA DE INDATEC  ### //
// ########################################################################## //
?>