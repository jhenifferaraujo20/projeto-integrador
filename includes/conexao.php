<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'loja_jadore';

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if(!$conexao){
    die("<h3>Não conectou</h3> Erro: " . mysqli_connect_error());
}


try{
    $pdo = new PDO('mysql:host=localhost;dbname=loja_jadore', $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Erro: " . $e->getMessage();
}

?>