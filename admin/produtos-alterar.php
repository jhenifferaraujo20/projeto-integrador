<?php

include_once "../includes/conexao.php";

$id = $_POST['id_produto'];
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

/*move_uploaded_file($arquivo['tmp_name'], "$dir" . $arquivo['name']);
move_uploaded_file($arquivos['tmp_name'][0], "$dir" . $arquivos['name'][0]);
move_uploaded_file($arquivos['tmp_name'][1], "$dir" . $arquivos['name'][1]);
move_uploaded_file($arquivos['tmp_name'][2], "$dir" . $arquivos['name'][2]);*/

$update = $pdo->prepare("UPDATE produtos SET 
                        nome = '$nome', 
                        preco = '$preco', 
                        preco_antigo = '$preco_antigo', 
                        descricao = '$descricao',
                        cor = '$foto',
                        tamanho = '$tamanho',
                        id_categoria = '$id_categoria',
                        id_subcategoria = '$id_subcategoria',
                        quantidade_estoque = '$quantidade_estoque',
                        fotos = '$fotos' 
                        WHERE id = ?");
$update->bindValue(1, $id, PDO::PARAM_INT);
$update->execute();

$count = $update->rowCount();

if($count > 0) {
    header("Location: produtos-listar.php?mensagem=alterado");
}else{
    header("Location: produtos-listar.php?mensagem=erro");
}