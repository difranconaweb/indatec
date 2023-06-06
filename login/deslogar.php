<?php
/*  SITE DESENVOLVIDO    POR FRANCO V. MORALES - INDAIATUBA 06OUT22
    WEBSITE DEVELOPED    BY  FRANCO V. MORALES - INDAIATUBA 06OUT22
    WEBSITE DESARROLLADO POR FRANCO V. MORALES - INDAIATUBA 06OUT22


ULTIMA ALTERACAO   - INDAIATUBA 21MAR23 - FRANCO V. MORALES -  RES 000101/13BR 19 98133-2762
                                                                               19 99272-0159
                                                                               19 99751-7645 */
/* ##################################################################################### */
/* ###                     PÁGINA INICIAL PARA DESLOGAR USUARIO                      ### */
/* ##################################################################################### */


          session_start();
          require 'inc/conexao.php';

          $data = Date('d/m/Y');  // CARREGA A DATA
          $hora = Date('H:i:s');  // CARREGA A HORA

          // PEGA OS VALORES E CARREGA AS VARIÁVEIS //
          $chave    = trim(strtolower($_GET['chave']));
          $chave    = sha1($chave);  // CRIPTOGRAFA A SENHA //


          // ## BUSCANDO ID E NOME DE USUARIO  ## //
          $user = mysqli_query($con,"SELECT funCodigo, funNome FROM funcionarios WHERE funChave = '$chave'");
          while($_user = mysqli_fetch_array($user))
          {
               $id   = $_user['funCodigo'];
               $nome = $_user['funNome'];
          }

          // ## PASSANDO PARA DENTRO DA SESSÃO A CARGA DAS VARIÁVEIS ## //
          $_SESSION['id'] = $id;
          $_SESSION['usuario'] = $nome;
          $sql = mysqli_query($con,"UPDATE funcionarios SET funConectado = 0, funDataOffUltimo = '$data', funHoraOffUltimo = '$hora' WHERE funChave LIKE '$chave'");

          // ## SE VOLTAR ZERO, ERRO AO ALTERAR O VALOR DO CAMPO FUNCONECTADO ## //
          if(empty($sql))
          {
               print 0;
          }

          else
          {// IMPRIME VALOR HUM, PORQUE ESTÁ TUDO CERTO //
              print 1;
          }
          

?>
