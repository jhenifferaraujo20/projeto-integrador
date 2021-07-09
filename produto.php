<?php include "cabecalho.php";
include "conexao.php"; ?>

    <!-- ===================== PRODUTO ================== -->
    <?php 
    $id_produto = $_GET['id_produto'];

    $sqlBusca = "SELECT * FROM produtos WHERE id={$id_produto};";
    $listaDeProdutos = mysqli_query($conexao, $sqlBusca);
    $produto = mysqli_fetch_assoc($listaDeProdutos);
    $fotos = explode(',',$produto['fotos']);

    ?>
    <section class="container">
        <div class="nav-links">
        
        </div>
        <div class="row mt-5">
            <div class="col-lg-2">
                <div class="slider-nav">
                    <div class="thumbImg">
                        <img src='<?php echo "{$fotos[0]}";?>'>
                    </div>

                    <div class="thumbImg">
                        <img src='<?php echo "{$fotos[1]}";?>'>
                    </div>

                    <div class="thumbImg">
                        <img src='<?php echo "{$fotos[2]}";?>'>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-5 me-5 ps-0">
                <div class="slider-for">
                    <div class="slick-vertical-img">
                        <img src='<?php echo "{$fotos[0]}";?>'>
                    </div>

                    <div class="slick-vertical-img">
                        <img src='<?php echo "{$fotos[1]}";?>' class="ps-0">
                    </div>

                    <div class="slick-vertical-img">
                        <img src='<?php echo "{$fotos[2]}";?>'>
                    </div>
                </div>
            </div>

            <div class="col">
                <h2 class="text-uppercase fs-4"><?php echo "{$produto['nome']}";?></h2>
                <small>cod.: <?php echo "{$produto['id']}";?></small>
                
                <div class="row mt-5">
                    <div class="col-10">
                        <span class="text-decoration-line-through">R$ <?php echo "{$produto['preco_antigo']}";?></span> | R$ <?php echo "{$produto['preco']}";?><br>
                        <small>5x R$ 31,99</small>
                    </div>
                    <div class="col-2">
                        <a href="#"><img src="images/icones/like_icon.png" alt="Ícone coração" width="25"></a>
                    </div>
                </div>
                    
                <div class="mt-4">
                    <p class="mb-0">Cor</p>
                    <a class="cor btn" href='<?php echo "produto.php?id_produto={$produto['id']}";?>'><?php echo "<img src='{$produto['cor']}' width='20'>";?></a>
                </div>

                <div class="tamanho-produto mt-4">
                    <p class="mb-0">Tamanho</p>
                    <button type="button" class="btn ">PP</button>
                    <button type="button" class="btn">P</button>
                    <button type="button" class="btn">M</button>
                    <button type="button" class="btn">G</button>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn tabela-btn">Tabela de Medidas</button>
                </div>

                <div class="mt-4">
                    <a class="btn btn-dark text-uppercase bag-btn" data-id="<?php echo "{$produto['id']}" ?>">Adicionar à Sacola</a>
                </div>

                <div class="accordion accordion-flush accordion-info-produto" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Informações
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne">
                            <div class="accordion-body">
                                <?php echo "{$produto['descricao']}";?>                            
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Características
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo">
                            <div class="accordion-body">
                                100% POLIESTER
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-5 mb-5">
        <h2 class="text-center text-uppercase">Você também vai gostar</h2>
        <div class="slick">
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-11.jpeg">
                    <div class="overlay">
                        <a href="produto-11.php" class="buy-btn">Compre agora</a>
                    </div>
                </div>
                <div class="detail-box">
                    <a href="produto-11.php">Top</a><br>
                    <a href="produto-11.php" class="price">R$ 159,99</a>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-2.jpeg">
                    <div class="overlay">
                        <a href="#" class="buy-btn">Compre agora</a>
                    </div>
                </div>
                <div class="detail-box">
                    <a href="#">Vestido</a><br>
                    <a href="#" class="price">R$ 199,99</a>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-3.jpeg">
                    <div class="overlay">
                        <a href="#" class="buy-btn">Compre agora</a>
                    </div>
                </div>
                <div class="detail-box">
                    <a href="#">Sobretudo</a><br>
                    <a href="#" class="price">R$ 129,99</a>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-4.jpeg">
                    <div class="overlay">
                        <a href="produto-4.php" class="buy-btn">Compre agora</a>
                    </div>
                </div>
                <div class="detail-box">
                    <a href="produto-4.php">Jaqueta</a><br>
                        <a href="produto-4.php" class="price">R$ 99,99</a>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-5.jpeg">
                    <div class="overlay">
                        <a href="#" class="buy-btn">Compre agora</a>
                    </div>
                </div>
                <div class="detail-box">
                    <a href="#">Rabbed Cardigan</a><br>
                    <a href="#" class="price">R$ 219,99</a>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-6.jpeg">
                    <div class="overlay">
                        <a href="#" class="buy-btn">Compre agora</a>
                    </div>
                </div>
                <div class="detail-box">
                    <a href="#">Rabbed Cardigan</a><br>
                    <a href="#" class="price">R$ 149,99</a>
                </div>
            </div>
               
            <div class="box">
                <div class="slide-img">
                        <img src="images/product-7.jpeg">
                    <div class="overlay">
                        <a href="#" class="buy-btn">Compre agora</a>
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="#">Rabbed Cardigan</a><br>
                        <a href="#" class="price">R$ 119,99</a>
                    </div>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-8.jpeg">
                    <div class="overlay">
                        <a href="#" class="buy-btn">Compre agora</a>
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="#">Rabbed Cardigan</a><br>
                        <a href="#" class="price">R$ 119,99</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include "rodape.php" ?>