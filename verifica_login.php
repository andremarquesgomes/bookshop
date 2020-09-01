<?php
session_start();
include('config.php');

	$user =$_POST['login_user'];
	$pass =$_POST['pass_user'];

	$sql = "select * from clientes 
	where email_cliente ='$user' and password_cliente=MD5('$pass')";

	$resultado = $ligacao->query($sql);


	$n_registos = $resultado->num_rows;


	//echo $n_registos;

	if($n_registos==1){
		$linha = mysqli_fetch_assoc($resultado);
		$nome_do_cliente = $linha['nome_cliente'];
		$id_do_cliente = $linha['id_cliente'];

		$_SESSION['nome'] = $nome_do_cliente;
		$_SESSION['id'] = $id_do_cliente;

		setcookie('login_user',$user, time()+3600); 
		setcookie('pass_user',$pass, time()+3600); 

		
		header('Location:index.php');


	} else {
		header('Location:index.php?status_login=0');
	}



	//echo $sql;
?>