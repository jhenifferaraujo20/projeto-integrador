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
</head>
<body>
    <div class="col text-center p-3">
        <a href="index.php"><img src="images/logo_2.jpg" width="280" alt=""></a>
    </div>

    <h1 class='fs-5 text-center text-uppercase mt-5 mb-5'>Minha Sacola</h1>

    <div class="container">
        <div class="cart-checkout content-wrapper mb-5">
            <form action="" method="post">
                <table class="tabela">
                    <thead>
                        <tr>
                            <td colspan="2">Produto</td>
                            <td>Preço</td>
                            <td>Quantidade</td>
                            <td>Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">Você ainda não adicionou nenhum produto à sacola.</td>
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
                                <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['nome']?></a>
                            </td>
                            <td class="price">R$<?=$product['preco']?></td>
                            <td class="quantity">
                                <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantidade_estoque']?>" placeholder="Quantity" required>
                            </td>
                            <td class="price">R$<?=$product['preco'] * $products_in_cart[$product['id']]?></td>
                            <td><a href="?id=<?=$product['id']?>&remove=<?=$product['id']?>" class="remove"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="row justify-content-end mt-5 mb-3">
                    <div class="col-md-9">
                        <p>Entrega</p>
                    </div>
                    <div class="col-md-3">
                        <table class="table border">
                            <tbody>
                                <tr>
                                    <td>Subtotal <span class="price ms-5 ps-5">R$<?=$subtotal?></span></td>
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
                    <a href="produtos.php" class="btn btn-dark">Continuar comprando</a>
                    <input type="submit" value="Atualizar" name="update" class="btn btn-dark">
                    <a href="<?php if(isset($_SESSION['email'])){ echo "finalizar.php"; }else { echo "minha-conta.php"; }?>" class="btn btn-dark">Finalizar compra</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>