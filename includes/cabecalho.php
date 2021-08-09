<?php 
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
include "cart-functions.php";

// Get the amount of items in the shopping cart, this will be displayed in the header.
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J'adore Boutique</title>
    <!--fonte-adobe-->
    <link rel="stylesheet" href="https://use.typekit.net/ndt6lhf.css">
    <!--font-awesome-->
    <script src="https://use.fontawesome.com/86ea3a5af0.js"></script>
    <script src="https://kit.fontawesome.com/8ae2a7fd5c.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <!-- slick-slider -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <!--stylesheet-->
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    
</head>

<body>
    <main class="container-fluid p-0">
        <header>
            <div class="container-fluid m-0 p-0 mt-2 mb-3">
                <div class="row justify-content-evenly cabecalho">
                    <div class="col ms-4 pt-4">
                        <form method="GET" action="busca.php">
                            <input type="search" id="busca" name="buscar" placeholder="Buscar...">
                            <button type="submit" class="btn search-btn"><img src="images/icones/search-icon.png" width="26"></button>
                        </form>
                    </div>

                    <div class="col text-center">
                        <a href="index.php"><img src="images/logo_2.jpg" width="280" alt=""></a>
                    </div>

                    <div class="col text-end me-3 pt-4">
                        <button type="button" class="btn user" id="botao-login"><img src="images/icones/user-icon.png" alt="Ícone usuário" width="28"></button>
                        <a href="minha-conta.php" class="btn lista-desejos"><img src="images/icones/like_icon.png" alt="Ícone coração" width="28"></a>
                        <button type="button" class="btn cart-btn" id="botao-sacola"><img src="images/icones/bag_icon.png" alt="Ícone sacola de compras" width="28"></button>
                        <div class="cart-items text-center"><?php echo $num_items_in_cart?></div>
                    </div>
                </div>
            </div>

            <input type="checkbox" id="bt-menu">
            <label for="bt-menu">&#9776;</label>
            <nav class="barra-navegacao text-uppercase">
                <ul class="menu">
                    <li><button class="btn fechar-menu"><i class="bi bi-x"></i></button></li>
                    <li><a href="produtos.php">NOVIDADES</a></li>
                    <li class="item-dropdown"><a href="produtos.php?categoria=Roupas" class="dropbtn">ROUPAS</a>
                        <i class="bi bi-chevron-down roupas-btn"></i>
                        
                        <div class="dropdown-content">
                            <div class="opcoes-menu roupas">
                                <div>
                                    <a href="produtos.php?subcategoria=Blusas">Blusas</a>
                                    <a href="#">Vestidos</a>
                                    <a href="#">Macacões</a>
                                    <a href="#">Camisas</a>
                                    <a href="#">Casacos</a>
                                </div>

                                <div>
                                    <a href="#">Saias</a>
                                    <a href="#">Shorts</a>
                                    <a href="#">Calças</a>
                                    <a href="#">Body</a>
                                </div>
                            </div>
                            <div class="img-menu">
                                <img src="images/roupas-img-menu.jpg">
                            </div>
                        </div>
                    </li>
                    <li class="item-dropdown"><a href="produtos.php?categoria=Praia" class="dropbtn">MODA PRAIA</a>
                        <i class="bi bi-chevron-down praia-btn"></i>
                        
                        <div class="dropdown-content">
                            <div class="opcoes-menu praia">
                                <a href="#">Biquínis</a>
                                <a href="#">Maiôs</a>
                                <a href="#">Saídas de praia</a>
                                <a href="#">Bolsas</a>
                            </div>
                            <div class="img-menu">
                                <img src="images/praia-img-menu1.jpg">
                            </div>
                        </div>
                    </li>
                    <li class="item-dropdown"><a href="produtos.php?categoria=Calçados" class="dropbtn">CALÇADOS</a>
                        <i class="bi bi-chevron-down calcados-btn"></i>
                        
                        <div class="dropdown-content">
                            <div class="opcoes-menu calcados">
                                <a href="#">Rasteiras</a>
                                <a href="#">Scarpins</a>
                                <a href="#">Sandálias</a>
                                <a href="#">Tênis</a>
                                <a href="#">Botas</a>
                            </div>
                            <div class="img-menu">
                                <img src="images/shoes.jpg">
                            </div>
                        </div>
                    </li>
                    <li class="item-dropdown"><a href="produtos.php?categoria=Acessórios" class="dropbtn">ACESSÓRIOS</a>
                        <i class="bi bi-chevron-down acessorios-btn"></i>
                        
                        <div class="dropdown-content">
                            <div class="opcoes-menu acessorios">
                                <a href="#">Bolsas</a>
                                <a href="#">Carteiras</a>
                                <a href="#">Óculos</a>
                                <a href="#">Cintos</a>
                            </div>
                            <div class="img-menu">
                                <img src="images/acessorios-img-menu.jpg">
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="modal-login-cadastro">
            <?php  include_once "modal-login.php" ?>

            <?php include_once "modal-cadastro.php" ?>
        </div>

        <?php include "carrinho.php" ?>
