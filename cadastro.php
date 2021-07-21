<?php
session_start();
include "includes/conexao.php";

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome_completo']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "SELECT COUNT(*) AS total FROM clientes WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($resultado);

if($row['total'] == 1) {
    header('Location: index.php?mensagem=email_existe');
    exit;
}

$sql = "INSERT INTO clientes (nome_completo, cpf, telefone, email, senha) 
        VALUES ('$nome', '$cpf', '$telefone', '$email', '$senha')
        ";

if($conexao->query($sql) === TRUE) {
    header('Location: index.php?mensagem=cadastro_efetuado');
    exit;
}

$conexao->close();
?>