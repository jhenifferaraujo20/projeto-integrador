<?php
session_start();
include "conexao.php";

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "SELECT COUNT(*) AS total FROM clientes WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($resultado);

if($row['total'] == 1) {
    $_SESSION['email_existe'] = true;
    header('Location: index.php');
    exit;
}

$sql = "INSERT INTO clientes (nome, cpf, telefone, email, senha, data_cadastro) 
        VALUES ('$nome', '$cpf', '$telefone', '$email', '$senha', NOW())
        ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
    header('Location: index.php');
    exit;
}

$conexao->close();
?>