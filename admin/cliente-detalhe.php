<?php 

include "header.php";

$stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
$stmt->execute([$_GET['id']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<div class="container mt-5 mb-5 rounded">

    <form action="clientes-crud.php" method="post">
        <input type="hidden" name="id_cliente" value="<?=$result['id']?>">
        <a href="clientes-formulario-alterar.php?id=<?=$result['id']?>" class="btn btn-sm btn-outline-warning rounded-0 mb-3" title="alterar"><i class="fa fa-pencil-square-o"></i> alterar</a>
        <button name="excluir" class="btn btn-sm btn-outline-danger rounded-0 mb-3" title="excluir"><i class="fa fa-trash-o"></i> excluir</button>
    </form>

    <div class="row justify-content-between" style="--bs-gutter-x: 0;">
        <div class="bg-white shadow p-4 col-6 rounded">
        <h5 class="header-title pb-3 fs-6 text-uppercase">Dados pessoais</h5>
        <p class="header-title"><?=$result['nome_completo']?></p>

        <p>
            CPF: <?=$result['cpf']?><br>
            Telefone: <?=$result['telefone']?><br>
            Email: <?=$result['email']?><br>
        </p>
        </div>

        <div class="bg-white shadow p-4 col-5 rounded">
        <h5 class="header-title pb-3 fs-6 text-uppercase">Endereço</h5>
        <p>
            <?=$result['rua']?>, <?=$result['numero_casa']?><br>
            <?=$result['bairro']?>, <?=$result['cidade']?> - <?=$result['estado']?>,
            <?=$result['cep']?>
        </p>
        </div>
    </div>

    <a href="clientes-listar.php" class="btn btn-outline-secondary rounded-0 mt-4">voltar</a>

</div>

<?php include "rodape.php" ?>