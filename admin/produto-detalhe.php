<?php 

include "header.php";

$stmt = $pdo->prepare("SELECT * FROM produtos INNER JOIN categorias ON produtos.id_categoria = categorias.id INNER JOIN subcategorias ON produtos.id_subcategoria = subcategorias.id WHERE produtos.id = ?");
$stmt->execute([$_GET['id']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<div class="container mt-5 mb-5 rounded">

    <form action="clientes-crud.php" method="post">
        <input type="hidden" name="id_cliente" value="<?=$result['id']?>">
        <a href="clientes-formulario-alterar.php" class="btn btn-sm btn-outline-warning rounded-0 mb-3" title="alterar"><i class="fa fa-pencil-square-o"></i> alterar</a>
        <button name="excluir" class="btn btn-sm btn-outline-danger rounded-0 mb-3" title="excluir"><i class="fa fa-trash-o"></i> excluir</button>
    </form>

    <div class="row justify-content-between" style="--bs-gutter-x: 0;">
        <div class="bg-white shadow p-4 col-6 rounded">
        <h5 class="header-title pb-3 fs-6 text-uppercase">Detalhes do produto</h5>
        <p class="header-title">ID <?=$result['id']?></p>

        <p>
            <?=$result['nome']?><br>
            Preço: <?=$result['preco_antigo']?><br>
            Promoção: <?=$result['preco']?><br>
            Tamanho: <?=$result['tamanho']?><br>
            Estoque: <?=$result['quantidade_estoque']?><br>
            Categoria: <?=$result['categoria']?><br>
            Subategoria: <?=$result['subcategoria']?><br>
        </p>
        <p>
            <?=$result['descricao']?><br>
        </p>
        </div>

        <div class="bg-white shadow p-4 col-5 rounded">
        <h5 class="header-title pb-3 fs-6 text-uppercase">Fotos</h5>
        <p class="d-flex">
            <?php $fotos = explode(',', $result['fotos']);?>
            <img src="../<?=$fotos[0]?>" class="m-2" width="100">
            <img src="../<?=$fotos[1]?>" class="m-2" width="100">
            <img src="../<?=$fotos[2]?>" class="m-2" width="100">
        </p>
        </div>
    </div>

    <a href="produtos-listar.php" class="btn btn-outline-secondary rounded-0 mt-4">voltar</a>

</div>

<?php include "rodape.php" ?>