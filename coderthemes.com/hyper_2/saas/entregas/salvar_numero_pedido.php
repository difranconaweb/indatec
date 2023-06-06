<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 22AGO22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 22AGO22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 22AGO22


   ULTIMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23AGO22
   ULTIMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 23SET22 - RES000101/13BR  
                                                                  19 99272-0159
                                                                  19 99751-7645 */



 // ###  ROTINA PARA REGISTRAR NUMERO DE PEDIDO PARA A ENTREGA ### //

          session_start();
          require 'inc/conexao.php';
          $usuario = $_SESSION['usuario'];

          $data = Date('d/m/Y');  // CARREGA A DATA
          $hora = Date('H:i:s');  // CARREGA A HORA

          // PEGA OS VALORES E CARREGA AS VARIÁVEIS //
          $numero    = $_GET['numero']; // NUMERO DO PEDIDO //
          $condicao  = $_GET['condicao']; // QUAL A CONDIÇÃO DO PEDIDO //

          $bus = mysqli_query($con,"SELECT lisCodigo FROM listaPedidos WHERE lisNumero = '$numero'");
          while($_obj = mysqli_fetch_array($bus))
          {
               $codigo = $_obj['lisCodigo'];
          }

          if(empty($codigo))
          {   // INSERINDO O NNUMERO DO PEDIDO NA TABELA DE LISTA DE PEDIDOS  //,
              $sql = mysqli_query($con,"INSERT INTO listaPedidos (lisNumero,lisCondicao,lisData,lisHora,lisFuncionario) VALUES ('$numero','$condicao','$data','$hora','$usuario')"); // INSERE O NUMERO DO PEDIDO NA TABELA //
            
               // BUSCANDO O NUMERO DO CLIENTE  //
            

              if(empty($sql))
              {// SE DER ERRADO DEVOLVE VALOR ZERO //
                  print 0;
              }

              else
              {// SE DER CERTO DEVOLVE VALOR HUM  //
                  print 1;
              }
          }

          else
          {
               print 2; // REGISTRO JÁ CONSTA NA BASE DE DADOS //
          }

        

?>        
         
