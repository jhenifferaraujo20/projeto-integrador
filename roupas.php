<?php include "cabecalho.php" ?>

    <section class="cabecalho-pagina-produtos">
        <!--<img src="images/banner-roupas.jpg">-->
        <div class="nav-links">
            <a href="index.php">Home |</a>
            <a href="roupas.php">Roupas</a>
        </div>
        <div class="filtro-ordenar">
            <div class="filtro">
                <span onclick="mostrarCategorias();">Filtrar por <i class="fa fa-angle-down"></i></span>
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

    <section class="produtos-container">
    <!--<div class="produto">
            <div class="slide-img">
                <img src="images/slide-img-1.jpg">
                <div class="overlay">
                    <a href="camisa-de-seda.php" class="buy-btn">Shop Now</a>
                </div>
            </div>
            <div class="detail-box">
                <div class="type">
                    <a href="#">Camisa de seda</a><br>
                    <a href="#" class="price">R$ 159,99</a>
                </div>
            </div>
        </div>-->
    </section>

<?php include "rodape.php" ?>