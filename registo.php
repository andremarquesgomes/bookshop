<form method ="post" action="regista_cliente.php">
	<ul>
		<li>Nome: <input type="text" name="nome"> </li>
		<li>Email: <input type="text" name="email"></li>
		<li>Password: <input type="password" name="pass"></li>
		<li>Morada: <input type="text" name="morada"></li>
		<li>Telefone: <input type="text" name="telefone"></li>
		<li><button>Registar</button></li>
	</ul>
</form>

<?php
	if(isset($_GET['status']) && $_GET['status']=='ok' ){ ?>
	<div> O registo foi efectuado com sucesso</div>

<?php
	}
	
?>

<div class="zona-de-mensagens">
	
</div>