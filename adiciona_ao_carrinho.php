<?php
	session_start();

	$quantidade_do_livro = $_POST['quantidade'];
	$id_livro = $_POST['id'];

	/*$item_a_colocar_no_carrinho['id_livro'] = $id_livro;
	$item_a_colocar_no_carrinho['quantidade'] =$quantidade_do_livro;*/

	$item_a_colocar_no_carrinho = array(
			'id_livro' => $id_livro,
			'quantidade'=>$quantidade_do_livro );



	if(!isset($_SESSION['carrinho'])){

		$_SESSION['carrinho'] =[];

	} 
		array_push($_SESSION['carrinho'], $item_a_colocar_no_carrinho);

	header('Location:index.php?zona=carrinho');
	



?>