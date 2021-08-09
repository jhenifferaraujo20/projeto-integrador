<?php

include_once "../includes/conexao.php";

$num_products_on_each_page = 6;
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

$stmt = $pdo->prepare("SELECT produtos.id, produtos.nome, produtos.preco, produtos.cor, produtos.tamanho, produtos.quantidade_estoque, categorias.categoria as 'categoria', subcategorias.subcategoria as 'subcategoria', produtos.fotos FROM produtos INNER JOIN categorias ON produtos.id_categoria = categorias.id INNER JOIN subcategorias ON produtos.id_subcategoria= subcategorias.id ORDER BY id DESC LIMIT ?,?;");
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_products = $pdo->query("SELECT * FROM produtos")->rowCount(); ?>

<?php  include "header.php"; ?>
<div class="container bg-body mt-5 mb-5 p-5 rounded">
<?php if(isset($_GET['mensagem'])){
    if($_GET['mensagem'] == 'cadastrado'){ ?>
        <div class="alert alert-success mt-4">
            Cadastrado com sucesso!
        </div>
    <?php
    }
    if($_GET['mensagem'] == 'excluido'){ ?>
        <div class="alert alert-danger mt-4">
            Excluído com sucesso!
        </div>
    <?php
    }
    if($_GET['mensagem'] == 'alterado'){ ?>
        <div class="alert alert-warning mt-4">
            Alterado com sucesso!
        </div>
    <?php
    }
    if($_GET['mensagem'] == 'erro'){ ?>
        <div class="alert alert-danger mt-4">
            Ocorreu um erro.
        </div>
    <?php
    }
}
?>

    <div class="row mb-4">
        <div class="col-6">
            <a href="produtos-formulario-inserir.php" class="btn btn-primary rounded-0"><i class="bi bi-plus-circle"></i> Novo produto</a>
        </div>
        <div class="col-6">
            <div class="row">
                <label for="busca" class="col-2 col-form-label">Procurar:</label>
                <div class="col-10">
                    <input type="text" id="busca" name="busca" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Tamanho</th>
                    <th>Categoria</th>
                    <th>Subcategoria</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($products as $produto): $fotos = explode(',', $produto['fotos']); ?>
                        <tr>
                            <td>
                                <p><?php echo $produto['nome'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $produto['preco'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $produto['tamanho'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $produto['categoria'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $produto['subcategoria'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $produto['quantidade_estoque'] ?></p>
                            </td>
                            <td>
                                <a href="produto-detalhe.php?id=<?=$produto['id']?>" class="btn btn-sm btn-outline-secondary rounded-0" title="visualizar detalhes"><i class="fa fa-eye"></i></a>
                                <a href="produtos-formulario-alterar.php?id=<?=$produto['id']?>" class='btn btn-sm btn-outline-warning rounded-0' title="alterar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="produtos-excluir.php?id=<?=$produto['id']?>" class='btn btn-sm btn-outline-danger rounded-0' title="excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                            </td>
                        </tr>
                    <?php endforeach ?>
            </tbody>
        </table>  
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-6">
            <?php if ($current_page > 1): ?>
                <a href="produtos-listar.php?p=<?=$current_page-1?>" class="btn"><i class="bi bi-arrow-left"></i></a> 
            <?php endif; ?>
        </div> 
        <div class="col-6 text-end">
            <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
                <a href="produtos-listar.php?p=<?=$current_page+1?>" class="btn"><i class="bi bi-arrow-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
     
<?php include "rodape.php"; ?>