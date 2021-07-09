<?php include "cabecalho.php" ?>

    <section class="hero-section">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/hero-img-1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/hero-img-2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/hero-img-3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="categorias container mt-5 mb-5">
        <div class="row text-center">
            <div class="col-md-12">
            <h2 class="text-uppercase fs-3 titulo">Categorias</h2>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="slide-img">
                    <img src="images/categorias-2.jpg">
                </div>
                <div class="text-center">
                        <h3 class="text-uppercase fs-5">Tops</h3>
                        <a href="#" class="btn">Comprar</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="slide-img">
                    <img src="images/categorias-4.jpg">
                </div>
                <div class="text-center">
                        <h3 class="text-uppercase fs-5">Conjuntos</h3>
                        <a href="#" class="btn">Comprar</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="slide-img">
                    <img src="images/categorias-3.jpg">
                </div>
                <div class="text-center">
                        <h3 class="text-uppercase fs-5">Vestidos</h3>
                        <a href="#" class="btn">Comprar</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="slide-img">
                    <img src="images/categorias.jpg">
                </div>
                <div class="text-center">
                    <h3 class="text-uppercase fs-5">Saias</h3>
                    <a href="#" class="btn">Comprar</a>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid p-0">
        <!--<div class="banner-2 row justify-content-center">
            <div class="col-md-5 text-center">
                <img src="images/banner-2-img.jpg">
            </div>
            <div class="banner-2-content col-md-5 align-self-center justify-">
                <h2 class="mb-5 text-uppercase">Liquidação</h2>
                <p>Confira nossas promoções em <em>Moda Praia</em></p>
                <p>Até 50% OFF</p>
                <a href="roupas.php" class="btn">Comprar</a>
            </div>
        </div>-->
        <img src="images/banne-1.jpg" width="100%" alt="">
    </section>
    
    <section class="container mt-5 mb-5">
        <h2 class="text-center text-uppercase fs-3 titulo">Mais vendidos</h2>
        <div class="slick">
            <div class="box">
                <div class="slide-img">
                    <a href="produto-1.php">
                        <img src="images/product-1.jpeg">
                    </a>
                </div>
                <div class="detail-box">
                    <a href="produto-1.php">Camisa de seda</a><br>
                    <a href="produto-1.php" class="price">R$ 159,99</a>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-2.jpeg">
                </div>
                <div class="detail-box">
                    <a href="#">Vestido</a><br>
                    <a href="#" class="price">R$ 199,99</a>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-3.jpeg">
                </div>
                <div class="detail-box">
                    <a href="#">Sobretudo</a><br>
                    <a href="#" class="price">R$ 129,99</a>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <a href="produto-4.php">
                        <img src="images/product-4.jpeg">
                    </a>
                </div>
                <div class="detail-box">
                    <a href="produto-4.php">Jaqueta</a><br>
                    <a href="produto-4.php" class="price">R$ 99,99</a>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-5.jpeg">
                </div>
                <div class="detail-box">
                    <a href="#">Rabbed Cardigan</a><br>
                    <a href="#" class="price">R$ 219,99</a>
                </div>
            </div>
                
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-6.jpeg">
                </div>
                <div class="detail-box">
                    <a href="#">Rabbed Cardigan</a><br>
                    <a href="#" class="price">R$ 149,99</a>
                </div>
            </div>
               
            <div class="box">
                <div class="slide-img">
                    <img src="images/product-7.jpeg">
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

    <section class="container text-center instagram"><i class="fa fa-instagram"> #J'adore Boutique</i></section>



<?php include "rodape.php" ?>