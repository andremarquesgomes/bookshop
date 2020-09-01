<div id="menu-container">
    <ul>
	    <li><a href="index.php">Livraria Online</a></li>
	    <li><a href="./">Home<span>Ir para a homepage</span></a></li>
	    <li><a href="index.php?zona=lista_livros">Livraria<span>procure um livro</span></a></li>

		<?php


		if(!isset($_SESSION['nome'])) { ?>

		<li>
			<a href="index.php?zona=registo">
				Registo<span>registe-se para comprar</span>
			</a>
		</li>

		<?php } else { ?>

		<li>
			<a href="logout.php">
				Logout<span> </span>
			</a>
		</li>

		<?php } ?>

	    <li><a href="index.php?zona=carrinho">Carrinho<span>saiba mais sobre  nós</span></a></li>
	    <li><a href="index.php?zona=contactos">Contactos<span>contacte a livraria</span></a></li>
    </ul>
</div>