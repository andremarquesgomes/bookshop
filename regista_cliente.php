<?php
	include('config.php');

	$nome_introduzido = $_POST['nome'];
	$email_introduzido = $_POST['email'];
	$pass_introduzida = $_POST['pass'];
	$morada_introduzida = $_POST['morada'];
	$telef_introduzido= $_POST['telefone'];

	$sql="insert into clientes
	(nome_cliente, email_cliente, password_cliente, morada_cliente, telefone_cliente)
	values
	('$nome_introduzido', '$email_introduzido',
	 MD5('$pass_introduzida'), '$morada_introduzida', '$telef_introduzido' ) ";

	

	 $resultado = $ligacao->query($sql);


	 header('Location:index.php?zona=registo&status=ok');

?>