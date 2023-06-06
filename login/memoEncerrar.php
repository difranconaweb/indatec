<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 02JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 02JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 02JUN22

   
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22AGO22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 18ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


/*############################################################################*/
/* ###  ARQUIVO MEMO DE ENCERRAMENTO DE SISTEMA INDATEC       - SENTINELA ### */
/*############################################################################*/


/* ##  FAZ A CONEXÃO COM O BANCO DE DADOS  ## */
 require 'inc/conexao.php';

  /* ## DATA E HORA DO SERVIDOR ## */
  $data   = Date('d/m/Y');
  $hora   = Date('H:i:s');
  $objVar = true;  // CARREGA VALOR TRUE PARA O LAÇO A ABAIXO //

   
 

// ### ROTINA PARA DESCARGA EM TABELA PRINCIPAL E DROP DE TABELA TEMP - SENTINELA ### //
  
    $usuario     = strtoupper($_REQUEST['usuario']);
    $id          = $_REQUEST['id'];
    $nomeTab     = $usuario.$id; 
    $tabela_chat = $usuario.'_chat';


// ### ATUALIZANDO A TABELA DE LOGIN COMO DESLOGADO  ### //
 mysqli_query($con,"UPDATE funcionarios SET funDataOffUltimo = '$data', funHoraOffUltimo = '$hora', funHoraInicial = '00:00:00', funHoraFinal = '00:00:00', funConectado = 0 WHERE funCodigo = '$id'");
// ### FINAL DE ATUALIZACAO TABELA DE LOGIN COMO DESLOGADO  ### //


// ### ROTINA PARA ATUALIZAR A TABELA DE PONTEIRO INFORMANDO QUE O USUÁRIO ESTÁ DESCONECTADO  ### //
 mysqli_query($con,"UPDATE ponteiro SET ponPonteiro = 0, ponPesquisa = '', ponDataFinal = '$data', ponHora = '$hora' WHERE ponIdUser = '$id'");

        
// ELIMINA TABELA TEMPORÁRIA //
mysqli_query($con,"DROP TABLE $nomeTab"); 
mysqli_query($con,"DROP TABLE $tabela_chat");


    


// ### FINAL DE ROTINA DE DESCARGA E DROP DE TABELA TEMP  ### //

header('Location:http://www.indafire.ind.br/login.php');

?>