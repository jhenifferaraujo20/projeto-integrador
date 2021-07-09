<?php 
include "cabecalho.php"; 
include "conexao.php";
if(isset($_GET['categoria'])){
    $current = " | " . $_GET['categoria'];
}
?>

<section class="container-fluid mt-3 p-4">
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="produtos.php?categoria=<?php if(isset($_GET['categoria'])){ echo $current; } ?>"><?php if(isset($_GET['categoria'])){ echo $current; } ?></a>
    </div>
    <div class="row mt-3 justify-content-between">
        <div class="col-4">
            <span class="filtro-btn">Filtrar por <i class="bi bi-chevron-down"></i></span>
            <div class="row showFiltro">
                <div class="col-6">
                    <ul>
                        <li>Categorias</li>
                        <li><a href="#">Blusas</a></li>
                        <li><a href="#">Vestidos</a></li>
                        <li><a href="#">Macacões</a></li>
                        <li><a href="#">Camisas</a></li>
                        <li><a href="#">Casacos</a></li>
                        <li><a href="#">Saias</a></li>
                        <li><a href="#">Shorts</a></li>
                        <li><a href="#">Calças</a></li>
                        <li><a href="#">Lingerie</a></li>
                    </ul>
                </div>
                <div class="col-6">
                    <p>Tamanho</p>
                    <button type="button">PP</button>
                    <button type="button">P</button>
                    <button type="button">M</button>
                    <button type="button">G</button>
                    <button type="button">GG</button>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-dark text-uppercase">Filtrar</button>
                    </div>
                    <div class="col-5">
                        <button type="button" class="btn btn-dark text-uppercase">Limpar filtro</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 text-end">
            <label for="ordenar">Ordenar por </label>
            <select name="ordenar" id="ordenar">
                <option value="novidades">Novidades</option>
                <option value="menor-preço">Menor preço</option>
                <option value="maior-preço">Maior preço</option>
                <option value="mais-vendidos">Mais vendidos</option>
            </select>
        </div>
    </div>

    <?php
    if(!isset($_GET['categoria'])){
        $wherePersonalizado = "";
    }
    if(isset($_GET['categoria'])){
        if($_GET['categoria'] == 'Roupas'){
            $wherePersonalizado = "WHERE categoria = 'Roupas'";
        }elseif($_GET['categoria'] == 'Praia'){
            $wherePersonalizado = "WHERE categoria = 'Moda Praia'";
        }elseif($_GET['categoria'] == 'Calçados'){
            $wherePersonalizado = "WHERE categoria = 'Calçados'";
        }elseif($_GET['categoria'] == 'Acessórios'){
            $wherePersonalizado = "WHERE categoria = 'Acessórios'";
        }
    }
    $sqlBusca = "SELECT 
                produtos.id,
                produtos.nome,
                produtos.preco,
                produtos.preco_antigo,
                produtos.descricao,
                produtos.cor,
                produtos.tamanho,
                categorias.categoria as 'categoria',
                subcategorias.subcategoria as 'subcategoria',
                produtos.quantidade_estoque,
                produtos.fotos
                FROM produtos
                INNER JOIN categorias ON produtos.id_categoria = categorias.id
                INNER JOIN subcategorias ON produtos.id_subcategoria = subcategorias.id 
                $wherePersonalizado ORDER BY id DESC;";
    $resultado = mysqli_query($conexao, $sqlBusca);
    ?>
    <div class="row">
        <?php
        while($produto = mysqli_fetch_assoc($resultado)){
            $fotos = explode(',',$produto['fotos']);
            echo "<div class='col-sm-4 col-md-3'>";
            echo    "<div class='slide-img'>";
            echo        "<a title='{$produto['nome']}' href='produto.php?id_produto={$produto['id']}'><img src='{$fotos[0]}'></a>";
            echo    "</div>";
            echo    "<div class='detail-box ps-2'>";
            echo        "<a href='produto.php?id_produto={$produto['id']}' class='text-uppercase'>{$produto['nome']}</a><br>";
            echo        "R$ {$produto['preco']}";
            echo    "</div>";
            echo "</div>";
        }
        ?>
    </div>

</section>

<?php include "rodape.php" ?>