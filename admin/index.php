<?php include "header.php"; ?>
<?php 
$stmt = $pdo->prepare("SELECT SUM(valor_total) FROM pedidos");
$stmt->execute();
$total = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT COUNT(*) FROM pedidos");
$stmt->execute();
$pedidos = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT COUNT(*) FROM clientes");
$stmt->execute();
$clientes = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT COUNT(*) FROM produtos");
$stmt->execute();
$produtos = $stmt->fetch(PDO::FETCH_ASSOC);

?>

                <section class="bg-light" style="display: flex;">
                    <div class="shadow p-3 mb-5 mt-5 ms-4 m-3 bg-body rounded border-start border-warning border-3" style="width: 300px; height: 120px">
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <div class="ms-2 me-2">
                                <h5 class="fs-6">
                                    <a href="#" class="text-decoration-none link-secondary">Total vendas</a>
                                    <p class="text-warning">R$ <?=$total['SUM(valor_total)']?></p>
                                </h5>
                            </div>
                            <div class="rounded-pill btn btn-warning text-white" style="width: 60px; height: 60px;"><i class="bi bi-cash-coin fs-5"></i></div>
                        </div>
                    </div>
                    <div class="shadow p-3 mb-5 mt-5 m-3 bg-body rounded border-start border-success border-3" style="width: 300px; height: 120px">
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <div class="ms-2 me-2">
                                <h5 class="fs-6">
                                    <a href="#" class="text-decoration-none link-secondary">Pedidos</a>
                                    <p class="text-success"><?=$pedidos['COUNT(*)']?></p>
                                </h5>
                            </div>
                            <div class="rounded-pill btn btn-success" style="width: 60px; height: 60px;"><i class="bi bi-cart3 fs-5"></i></div>
                        </div>
                    </div>
                    <div class="shadow p-3 mb-5 mt-5 m-3 bg-body rounded border-start border-danger border-3" style="width: 300px; height: 120px">   
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <div class="ms-2 me-2">
                                <h5 class="fs-6">
                                    <a href="#" class="text-decoration-none link-secondary">Clientes</a>
                                    <p class="text-danger"><?=$clientes['COUNT(*)']?></p>
                                </h5>
                            </div>
                            <div class="rounded-pill btn btn-danger" style="width: 60px; height: 60px;"><i class="bi bi-people fs-5"></i></div>
                        </div>
                    </div>
                    <div class="shadow p-3 mb-5 mt-5 m-3 me-4 bg-body rounded border-start border-info border-3" style="width: 300px; height: 120px">
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <div class="ms-2 me-2">
                                <h5 class="fs-6">
                                    <a href="#" class="text-decoration-none link-secondary">Produtos</a>
                                    <p class="text-info"><?=$produtos['COUNT(*)']?></p>
                                </h5>
                            </div>
                            <div class="rounded-pill btn btn-info text-white" style="width: 60px; height: 60px;"><i class="bi bi-tags-fill fs-5"></i></div>
                        </div>
                    </div>
                </section>

<?php include "rodape.php"; ?>