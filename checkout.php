<?php 
session_start(); 
include "includes/cart-functions.php"; 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!--fonte-adobe-->
    <link rel="stylesheet" href="https://use.typekit.net/ndt6lhf.css">
    <!--font-awesome-->
    <script src="https://use.fontawesome.com/86ea3a5af0.js"></script>
    <script src="https://kit.fontawesome.com/8ae2a7fd5c.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <!--stylesheet-->
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container-fluid">
        <div class="checkout">
            <div class="coluna-sacola">
                <h1 class='fs-5'>Minha Sacola</h1>
                <div class="cart-checkout content-wrapper mb-5">
                    <form action="" method="post">
                        <table class="tabela">
                            <thead>
                                <tr>
                                    <td colspan="2"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($products)): ?>
                                <tr>
                                    <td colspan="5" style="text-align:center;">Você ainda não adicionou nenhum produto à
                                        sacola.</td>
                                </tr>
                                <?php else: ?>
                                <?php foreach ($products as $product): $fotos = explode(',', $product['fotos']) ?>
                                <tr>
                                    <td class="img">
                                        <a href="index.php?page=product&id=<?=$product['id']?>">
                                            <img src="<?=$fotos[0]?>" width="80" alt="<?=$product['nome']?>">
                                        </a>
                                    </td>
                                    <td class="ps-2">
                                        <a href="index.php?page=product&id=<?=$product['id']?>">
                                            <?=$product['nome']?>
                                        </a>
                                    </td>
                                    <td class="price">R$
                                        <?=$product['preco']?>
                                    </td>
                                    <td class="quantity">
                                        <input type="number" name="quantity-<?=$product['id']?>"
                                            value="<?=$products_in_cart[$product['id']]?>" min="1"
                                            max="<?=$product['quantidade_estoque']?>" placeholder="Quantity" required>
                                    </td>
                                    <td class="price">R$
                                        <?=$product['preco'] * $products_in_cart[$product['id']]?>
                                    </td>
                                    <td><a href="?id=<?=$product['id']?>&remove=<?=$product['id']?>" class="remove"><i
                                                class="fa fa-trash-o"></i></a></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <div class="row justify-content-between mt-5 mb-3">
                            <div class="col-6 text-start">
                                <p>Entrega</p>
                            </div>
                            <div class="col-4 text-end">
                                <table class="table border">
                                    <tbody>
                                        <tr>
                                            <td class="row justify-content-between"><span class="col">Subtotal</span> <span class="col price">R$
                                                    <?=$subtotal?>
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td>Frete</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="buttons">
                            <a href="produtos.php" class="btn"><i class="bi bi-arrow-left"></i>Continuar comprando</a>
                            <input type="submit" value="Atualizar total" name="update" class="btn">
                        </div>
                    </form>
                </div>
            </div>

            <div class="coluna-checkout">
                <?php if(!isset($_SESSION['email'])): ?>
                <div class="check">  
                    <form action="login-checkout.php" method="POST">
                        <h2 class="fs-5">Identificação</h2>
                        <?php
                        if(isset($_GET['mensagem'])){
                            if($_GET['mensagem'] == 'invalido'){
                                echo "<div class='alert alert-danger' role='alert'>
                                        ERRO: Usuário ou senha inválidos.
                                    </div>";
                            }else if($_GET['mensagem'] == 'login'){
                                echo "<div class='alert alert-warning' role='alert'>
                                        ERRO: Efetue login para continuar.
                                    </div>";
                            }
                        }
                        ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="">Email</label>
                                <input id="emailLogin" type="email" name="email" placeholder="exemplo@gmail.com"
                                    class="form-control" maxlength="50" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label for="">Senha</label>
                                <input id="senhaLogin" type="password" name="senha" placeholder="senha"
                                    class="form-control" maxlength="8" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn esqueci-senha">Esqueci minha senha</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark mt-3 text-uppercase btn-login">Entrar</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn cadastro" id="botao-cadastro">Ainda não tem conta?
                                    Cadastre-se</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['email'])): ?>
                <div class="check">
                    <form action="" method="POST">
                        <h2 class="fs-5 ms-4 mb-4 ps-2">Pagamento</h2>
                        <div class="row mb-2 justify-content-center">
                            <div class="col-10">
                                <label for="numeroCartao">Número do cartão</label>
                                <input id="numeroCartao" type="text" name="numeroCartao" class="form-control" maxlength="16" required>
                            </div>
                        </div>

                        <div class="row mb-2 justify-content-center">
                            <div class="col-10">
                                <label for="nomeCartao">Nome</label>
                                <input id="nomeCartao" type="text" name="nomeCartao" class="form-control" maxlength="50" required>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-5">
                                <label for="validadeCartao">Validade</label>
                                <input id="validadeCartao" type="text" name="validadeCartao" class="form-control" maxlength="50" required>
                            </div>
                            <div class="col-5">
                                <label for="codigoCartao">CVC</label>
                                <input id="codigoCartao" type="text" name="codigoCartao" class="form-control" maxlength="50" required>
                            </div>
                        </div>


                        <div class="row mt-4 mb-4 justify-content-center">
                            <div class="col-10">
                                <a href="finalizar.php" class="btn btn-dark text-uppercase btn-login">Finalizar compra</a>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <!--jQuery-->
    <script src="js/jquery-3.5.1.js"></script>
    <!-- bootstrap -->
    <script src="bootstrap/bootstrap.bundle.js"></script>
    <!-- slick-slider-->
    <script src="slick/slick.js"></script>
    <!--javascript-->
    <script src="js/funcoes.js"></script>
</body>

</html>