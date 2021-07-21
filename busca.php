<?php
include "includes/cabecalho.php";
include "includes/conexao.php";

if(!isset($_GET['buscar'])) {
    header("Location: index.php");
    exit;
}

$buscar = "%" . trim($_GET['buscar']) . "%";

$query = $pdo->prepare("SELECT * FROM produtos WHERE nome LIKE :nome");
$query->bindParam(':nome', $buscar, PDO::PARAM_STR);
$query->execute();
$total_products = $query->rowCount();


$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <?php echo "<div class='mt-5'><h2 class='fs-5'>Você buscou por: {$_GET['buscar']}</h2></div>"; ?>
    <p>Encontramos <?=$total_products?> produto(s)</p>
    <div class="row mt-4">
        <?php
        if(count($result)) {
            foreach($result as $produto): $fotos = explode(',', $produto['fotos']); ?>
                <div class="col-sm-4 col-md-3 pb-3 produtos">
                    <div class="pb-2">
                        <a href="produto.php?id=<?php echo $produto['id'] ?>" title="<?php echo $produto['nome'] ?>"><img src="<?php echo $fotos[0] ?>" alt="" width="230"></a>
                    </div>
                    <div class="detail-box">
                        <a href="produto.php?id=<?php echo $produto['id'] ?>"><?php echo $produto['nome'] ?>
                        <p>R$ <?php  echo number_format($produto['preco'], 2, ',', '.') ?></p></a>
                    </div>
                </div>
            <?php endforeach;
        }else {
            echo "<div class='m-5 text-center'>Não encontramos resultados pelo  termo buscado.</div>";
        }
        ?>
    </div>
</div>

<?php include "includes/rodape.php"; ?>