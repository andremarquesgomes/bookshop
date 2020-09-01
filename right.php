    		<h2><span>catergorias</span></h2>
    		<ul>
          <?php
              $sql_categorias="select * from categorias";

              $resultado_categorias = $ligacao->query($sql_categorias);

              while ($linha_categoria = mysqli_fetch_assoc($resultado_categorias) ) {
          ?>
              <li>
                <a href="#">
                    <?php echo utf8_encode($linha_categoria['nome_categoria']); ?>
                </a>
              </li>

              <?php } ?>



    		</ul>

     		<h2><span>Top de vendas</span></h2>
        <ol>

          <?php
            $top_vendas = getTopVendas($ligacao);

            for($i=0;$i<count($top_vendas); $i++) {
          ?>
          <li>
            <a href="index.php?zona=detalhe&livro=<?php echo $top_vendas[$i]['id_livro']?>">

              <?php echo $top_vendas[$i]['titulo_livro']; ?>
              
            </a>
            <div class="author"><?php echo $top_vendas[$i]['total_vendido']?></div>
          </li>

          <?php } ?>

        </ol>
        <div>
        </div>