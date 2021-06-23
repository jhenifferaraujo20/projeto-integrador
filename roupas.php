<?php 
include "cabecalho.php"; 
include "conexao.php";
?>

    <section class="cabecalho-pagina-produtos">
        <!--<img src="images/banner-roupas.jpg">-->
        <div class="nav-links mt-4 ms-5">
            <a href="index.php">Home |</a>
            <a href="roupas.php">Roupas</a>
        </div>
        <div class="filtro-ordenar">
            <div class="filtro">
                <span onclick="mostrarCategorias();">Filtrar por <i class="bi bi-chevron-down"></i></span>
                <div class="categorias-tamanho">
                    <div class="row">
                        <div class="col-1">
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
                        <div class="col-2">
                            <div class="tamanho-produto">
                                <p>Tamanho</p>
                                <button type="button">PP</button>
                                <button type="button">P</button>
                                <button type="button">M</button>
                                <button type="button">G</button>
                                <button type="button">GG</button>
                            </div>
                        </div>
                    </div>
                    <button type="button"
                    class="filtro-btn">Filtrar</button>
                    <button type="button" class="filtro-btn">Limpar filtro</button>
                </div>
            </div>
            <div class="ordenar">
                <label for="ordenar">Ordenar por </label>
                <select name="ordenar" id="ordenar">
                    <option value="novidades">Novidades</option>
                    <option value="menor-preço">Menor preço</option>
                    <option value="maior-preço">Maior preço</option>
                    <option value="mais-vendidos">Mais vendidos</option>
                </select>
            </div>
        </div>
    </section>

    
    <?php 
    $sqlBusca = "SELECT * FROM produtos WHERE tipo = 'roupas';";
    $listaDeProdutos = mysqli_query($conexao, $sqlBusca);
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            while($produto = mysqli_fetch_assoc($listaDeProdutos)) {
                echo "<div class='col-sm-2 col-md-3'>";
                echo    "<div class='slide-img'>";
                echo        "<a title='{$produto['nome']}' href='produto.php?id_produto={$produto['id']}'><img src='{$produto['foto_1']}'></a>";
                echo    "</div>";
                echo    "<div class='detail-box ps-2'>";
                echo        "<a href='produto.php?id_produto={$produto['id']}' class='text-uppercase'>{$produto['nome']}</a><br>";
                echo        "R$ {$produto['preco']}";
                echo    "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

<?php include "rodape.php" ?>