<!--SITE DESENVOLVIDO    POR FRANCO V. MORALES - INDAIATUBA 18FEV17-->
<!--WEBSITE DEVELOPED    BY  FRANCO V. MORALES - INDAIATUBA 18FEV17-->
<!--WEBSITE DESARROLLADO POR FRANCO V. MORALES - INDAIATUBA 18FEV17-->

<!--ULTIMA ALTERACAO   - INDAIATUBA 18FEV17 - FRANCO V. MORALES -  19 98133-2762
                                                                   19 99272-0159
															       19 99751-7645 -->

<?php


   $para     = "contato@automecanicacircao.com.br, franco@difranconaweb.com.br";

    //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
    //====================================================
      $email_remetente = "contato@automecanicacircao.com.br"; // deve ser um email do dominio
    //====================================================


	$date     = date ("l, F jS, Y");
	$time     = date ("h:i A");
 	$nome     = $_POST['username'];
	$email    = $_POST['email'];
	$tel      = $_POST['phone'];
	$assunto  = $_POST['subject'];
	$message  = $_POST['message'];

   //Monta o Corpo da Mensagem
   //====================================================
     $email_conteudo = "Nome = $nome \n";
     $email_conteudo .= "Email = $email \n";
     $email_conteudo .= "Telefone = $tel \n";
     $email_conteudo .= "Assunto = $assunto \n";
     $email_conteudo .= "Mensagem = $message \n";

  //====================================================

	//print "Mensagem enviada do website ConstrucaoJS aos "  .$date. " hora: " .$time;
   //Seta os Headers (Alterar somente caso necessario)
   //====================================================
      $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email", "Subject: $assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
      mail($para, $nome, nl2br($email_conteudo), $email_headers);
   //====================================================

    /*
	if(mail($para, $nome, nl2br($email_conteudo), $email_headers))
	{
      print 1;
    }
    else
    {
      print 2;
    }   */
?>

<!--
/*
// Define some constants
define( "RECIPIENT_NAME", " Mecanica Circao" );
define( "RECIPIENT_EMAIL", "franco@difranconaweb.com.br" );

// Read the form values
$success = false;
$fname = isset( $_POST['fname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['fname'] ) : "";
$lname = isset( $_POST['lname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['lname'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$subject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

$mail_subject = 'A contact request send by ' . $fname. $lname;

$body = 'Nome: '. $fname . $lname . "\r\n";
$body .= 'E-mail: '. $senderEmail . "\r\n";
$body .= 'Tel: '. $phone . "\r\n";
$body .= 'Assunto: '. $subject . "\r\n";
$body .= 'Mensagem: ' . "\r\n" . $message;



// If all values exist, send the email
if ( $fname && $senderEmail && $message ) {
  $recipient = RECIPIENT_NAME . " <!--" . RECIPIENT_EMAIL . ">";
  $headers = "De: " . $fname . $lname . " <" . $senderEmail . ">";
  $success = mail( $recipient, $mail_subject, $body, $headers );
  echo "<p class='success'>Obrigado pelo contato. Responderemos o mais rapido possivel!</p>";
}
*/   -->
