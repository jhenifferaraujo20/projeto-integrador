<?php

include_once "../includes/conexao.php";

$id_produto = $_GET['id'];

$del = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
$del->bindValue(1, $id_produto, PDO::PARAM_INT);
$del->execute();

$count = $del->rowCount();

if($count > 0) {
    header("Location: produtos-listar.php?mensagem=excluido");
}else {
    header("Location: produtos-listar.php?mensagem=erro");
}