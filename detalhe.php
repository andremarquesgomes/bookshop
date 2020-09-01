<?php
	$id_do_livro = $_GET['livro'];

	$sql = "select * from livros where id_livro = ".$id_do_livro;

	$resultado = $ligacao->query($sql);

	$linha = mysqli_fetch_assoc($resultado);

?>
<div class="detalhe-livro">
	<div class="moldura">
	    <img src="livros/<?php echo $linha['capa_livro']?>">
	</div>

	<div class="info-livro">
		<h2><?php echo utf8_encode($linha['titulo_livro']); ?></h2>
		<p><?php echo utf8_encode($linha['sinopse_livro']);?></p>
		<p>
			<?php 
				$editora_do_livro = getEditoraFromLivro($ligacao,$id_do_livro );
				echo $editora_do_livro;
			?>
				
		</p>
		<ul>
				<?php
					$autores = getAutoresFromLivro($ligacao, $id_do_livro);

					for($i=0; $i<count($autores); $i++){ ?>
						<li>
							<?php echo $autores[$i]; ?>
						</li>
					<?php } ?>

		</ul>

		<form action="adiciona_ao_carrinho.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id_do_livro?>">
			<input type="number" name="quantidade">
			<button>Adicionar ao carrinho</button>
		</form>	
	</div>
</div>                	