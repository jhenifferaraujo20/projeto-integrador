<?php

include_once "../includes/conexao.php";

$num_products_on_each_page = 4;
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

$stmt = $pdo->prepare("SELECT produtos.id, produtos.nome, produtos.preco, produtos.cor, produtos.tamanho, produtos.quantidade_estoque, categorias.categoria as 'categoria', subcategorias.subcategoria as 'subcategoria', produtos.fotos FROM produtos INNER JOIN categorias ON produtos.id_categoria = categorias.id INNER JOIN subcategorias ON produtos.id_subcategoria= subcategorias.id ORDER BY id DESC LIMIT ?,?;");
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_products = $pdo->query("SELECT * FROM produtos")->rowCount(); ?>

<?php  include "cabecalho.php"; ?>

<div class="container">
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
    
    <div class="novo-btn mt-4 mb-4">
        <a href="produtos-formulario-inserir.php" class="btn btns"><i class="bi bi-plus-circle"></i> Novo produto</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Produto</th>
                    <th>Promoção</th>
                    <th>Cor</th>
                    <th>Tamanho</th>
                    <th>Categoria</th>
                    <th>Subcategoria</th>
                    <th>Estoque</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($products as $produto): $fotos = explode(',', $produto['fotos']); ?>
                        <tr>
                            <td>
                                <img src="../<?php echo $fotos[0] ?>" alt="">
                            </td>
                            <td>
                                <p><?php echo $produto['nome'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $produto['preco'] ?></p>
                            </td>
                            <td>
                                <img src="../<?php echo $produto['cor'] ?>">
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
                                <a href="produtos-formulario-alterar.php?id=<?=$produto['id']?>" class='btn btn-warning'><i class='bi bi-pencil'></i></a>
                                <a href="produtos-excluir.php?id=<?=$produto['id']?>" class='btn btn-danger'><i class='bi bi-x-lg'></i></a></td>
                            </td>
                        </tr>
                    <?php endforeach ?>
            </tbody>
        </table>  
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-6">
            <?php if ($current_page > 1): ?>
                <a href="produtos-listar.php?p=<?=$current_page-1?>" class="btn btns">Anterior</a> 
            <?php endif; ?>
        </div> 
        <div class="col-6 text-end">
            <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
                <a href="produtos-listar.php?p=<?=$current_page+1?>" class="btn btns">Próximo</a>
            <?php endif; ?>
        </div>
    </div>
    
</div>
        
<?php include "rodape.php"; ?>