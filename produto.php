<?php include "includes/cabecalho.php";
include "includes/conexao.php"; ?>

    <!-- ===================== PRODUTO ================== -->
    <?php 
    if(isset($_GET['id'])) {
        $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
        if($produto){
            $fotos = explode(',',$produto['fotos']);
        }
        
        if(!$produto){
            echo "<div class='m-5 text-center'>O produto não existe</div>";
            exit;
        }
    } else {
        echo "<div class='m-5 text-center'>O produto não existe</div>";
        exit;
    }
    ?>
    <section class="container">
        <div class="nav-links">
        
        </div>
        <div class="row mt-5">
            <div class="col-lg-2">
                <div class="slider-nav">
                    <div class="thumbImg">
                        <img src='<?php echo $fotos[0];?>'>
                    </div>

                    <div class="thumbImg">
                        <img src='<?php echo $fotos[1];?>'>
                    </div>

                    <div class="thumbImg">
                        <img src='<?php echo $fotos[2];?>'>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-5 me-5 ps-0">
                <div class="slider-for">
                    <div class="slick-vertical-img">
                        <img src='<?php echo $fotos[0];?>'>
                    </div>

                    <div class="slick-vertical-img">
                        <img src='<?php echo $fotos[1];?>' class="ps-0">
                    </div>

                    <div class="slick-vertical-img">
                        <img src='<?php echo $fotos[2];?>'>
                    </div>
                </div>
            </div>

            <div class="col">
                <h2 class="text-uppercase fs-4"><?php echo $produto['nome'];?></h2>
                <small>cod.: <?php echo $produto['id'];?></small>
                
                <div class="row mt-5">
                    <div class="col-10">
                        <span class="text-decoration-line-through">R$ <?php echo number_format($produto['preco_antigo'], 2, ',', '.');?></span> | R$ <?php echo number_format($produto['preco'], 2, ',', '.');?><br>
                        <small>5x R$ <?php echo number_format($parcela = ($produto['preco'] / 5), 2, ',', '.') ?></small>
                    </div>
                    <div class="col-2">
                        <a href="#"><img src="images/icones/like_icon.png" alt="Ícone coração" width="25"></a>
                    </div>
                </div>
                    
                <div class="mt-4">
                    <p class="mb-0">Cor</p>
                    <a class="cor btn" href='<?php echo "produto.php?id={$produto['id']}";?>'><?php echo "<img src='{$produto['cor']}' width='20'>";?></a>
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
                    <form action="" method="post">
                        <input type="number" name="quantity" value="1" min="1" max="<?=$produto['quantidade_estoque'] ?>" class="form-control mb-2" required>
                        <input type="hidden" name="product_id" value="<?=$produto['id']?>">
                        <button type="submit" name="submit" class="btn btn-dark text-uppercase bag-btn">Adicionar à Sacola</button>
                    </form>
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
                                <?php echo $produto['descricao'];?>                            
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


<?php include "includes/rodape.php" ?>