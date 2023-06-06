<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 02JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 02JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 02JUN22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 06JUN22 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


/*###########################################################################*/
/* ###  ARQUIVO CUIDA DO TEMPO QUE ESTÁ LOGADO        -        INDATEC   ### */
/*###########################################################################*/


/* ##  FAZ A CONEXÃO COM O BANCO DE DADOS  ## */
 require 'conexao.php';

  /* ## DATA E HORA DO SERVIDOR ## */
  $data = Date('d/m/Y');
  $hora = Date('H');
  $min  = Date('i');


  /* ## INICIA CRIANDO A SESSÃO ## */
  session_start();
  $usuario = $_SESSION['usuario']; 
  $id      = $_SESSION['id'];

/* ### ROTINA PARA CRIAR MEMÓRIA DE LOG IN - SENTINELA ### */
 $sql = mysqli_query($con,"SELECT funNome,funCodigo,funHoraInicial,funHoraFinal,funConectado FROM funcionarios WHERE funCodigo = '$id'");
 while($obj = mysqli_fetch_array($sql))
 {
     $nome         = $obj['funNome'];
     $horaInicial  = $obj['funHoraInicial'];
     $horaFinal    = $obj['funHoraFinal'];
     $id           = $obj['funCodigo'];
     $conectado    = $obj['funConectado'];
 }
 /* ### FINAL DE ROTINA DE MEMÓRIA DE LOG IN CONTADOR DE TEMPO  ###  */
 
  /* ### VERIFICANDO ATRAVÉS DE CALCULO DE O USUARIO AINDA TEM TEMPO PARA ESTAR LOGADO ### */
 /* ### ROTINA PARA CONTADOR/TIMER DE DESLOG ### */
     $hora        = floatval($hora); // TRANSFORMA A STRING EM FLOAT //
     $min         = floatval($min);  // TRANSFORMA A STRING EM FLOAT //
     $hora_atual  = (($hora * 60) + $min); // VERIFICA A HORA ATUAL //


     /* ### COMPARA A VER SE A HORA ATUAL É IGUAL A HORA QUE ESTÁ NA BASE ### */
      if($hora_atual > $horaFinal)
      {
         header('Location:http://www.indafire.ind.br/indatec/login/memoEncerrar.php?usuario='.$nome.'&id='.$id);
      }

      else
      {
           $usuario;
      }
     /* ### FINAL DE COMPARAÇÃO ### */
     
  /* ### FINAL DE ROTINA DESLOG ### */
?>