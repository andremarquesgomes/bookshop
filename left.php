<?php


	if(!isset($_SESSION['nome'])) {
?>

<form method="post" action="verifica_login.php">
	<ul>
		<li>
			Login: <input type="text" name="login_user" 
			value="<?php echo (isset($_COOKIE['login_user'])) ? $_COOKIE['login_user']:""; ?>">
		</li>

		<li>
			Password: <input type="password" name="pass_user" 
			value="<?php echo (isset($_COOKIE['pass_user'])) ? $_COOKIE['pass_user']:""; ?>">
		</li>

		<li>
			<button>Entrar</button>
		</li>
	</ul>
</form>

<a href="index.php?zona=recuperar_pass">Recuperar Password</a>

<?php
	if(isset($_GET['status_login']) && $_GET['status_login']== '0'){ ?>
		<div>LOGIN ERRADO!!!</div>
<?php
	}

} else {
	echo "Ola Senhor(a) ".$_SESSION['nome']; ?>

	<a href="logout.php">LOGOUT</a>

	<?php
}
?>