<?php include "cabecalho.php"; ?>

<div class="container mt-5">
  <h1 class="mb-4 fs-4">Minha conta</h1>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="dados-tab" data-bs-toggle="tab" data-bs-target="#dados" type="button" role="tab" aria-controls="dados" aria-selected="true">Dados pessoais</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pedidos-tab" data-bs-toggle="tab" data-bs-target="#pedidos" type="button" role="tab" aria-controls="pedidos" aria-selected="false">Pedidos realizados</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="favoritos-tab" data-bs-toggle="tab" data-bs-target="#favoritos" type="button" role="tab" aria-controls="favoritos" aria-selected="false">Produtos favoritos</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="sair-tab" data-bs-toggle="tab" data-bs-target="#sair" type="button" role="tab" aria-controls="sair" aria-selected="false">Sair</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="dados-tab">
      <form action="alterar-cliente.php" method="POST">
        <div class="row justify-content-center mt-4 mb-4">
          <div class="col-md-4">
            <label for="nome" class="form-label">Nome completo</label>
            <input type="text" name="nome" class="form-control">
          </div>

          <div class="col-md-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control">
          </div>

          <div class="col-md-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control">
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-5">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
          </div>

          <div class="col-md-5">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="email" name="endereco" class="form-control">
          </div>
        </div>
      </form>
    </div>

    <div class="tab-pane fade" id="pedidos" role="tabpanel" aria-labelledby="pedidos-tab">
      Você ainda não comprou nada na nossa loja, clique aqui e faça sua primeira compra
    </div>

    <div class="tab-pane fade" id="favoritos" role="tabpanel" aria-labelledby="favoritos-tab">
      ...
    </div>
  </div>
</div>


<?php include "rodape.php";?>