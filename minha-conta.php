<?php 
session_start();

include_once "includes/conexao.php";

if(!$_SESSION['email']) {
  header("Location: index.php?mensagem=login");
  exit();
}

$email = $_SESSION['email'];

$sqlBuscar = "SELECT * FROM clientes WHERE email='{$email}';";
$resultado = mysqli_query($conexao, $sqlBuscar);

while($dados = mysqli_fetch_assoc($resultado)){
  $id_cliente = $dados['id'];
  $nome = $dados['nome_completo'];
  $cpf = $dados['cpf'];
  $telefone = $dados['telefone'];
  $email = $dados['email'];
  $cep = $dados['cep'];
  $rua = $dados['rua'];
  $numero = $dados['numero_casa'];
  $bairro = $dados['bairro'];
  $cidade = $dados['cidade'];
  $estado = $dados['estado'];
}

$stmt = $pdo->prepare("SELECT pedidos.id, pedidos.data, pedidos.valor_total FROM pedidos WHERE id_cliente = ?");
$stmt->bindValue(1, $id_cliente, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total_pedidos = $pdo->query("SELECT pedidos.id, clientes.id FROM pedidos  INNER JOIN clientes ON pedidos.id_cliente = clientes.id WHERE clientes.id = $id_cliente")->rowCount();

include "includes/cabecalho.php"; 
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-6 mb-4">
      <h1 class="fs-4">Minha conta</h1>
    </div>
    <div class="col-6 text-end text-uppercase">
      <a href="logout.php" class="mb-5">Sair</a>
    </div>
  </div>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="dados-tab" data-bs-toggle="tab" data-bs-target="#dados" type="button" role="tab" aria-controls="dados" aria-selected="true">Dados pessoais</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="endereco-tab" data-bs-toggle="tab" data-bs-target="#endereco" type="button" role="tab" aria-controls="endereco" aria-selected="false">Endereço</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pedidos-tab" data-bs-toggle="tab" data-bs-target="#pedidos" type="button" role="tab" aria-controls="pedidos" aria-selected="false">Pedidos realizados</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="favoritos-tab" data-bs-toggle="tab" data-bs-target="#favoritos" type="button" role="tab" aria-controls="favoritos" aria-selected="false">Produtos favoritos</button>
    </li>

  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="dados-tab">
      <form action="cliente-alterar-dados.php" method="POST">
        <input type="hidden" name="id" value="<?php echo "{$id_cliente}" ?>">
        <div class="row justify-content-center mt-5 mb-4">
          <div class="col-md-5">
            <label for="nome" class="form-label">Nome completo</label>
            <input type="text" name="nome_completo" id="nome" class="form-control" value="<?php echo "{$nome}" ?>">
          </div>

          <div class="col-md-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="<?php echo "{$cpf}" ?>">
          </div>

          <div class="col-md-2">
            <label for="data_nascimento" class="form-label">Data nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control">
          </div>

        </div>

        <div class="row justify-content-center mb-4">
          <div class="col-md-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo "{$telefone}" ?>">
          </div>

          <div class="col-md-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo "{$email}" ?>">
          </div>

          <div class="col-md-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control">
          </div>
        </div>

        <div class="row justify-content-end">
          <div class="col-md-2">
            <button class="btn btn-dark text-uppercase">Salvar</button>
          </div>
        </div>
      </form>
    </div>

    <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="endereco-tab">
    <form action="cliente-alterar-endereco.php" method="POST">
      <input type="hidden" name="id_cliente" value="<?php echo "{$id_cliente}" ?>">
        <div class="row justify-content-center mt-5 mb-4">
          <div class="col-md-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" value="<?php echo "{$cep}" ?>">
          </div>

          <div class="col-md-5">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" name="rua" id="rua" class="form-control" value="<?php echo "{$rua}" ?>">
          </div>

          <div class="col-md-2">
            <label for="numero" class="form-label">Número</label>
            <input type="number" name="numero_casa" id="numero" class="form-control" value="<?php echo "{$numero}" ?>">
          </div>
        </div>

        <div class="row justify-content-center mb-4">
          <div class="col-md-4">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" id="bairro" class="form-control" value="<?php echo "{$bairro}" ?>">
          </div>

          <div class="col-md-4">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo "{$cidade}" ?>">
          </div>

          <div class="col-md-2">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" value="<?php echo "{$estado}" ?>">
          </div>
        </div>

        <div class="row justify-content-end">
          <div class="col-md-2">
            <button class="btn btn-dark text-uppercase">Salvar</button>
          </div>
        </div>
      </form>
    </div>

    <div class="tab-pane fade" id="pedidos" role="tabpanel" aria-labelledby="pedidos-tab">
      <p class="text-center mt-5">
        <?php if($total_pedidos == 0) {
          echo "Você ainda não comprou nada na nossa loja, clique aqui e faça sua primeira compra.";
        }else {
          foreach($result as $pedido){ 
            $id_pedido = $pedido['id'];
            $stmt = $pdo->prepare("SELECT produtos.nome, produtos.fotos, itens_pedido.quantidade FROM itens_pedido INNER JOIN produtos ON itens_pedido.id_produto = produtos.id WHERE id_pedido = ?");
            $stmt->bindValue(1, $id_pedido, PDO::PARAM_INT);
            $stmt->execute();
            $resultItens = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="mb-5">
              <h4>Pedido #<?=$pedido['id']?>:</h2>
              <p>Valor total: <?=$pedido['valor_total'];?></p>
              <p>Data: <?=$pedido['data'];?></p>
              <?php foreach($resultItens as $itens){ $fotos = explode(',', $itens['fotos']);?>
                <div class="row mb-3">
                  <div class="col-1">
                    <img src="<?=$fotos[0]?>" width="80">
                  </div>
                  <p class="col">
                    <?=$itens['nome']?> 
                    <br>Quantidade: <?=$itens['quantidade']?>
                  </p>
                </div>
        <?php
            }
            ?><hr></div><?php
          }
        }
        ?>
      </p>
    </div>

    <div class="tab-pane fade" id="favoritos" role="tabpanel" aria-labelledby="favoritos-tab">
      <p class="text-center mt-5">
        Você ainda não adicionou nenhum produto nos favoritos.
      </p>
    </div>
  </div>
</div>

<?php include "includes/rodape.php";?>