<!-- sacola -->
<div class="resultado"></div>
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
        <form action="" method="post">
            <div class="cart-content">
                <?php if (empty($products)): ?>
                    Você ainda não adicionou nenhum produto à sacola.
                <?php else: ?>
                    <?php foreach ($products as $product): $fotos = explode(',', $product['fotos']) ?>
                        <div class="cart-item">
                            <a href="index.php?page=product&id=<?=$product['id']?>">
                                <img src="<?=$fotos[0]?>" width="80" alt="<?=$product['nome']?>">
                            </a>
                            <div class="item-info">
                                <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['nome']?></a><br>
                                R$<?=$product['preco']?><br>
                                <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantidade_estoque']?>" placeholder="Quantity" required><br>
                                R$<?=$product['preco'] * $products_in_cart[$product['id']]?>
                            </div>
                            
                            <div class="align-self-center">
                                <a href="?id=<?=$product['id']?>&remove=<?=$product['id']?>" class="remove remove-item"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <div class="cart-footer">
                <input type="submit" value="Atualizar" name="update" class="btn update-cart">
            
                <div class="frete mb-2">
                    <form action="" method="post">
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
                    <span class="col-3">R$ <?=number_format($subtotal, 2, ',', '.')?></span>
                </div>

                <div class="row justify-content-between">
                    <span class="col-2">Frete: </span>
                    <span class="col-3">R$ <?=$frete?></span>
                </div>
                <div class="row justify-content-between">
                    <span class="col-2">Total: </span>
                    <span class="col-3 cart-total">R$ <?=number_format($total, 2, ',', '.')?></span>
                </div>

                <input type="submit" value="Finalizar compra" name="placeorder" class="btn btn-dark text-uppercase finalizar-compra">
            </div>
        </form>
    </div>
</div>