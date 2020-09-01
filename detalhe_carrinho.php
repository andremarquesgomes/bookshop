<div class="detalhe-carrinho">
	<?php if(isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) { ?>
	
	<table>
		<thead>
			<td width="300">LIVRO</td>
			<td width="50">Quantidade</td>
			<td width="50">Preço Unitário</td>
			<td width="50">Preço Total</td>
		</thead>
		<?php 
			$total_compra =0;
			
			for($i=0;$i<count($_SESSION['carrinho']); $i++ ) {
				$detalhe_livro = 
				getDetalhesLivro($ligacao, $_SESSION['carrinho'][$i]['id_livro']);
				$total_do_livro = 
				$detalhe_livro['preco_livro'] * $_SESSION['carrinho'][$i]['quantidade']; 

				//$total_compra = $total_compra + $total_do_livro;
				$total_compra +=  $total_do_livro;
		
		?>		
				<tr>
					<td><?php echo $detalhe_livro['titulo_livro'] ?></td>
					<td> <?php echo $_SESSION['carrinho'][$i]['quantidade'] ?></td>
					<td><?php echo $detalhe_livro['preco_livro'] ?></td>
					<td><?php echo $total_do_livro; ?></td>
				</tr>
		<?php

		}

		?>


		<tr>
			<td colspan="3">TOTAL:</td>
			<td><?php echo $total_compra; ?></td>

		</tr>

	</table>


	<form action="finaliza_compra.php" method="post">
		<?php 
			$lista_meios= getMeiosDePagamento($ligacao);
		?>
		<select name="pagamento">

			<?php
				for($i=0; $i<count($lista_meios);$i++){ ?>
					<option value="<?php echo $lista_meios[$i]['id_meio_de_pagamento'] ?>">
						<?php echo $lista_meios[$i]['nome_meio_de_pagamento'] ?>
							
					</option>
			<?php	}
			?>
				
		</select>

		<button>FINALIZAR COMPRA</button>
	</form>

	<?php } else {
		echo "O carrinho está vazio";
	} ?>

</div>