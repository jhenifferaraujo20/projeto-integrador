<?php
session_start();

include "includes/conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT * FROM clientes WHERE email = '{$email}' AND senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
    $usuario_bd = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $usuario_bd['email'];
    header("Location: checkout.php");
    exit();
}else {
    header('Location: checkout.php?mensagem=invalido');
    exit();
}

?>