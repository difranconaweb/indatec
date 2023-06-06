<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 02JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 02JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 02JUN22

   
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 04NOV22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 08MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 09MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31MAR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12MAI23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23MAI23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


/*####################################################################################*/
/* ## ARQUIVO MEMO DO FUNCIONÁRIO - REGISTRA QUANTO TEMPO ESTÁ LOGADO - SENTINELA ### */
/*####################################################################################*/


// ##  FAZ A CONEXÃO COM O BANCO DE DADOS  ## /
 require 'inc/conexao.php';

  /* ## DATA E HORA DO SERVIDOR ## */
  $data  = Date('d/m/Y');
  $dia   = date('d');
  $mes   = date('m');
  $ano   = date('Y');
  $Fhora = Date('H:i:s');
  $hora  = Date('H');
  $min   = Date('i');
  $dtTabela = $ano.'-'.$mes.'-'.$dia;

  // ### ROTINA PARA CONTADOR/TIMER DE DESLOG ### //
     $hora         = floatval($hora); // TRANSFORMA A STRING EM FLOAT //
     $min          = floatval($min);  // TRANSFORMA A STRING EM FLOAT //
     $mins         = ($min+30);       // SOMA O MINUTO COM O TEMPO DE TOLERANCIA LOGADO //
     $hora_inicial = (($hora * 60) + $min); // INSERE O VALOR NA VARIÁVEL PARA SER ENVIADO A TABELA //
     $hora_final   = (($hora * 60) + $mins); // INSERE O VALOR NA VARIÁVEL PARA SER ENVIADO A TABELA MINUTO SOMADO //
  // ### FINAL DE ROTINA DESLOG ### //

   
  // ## INICIA CRIANDO A SESSÃO ## //
  session_start();
  $usuario = $_SESSION['usuario']; 
  $id      = $_SESSION['id'];

// ### ROTINA PARA CRIAR MEMÓRIA DE LOG IN - SENTINELA ### //
 $sql = mysqli_query($con,"SELECT funCodigo,funNome,funPrimNome,funEmail,funCelular,funNivel FROM funcionarios WHERE funCodigo = '$id'");
 while($obj = mysqli_fetch_array($sql))
 {
     $objNome     = $obj['funNome'];
     $objPrimeiro = strtoupper($obj['funPrimNome']);
     $objId       = $obj['funCodigo'];
     $objEmail    = strtolower($obj['funEmail']);
     $objCelular  = $obj['funCelular'];
     $objNivel    = $obj['funNivel'];
 }
 // ### FINAL DE ROTINA DE MEMÓRIA DE LOG IN   ###  //
 // ### CRIANDO A SESSÃO PARA O E-MAIL ### //
  $_SESSION['email'] = $objEmail;


          
 // ## INSERINDO VALOR 1 DE PRIMEIRA PÁGINA NA TABELA DE PONTEIRO ## //
   mysqli_query($con,"UPDATE ponteiro SET ponPonteiro = 1, ponDataInicial = '$data', ponHora = '$Fhora' WHERE ponResponsavel LIKE '$objEmail'");
 // ### FINAL DE PONTEIRO ### //


         

// ## ATUALIZA A TABELA DE LOGIN ## //
mysqli_query($con,"UPDATE funcionarios SET funHoraInicial = '$hora_inicial', funHoraFinal = '$hora_final' WHERE funNome = '$objNome' AND funCodigo = '$id'");



//  ## CRIA A TABELA PARA O USUÁRIO LOGADO  ## //
$_sql = mysqli_query($con,"CREATE TABLE IF NOT EXISTS $objPrimeiro$objId (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(50) NOT NULL, celular CHAR(13) NOT NULL, email VARCHAR(50), hora CHAR(10) NOT NULL, data CHAR(10) NOT NULL, horaInicial char(8) NOT NULL, horaFinal char(8) NOT NULL, idUsuario INT(5) NOT NULL, pedido INT(10) NOT NULL, orcamento INT(10) NOT NULL, usuario char(20) NOT NULL, coringa char(20) NOT NULL, coringa01 varchar(100) NOT NULL, coringa02 varchar(100) NOT NULL)");
//  ## FINAL DE CRIAR TABELA  ###  //

// ## CRIANDO SESSÃO COM O NOME DA NOVA TABELA ###  //
      $_SESSION['nome_tabela'] = $objPrimeiro.$objId; // CARREGA A VARIÁVEL DE SESSÃO COM O NOME DA TABELA //
      $TABELA = $objPrimeiro.$objId;  // VARIÁVEL COM O NOME DA TABELA //

// ## BUSCA NA TABELA DE MEMO SE HÁ REGISTRO COM A DATA DE REFERENCIA VALOR 2 NO CASE ABAIXO ## //
      $se = mysqli_query($con,"SELECT semData FROM semanaMemo WHERE semData = '$dtTabela'");
      while($_se = mysqli_fetch_array($se))
      {
          $diaWeek = $_se['semData'];
      }

// ## FAZENDO TRATAMENTO DO DIA DA SEMANA ## //
    switch (date('D')) {
    case "Sun": // DOMINGO //
        $diaSemana = 1;
        break;

    case "Mon": // SEGUNDA FEIRA //
        $diaSemana = 2;
        // ## AQUI INSERE O VALOR PARA REFERENCIA DE QUE DIA FOI A SEGUNDA FEIRA PARA POSTERIOR PESQUISA ## //
        if(empty($diaWeek))
        {// SE A SEGUNDA FEIRA CORRENTE AINDA NAO FOI INSERIDA, ENTAO INSERE AQUI //
              mysqli_query($con,"INSERT INTO semanaMemo (semData) VALUES ('$dtTabela')");
        }

        else
        {// SENAO VAI EM FRENTE //
             $segunda = $diaWeek;
        }

        break;

    case "Tue": //TERÇA FEIRA //
        $diaSemana = 3;
        break;

    case "Wed": //QUARTA FEIRA //
        $diaSemana = 4;
        break;

    case "Thu": //QUINTA FEIRA //
        $diaSemana = 5;
        break;

    case "Fri": //SEXTA FEIRA //
        $diaSemana = 6;
        // ## AQUI INSERE O VALOR PARA REFERENCIA DE QUE DIA FOI A SEGUNDA FEIRA PARA POSTERIOR PESQUISA ## //
        if(empty($diaWeek))
        {// SE A SEXTA FEIRA CORRENTE AINDA NAO FOI INSERIDA, ENTAO INSERE AQUI //
              mysqli_query($con,"INSERT INTO sextaMemo (sexData) VALUES ('$dtTabela')");
        }

        else
        {// SENAO VAI EM FRENTE //
             $sexta = $diaWeek;
        }

        break;

    case "Sat": //SABADO //
        $diaSemana = 7;
        break;
        
    default: "ERRO AO CARREGAR O DIA DA SEMANA";break;
}

// ## INSERE OS DADOS NA TABELA RECÉM CRIADA ###  //
 mysqli_query($con,"INSERT INTO $TABELA (nome,celular,email,hora,data,horaInicial,horaFinal,idUsuario,usuario,coringa) VALUES ('$objNome','$objCelular','$objEmail','$Fhora','$data','$hora_inicial','$hora_final','$id','$usuario','$diaSemana')");
// ## FINAL DE TRATAMENTO DIA DA SEMANA   ## //



// PONTEIRO PARA A TELA DE REGISTROS //
header('Location:http://www.indafire.ind.br/indatec/coderthemes.com/hyper_2/saas/controller.php');

?>