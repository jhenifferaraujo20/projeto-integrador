<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    <div class="text-center mt-5">
        <a href="index.php"><img src="images/logo_2.jpg" width="280" alt=""></a>
    </div>
    <h1 class='fs-5 text-center text-uppercase mt-5 mb-5'>Minha Sacola</h1>

    <div class="container">
        <table class="table">
            <thead class="text-uppercase">
                <tr>
                    <th>Produto</th>
                    <th>Entrega</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><img src="images/img_1_produto_1.jpg" width="80" alt=""></td>
                    <td class="pt-3">Em até 5 dias úteis</td>
                    <td class="pt-3">R$ 299,20</td>
                    <td>
                        <button class="btn"><i class="bi bi-dash-lg"></i></button>
                            <span class="item-amount">1</span>
                        <button class="btn"><i class="bi bi-plus-lg"></i></button>
                    </td>
                    <td class="pt-3">R$ 299,20</td>
                    <td><button class="btn"><i class="bi bi-x"></i></button></td>
                </tr>
                <tr>
                    <td><img src="images/img_1_produto_1.jpg" width="80" alt=""></td>
                    <td class="pt-3">Em até 5 dias úteis</td>
                    <td class="pt-3">R$ 299,20</td>
                    <td>
                        <button class="btn"><i class="bi bi-dash-lg"></i></button>
                            <span class="item-amount">1</span>
                        <button class="btn"><i class="bi bi-plus-lg"></i></button>
                    </td>
                    <td class="pt-3">R$ 299,20</td>
                    <td><button class="btn"><i class="bi bi-x"></i></button></td>
                </tr>
            </tbody>
        </table>

        <div class="row justify-content-end mt-5">
            <div class="col-md-9">
                <p>Entrega</p>
            </div>
            <div class="col-md-3">
                <table class="table border">
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
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

        <div class="row mt-3 justify-content-end">
            <div class="col-md-3 text-end">
                <a href="index.php" class="btn btn-dark">Continuar comprando</a>
            </div>
            <div class="col-md-2 text-end">
                <a href="" class="btn btn-dark">Finalizar compra</a>
            </div>
        </div>

        <section class="col-12 text-center mt-5">
            <figure>
                <img src="images/icones/mastercard_icon.png" alt="Cartão MasterCard">
                <img src="images/icones/visa_icon.png" alt="Cartão Visa">
                <img src="images/icones/elo_icon.png" alt="Cartão Elo">
                <img src="images/icones/hipercard_icon.png">
                <img src="images/icones/diners_icon.png" alt="Cartão Diners Club">
                <img src="images/icones/amex_icon.png" alt="Cartão American Express">
            </figure>
        </section>
        
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