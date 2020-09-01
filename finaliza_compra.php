<?php
	include('config.php');
	include('funcoes.php');

	session_start();

	if(!isset($_SESSION['id'])){
		header('Location:index.php?zona=registo');
	} else {

		$sql_insere_carrinho = "insert into carrinhos(fk_id_cliente) 
		values(".$_SESSION['id'].") ";

		$resultado_carrinho= $ligacao->query($sql_insere_carrinho);

		$numero_carrinho=$ligacao->insert_id;

		//echo $numero_carrinho;

		for($i=0;$i<count($_SESSION['carrinho']); $i++){

			$id_livro_a_inserir = $_SESSION['carrinho'][$i]['id_livro'];
			$id_do_carrinho_a_inserir = $numero_carrinho;
			$quantidade_a_inserir = $_SESSION['carrinho'][$i]['quantidade'];

			$detalhe_do_livro = getDetalhesLivro($ligacao, $id_livro_a_inserir);
			$preco_a_inserir = $detalhe_do_livro['preco_livro'];

			$sql_insere_no_carrinho=
			"insert into livro_esta_em_carrinho
			(fk_id_livro, fk_id_carrinho, quantidade,preco_na_compra)
			values
			($id_livro_a_inserir,$id_do_carrinho_a_inserir, $quantidade_a_inserir, $preco_a_inserir ) ";

			$resultado_insere_no_carrinho = $ligacao->query($sql_insere_no_carrinho);

			$novo_stock = $detalhe_do_livro['stock_livro'] - $quantidade_a_inserir;

			$sql_update_stock ="update livros set stock_livro = $novo_stock where id_livro=$id_livro_a_inserir";

			$resultado_update= $ligacao->query($sql_update_stock);

		}

		$id_pagamento = $_POST['pagamento'];

		$sql_insere_compra ="insert into compras(fk_id_meio_de_pagamento, fk_id_carrinho)
		values($id_pagamento, $numero_carrinho)";

		$resultado_compra = $ligacao->query($sql_insere_compra);

		$_SESSION['carrinho']=[];

		header('Location:index.php?zona=obrigado');



	}
	
?>