<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 12SET22
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 12SET22
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 12SET22

   
   
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 21SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 22SET22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 10OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 26OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 27OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 28OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 30OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 31OUT22
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 07NOV22 - RES000101/13BR  */



 // ###  ROTINA PARA CARREGAR A ASSINATURA DO CLIENTE NA ENTREGA OU RETIRADA DO EQUIPAMENTO ### //



 // CRIANDO CABECARIO //
 header('Content-type:application/json');

 // SETANDO CARACTERES //
ini_set('default_charset','utf-8');

// ## VARIÁVEIS COM A DATA E A HORA  ## //
$data = date('d/m/Y');
$hora = date('H:i:s');
$mes  = date('m');
$dataHora = $data.'-'.$hora;

 // CRIANDO VARIÁVEL ARRAY //
 $response = array();
 // CONECTANDO COM A TABELA //
 require 'inc/conexao.php';
 require 'inc/conexao02.php';

 /* TESTE DE VALIDAÇÃO POST*/
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {

           $pedido      = $_POST['Pedido']; // RECEBE O NUMERO DO PEDIDO //
           $assinatura  = $_POST['Assinatura']; // RECEBE A IMAGEM DA ASSINATURA //
           $recebe      = strtoupper($_POST['Recebedor']); // NOME DE QUEM ASSINOU NA TELA DO APP //
           // ####################################################### //



           // ## CRIANDO TABELA DE RELATORIO DE ENTREGA / RETIRADA  ## //
             $sql = mysqli_query($con,"SELECT * FROM entregasCliente WHERE entPedido = '$pedido'");
             while($obj = mysqli_fetch_array($sql))
             {
                   $codigoInit      = $obj['entCodigoInit'];
                   $codigo          = $obj['entCodigo'];
                   $condicao        = $obj['entCondicao'];
                   $cliente         = $obj['entCliente'];
                   $email           = $obj['entEmail'];
                   $endereco        = $obj['entEndereco'];
                   $numero          = $obj['entNumero'];
                   $cidade          = $obj['entCidade'];
                   $bairro          = $obj['entBairro'];
                   $telefone        = $obj['entTelefone'];
                   $contato         = $obj['entContato'];
                   $entData         = $obj['entData'];
                   $entHora         = $obj['entHora'];
                   $entEmbarque     = $obj['entEmbarque'];
                   $entHoraEmbarque = $obj['entHoraEmbarque'];
                   $entHoraSaida    = $obj['entHoraSaida'];
                   $entEntrega      = $obj['entEntrega'];
                   $entHoraEntrega  = $obj['entHoraEntrega'];
                   $entStatus       = $obj['entStatus'];
             }

             // ## INSERINDO A FRASE CORRENTA PARA O CAMPO DE CONDIÇÃO ## //
             if($condicao=="ENTREGA"){$condicao="ENTREGUE";}else{$condicao="RETIRADO";}
             // ## TRATANDO A DATA E A HORA DA ENTREGA  ## //
             $horaEntrega = $data.'-'.$hora;

             // ## SALVANDO OS DADOS NA TABELA DE RELATÓRIO ENTREGAS / RETIRADAS ## //
             mysqli_query($con,"INSERT INTO relatorio (relPedido,relCodigoCliente,relStatus,relCliente,relEmail,relEndereco,relNumero,relCidade,relBairro,relTelefone,relContato,relAssinatura,relResponsavel,relMes,relEmbarque,relEntrega,relHoraEntrega,relData,relHora,relStatus1) VALUES ('$pedido','$codigo','$condicao','$cliente','$email','$endereco','$numero','$cidade','$bairro','$telefone','$contato','$assinatura','$recebe',$mes,1,1,'$horaEntrega','$data','$hora',100)");
           // ##  FINAL DE ROTINA  ## //
           // ################################################################################## //





           // ## SALVANDO A ASSINATURA NA TABELA DE ENTREGAS ## //
           mysqli_query($con,"UPDATE entregasCliente SET entAssinatura = '$assinatura', entEntrega = 1, entHoraEntrega = '$dataHora', entStatus = 100 WHERE entPedido = '$pedido'");
           // ## SALVANDO A ASSINATURA NA TABELA DE ENTREGAS NO SERVIDOR 02 - O MOTIVO DE MANTER OUTRA TABELA EM OUTRO SERVIDOR VEM DA RAZÃO DE NAO PODER ESTAR COM A PRIMEIRA TABELA CARREGADA COM MAIS DE UMA BASE DEVIDO AO USU DAS API //
           // ##NAO ME LEMBRO BEM AO CERTO, MAS NAO DAVA PARA MANTER O USO DAS API SOMENTE COM UM INDICE PARA FAZER AS REQUISIÇOES ENTAO HOUVE NECESSIDADE DE FAZER OUTRA IGUAL EM OUTRA BASE ## //
           mysqli_query($con02,"INSERT INTO entregasCliente (entCodigoInit,entCodigo,entPedido,entCondicao,entCliente,entEmail,entEndereco,entNumero,entCidade,entBairro,entTelefone,entContato,entAssintatura,entData,entHora,entEmbarque,entHoraEmbarque,entHoraSaida,entEntrega,entHoraEntrega,entStatus) VALUES ('$codigoInit','$codigo','$pedido','$condicao','$cliente','$email','$endereco','$numero','$cidade','$bairro','$telefone','$contato','$assinatura','$entData','$entHora','$entEmbarque','$entHoraEmbarque','$entHoraSaida','$entEntrega','$entHoraEntrega','$entStatus')");
          // ##   ATUALIZANDO O CAMPO EMBARCADO DA TABELA DE PRODUTOS t0020  ## //
           mysqli_query($con,"UPDATE t0020 SET PED_ENTREGA = 1 WHERE PED_ITEM_NUM_PED = '$pedido'");

            // ## CRIANDO PASTA COM O NOME SENDO O NUMERO DO PEDIDO E ARQUIVO DE FOTO COM O NOME SENDO O NUMERO DO PEDIDO ## //
            mkdir($pedido);
            $path = $pedido.'/'.$pedido.'.png';
            $data = base64_decode($assinatura); // DESCONVERTENDO BINÁRIO PARA A FOTO IMAGEM //
            $data = $data.".png"; // CONCATENA A FOTO COM A EXTENSAO //
            file_put_contents($path, $data); // SOBE A FOTO NA PASTA //
            $data = ""; // LIMPANDO A VARIÁVEL BINÁRIA DA FOTO //

            //## CRIANDO A PASTA FIXA DE FOTOS DE ASSINATURAS  ## //
            $assin = 'assinaImg/'.$pedido;
            mkdir($assin); // CRIANDO A PASTA //
            $path1 = 'assinaImg/'.$pedido.'/'.$pedido.'.png'; // COPIANDO PARA DENTRO DESTA PASTA //
            // ## CRIANDO A PASTA FIXA DE FOTOS PARA NÃO SOBRECARREGAR A PASTA ONDE ESTÁ A API  ## //
            copy($path,$path1);
            rmdir($pedido); // ## REMOVENDO A PASTA DO DIRETORIO PRINCIPAL ## //

            
           mysqli_set_charset($con,"utf8");
           $statement = mysqli_prepare($con,"SELECT entPedido FROM entregasCliente WHERE entPedido ='$pedido'");
           mysqli_stmt_execute($statement);
           mysqli_stmt_store_result($statement);
           mysqli_stmt_bind_result($statement, $numero);

         	if(mysqli_stmt_num_rows($statement) > 0)
            {// CRIANDO UM LAÇO WHILE E CRIANDO O ARQUIVO PARA JSON //

            		// CRIANDO UM LAÇO WHILE E CRIANDO O ARQUIVO PARA JSON //
            		while(mysqli_stmt_fetch($statement))
            		{
            		   array_push($response, array("pedido" => $numero));
            		}
            }

            else
            {
             	$response['SUCESSO'] = false;
            }

             print json_encode($response);
 }

 else
 {
 	   $response['SUCESSO'] = false;
 }

 ?>