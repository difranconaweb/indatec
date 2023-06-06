<?php


require 'inc/conexao.php'; // CONEXÃO COM O BANCO DE DADOS //




$valor = '20223384';
$pedido = 'assinaImg/'.$valor;

mkdir($pedido);

$pedido = $valor."/".$valor.".png";

$path = 'assinaImg/'.$valor.'/'.$valor.'.png';


copy($pedido,$path);



/* $aSql = mysqli_query($con,"SELECT entAssinatura FROM entregasCliente WHERE entPedido = '$pedido'");
                    while($aObj = mysqli_fetch_array($aSql))
                    {
                        $assinatura = $aObj['entAssinatura'];
                    }



                        mkdir($pedido);
                        $path = $pedido.'/'.$pedido.'.png';
                        $data = base64_decode($assinatura); // DESCONVERTENDO BINÁRIO PARA A FOTO IMAGEM //
                        $data = $data.".png"; // CONCATENA A FOTO COM A EXTENSAO //
                        file_put_contents($path, $data); // SOBE A FOTO NA PASTA //
                        $data = ""; // LIMPANDO A VARIÁVEL BINÁRIA DA FOTO //*/

?>