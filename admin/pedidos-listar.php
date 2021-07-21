<?php 

include "cabecalho.php";

$stmt = $pdo->prepare("SELECT pedidos.id, pedidos.id_cliente, clientes.nome_completo as 'nome_cliente', pedidos.data, pedidos.valor_total FROM pedidos INNER JOIN clientes ON pedidos.id_cliente = clientes.id");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $pedido){ 
    $id_pedido = $pedido['id'];
    $stmt = $pdo->prepare("SELECT produtos.nome, produtos.fotos, itens_pedido.quantidade FROM itens_pedido INNER JOIN produtos ON itens_pedido.id_produto = produtos.id WHERE id_pedido = ?");
    $stmt->bindValue(1, $id_pedido, PDO::PARAM_INT);
    $stmt->execute();
    $resultItens = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container mt-4 mb-4">
        <div class="mb-5">
            <h4>Pedido #<?=$pedido['id']?>:</h2>
            <p>Id cliente: <?=$pedido['id_cliente']?></p>
            <p>Cliente: <?=$pedido['nome_cliente']?></p>
            <p>Valor total: <?=$pedido['valor_total'];?></p>
            <p>Data: <?=$pedido['data'];?></p>
            <?php foreach($resultItens as $itens){ $fotos = explode(',', $itens['fotos']);?>
            <div class="row mb-3">
            <div class="col-1">
                <img src="../<?=$fotos[0]?>" width="80">
            </div>
            <p class="col">
                <?=$itens['nome']?> 
                <br>Quantidade: <?=$itens['quantidade']?>
            </p>
            </div>
            <?php } ?>
            <hr>
        </div>
    </div>
<?php
}

include "rodape.php";