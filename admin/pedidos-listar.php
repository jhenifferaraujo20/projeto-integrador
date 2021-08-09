<?php 

include "header.php";

$stmt = $pdo->prepare("SELECT pedidos.id, pedidos.id_cliente, clientes.nome_completo as 'nome_cliente', pedidos.data, pedidos.valor_total, pedidos.status FROM pedidos INNER JOIN clientes ON pedidos.id_cliente = clientes.id ORDER BY id DESC");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container bg-body mt-5 mb-5 p-5 rounded">
    <div class="row">
        <div class="col-3 mb-4">
            <a href="produtos-formulario-inserir.php" class="btn btn-primary rounded-0"><i class="bi bi-plus-circle"></i> Novo pedido</a>
        </div>
        <div class="col-4 mb-4">
            <div class="row">
                <label for="busca" class="col-3 col-form-label">Procurar:</label>
                <div class="col-9">
                    <input type="text" id="busca" name="busca" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-5 mb-4">
            <div class="row">
                <label for="status" class="col-2 col-form-label">Status:</label>
                <div class="col-8">
                    <select name="status" id="status" class="form-select">
                        <option value="">Escolha ...</option>
                        <option value="">Pendente</option>
                        <option value="">Confirmado</option>
                        <option value="">Enviado</option>
                        <option value="">Cancelado</option>
                    </select>
                </div>
                <button class="btn btn-outline-secondary col-2" title="filtrar"><i class="bi bi-funnel"></i></button>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $pedido): ?>
                    <tr>
                        <td><?=$pedido['id']?></td>
                        <td><?=$pedido['nome_cliente']?></td>
                        <td><?=$pedido['data'];?></td>
                        <td><?=$pedido['valor_total'];?></td>
                        <td><span class="badge rounded-0 status" id="status"><?=$pedido['status']?></span></td>
                        <td>
                            <form action="pedidos-update.php" method="post">

                                <input type="hidden" name="id_pedido" value="<?=$pedido['id']?>">

                                <?php if($pedido['status'] == 'pendente'){ ?>
                                    <a href="pedido-detalhe.php?id=<?php echo $pedido['id']?>" class="btn btn-sm btn-outline-secondary rounded-0" title="visualizar detalhes"></i><i class="far fa-eye"></i></a>
                                    <button class="btn btn-sm btn-outline-success rounded-0" id="confirmar" name="confirmar" title="confirmar pedido"><i class="bi bi-check2-circle"></i></button> 
                                    <button class="btn btn-sm btn-outline-danger rounded-0" name="cancelar" title="cancelar pedido"><i class="bi bi-x-circle"></i></button>

                                <?php } else if($pedido['status'] == 'confirmado') { ?>
                                    <a href="pedido-detalhe.php?id=<?php echo $pedido['id']?>" class="btn btn-sm btn-outline-secondary rounded-0" title="visualizar detalhes"></i><i class="far fa-eye"></i></a>
                                    <button class="btn btn-sm btn-outline-info rounded-0" name="enviar" title="enviar pedido"><i class="bi bi-truck"></i> enviar</button>
                                <?php }
                                else { ?> 
                                    <a href="pedido-detalhe.php?id=<?php echo $pedido['id']?>" class="btn btn-sm btn-outline-secondary rounded-0" title="visualizar detalhes"></i><i class="far fa-eye"></i></a>
                                <?php } ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


<?php include "rodape.php"; ?>