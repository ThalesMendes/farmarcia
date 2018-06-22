<?php

    // Inserir Arquivos do PHPMailer
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';

    // Usar as classes sem o namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
	
if($_SERVER['REQUEST_METHOD'] == 'POST') {

	include_once('conexao.php');
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone']; 
	$mensagem = $_POST['mensagem'];
	$assunto="Contato pelo site";
	$texto_msg = 'Nome: ' . $nome . '<br>' .
	'E-mail: ' . $email . '<br>' .
	'Telefone: ' . $telefone . '<br>' .
	'Mensagem: ' . $mensagem . '<br>' ;
	
	$result_msg_contato = "INSERT INTO mensagens_contato(nome, email, telefone, mensagem) VALUES('$nome', '$email', '$telefone', '$mensagem')";
	$resultado_msg_contatomsg_contato= mysqli_query($conn, $result_msg_contato);



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
        $mail->Username = 'camilacorreavieira@gmail.com';        
        // Senha do E-mail         
        $mail->Password = 'familia';                           
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
        $mail->addAddress('camilacorreavieira@gmail.com', 'Camila');

        // Conteúdo

        // Define conteúdo como HTML
        $mail->isHTML(true);                                  

        // Assunto
        $mail->Subject = $assunto;
        $mail->Body    = $texto_msg;
        $mail->AltBody = $texto_msg;

        // Enviar E-mail
        $mail->send();
        echo 'Mensagem enviada com sucesso';
    } catch (Exception $e) {
        echo 'A mensagem não foi enviada pelo seguinte motivo: ', $mail->ErrorInfo;
	}
    }