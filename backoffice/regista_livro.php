<?php
    include('../funcoes.php');
    include('../config.php');


    $numero = 20;
/*
    if($numero % 2 == 0){
        echo "O numero é par";
    } else {
        echo "O numero é impar";
    }
*/
    echo ($numero % 2 == 0)? "O numero é par" :"O numero é impar";

    if(isset($_GET['id_livro'])){
        $detalhe_livro= getDetalhesLivro($ligacao,$_GET['id_livro'] );
    }

?>

<form action="insere_livro.php" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            Titulo:
            <input type="text" name="titulo"
             value="<?php echo (isset($detalhe_livro))? $detalhe_livro['titulo_livro'] : ""; ?>" >
        </li>
        <li>

            <select name="editora">
            <?php
                $lista_editoras = getEditoras($ligacao);

                for($i=0;$i<count($lista_editoras); $i++){ ?>
                    <option value="<?php echo $lista_editoras[$i]['id_editora']?>"

                    <?php
                     echo
                     (isset($detalhe_livro) &&
                      $lista_editoras[$i]['id_editora'] == $detalhe_livro['fk_id_editora'])?
                      "selected" : "" ?>
                    >
                        <?php echo $lista_editoras[$i]['nome_editora']?>
                    </option>

            <?php
                    }
            ?>
            </select>

        </li>


        <li>
            Sinopse:
            <textarea name="sinopse"></textarea>
        </li>

        <li>
            Preço:
            <input type="text" name="preco">
        </li>


        <li>
            Stock:
            <input type="text" name="stock">
        </li>

        <li>
            Capa:
            <input type="file" name="capa">

        </li>
        <li>
            ISBN:
            <input type="text" name="isbn">
        </li>
        <li>
           ANO: <input type="text" name="ano">
        </li>

        <li>
            <ul>
            <?php
                $lista_autores = getAutores($ligacao);

                for($i=0;$i<count($lista_autores);$i++) { ?>

                    <li>

                        <input type="checkbox"
                        value="<?php echo $lista_autores[$i]['id_autor']; ?>" name="autores[]">

                        <?php echo $lista_autores[$i]['nome_autor']; ?>
                    </li>

                <?php

                }
            ?>

            </ul>
        </li>
    <input  type="hidden"
            name="livro"

            value="<?php echo (isset($_GET['id_livro']))? $_GET['id_livro']:0 ; ?>"
    >

        <li>
            <button>Enviar</button>
        </li>


    </ul>

</form>

<ul>

<?php
    $lista_livros= getLivros($ligacao);

    for($i=0;$i<count($lista_livros); $i++) {
?>
    <li>
        <a href="regista_livro.php?id_livro=<?php echo $lista_livros[$i]['id_livro']; ?>">

        <?php echo $lista_livros[$i]['titulo_livro']; ?>

        </a>
    </li>

    <?php } ?>
</ul>