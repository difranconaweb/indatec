<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 01JUN22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 01JUN22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 01JUN22


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 02JUN22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 03JUN22 - RES000101/13BR  
                                                                  19 99272-0159
                                                                  19 99751-7645 */



 /* ###  ROTINA PARA VALIDAR LOGIN DE USUÁRIO PAA FUNCIONARIOS ### */

          session_start();
          require 'inc/conexao.php';

          $data = Date('d/m/Y');  // CARREGA A DATA
          $hora = Date('H:i:s');  // CARREGA A HORA

          // PEGA OS VALORES E CARREGA AS VARIÁVEIS //
          $email    = trim(strtolower($_GET['email']));
          $password = trim($_GET['senha']);
          $senha    = sha1($password);  // CRIPTOGRAFA A SENHA //



         


      // ### FAZ A BUSCA DO REGISTRO NA BASE DE DADOS  ### // 
      $sql = mysqli_query($con,"SELECT * FROM funcionarios  WHERE funEmail LIKE '$email' AND funSenha LIKE '$senha'");

      while($obj = mysqli_fetch_array($sql))
      {
          $objCodigo  = $obj['funCodigo'];
          $objUsuario = $obj['funNome'];
          $objEmail   = $obj['funEmail'];
          $objSenha   = $obj['funSenha'];
          $objConect  = $obj['funConectado'];
      }
       
         
       /* ### VERIFICA SE O REGISTRO CONSTA NA TABELA DE LOGIN  ###  */
         if(($email == $objEmail) && ($senha == $objSenha))
         {// SE LOGIN FOR VALIDO, VERIFICA SE ESTÁ CONECTADO //
                   

            // ## VERIFICA O NIVEL DE ACESSO DO LOGIN  ## //
            // ## NIVEL DE ACESSO 1 (GERENTE) ## //
            // ## NIVEL DE ACESSO 2 (FUNCIONÁRIO) ## // 
            // ## NIVEL DE ACESSO 3 (CLIENTE) ## //
             if($objConect == 1)
             {// VOLTA COM MENSAGEM DE EXCEÇÃO DE USUÁRIO JÁ ESTÁ CONECTADO //
                 print 2; 
             }

             else
             {
                  // ## ATUALIZA A TABELA DE LOGIN DO FUNCIONÁRIO ## //
                  mysqli_query($con,"UPDATE funcionarios SET funData = '$data', funHora = '$hora', funConectado = 1 WHERE funEmail = '$objEmail'");

                  // ## CRIA UMA SESSÃO PARA LOGIN ## //
                  $_SESSION['usuario'] = $objUsuario;
                  $_SESSION['id']      = $objCodigo;
                  print 1;
             }
       }

       else
       {// SE LOGIN NÃO FOR VÁLIDO, IMPRIME 0
            print 0;
       }        
?>