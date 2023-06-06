<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 07FEV23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 07FEV23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 07FEV23


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07FEV23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */




session_start();
$usuario  = $_SESSION['usuario'];
$codigo   = $_SESSION['id'];
$data     = Date('d/m/Y'); // ## PEGANDO A DATA DO SERVIDOR ## //



// ## ESTA FUNÇÃO CARREGA O CRESCIMENTO EM RELAÇÃO AO ÚLTIMO MÊS PARA PEDIDOS ## //
function orderUp()
{
      require 'inc/conexao.php'; // CONEXAO COM O BANCO DE DADOS //
      // ## CRIANDO AS DATAS ## //
      $mes      = Date('m');
      $ano      = Date('Y');
      $dia      = Date('d');

      // ESTA DATA VEM DO MES CORRENTE //
      $dataInit = $ano.'-'.$mes.'-01';
      $dataEnd  = $ano.'-'.$mes.'-'.$dia;

      
     // ESTA DATA VEM DO MES ANTERIOR //
      if($mes == 1){$mes = 12;$ano = $ano - 1;}else{$mes=$mes;$ano=$ano;}
      $dataInit_ant = $ano.'-'.$mes.'-01';;
      $dataEnd_ant  = $ano.'-'.$mes.'-'.$dia;

      // ## AQUI CARREGA A QUANTIDADE DE PEDIDOS DO MÊS ATUAL ## //
      $sq3 = mysqli_query($con,"SELECT * FROM `t0019` WHERE PED_DAT_ABER_PED BETWEEN '$dataInit' AND '$dataEnd'"); 
      $num_mes = mysqli_num_rows($sq3); // ESTE VALOR CORRESPONDE AO MÊS CORRENTE //

      // ## AQUI CARREGA A QUANTIDADE DE PEDIDOS DO MES ANTERIOR ## //
      $sql = mysqli_query($con,"SELECT * FROM `t0019` WHERE PED_DAT_ABER_PED BETWEEN '$dataInit_ant' AND '$dataEnd_ant'"); 
      $num_anterior = mysqli_num_rows($sql); // ESTE VALOR CORRESPONDE AO MÊS CORRENTE //

      // ## O RESULTADO DE AMBAS AS QUERIES VAI ENCONTRAR A DIFERENÇA ## //
      $total = ($num_anterior - $num_mes);
      print $total;
}