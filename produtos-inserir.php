<?php
include_once "conexao.php";

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$preco_antigo = $_POST['preco_antigo'];
$descricao = $_POST['descricao'];
$tamanho = $_POST['tamanho'];
$id_categoria = $_POST['id_categoria'];
$id_subcategoria = $_POST['id_subcategoria'];
$quantidade_estoque = $_POST['quantidade_estoque'];

$dir = "images/";

// cor
$arquivo = $_FILES['cor'];
$foto = $dir . $arquivo['name'];

// fotos
$arquivos = $_FILES['arquivos'];
$fotos = $dir . $arquivos['name'][0] . ', ' . $dir . $arquivos['name'][1] . ', ' . $dir . $arquivos['name'][2];

move_uploaded_file($arquivo['tmp_name'], "$dir/" . $arquivo['name']);
move_uploaded_file($arquivos['tmp_name'][0], "$dir/" . $arquivos['name'][0]);
move_uploaded_file($arquivos['tmp_name'][1], "$dir/" . $arquivos['name'][1]);
move_uploaded_file($arquivos['tmp_name'][2], "$dir/" . $arquivos['name'][2]);

$query = ("INSERT INTO produtos(
            nome, 
            preco, 
            preco_antigo, 
            descricao, 
            cor, 
            tamanho, 
            id_categoria, 
            id_subcategoria, 
            quantidade_estoque,
            fotos 
            ) 
            VALUES(
                '{$nome}',
                '{$preco}',
                '{$preco_antigo}',
                '{$descricao}',
                '{$foto}',
                '{$tamanho}',
                '{$id_categoria}',
                '{$id_subcategoria}',
                '{$quantidade_estoque}',
                '{$fotos}'
            )");
$result = mysqli_query($conexao, $query);

if($result){
    header('Location: produtos-listar.php');
}else{
    echo "Algum erro aconteceu";
}
