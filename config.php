<?php
	 $ligacao = mysqli_connect('localhost','root','','livraria');

	//  DEFINIR TIPO VARIAVEIS COM VALORES FIXOS NO ENVIA_EMAIL.PHP
	define('SERVIDOR_ENVIO_MAIL',"smtp.gmail.com");
	define('PORTA_SERVIDOR_ENVIO_EMAIL', 587);
	define('USER_SERVIDOR_ENVIO_EMAIL', "formacao.flag.hugo@gmail.com");
	define('PASSWORD_SERVIDOR_ENVIO_EMAIL', "Flag#2019");
	define('URL_SITE','http://localhost/phpLivraria/');

	
	define('SUBJECT_EMAIL', "Há um novo pedido de contacto");

?>