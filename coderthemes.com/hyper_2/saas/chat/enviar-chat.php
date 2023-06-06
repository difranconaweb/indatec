<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 19ABR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 19ABR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 19ABR23


   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


/*###########################################################################*/
/* ###  ARQUIVO QUE SALVA O TEXTO DO CHAT       -   SISTEMA DE INDAFIRE  ### */
/*###########################################################################*/


// ###  ROTINA PARA INICIAR CONEXÃO ### //
require 'inc/conexao.php';

// ## RECEBENDO O CONVIDADO //
$texto   = $_GET['texte']; // CARREGA O TEXTO ENVIADO //
$usuario = $_GET['nome']; // NOME DO USUARIO DO SISTEMA //
$data    = Date('d/m/y');
$hora    = Date('H:i');
$nome    = $usuario;
$usuario = strtoupper($usuario);
$tabela  = $usuario.'_chat';

// ##  BUSCANDO O NOME DO CONVIDADO ## //
$conv = mysqli_query($con,"SELECT nomeConvidado FROM $tabela");
while($conv3 = mysqli_fetch_array($conv))
{
    $convidado = $conv3['nomeConvidado'];
}

// ## SALVANDO O TEXTO NA TABELA PRINCIPAL E TEMPORÁRIA ## //
mysqli_query($con,"INSERT INTO chat (chaNomeTitular,chaTextoTitular,chaTextoConvidado,chaData,chaTime,chaNomeConvidado) VALUES ('$usuario','$texto','','$data','$hora','$convidado')");
// TABELA TEMPORÁRIA //
mysqli_query($con,"INSERT INTO $tabela (nome, texto, nomeConvidado, TextoConvidado, hora, data) VALUES ('$usuario','$texto','$convidado','','$data','$hora')");


//## BUSCANDO TODO OS HISTORICO DE CONVERSA COM A CHAVE ENCONTRADA  ## //
$dial = mysqli_query($con,"SELECT nome, texto, data, hora, textoConvidado, nomeConvidado FROM $tabela");
while($dial3 = mysqli_fetch_array($dial))
{
       $tela .= "<li class='clearfix'>";
       $tela .= "<div class='chat-avatar'>";
       $tela .= "<img src=''  class='rounded' alt='' />";/*<?php print $dial3['chaFoto']; ?>  <?php print $dial3['chaNomeTitular']; ?>*/
       $tela .= "<i>$dial3[hora]</i>";
       $tela .= "</div>";
       $tela .= "<div class='conversation-text'>";
       $tela .= "<div class='ctext-wrap'>";
       $tela .= "<i> $dial3[nome] </i>";
       $tela .= "<p>";
       $tela .= "$dial3[texto]";
       $tela .= "</p>";
       $tela .= "</div>";
       $tela .= "</div>";
       $tela .= "<div class='conversation-actions dropdown'>";
       $tela .= "<button class='btn btn-sm btn-link' data-bs-toggle='dropdown'";
       $tela .= "aria-expanded='false'><i class='uil uil-ellipsis-v'></i></button>";
       $tela .= "<div class='dropdown-menu dropdown-menu-end'>";
       $tela .= "<a class='dropdown-item' href='#'>Copiar</a>";
       $tela .= "<a class='dropdown-item' href='#'>Editar</a>";
       $tela .= "<a class='dropdown-item' href='#'>Apagar</a>";
       $tela .= "</div>";
       $tela .= "</div>";
       $tela .= "</li>";
       $tela .= "<li class='clearfix odd'>";
       $tela .= "<div class='chat-avatar'>";
       $tela .= "<i>$dial3[hora]</i>";
       $tela .= "</div>";
       $tela .= "<div class='conversation-text'>";
       $tela .= "<div class='ctext-wrap'>";
       $tela .= "<i>'$dial3[nomeConvidado]'</i>";
       $tela .= "<p>";
       $tela .= "$dial3[textoConvidado]";
       $tela .= "</p>";
       $tela .= "</div>";
       $tela .= "</div>";
       $tela .= "</li>";
}

if(empty($tela))
{// CASO CARREGUE VÁZIO,  ENTAO CARREGA A TELA VÁZIA //
       $tela .= "<li class='clearfix'>";
       $tela .= "<div class='chat-avatar'>";
       $tela .= "<img src=''  class='rounded' alt='' />";/*<?php print $dial3['chaFoto']; ?>  <?php print $dial3['chaNomeTitular']; ?>*/
       $tela .= "<i>$dial3[hora]</i>";
       $tela .= "</div>";
       $tela .= "<div class='conversation-text'>";
       $tela .= "<div class='ctext-wrap'>";
       $tela .= "<i> $dial3[nome] </i>";
       $tela .= "<p>";

       $tela .= "</p>";
       $tela .= "</div>";
       $tela .= "</div>";
       $tela .= "<div class='conversation-actions dropdown'>";
       $tela .= "<button class='btn btn-sm btn-link' data-bs-toggle='dropdown'";
       $tela .= "aria-expanded='false'><i class='uil uil-ellipsis-v'></i></button>";
       $tela .= "<div class='dropdown-menu dropdown-menu-end'>";
       $tela .= "<a class='dropdown-item' href='#'>Copiar</a>";
       $tela .= "<a class='dropdown-item' href='#'>Editar</a>";
       $tela .= "<a class='dropdown-item' href='#'>Apagar</a>";
       $tela .= "</div>";
       $tela .= "</div>";
       $tela .= "</li>";
       $tela .= "<li class='clearfix odd'>";
       $tela .= "<div class='chat-avatar'>";
   
       $tela .= "</div>";
       $tela .= "<div class='conversation-text'>";
       $tela .= "<div class='ctext-wrap'>";
     
       $tela .= "<p>";
    
       $tela .= "</p>";
       $tela .= "</div>";
       $tela .= "</div>";
       $tela .= "</li>";

       print $tela;
}

else
{// ESTANDO TUDO CERTO, DEVOLVE A TELA //
    print $tela;
}