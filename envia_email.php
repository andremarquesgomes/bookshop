<?php

// SERVIÇO ENVIO AUTOMATICO DE EMAIL (ENVIA_EMAIL.PHP + TEMPLATE_EMAIL.HTML)

include ('config.php');
include ('mail/PHPMailerAutoload.php');

    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $assunto= $_POST['assunto'];
    $texto= $_POST['texto_mensagem'];

    $mail = new PHPMailer;
    $mail->isSMTP();

    $mail->SMTPDebug =2;
    $mail->Debugoutput='html';

    // ESTOU A DAR OS VALORES NO CONFIG.PHP PARA O HOST /PORT /USERNAME /PASSWORD /SUBJECT
    $mail->Host = SERVIDOR_ENVIO_MAIL;
    $mail->Port = PORTA_SERVIDOR_ENVIO_EMAIL;

    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;

    $mail->Username = USER_SERVIDOR_ENVIO_EMAIL;
    $mail->Password = PASSWORD_SERVIDOR_ENVIO_EMAIL;

    // Mail e primeiro/último nome de quem envia o email
    // Senão der para enviar tenho de ir à conta GMAIL e baixar as "defesas" de segurança
    $mail->setFrom('formacao.flag.hugo@gmail.com', 'Gestor Livraria2');
    $mail->addReplyTo('formacao.flag.hugo@gmail.com', 'Gestor Livraria2');

    $mail->addAddress('tmiguel_costa@hotmail.com', 'Tiago Costa');

    $conteudo_template = file_get_contents('template_email.html');
    
    // Substituir o nome do HTML
    $conteudo_a_enviar = str_replace('[NOME_DO_REMETENTE]' ,$nome ,$conteudo_template);
    $conteudo_a_enviar = str_replace('[EMAIL_REMETENTE]' ,$email ,$conteudo_a_enviar);
    $conteudo_a_enviar = str_replace('[ASSUNTO_DO_REMENTENTE]' ,$assunto ,$conteudo_a_enviar);
    $conteudo_a_enviar = str_replace('[MENSAGEM_DO_REMENTENTE]' ,$texto ,$conteudo_a_enviar);

    $mail->Subject = SUBJECT_EMAIL;
    $mail->msgHTML($conteudo_a_enviar);
    $mail->send();

    if($mail->send() ){
        // header('Location:index.php?zona=contactos&status=ok');

        // POSSO MANDAR UMA LINHA EM JS PARA REDIRECIONAR PARA A PÁGINA NO CASO DE ESTAR SEMPRE A DAR DEBUG (NUMA SITUAÇÃO NORMAL BASTA DESCOMENTAR O HEADER ACIMA E COMENTAR ISTO)
        echo "<script>window.top.location='index.php?zona=contactos&status=ok'</script>";

    } else{
        header('Location:index.php?zona=contactos&status=ko'); 
    }
?>