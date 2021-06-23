<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Style</title>
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
                <div class="row pt-3 justify-content-evenly">
                    <div class="col ms-4">
                        <form method="GET" action="busca.php">
                            <input type="search" id="busca" name="buscar" placeholder="Buscar...">
                            <button type="submit" class="btn"><img src="images/icones/search-icon.png"></button>
                        </form>
                    </div>

                    <div class="col text-center">
                        <h1><a href="index.php">J'adore Boutique</a></h1>
                    </div>

                    <div class="col text-end me-3">
                        <button type="button" class="btn user"><img src="images/icones/user-icon.png" alt="Ícone usuário"></button>
                        <button type="button" class="btn lista-desejos"><img src="images/icones/like_icon.png" alt="Ícone coração"></button>
                        <button type="button" class="btn cart-btn"><img src="images/icones/bag_icon.png" alt="Ícone sacola de compras"></button>
                        <div class="cart-items text-center">0</div>
                    </div>
                </div>
            </div>

            <input type="checkbox" id="bt-menu">
            <label for="bt-menu">&#9776;</label>
            <nav class="barra-navegacao">
                <ul class="menu">
                    <li><button class="fechar-menu"><i class="bi bi-x"></i></button></li>
                    <li><a href="#">NEW IN</a></li>
                    <li class="item-dropdown"><a href="roupas.php" class="dropbtn">ROUPAS</a>
                        <i class="bi bi-chevron-down roupas-btn"></i>
                        
                        <div class="dropdown-content">
                            <div class="opcoes-menu roupas">
                                <div>
                                    <a href="#">Blusas</a>
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
                    <li class="item-dropdown"><a href="#" class="dropbtn">MODA PRAIA</a>
                        <i class="bi bi-chevron-down praia-btn"></i>
                        
                        <div class="dropdown-content">
                            <div class="opcoes-menu praia">
                                <a href="#">Biquínes</a>
                                <a href="#">Maiôs</a>
                                <a href="#">Saídas de praia</a>
                                <a href="#">Plus Size</a>
                            </div>
                            <div class="img-menu">
                                <img src="images/praia-img-menu1.jpg">
                            </div>
                        </div>
                    </li>
                    <li class="item-dropdown"><a href="#" class="dropbtn">CALÇADOS</a>
                        <i class="bi bi-chevron-down calcados-btn"></i>
                        
                        <div class="dropdown-content">
                            <div class="opcoes-menu calcados">
                                <a href="#">Rasteira</a>
                                <a href="#">Scarpin</a>
                                <a href="#">Tênis</a>
                                <a href="#">Sandália</a>
                                <a href="#">Coturno</a>
                            </div>
                            <div class="img-menu">
                                <img src="images/shoes.jpg">
                            </div>
                        </div>
                    </li>
                    <li class="item-dropdown"><a href="#" class="dropbtn">ACESSÓRIOS</a>
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

        <div class="container-fluid">
            <div class="resultado row"></div>
        </div>

        <div class="modal-login-cadastro">
            <div class="modal-login">
                <div class="row justify-content-end">
                    <div class="col-md-2">
                        <button class="btn fechar-login"><i class="bi bi-x"></i></button>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <h2 class="text-uppercase">Login</h2>
                    </div>
                </div>
                <?php
                if(isset($_GET['mensagem'])){
                    if($_GET['mensagem'] == 'invalido'){
                        echo "<div class='alert alert-danger' role='alert'>
                                ERRO: Usuário ou senha inválidos.
                            </div>";
                    }else if($_GET['mensagem'] == 'login'){
                        echo "<div class='alert alert-warning' role='alert'>
                                ERRO: Acesso negado. Efetue login para continuar.
                            </div>";
                    }
                }
                ?>

                <form action="login.php" method="POST">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-11">
                            <input id="email" type="email" name="email" placeholder="E-mail" class="form-control" maxlength="50" required>
                        </div>
                    </div>
                   
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <input id="senha" type="password" name="senha" placeholder="Senha" class="form-control" maxlength="8" required>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-6">
                            <button type="button" class="btn esqueci-senha">Esqueci minha senha</a>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-11">
                            <button type="submit" class="btn btn-dark mt-3 text-uppercase btn-login">Entrar</button>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-12">
                            <button type="button" class="btn cadastro">Ainda não tem conta? Cadastre-se</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-cadastro">
                <div class="row justify-content-end">
                    <div class="col-2">
                        <button class="btn fechar-login"><i class="bi bi-x"></i></button>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-8">
                        <h2 class="text-uppercase">Cadastre-se</h2>
                    </div>
                </div>
                <?php 
                    if(isset($_SESSION['status_cadastro'])):
                    ?>
                    <div class="alert alert-success">
                      <p>Cadastro efetuado!</p>
                      <p>Faça login informando o seu usuário e senha <button type="button" class="btn voltarlogin">aqui</button></p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['status_cadastro']);
                    ?>
                    <?php
                    if(isset($_SESSION['email_existe'])):
                    ?>
                    <div class="alert alert-danger">
                        <p>O email escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['email_existe']);
                    ?>
                        
                <form action="cadastro.php" method="POST">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-11">
                            <input type="text" name="nome" id="nome" placeholder="Nome completo" class="form-control" maxlength="50" required>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-11">
                            <input type="text" name="cpf" id="cpf" placeholder="CPF" class="form-control" maxlength="11" required>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-11">
                            <input type="text" name="telefone" id="telefone" placeholder="Telefone" class="form-control" maxlength="20" required>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-11">
                            <input type="email" name="email" id="email" placeholder="E-mail" class="form-control" maxlength="50" required>
                        </div>
                    </div>
                                
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control" maxlength="8" required>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-11">
                            <button type="submit" class="btn btn-dark mt-4 text-uppercase btn-cadastro">Cadastrar</button>
                        </div>
                    </div>
                                
                    <div class="row text-center">
                        <div class="col-12">
                            <button type="button" class="btn voltarlogin">Já tenho uma conta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- sacola -->
        <div class="cart-overlay">
            <div class="cart">
                <div class="row">
                    <div class="col-3">
                        <button class="btn close-cart">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                
                    <div class="col-7 text-center align-self-end">
                        <h2 class="fs-4">Sua Sacola</h2>
                    </div>
                </div>
                
                <div class="cart-content">
                <!--<div class="cart-item">
                        <img src="">
                        <div class="item-info">
                            <span>produto</span><br>
                            <span>R$219,99</span><br>
                            <i class="fa fa-minus"></i>
                            <p class="item-amount">1</p>
                            <i class="fa fa-plus"></i>
                        </div>
                        <div>
                            <span class="remove-item"><i class="fa fa-trash-o"></i></span>
                        </div>
                    </div>-->
                </div>

                <div class="cart-footer">
                    <button class="btn clear-cart text-uppercase">limpar sacola</button>
                    <div class="frete mb-2">
                        <form method="post">
                            <div class="row">
                                <div class="col-4 align-self-center">
                                    <label for="cep">Calcular frete</label>
                                </div>

                                <div class="col-4">
                                    <input type="text" id="cep" placeholder="CEP" maxlength="9" class="form-control">
                                </div>

                                <div class="col-4">
                                    <button class="btn text-uppercase">Calcular</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row justify-content-between">
                        <span class="col-2">Subtotal: </span>
                        <span class="col-3">R$ 0</span>
                    </div>

                    <div class="row justify-content-between">
                        <span class="col-2">Frete: </span>
                        <span class="col-3">R$ 0</span>
                    </div>
                    <div class="row justify-content-between">
                        <span class="col-2">Total: </span>
                        <span class="col-3 cart-total">0</span>
                    </div>
    
                    <button class="btn btn-dark finalizar-compra text-uppercase">Finalizar compra</button>
                </div>
            </div>
        </div>

        <?php
        if(isset($_SESSION['nao_autenticado'])):
        ?>
            <div class="alert alert-danger">
                <i class="fas fa-times-circle"></i>
                <p>ERRO: Usuário ou senha inválidos.</p>
            </div>
        <?php
        endif;
        unset($_SESSION['nao_autenticado']);
        ?> 