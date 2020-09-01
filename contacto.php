<form action="envia_email.php" method="POST">
    <ul>
        <li>Nome: <input type="text" name="nome"> </li>
        <li>Email: <input type="text" name="email"> </li>
        <li>Assunto: <input type="text" name="assunto"> </li>
        <li>Mensagem: <textarea name="texto_mensagem"></textarea> </li>
        <li>
            <button>ENVIAR</button>
        </li>
    </ul>
</form>

<?php
    if(isset($_GET['status']) && $_GET['status']== 'ok'){
        echo "A mensagem foi enviada";
    }
    else if(isset($_GET['status']) && $_GET['status']== 'ko'){
        echo "A Mensagem não foi enviada";
    }

?>