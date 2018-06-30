<?php

    // Inserir Arquivos do PHPMailer
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';

    // Usar as classes sem o namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$mensagem = $_POST['mensagem'];
	$assunto = $_POST['assunto'];
	$texto_msg = 'Nome: ' . $nome . '<br>' .
	'E-mail: ' . $email . '<br>' .
	'Telefone: ' . $telefone . '<br>' .
	'Mensagem: ' . $mensagem . '<br>' ;

    // Criação do Objeto da Classe PHPMailer
    $mail = new PHPMailer(true);
	$mail->CharSet="UTF-8";

    try {

        //Retire o comentário abaixo para soltar detalhes do envio
        // $mail->SMTPDebug = 2;

        // Usar SMTP para o envio
        $mail->isSMTP();

        // Detalhes do servidor (No nosso exemplo é o Google)
        $mail->Host = 'smtp.gmail.com';

        // Permitir autenticação SMTP
        $mail->SMTPAuth = true;

        // Nome do usuário
        $mail->Username = 'farmarcia.code@gmail.com';
        // Senha do E-mail
        $mail->Password = 'farmarcia123';
        // Tipo de protocolo de segurança
        $mail->SMTPSecure = 'tls';

        // Porta de conexão com o servidor
        $mail->Port = 587;


        // Garantir a autenticação com o Google
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Remetente
        $mail->setFrom($email, $nome);

        // Destinatário
        $mail->addAddress('farmarcia.code@gmail.com', 'Farmarcia');

        // Conteúdo

        // Define conteúdo como HTML
        $mail->isHTML(true);

        // Assunto
        $mail->Subject = $assunto;
        $mail->Body    = $texto_msg;
        $mail->AltBody = $texto_msg;

        // Enviar E-mail
        $mail->send();
        header('Location: contato.php');
    } catch (Exception $e) {
        echo 'A mensagem não foi enviada pelo seguinte motivo: ', $mail->ErrorInfo;
	}
    }
