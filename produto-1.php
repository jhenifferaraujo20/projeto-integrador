<?php include "cabecalho.php" ?>

    <!-- ===================== PRODUTO ================== -->
    <section class="produto">
        <div class="nav-links">
            <a href="index.php">Home |</a>
            <a href="roupas.php">Roupas |</a>
            <a href="#">Camisas</a>
        </div>
        <div class="container">
            <div class="box-1">
                <div class="galeria-produto">
                    <ul id="vertical">
                        <li data-thumb="images/product-1.jpeg">
                            <img src="images/product-1.jpeg">
                        </li>
                        <li data-thumb="images/galeria-img-2.jpg">
                            <img src="images/galeria-img-2.jpg">
                        </li>
                        <li data-thumb="images/galeria-img-3.jpg">
                            <img src="images/galeria-img-3.jpg">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-2">
                <div class="titulo-produto">
                    <h2>Camisa de Seda Branca</h2>
                    <small>cod.: 102459</small>
                </div>
                <div class="info-preco">
                    <a href="#"><img src="images/icones/like_icon.png" alt="Ícone coração"></a>
                    <span>R$ 249,99</span> | 219,99<br>
                    <small>5x R$ 31,99</small>
                </div>
                <div class="cor-produto">
                    <p>Cor</p>
                    <button class="cor"></button>
                </div>
                <div class="tamanho-produto">
                    <p>Tamanho</p>
                    <button type="button" class="active">PP</button>
                    <button type="button">P</button>
                    <button type="button">M</button>
                    <button type="button">G</button>
                </div>
                <div class="tabela-medidas">
                    <button>Tabela de Medidas</button>
                </div>
                
                <button class="bag-btn comprar-produto" data-id="1">Adicionar à Sacola</button>

                <div class="info-produto">
                    <span onclick="mostrarInfo();">Informações <i class="fa fa-angle-down"></i></span>
                    <hr>
                    <p class="info">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus accusantium debitis
                        dolorum eius quibusdam fuga qui sequi? Error asperiores dignissimos doloremque dolorum
                        perferendis
                        animi
                        consectetur!
                    </p><br>
                    <span onclick="mostrarCaracteristicas();">Características <i class="fa fa-angle-down"></i></span>
                    <hr>
                    <p class="caracteristicas">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus accusantium debitis
                        dolorum eius quibusdam fuga qui sequi? Error asperiores dignissimos doloremque dolorum
                        perferendis
                        animi
                        consectetur!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="titulo">Você também vai gostar</h2>
        <div class="slider">
            <ul id="autoWidth" class="cs-hidden">
                <li class="item-a">
                    <div class="box">
                        <div class="slide-img">
                            <img src="images/product-11.jpeg">
                            <div class="overlay">
                                <a href="produto-11.php" class="buy-btn">Shop Now</a>
                            </div>
                        </div>
                        <div class="detail-box">
                            <div class="type">
                                <a href="#">Top</a><br>
                                <a href="#" class="price">R$ 69,99</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="item-b">
                    <div class="box">
                        <div class="slide-img">
                            <img src="images/product-2.jpeg">
                            <div class="overlay">
                                <a href="#" class="buy-btn">Shop Now</a>
                            </div>
                        </div>
                        <div class="detail-box">
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a><br>
                                <a href="#" class="price">R$ 199,99</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="item-c">
                    <div class="box">
                        <div class="slide-img">
                            <img src="images/product-3.jpeg">
                            <div class="overlay">
                                <a href="#" class="buy-btn">Shop Now</a>
                            </div>
                        </div>
                        <div class="detail-box">
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a><br>
                                <a href="#" class="price">R$ 129,99</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="item-d">
                    <div class="box">
                        <div class="slide-img">
                            <img src="images/product-4.jpeg">
                            <div class="overlay">
                                <a href="produto-4.php" class="buy-btn">Shop Now</a>
                            </div>
                        </div>
                        <div class="detail-box">
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a><br>
                                <a href="#" class="price">R$ 99,99</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="item-e">
                    <div class="box">
                        <div class="slide-img">
                            <img src="images/product-5.jpeg">
                            <div class="overlay">
                                <a href="#" class="buy-btn">Shop Now</a>
                            </div>
                        </div>
                        <div class="detail-box">
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a><br>
                                <a href="#" class="price">R$ 219,99</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="item-e">
                    <div class="box">
                        <div class="slide-img">
                            <img src="images/product-6.jpeg">
                            <div class="overlay">
                                <a href="#" class="buy-btn">Shop Now</a>
                            </div>
                        </div>
                        <div class="detail-box">
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a><br>
                                <a href="#" class="price">R$ 149,99</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="item-e">
                    <div class="box">
                        <div class="slide-img">
                            <img src="images/product-7.jpeg">
                            <div class="overlay">
                                <a href="#" class="buy-btn">Shop Now</a>
                            </div>
                        </div>
                        <div class="detail-box">
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a><br>
                                <a href="#" class="price">R$ 119,99</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="item-e">
                    <div class="box">
                        <div class="slide-img">
                            <img src="images/product-8.jpeg">
                            <div class="overlay">
                                <a href="#" class="buy-btn">Shop Now</a>
                            </div>
                        </div>
                        <div class="detail-box">
                            <div class="type">
                                <a href="#">Rabbed Cardigan</a><br>
                                <a href="#" class="price">R$ 119,99</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>


<?php include "rodape.php" ?>