<?php 

include_once "../includes/conexao.php";

if(isset($_POST['confirmar']) && isset($_POST['id_pedido'])){
    $update = $pdo->prepare("UPDATE pedidos SET status = 'confirmado' WHERE id = ?");
    $update->execute([$_POST['id_pedido']]);
    header('Location: pedidos-listar.php');
    exit;
}

if(isset($_POST['cancelar']) && isset($_POST['id_pedido'])){
    $update = $pdo->prepare("UPDATE pedidos SET status = 'cancelado' WHERE id = ?");
    $update->execute([$_POST['id_pedido']]);
    header('Location: pedidos-listar.php');
    exit;
}

if(isset($_POST['enviar']) && isset($_POST['id_pedido'])){
    $update = $pdo->prepare("UPDATE pedidos SET status = 'finalizado' WHERE id = ?");
    $update->execute([$_POST['id_pedido']]);
    header('Location: pedidos-listar.php');
    exit;
}