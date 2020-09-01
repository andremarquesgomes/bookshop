<?php
    include('../config.php');


    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    $titulo = $_POST['titulo'];
    $editora =$_POST['editora'];
    $sinopse =$_POST['sinopse'];
    $preco =$_POST['preco'];
    $stock =$_POST['stock'];
    $capa = $_FILES['capa'];
    $isbn = $_POST['isbn'];
    $ano = $_POST['ano'];
    $autores = $_POST['autores'];

    $nome_ficheiro= $capa['name'];

    echo  $nome_ficheiro;

    $origem= $capa['tmp_name'];
    $pasta_destino='../livros/';

    $nome_explodido = explode('.',$nome_ficheiro );

    $ultima_posicao = count($nome_explodido)-1;


    $extencao = $nome_explodido[$ultima_posicao];


    $nome_final_ficheiro= uniqid().'.'.$extencao;

    $destino_final= $pasta_destino.$nome_final_ficheiro;

    move_uploaded_file($origem, $destino_final);

if($_POST['livro']==0 ) {


    $sql ="insert into livros
    (titulo_livro,
     fk_id_editora,
     sinopse_livro,
     stock_livro,
     preco_livro,
     capa_livro,
     ano_edicao_livro,
     isbn_livro)

     values
     ('$titulo',
     $editora,
     '$sinopse',
     $stock,
     $preco,
     '$nome_final_ficheiro',
     '$ano',
     '$isbn')";

} else {
    $sql="update livros
        set titulo_livro = '$titulo',
        fk_id_editora = $editora
        where id_livro=". $_POST['livro'];
}



     $resultado = $ligacao->query($sql);

     $id_livro = $ligacao->insert_id;

     for($i=0; $i<count($autores); $i++){

         $sql = "insert into autor_escreve_livro
         (fk_id_autor, fk_id_livro)
         values
         ($autores[$i], $id_livro)";

         $resultado = $ligacao->query( $sql);
     }






?>