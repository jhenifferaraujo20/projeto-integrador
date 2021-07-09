<?php
session_start();

include "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT * FROM clientes WHERE email = '{$email}' AND senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
    $usuario_bd = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $usuario_bd['email'];
    header("Location: minha-conta.php?id={$usuario_bd['id']}");
    exit();
}else {
    header('Location: index.php?mensagem=invalido');
    exit();
}

?>