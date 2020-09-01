<?php

    include('config.php');
    include('mail/PHPMailerAutoload.php');

    $email = $_POST['endereco_email'];

    // perguntar à base dados se o email existe
    $sql="select * from clientes where email_cliente='$email'";
    $resultado=$ligacao->query($sql);

    $n_resultados=$resultado->num_rows;

   
    

    if($n_resultados!=1){
        header('Location:index.php?zona=recuperar_pass&status=0');
    }else{
        $referencia = uniqid();
        // buscar linha de utilizador
        $linha = mysqli_fetch_assoc($resultado);

        $id_cliente = $linha['id_cliente'];
        $nome_cliente = $linha['nome_cliente'];

        // $id_cliente não leva '' porque é chave primaria
        $sql_insert = "insert into referencias(fk_id_cliente, valor_referencia)
        values($id_cliente,'$referencia')";

        $resultado = $ligacao->query($sql_insert);

        // fazer link 

        $link= URL_SITE."index.php?zona=repor_pass&ref=$referencia";
    
        $mail = new PHPMailer;
        $mail->isSMTP();
    
        $mail->SMTPDebug =0;
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

        $mail->addAddress($email, $nome_cliente);

        // Titulo do email enviado
        $mail->Subject=('Recuperação de Password');
        // Mensagem de texto enviada por email
        $mensagem="Olá<br>clique <a href='$link'>aqui</a> para repor a password";

        $mail->msgHTML(utf8_encode($mensagem));

        $ligacao->close();

        if($mail->send()){
            header('Location:index.php?zona=recuperar_pass&status=1');
        }else{
            header('Location:index.php?zona=recuperar_pass&status=2');
        }
    }
?>
