<?php 
session_start();
include "includes/cart-functions.php"; 

if(isset($_SESSION['email'])){
    $stmt = $pdo->prepare("SELECT id FROM clientes WHERE email = ?");
    $stmt->execute([$_SESSION['email']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_cliente = $result['id'];
    

    $sql = $pdo->prepare("INSERT INTO pedidos(id_cliente, valor_total) VALUES($id_cliente, $subtotal)");
    $sql->execute();

    foreach($products as $product){
        $id = $product['id'];
        $quantidade = $products_in_cart[$product['id']];
        $stmt = $pdo->prepare("INSERT INTO itens_pedido(id_produto, quantidade, id_pedido) values($id, $quantidade, (SELECT MAX(id) FROM pedidos))");
        $stmt->execute();
    }
}

/* header('Location: minha-conta.php?pedido=realizado');
exit; */

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
    
</body>
</html>
    <div class="col text-center p-3">
        <a href="index.php"><img src="images/logo_2.jpg" width="280" alt=""></a>
    </div>

    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-3">
                    <?php if($stmt == true) { ?>
                        <img src="images/check.svg">
                        <h2 class="fs-4">Pedido concluído com sucesso!</h2>
                        <div class="alert alert-info" role="alert">Você receberá um email de confirmação do pedido e todos os detalhes da sua compra.</div>
                        <a href="minha-conta.php?id=<?php echo $id_cliente; ?>"></a>
                    <?php } ?>
            </div>
        </div>
    </div>

</body>
</html>