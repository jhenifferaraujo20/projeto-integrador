<?php 

include "header.php"; 

$stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
$stmt->execute([$_GET['id']]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div class="container bg-body mt-5 mb-5 p-5 rounded">
    <h2 class="mb-4 text-center fs-4">Alterar cliente</h2>

    <form name="formulario-inserir-clientes" method="post" action="clientes-crud.php">
        <div class="row ms-5 me-5 mb-4">
            <p class="col-md-8">
                <label for="nome" class="form-label">Nome</label><br>
                <input id="nome" name="nome" class="form-control rounded-0" placeholder="Nome Completo" maxlength="80" required value="<?=$cliente['nome_completo']?>">
            </p>
            <p class="col-md-4">
                <label for="cpf" class="form-label">CPF</label><br>
                <input id="cpf" name="cpf" class="form-control rounded-0" placeholder="123.456.789-01" maxlength="11" required value="<?=$cliente['cpf']?>">
            </p>
        </div>

        <div class="row ms-5 me-5 mb-4">
            <p class="col-md-4">
                <label for="telefone" class="form-label">Telefone</label><br>
                <input id="telefone" name="telefone" class="form-control rounded-0" placeholder="(11) 9 9999-8888" maxlength="20" required value="<?=$cliente['telefone']?>">
            </p>
            <p class="col-md-8">
                <label for="email" class="form-label">Email</label><br>
                <input id="email" type="email" name="email" class="form-control rounded-0" placeholder="exemplo@gmail.com" maxlength="80" required value="<?=$cliente['email']?>">
            </p>
        </div>

        <div class="row ms-5 me-5 mb-4">
            <p class="col-md-4">
                <label for="cep" class="form-label">CEP</label>
                <input id="cep" name="cep" class="form-control rounded-0" maxlength="9" placeholder="12345-67" required value="<?=$cliente['cep']?>">
            </p>
            <p class="col-md-6">
                <label for="rua" class="form-label">Rua</label>
                <input id="rua" name="rua" class="form-control rounded-0" required value="<?=$cliente['rua']?>">
            </p>
            <p class="col-md-2">
                <label for="numero" class="form-label">Nº</label>
                <input id="numero" type="number" name="numero" class="form-control rounded-0" required value="<?=$cliente['numero_casa']?>">
            </p>
        </div>

        <div class="row ms-5 me-5 mb-4">
            <p class="col-md-5">
                <label for="bairro" class="form-label">Bairro</label>
                <input id="bairro" name="bairro" class="form-control rounded-0" required value="<?=$cliente['bairro']?>">
            </p>
            <p class="col-md-4">
                <label for="cidade" class="form-label">Cidade</label>
                <input id="cidade" name="cidade" class="form-control rounded-0" required value="<?=$cliente['cidade']?>">
            </p>
            <p class="col-md-3">
                <label for="uf" class="form-label">Estado</label>
                <select id="uf" name="estado" class="form-select rounded-0">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </p>
        </div>

        <div class="row mb-5 justify-content-end">
            <p class="col-md-3 me-5 text-end">
                <a href="clientes-listar.php" class="btn btn-outline-secondary rounded-0">Voltar</a>
                <button name="inserir" class="btn btn-success rounded-0">Salvar</button>
            </p>
        </div>
    </form>
        
<?php include "rodape.php"; ?>