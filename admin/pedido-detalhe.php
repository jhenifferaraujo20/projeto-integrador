<?php 

include "header.php";

$stmt = $pdo->prepare("SELECT pedidos.id, pedidos.id_cliente, clientes.nome_completo as 'nome_cliente', clientes.telefone, clientes.cep, clientes.rua, clientes.numero_casa, clientes.bairro, clientes.cidade, clientes.estado, pedidos.data, pedidos.valor_total, pedidos.status FROM pedidos INNER JOIN clientes ON pedidos.id_cliente = clientes.id WHERE pedidos.id = ?");
$stmt->execute([$_GET['id']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$selectItens = $pdo->prepare("SELECT itens_pedido.id_produto, itens_pedido.quantidade, produtos.nome as 'nome_produto', produtos.fotos, produtos.preco as 'preco', produtos.tamanho FROM itens_pedido INNER JOIN produtos ON itens_pedido.id_produto = produtos.id WHERE id_pedido = ?");
$selectItens->execute([$result['id']]);
$itens = $selectItens->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container mt-5 mb-5 rounded">
  <div class="bg-white shadow-sm p-4 mb-5 rounded">
    <h5 class="header-title pb-3 fs-6 text-uppercase">Itens do pedido #<?=$result['id']?></h5>
    <div class="table-responsive">
      <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th colspan="2">Produto</th>
                    <th>Tamanho</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($itens as $item): $fotos = explode(',',$item['fotos'])?>
                    <tr>
                        <td><img src="../<?=$fotos[0]?>" alt="" width="70"></td>
                        <td><?=$item['nome_produto']?></td>
                        <td><?=$item['tamanho']?></td>
                        <td><?=$item['quantidade'];?></td>
                        <td><?=$item['preco'];?></td>
                        <td><?=$item['preco'] * $item['quantidade'];?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  </div>

  <div class="row justify-content-between" style="--bs-gutter-x: 0;">
    <div class="bg-white shadow p-4 col-6 rounded">
      <h5 class="header-title pb-3 fs-6 text-uppercase">Informações de entrega</h5>
      <p class="header-title"><?=$result['nome_cliente']?></p>
      <p>
        <?=$result['rua']?>, <?=$result['numero_casa']?><br>
        <?=$result['bairro']?>, <?=$result['cidade']?> - <?=$result['estado']?>,
        <?=$result['cep']?>
      </p>

      <p>
        <?=$result['telefone']?>
      </p>
    </div>

    <div class="bg-white shadow p-4 col-5 rounded">
      <h5 class="header-title pb-3 fs-6 text-uppercase">Informações do pedido</h5>
      <p class="badge rounded-0 status" id="status"><?=$result['status']?></p>
      <p>Data da compra: <?=$result['data']?></p>
      <p>Total: <?=$result['valor_total']?></p>
    </div>
  </div>


</div>

<?php include "rodape.php" ?>