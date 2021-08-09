<?php include "../includes/conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <!--fonte-adobe-->
    <link rel="stylesheet" href="https://use.typekit.net/ndt6lhf.css">
    <!--font-awesome-->
    <script src="https://use.fontawesome.com/86ea3a5af0.js"></script>
    <script src="https://kit.fontawesome.com/8ae2a7fd5c.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="../bootstrap/bootstrap.css" rel="stylesheet">
    <!--stylesheet-->
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="flex">
        <header class="header">
            <nav class="menu">
                <div class="logo"><h1 class="fs-4"><a href="index.php" class="fs-4">J'adore Boutique</a></h1></div>
                <div class="menu-btns">
                    <a href="index.php" class="btn"><i class="fa fa-bar-chart"></i>Painel</a>
                    <a href="pedidos-listar.php" class="btn"><i class="fa fa-shopping-cart"></i>Pedidos</a>
                    <a href="produtos-listar.php" class="btn"><i class="fa fa-tag"></i>Produtos</a>
                    <a href="clientes-listar.php" class="btn"><i class="fa fa-address-book-o"></i>Clientes</a>
                    <a href="" class="btn"><i class="fas fa-mail-bulk"></i>Marketing</a>
                    <a href="" class="btn"><i class="fas fa-cog"></i>Configurações</a>
                </div>
                <div class="sair">
                    <a href="logout.php" class="btn"><i class="fas fa-sign-out-alt"></i>Sair</a>
                </div>
            </nav>
        </header>
        <div class="conteudo">
     