<?php

include_once "conexao.php";

$num_products_on_each_page = 8;
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

if(!isset($_GET['categoria'])){
    $where = "";
}

if(isset($_GET['categoria'])){
    if($_GET['categoria'] == 'Roupas'){
        $where = "WHERE categoria = 'Roupas'";
    }
    elseif($_GET['categoria'] == 'Praia'){
        $where = "WHERE categoria = 'Moda Praia'";
    }
    elseif($_GET['categoria'] == 'Calçados'){
        $where = "WHERE categoria = 'Calçados'";
    }
    elseif($_GET['categoria'] == 'Acessórios'){
        $where = "WHERE categoria = 'Acessórios'";
    }
    
}

$stmt = $pdo->prepare("SELECT produtos.id, produtos.nome, produtos.preco, categorias.categoria as 'categoria', subcategorias.subcategoria as 'subcategoria', produtos.fotos FROM produtos INNER JOIN categorias ON produtos.id_categoria = categorias.id INNER JOIN subcategorias ON produtos.id_subcategoria= subcategorias.id $where ORDER BY id DESC LIMIT ?,?;");
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_products = $pdo->query("SELECT produtos.id, produtos.nome, produtos.preco, categorias.categoria as 'categoria', subcategorias.subcategoria as 'subcategoria', produtos.fotos FROM produtos INNER JOIN categorias ON produtos.id_categoria = categorias.id INNER JOIN subcategorias ON produtos.id_subcategoria= subcategorias.id $where")->rowCount();