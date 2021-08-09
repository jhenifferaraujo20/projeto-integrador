<?php

include_once "../includes/conexao.php";

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$cep = $_POST['cep'];
$numero = $_POST['numero'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

/* Inserir */
if(isset($_POST['inserir'])) {
    $inserir = $pdo->prepare("INSERT INTO clientes(nome_completo, cpf, telefone, email, cep, rua, numero_casa, bairro, cidade, estado) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $inserir->execute([$nome, $cpf, $telefone, $email, $cep, $rua, $numero, $bairro, $cidade, $estado]);
    $count = $inserir->rowCount();

    if($count > 0) {
        header('Location: clientes-listar.php');
    } else {
        header('Location: clientes-listar.php?mensagem=erro');
    }
}

/* Select por ID */
if(isset($_GET['id'])) {
    $select = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
    $select->execute([$_GET['id']]);
    $count = $select->rowCount();

    if($count > 0) {
        header('Location: clientes-listar.php');
    } else {
        header('Location: clientes-listar.php?mensagem=erro');
    }
}

/* Alterar */
if(isset($_POST['alterar']) && isset($_POST['id_cliente'])) {
    $alterar = $pdo->prepare("UPDATE clientes SET nome_completo = ?, cpf = ?, telefone = ?, email = ?");
    $alterar->execute();
    $count = $alterar->rowCount();

    if($count > 0) {
        header('Location: clientes-listar.php');
    } else {
        header('Location: clientes-listar.php?mensagem=erro');
    }
}

/* Excluir */
if(isset($_POST['excluir']) && isset($_POST['id_cliente'])) {
    $excluir = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
    $excluir->execute([$_POST['id_cliente']]);
    $count = $excluir->rowCount();

    if($count > 0) {
        header('Location: clientes-listar.php');
    } else {
        header('Location: clientes-listar.php?mensagem=erro');
    }
}