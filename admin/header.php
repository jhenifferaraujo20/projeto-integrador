<?php include "../includes/conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!--fonte-adobe-->
    <link rel="stylesheet" href="https://use.typekit.net/ndt6lhf.css">

    <!--font-awesome-->
    <script src="https://use.fontawesome.com/86ea3a5af0.js"></script>
    <script src="https://kit.fontawesome.com/8ae2a7fd5c.js" crossorigin="anonymous"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="../bootstrap/bootstrap.css" rel="stylesheet">

    <style>
        * {
    font-family: 'muli';
}
body{
    color: #6c757d;
}
th{
    color: #6c757d;
}
.table > :not(:last-child) > :last-child > * {
    border-bottom: none;
    padding-top: 15px;
    padding-bottom: 15px;
}
    .flex {
        display: flex;
        width: 100%;
        overflow: hidden;
    }
    .sidebar {
        width: 20%;
        overflow-x: hidden;
    }
    .content {
        width: 80%;
        display: flex;
        flex-direction: column;
    }
    .navbar-dark {
        overflow-x: hidden;
    }
    .container {
        width: 90%;
        margin: auto;
    }
    .header-title {
        font-weight: 700;
    }
    </style>
</head>
<body class="bg-light">
    <div class="flex">
        <div class="sidebar">
            <aside class="position-fixed top-0 p-3 left-0 h-100 bg-dark text-white navbar-dark" style="width: 20%;">
                <div class="d-flex justify-content-center align-items-center px-3 py-4">
                    <img src="../images/blusa-manga-bishop-azul-img-1.jpg" alt="" class="rounded-pill img-fluid" style="width: 70px; height: 70px; object-fit: cover;">
                    <div class="ms-2">
                        <h5 class="fs-6 mb-0">
                            <a href="#" class="text-decoration-none link-secondary">Jheniffer Araújo</a>
                            <p>Admin</p>
                        </h5>
                    </div>
                </div>
                <hr>
                <ul class="navbar-nav list-unstyled flex-column lh-lg">
                    <li class="nav-item">
                        <a href="index.php" class="rounded-0 nav-link active"><i class="bi bi-bar-chart-line"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="pedidos-listar.php" class="nav-link"><i class="bi bi-cart3"></i> Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a href="produtos-listar.php" class="nav-link"><i class="bi bi-tag"></i> Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a href="clientes-listar.php" class="nav-link"><i class="bi bi-people"></i> Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="fas fa-mail-bulk"></i> Marketing</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-gear"></i> Configurações</a>
                    </li>
                </ul>
                <hr>
                <a class="nav-link link-secondary" href="#"><i class="bi bi-box-arrow-right fs-5"></i> Logout</a>
            </aside>
        </div>

        <div class="content"> 
            <nav class="navbar navbar-expand-md shadow-sm sticky-top bg-body">
                <div class="container-fluid mx-2">
                    <a class="navbar-brand link-secondary" href="#">J'adore Boutique</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="#"><i class="bi bi-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="#"><i class="bi bi-envelope"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="conteudo bg-light">
                