<?php 
include_once "includes/cabecalho.php"; 
include_once "includes/produtos.php";

if(isset($_GET['categoria'])){
    $current = " | " . $_GET['categoria'];
}
else {
    $current = " | Novidades";
}
?>

<section class="container mt-3">
    <div class="row mb-3">
        <div class="col">
            <a href="index.php">Home</a>
            <a href="produtos.php?categoria=<?php if(isset($_GET['categoria'])){ echo $current; } ?>"><?php if(isset($_GET['categoria'])){ echo $current; } ?></a>
        </div>
    </div>

    <div class="row">
        <?php foreach($products as $produto): $fotos = explode(',', $produto['fotos']); ?>
            <div class="col-sm-4 col-md-3 pb-3 produtos">
                <div class="pb-2">
                    <a href="produto.php?id=<?php echo $produto['id'] ?>" title="<?php echo $produto['nome'] ?>"><img src="<?php echo $fotos[0] ?>" alt="" width="230"></a>
                </div>
                <div class="detail-box ps-2">
                    <a href="produto.php?id=<?php echo $produto['id'] ?>"><?php echo $produto['nome'] ?>
                    <p>R$ <?php  echo number_format($produto['preco'], 2, ',', '.') ?></p></a>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div>
        <?php if ($current_page > 1): ?>
            <div class="row justify-content-end me-3">
                <div class="col-3 text-end">
                    <a href="produtos.php?p=<?=$current_page-1?>" class="btn btn-dark">Anterior</a>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
            <div class="row justify-content-end me-3">
                <div class="col-3 text-end">
                    <a href="produtos.php?p=<?=$current_page+1?>" class="btn btn-dark justify-content-end">Próximo</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include "includes/rodape.php" ?>