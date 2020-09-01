<div class="conteudo-livro">
    <ul>

    <?php
        $sql= "select * from livros where stock_livro > 0";

        $resultado = $ligacao->query($sql);

        while($linha = mysqli_fetch_assoc($resultado) ){
    ?>
        <li>
            <div class="detalhe-livro">
                <div class="moldura">
                    <img src="livros/<?php echo $linha['capa_livro']?>">
                </div>

                <div class="info-livro">
                    <h2>
                        <a href="index.php?zona=detalhe&livro=<?php echo $linha['id_livro']; ?>">
                            <?php echo utf8_encode($linha['titulo_livro']); ?>
                        </a>
                    </h2>
                    <p>
                    <?php echo utf8_encode($linha['sinopse_livro']); ?>
                    </p>
                    
                </div>
            </div>

        </li>

        <?php } ?>

    </ul>
</div>