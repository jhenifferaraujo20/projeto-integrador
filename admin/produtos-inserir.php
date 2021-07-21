<?php
include_once "../includes/conexao.php";

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$preco_antigo = $_POST['preco_antigo'];
$descricao = $_POST['descricao'];
$tamanho = $_POST['tamanho'];
$id_categoria = $_POST['id_categoria'];
$id_subcategoria = $_POST['id_subcategoria'];
$estoque = $_POST['quantidade_estoque'];

$dir = "images/";

// cor
$arquivo = $_FILES['cor'];
$foto = $dir . $arquivo['name'];

// fotos
$arquivos = $_FILES['arquivos'];
$fotos = $dir . $arquivos['name'][0] . ', ' . $dir . $arquivos['name'][1] . ', ' . $dir . $arquivos['name'][2];

move_uploaded_file($arquivo['tmp_name'], "$dir" . $arquivo['name']);
move_uploaded_file($arquivos['tmp_name'][0], "$dir" . $arquivos['name'][0]);
move_uploaded_file($arquivos['tmp_name'][1], "$dir" . $arquivos['name'][1]);
move_uploaded_file($arquivos['tmp_name'][2], "$dir" . $arquivos['name'][2]);

$insert = $pdo->prepare("INSERT INTO produtos(
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
                        :nome,
                        :preco,
                        :preco_antigo,
                        :descricao,
                        :foto,
                        :tamanho,
                        :categoria,
                        :subcategoria,
                        :estoque,
                        :fotos
                        )");
$insert->bindValue(":nome", $nome, PDO::PARAM_STR);
$insert->bindValue(":preco", $preco, PDO::PARAM_STR);
$insert->bindValue(":preco_antigo", $preco_antigo, PDO::PARAM_STR);
$insert->bindValue(":descricao", $descricao, PDO::PARAM_STR);
$insert->bindValue(":foto", $foto, PDO::PARAM_STR);
$insert->bindValue(":tamanho", $tamanho, PDO::PARAM_STR);
$insert->bindValue(":categoria", $id_categoria, PDO::PARAM_STR);
$insert->bindValue(":subcategoria", $id_subcategoria, PDO::PARAM_STR);
$insert->bindValue(":estoque", $estoque, PDO::PARAM_STR);
$insert->bindValue(":fotos", $fotos, PDO::PARAM_STR);
$insert->execute();

$count = $insert->rowCount();

if($count > 0){
    header('Location: produtos-listar.php?mensagem=cadastrado');
}else{
    header('Location: produtos-listar.php?mensagem=erro');
}
