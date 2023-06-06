<?php
/* SISTEMA DESENVOLVIDO POR FRANCO VIEIRA MORALES  - INDAIATUBA 11ABR23
   SISTEMA DESARROLLADO  POR FRANCO VIEIRA MORALES - INDAIATUBA 11ABR23
   SYSTEM DEVELOPED BY FRANCO VIEIRA MORALES       - INDAIATUBA 11ABR23



   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 12ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 13ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 14ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 18ABR23
   ULTMA ALTERAÇÃO - FRANCO VIEIRA MORALES - INDAIATUBA 19ABR23 - RES000101/13BR  
https://www.free-css.com/free-css-templates
   */


/*###########################################################################*/
/* ###  ARQUIVO QUE BUSCA USUÁRIO DE CHAT       -   SISTEMA DE INDAFIRE  ### */
/*###########################################################################*/


// ###  ROTINA PARA INICIAR CONEXÃO ### //
require 'inc/conexao.php';

// ## RECEBENDO O CONVIDADO //
$convidado = strtoupper($_GET['convidado']); // SELECIONADO NO CHAT PARA A CONVERSA //
$codigo    = strtoupper($_GET['codigo']); // CODIGOO DO USUARIO DO SISTEMA //
$usuario   = strtoupper($_GET['nome']); // NOME DO USUARIO DO SISTEMA //
$tabela    = $usuario.'_chat';

// ## LIMPANDO A TABELA DE CHAT CASO HAJA CARGA ## //
mysqli_query($con,"DELETE FROM $tabela");

// ## BUSCANDO A CARGA DA TABELA PRINCIPAL DE CHAT ## //
$chat = mysqli_query($con,"SELECT chaCodigo, chaNomeTitular, chaTextoTitular, chaNomeConvidado, chaTextoConvidado, chaData, chaTime, chaChave FROM chat WHERE chaNomeTitular = '$usuario' AND chaNomeConvidado = '$convidado'");
while($chat3 = mysqli_fetch_array($chat))
{
      $codigo3 = $chat3['chaCodigo'];
      $nome3   = $chat3['chaNomeTitular'];
      $texto3  = $chat3['chaTextoTitular'];
      $nomeC3  = $chat3['chaNomeConvidado'];
      $textoC3 = $chat3['chaTextoConvidado'];
      $data3   = $chat3['chaData'];
      $hora3   = $chat3['chaTime'];
      $chave3  = $chat3['chaChave'];

      // ## INSERINDO NOME DO TITULAR NA COLUNA TITULAR E CONVIDADO NA COLUNA CONVIDADO

     // ## SALVANDO O CONTEUDO DO CHAT DESTE USUÁRIO NA TABELA TEMPORÁRIA QUE ACABOU DE CRIAR ## //
     mysqli_query($con,"INSERT INTO $tabela (nome, texto, nomeConvidado, textoConvidado, hora, data, chave, coringa) VALUES ('$nome3','$texto3','$nomeC3','$textoC3','$hora3','$data3','$chave3','$codigo3')");
}

$chat = mysqli_query($con,"SELECT chaCodigo, chaNomeTitular, chaTextoTitular, chaNomeConvidado, chaTextoConvidado, chaData, chaTime, chaChave FROM chat WHERE chaNomeTitular = '$convidado' AND chaNomeConvidado = '$usuario'");
while($chat3 = mysqli_fetch_array($chat))
{
      $codigo3 = $chat3['chaCodigo'];
      $nome3   = $chat3['chaNomeTitular'];
      $texto3  = $chat3['chaTextoTitular'];
      $nomeC3  = $chat3['chaNomeConvidado'];
      $textoC3 = $chat3['chaTextoConvidado'];
      $data3   = $chat3['chaData'];
      $hora3   = $chat3['chaTime'];
      $chave3  = $chat3['chaChave'];

      // ## INSERINDO NOME DO TITULAR NA COLUNA TITULAR E CONVIDADO NA COLUNA CONVIDADO

     // ## SALVANDO O CONTEUDO DO CHAT DESTE USUÁRIO NA TABELA TEMPORÁRIA QUE ACABOU DE CRIAR ## //
     mysqli_query($con,"INSERT INTO $tabela (nome, texto, nomeConvidado, textoConvidado, hora, data, chave, coringa) VALUES ('$nomeC3','$textoC3','$nome3','$texto3','$hora3','$data3','$chave3','$codigo3')");
}
// ## FINAL DE CARGA DE CHAT SALVO ## //






//   SELECT chaNomeTitular, chaTextoTitular FROM `chat` WHERE chaChave = 1 UNION SELECT chatNomeConvidado, chatTextoConvidado FROM chat1 WHERE chatChave = 1 ORDER BY chaNomeTitular
//   SELECT DISTINCT chaNomeTitular, chaTextoTitular, chaData, chaTime, chatNomeConvidado, chatTextoConvidado, chatData, chatTime FROM chat LEFT JOIN chat1 ON chat.chaChave = chat1.chatChave WHERE chaChave = '$chave' AND chatChave = '$chave'
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



/*  
        $tela = "<li class='clearfix'>
      <div class='chat-avatar'>
          <img src='<?php print $dial3['chaFoto']; ?>' class='rounded' alt='<?php print $dial3['chaNomeTitular']; ?>' />
          <i>10:00</i>
      </div>
      <div class='conversation-text'>
          <div class='ctext-wrap'>
              <i>'<?php print $dial3['chaNomeTitular']; ?>'</i>
              <p>
                  <?php print $dial3['chaNomeTitular']; ?>
              </p>
          </div>
      </div>
      <div class='conversation-actions dropdown'>
          <button class='btn btn-sm btn-link' data-bs-toggle='dropdown'
              aria-expanded='false'><i class='uil uil-ellipsis-v'></i></button>

          <div class='dropdown-menu dropdown-menu-end'>
              <a class='dropdown-item' href='#'>Copiar</a>
              <a class='dropdown-item' href='#'>Editar</a>
              <a class='dropdown-item' href='#'>Apagar</a>
          </div>
      </div>
    </li>
    <li class='clearfix odd'>
      <div class='chat-avatar'>
          <img src='<?php print $dial3['chaFoto']; ?>' class='rounded' alt='<?php print $dial3['chaNomeConvidado']; ?>' />
          <i>10:01</i>
      </div>
      <div class='conversation-text'>
          <div class='ctext-wrap'>
              <i>'<?php print $dial3['chaNomeConvidado']; ?>'</i>
              <p>
                 '<?php print $dial3['chaNomeConvidado']; ?>'
              </p>
          </div>
      </div>
    </li>";
*/
?>