<?php


require 'inc/conexao.php'; // CONEXÃO COM O BANCO DE DADOS //

$pedido = sha1('1234');
print $pedido;


 /*$aSql = mysqli_query($con,"SELECT entAssinatura FROM entregasCliente WHERE entPedido = '$pedido'");
                    while($aObj = mysqli_fetch_array($aSql))
                    {
           print             $assinatura = $aObj['entAssinatura'];
                    }*/



                     //   mkdir($pedido);
                  /*      $path = 'assinatura'.$pedido.'.png';
                        $data = base64_decode($binaria); // DESCONVERTENDO BINÁRIO PARA A FOTO IMAGEM //
                        $data = $data.".png"; // CONCATENA A FOTO COM A EXTENSAO //
                        file_put_contents($path, $data); // SOBE A FOTO NA PASTA //
                        $data = ""; // LIMPANDO A VARIÁVEL BINÁRIA DA FOTO //*/

?>