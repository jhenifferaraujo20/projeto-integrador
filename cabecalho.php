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
    <!--stylesheet-->
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <!--light-slider.css-->
    <link rel="stylesheet" type="text/css" href="css/lightslider.css">
</head>

<body>
    <header>
        <div class="cabecalho">
            <form class="campo-busca">
                <input type="search" name="campo-busca" placeholder="Buscar...">
                <button><img src="images/icones/search-icon.png"></button>
            </form>

            <h1><a href="index.php">Urban Style</a></h1>

            <figure>
                <span class="user"><img src="images/icones/user-icon.png" alt="Ícone usuário"></span>
                <span class="lista-desejos"><img src="images/icones/like_icon.png" alt="Ícone coração"></span>
                <span class="cart-btn"><img src="images/icones/bag_icon.png" alt="Ícone sacola de compras"></span>
                <div class="cart-items">0</div>
            </figure>
        </div>

        <input type="checkbox" id="bt-menu">
        <label for="bt-menu">&#9776;</label>
        <nav class="navbar">
            <ul class="menu">
                <li><button class="fechar-menu"><i class="fa fa-times"></i></button></li>
                <li><a href="#">NEW IN</a></li>
                <li class="dropdown"><a href="roupas.php" class="dropbtn">ROUPAS</a>
                    <i class="fa fa-angle-down roupas-btn"></i>
                    <hr>
                    <div class="dropdown-content">
                        <div class="opcoes-menu roupas">
                            <a href="#">Blusas</a>
                            <a href="#">Vestidos</a>
                            <a href="#">Macacões</a>
                            <a href="#">Camisas</a>
                            <a href="#">Casacos</a>
                            <a href="#">Saias</a>
                            <a href="#">Shorts</a>
                            <a href="#">Calças</a>
                            <a href="#">Lingerie</a>
                        </div>
                        <div class="img-menu">
                            <img src="images/roupas-img-menu.jpg">
                        </div>
                    </div>
                </li>
                <li class="dropdown"><a href="#" class="dropbtn">MODA PRAIA</a>
                    <i class="fa fa-angle-down praia-btn"></i>
                    <hr>
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
                <li class="dropdown"><a href="#" class="dropbtn">CALÇADOS</a>
                    <i class="fa fa-angle-down calcados-btn"></i>
                    <hr>
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
                <li class="dropdown"><a href="#" class="dropbtn">ACESSÓRIOS</a>
                    <i class="fa fa-angle-down acessorios-btn"></i>
                    <hr>
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
        <div class="modal-login">
            <a href="#" class="fechar-login"><i class="fa fa-times"></i></a>
            <strong>Login</strong>

            <form method="POST">
                <input id="email" type="email" name="email" placeholder="E-mail" required>

                <input id="senha" type="password" name="password" placeholder="Senha" required>

                <a href="#">Esqueci minha senha</a>

                <button type="submit">Entrar</button>
            </form>
            <a href="#" class="cadastro">Ainda não tem conta? Cadastre-se</a>
        </div>

        <div class="modal-cadastro">
            <a href="#" class="fechar-login"><i class="fa fa-times"></i></a>
            <strong>Cadastre-se</strong>
            <form method="POST">
                <input type="text" name="nome" id="nome" placeholder="Nome completo" required>

                <input type="text" name="cpf" id="cpf" placeholder="CPF" required>

                <input type="tel" name="telefone" id="telefone" placeholder="Telefone" required>

                <input type="email" name="email" id="email" placeholder="E-mail" required>

                <input type="password" name="senha" id="senha" placeholder="Senha" required>

                <button type="submit">Cadastrar</button>
            </form>
            <a href="#" class="voltarlogin">Já tenho uma conta</a>
        </div>
    </div>

    <!-- cart -->
    <div class="cart-overlay">
        <div class="cart">
            <span class="close-cart">
                <i class=" fa fa-times"></i>
            </span>
            <h2>Sua Sacola</h2>
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
                <button class="clear-cart">limpar sacola</button>
                <div class="frete">
                    <form>
                        <label for="cep">Calcular frete</label>
                        <input type="text" id="cep" placeholder="CEP" maxlength="9">
                        <button>Calcular</button>
                    </form>
                </div>
                <p>Subtotal: <span>R$ 0</span></p>
                <p>Frete: <span>R$ 0</span></p>
                <p>total: R$ <span class="cart-total">0</span></p>
                <button class="finalizar-compra">Finalizar compra</button>
            </div>
        </div>
    </div>
    <!-- end of cart -->