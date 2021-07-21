<?php

include_once "includes/conexao.php";

$id = $_POST['id'];
$nome = $_POST['nome_completo'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$sqlAlterar = "UPDATE clientes SET
                nome_completo = '{$nome}',
                cpf = '{$cpf}',
                telefone = '{$telefone}',
                email = '{$email}'
                WHERE id = {$id}";

$resultado = mysqli_query($conexao, $sqlAlterar);

if($resultado){
    header("Location: minha-conta.php");
}else{
    echo "Ocorreu algum erro";
}