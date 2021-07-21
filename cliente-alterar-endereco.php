<?php

include_once "includes/conexao.php";

$id = $_POST['id_cliente'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero_casa'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$sqlAlterar = "UPDATE clientes SET
                cep = '{$cep}',
                rua = '{$rua}',
                numero_casa = '{$numero}',
                bairro = '{$bairro}',
                cidade = '{$cidade}',
                estado = '{$estado}'
                WHERE id = {$id}";

$resultado = mysqli_query($conexao, $sqlAlterar);

if($resultado){
    $_SESSION['alterado'] = true;
    header("Location: minha-conta.php");
    exit;
}else{
    echo "Ocorreu algum erro";
}