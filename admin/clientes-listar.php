<?php
include_once "../includes/conexao.php";
include "header.php";

$stmt = $pdo->prepare("SELECT * FROM clientes");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container bg-body mt-5 mb-5 p-5 rounded">
    <div class="row mb-4">
        <div class="col-6">
            <a href="clientes-formulario-inserir.php" class="btn btn-primary rounded-0"><i class="bi bi-plus-circle"></i> Novo cliente</a>
        </div>
        <div class="col-6">
            <div class="row">
                <label for="busca" class="col-2 col-form-label">Procurar:</label>
                <div class="col-10">
                    <input type="text" id="busca" name="busca" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $cliente){ ?>
                    <tr>
                        <td><?=$cliente['id']?></td>
                        <td><?=$cliente['nome_completo']?></td>
                        <td><?=$cliente['cpf']?></td>
                        <td><?=$cliente['telefone']?></td>
                        <td><?=$cliente['email']?></td>
                        <td>
                            <form action="clientes-crud.php" method="post">
                                <input type="hidden" name="id_cliente" value="<?=$cliente['id']?>">
                                <a href="cliente-detalhe.php?id=<?=$cliente['id']?>" class="btn btn-sm btn-outline-secondary rounded-0" title="visualizar detalhes"><i class="fa fa-eye"></i></a>
                                <a href="clientes-formulario-alterar.php?id=<?=$cliente['id']?>" class="btn btn-sm btn-outline-warning rounded-0" title="alterar"><i class="fa fa-pencil-square-o"></i></a>
                                <button name="excluir" class="btn btn-sm btn-outline-danger rounded-0" title="excluir"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


<?php include "rodape.php"; ?>