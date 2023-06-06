<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 23SET22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 23SET22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 23SET22


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
          $numero    = $_GET['evento']; // NUMERO DO PEDIDO //
          

         $sql = mysqli_query($con,"DELETE FROM listaPedidos WHERE lisNumero = '$numero'");
            

              if(empty($sql))
              {// SE DER ERRADO DEVOLVE VALOR ZERO //
                  print "ERRO AO APAGAR O REGISTRO - CONTATE O ANALISTA DO  SISTEMA!!";
              }

              else
              {// SE DER CERTO DEVOLVE VALOR HUM  //
                 header('Location:index.php');;
              }       

?>   