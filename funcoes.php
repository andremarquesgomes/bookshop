<?php

	function getEditoraFromLivro($con, $id){

		$sql="select nome_editora from editoras
		inner join livros on id_editora = fk_id_editora
		where id_livro=". $id;

		$resultado = $con->query($sql);

		$linha = mysqli_fetch_assoc($resultado);

		return utf8_encode($linha['nome_editora']);


	}

	function getAutoresFromLivro($con, $id){

		$lista_de_autores =[];

		$sql = "select nome_autor from autores
				inner join autor_escreve_livro on id_autor = fk_id_autor
				inner join livros on id_livro = fk_id_livro
				where id_livro =".$id;

		$resultado = $con->query($sql);


		while($linha= mysqli_fetch_assoc($resultado) ){
			array_push($lista_de_autores, utf8_encode($linha['nome_autor']));
		}

		return $lista_de_autores;


	}

	function getDetalhesLivro($con, $id){
		$sql = "select * from livros where id_livro=".$id;
		$resultado = $con->query($sql);

		$linha = mysqli_fetch_assoc($resultado);
		$linha['titulo_livro'] = utf8_encode($linha['titulo_livro']);

		return $linha;


	}

	function getMeiosDePagamento($con){

		$sql = "select * from meios_de_pagamento";

		$resultado = $con->query($sql);

		$lista_meios_meios_pagamento = [];

		while($linha = mysqli_fetch_assoc($resultado)){
			array_push($lista_meios_meios_pagamento, $linha);
		}
/*
		echo "<pre>";
		print_r($lista_meios_meios_pagamento);
		echo "</pre>";*/

		return $lista_meios_meios_pagamento;

	}

	function getTopVendas($con){
		$sql="select id_livro, titulo_livro, sum(quantidade) total_vendido from livros
		inner join livro_esta_em_carrinho on id_livro = fk_id_livro
		inner join compras on compras.fk_id_carrinho = livro_esta_em_carrinho.fk_id_carrinho
		group by titulo_livro order by total_vendido desc limit 5";

		$resultado = $con->query($sql);

		$lista_resultado = [];

		while($linha = mysqli_fetch_assoc($resultado)){
			array_push($lista_resultado, $linha);
		}

		return $lista_resultado;
	}

	function getEditoras($con){

		$sql="select * from editoras";
		$resultado = $con->query($sql);

		$lista_resultado = [];

		while($linha = mysqli_fetch_assoc($resultado)){
			array_push($lista_resultado, $linha);
		}

		return $lista_resultado;



	}


	function getAutores($con){

		$sql="select * from autores";
		$resultado = $con->query($sql);

		$lista_resultado = [];

		while($linha = mysqli_fetch_assoc($resultado)){
			array_push($lista_resultado, $linha);
		}

		return $lista_resultado;



	}

	function getLivros($con){

		$sql="select * from livros";
		$resultado = $con->query($sql);

		$lista_resultado = [];

		while($linha = mysqli_fetch_assoc($resultado)){
			$linha['titulo_livro'] = utf8_encode($linha['titulo_livro']);
			array_push($lista_resultado, $linha);
		}

		return $lista_resultado;



	}

?>