<?php
/* SITE DESENVOLVIDO    POR FRANCO V. MORALES - INDAIATUBA 07NOV22
   WEBSITE DEVELOPED    BY  FRANCO V. MORALES - INDAIATUBA 07NOV22
   WEBSITE DESARROLLADO POR FRANCO V. MORALES - INDAIATUBA 07NOV22

   ULTIMA ALTERACAO   - INDAIATUBA 07NOV22 - FRANCO V. MORALES  -  19 98133-2762
                                                                   19 99272-0159
															                                     19 99751-7645 */
// ### ROTINA PARA CONEXÃO DO PORTAL ### //

$con02 = mysqli_connect("mysql.indafire.ind.br","indafire02","inda2121", "indafire02");
     //127.0.0.1", "root","","elitesporte */
 
  if (!$con02) 
  {
      echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
  } 

  
  /* $conexao = mysqli_connect("127.0.0.1","root","","indafire_integracao"); 
  
   if(!$conexao)
   {
       echo "Error: Falha ao conectar-se com o banco de dados MYSQL.".PHP_EOL;
       echo "Debbugin errno: ". mysqli_conect_errno() . PHP_EOL;
       echo "Debugging error " . mysql_connect_error() . PHP_EOL;
       exit;
   }*/

?>
