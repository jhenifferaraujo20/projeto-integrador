<?php

include_once "includes/conexao.php";

// Se o usuário clicou no botão adicionar à sacola na página de produtos, verificamos os dados do formulário
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {

    // Defina as variáveis ​​de postagem e também certifique-se de que sejam inteiras
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    // Prepare a instrução SQL para verificar se o produto existe no banco de dados
    $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
    $stmt->execute([$_POST['product_id']]);

    // Busque o produto do banco de dados e retorne o resultado como um Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifique se o produto existe (o array não está vazio)
    if ($product && $quantity > 0) {

        // O produto existe no banco de dados, agora criar / atualizar a variável de sessão para o carrinho
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {

            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // O produto existe no carrinho, então apenas atualize a quantidade
                $_SESSION['cart'][$product_id] += $quantity;
            } 
            else {
                // O produto não está no carrinho, portanto, adicione-o
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } 
        else {
            // Não há produtos no carrinho, isso adicionará o primeiro produto ao carrinho
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    /* Impedir o reenvio do formulário ...
    header('location: produto.php?id='.$product_id);
    exit;*/
}

// Remova o produto do carrinho, verifique o parâmetro de URL "remove", este é o id do produto, certifique-se de que é um número e verifique se está no carrinho
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remova o produto do carrinho de compras
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Atualize as quantidades de produtos no carrinho se o usuário clicar no botão "Atualizar" na página do carrinho de compras
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop nos dados de postagem para que possamos atualizar as quantidades de cada produto no carrinho
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Verificações e validação
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Atualizar nova quantidade
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    /* Impedir o reenvio do formulário ...
    header('location: produto.php?id='.$product_id);
    exit;*/
}

// Envie o usuário para a página de checkout se ele clicar no botão Finalizar compra, também o carrinho não deve estar vazio
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: checkout.php');
    exit;
}

// Verifique a variável de sessão para produtos no carrinho
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// Se houver produtos no carrinho
if ($products_in_cart) {
    // Existem produtos no carrinho, então precisamos selecioná-los no banco de dados
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    // Produtos no cart array para array string ponto de interrogação, 
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id IN (' . $array_to_question_marks . ')');
    // Precisamos apenas das chaves do array, não dos valores, as chaves são os ids dos produtos
    $stmt->execute(array_keys($products_in_cart));
    // Busque os produtos do banco de dados e retorne o resultado como um Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calcule o subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['preco'] * (int)$products_in_cart[$product['id']];
    }
}

$frete = 0.00;
$total = $subtotal + $frete;
?>