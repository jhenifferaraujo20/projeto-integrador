<?php include "header.php"; ?>
<div class="container bg-body mt-5 mb-5 p-5 rounded">
    <h2 class="mb-4 text-center fs-4">Cadastrar produto</h2>

    <form name="formulario-inserir-produtos" method="post" action="produtos-inserir.php" enctype="multipart/form-data">
        <div class="row ms-5 me-5 mb-4">
            <p class="col-md-8">
                <label class="form-label">Nome</label><br>
                <input name="nome" class="form-control rounded-0" maxlength="100" required>
            </p>
            <p class="col-md-2">
                <label class="form-label">Preço</label><br>
                <input name="preco" class="form-control rounded-0" required>
            </p>
            <p class="col-md-2">
                <label class="form-label">Preço antigo</label><br>
                <input name="preco_antigo" class="form-control rounded-0" required>
            </p>
        </div>
        <div class="row ms-5 me-5 mb-4">
            <p class="col-md-12">
                <label class="form-label">Descrição</label><br>
                <textarea name="descricao" class="form-control rounded-0" required></textarea>
            </p>
        </div>
        <div class="row ms-5 me-5 mb-4">
            <p class="col-md-5">
                <label for="cor" class="form-label">Cor</label>
                <input type="file" name="cor" id="cor" class="form-control rounded-0">
            </p>
            <p class="col-md-3">
                <label for="tamanho" class="form-label">Tamanho</label>
                <select name="tamanho" id="tamanho" class="form-select rounded-0">
                    <option value="">Selecione ...</option>
                    <option value="pp">PP</option>
                    <option value="p">P</option>
                    <option value="m">M</option>
                    <option value="g">G</option>
                    <option value="gg">GG</option>
                </select>
            </p>
            <p class="col-md-4">
                <label for="quantidade" class="form-label">Quantidade estoque</label>
                <input name="quantidade_estoque" id="quantidade" class="form-control rounded-0">
            </p>
        </div>
        <div class="row ms-5 me-5 mb-4">
            <p class="col-md-5">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="arquivos[]" multiple id="foto" class="form-control rounded-0">
            </p>
            <p class="col-md-4">
                <label for="id_categoria" class="form-label">Categoria</label>
                <select name="id_categoria" id="id_categoria" class="form-select rounded-0">
                    <option>Escolha a categoria ...</option>
                    <?php 
                    $sqlBuscaCategorias = "SELECT * FROM categorias";
                    $listaCategorias = mysqli_query($conexao, $sqlBuscaCategorias);

                    while($categoria = mysqli_fetch_assoc($listaCategorias)){
                        echo "<option value='{$categoria['id']}'>";
                        echo $categoria['categoria'];
                        echo "</option>";
                    }
                    ?>
                </select>
            </p>
            <p class="col-md-3">
                <label for="id_subcategoria" class="form-label">Subcategoria</label>
                <span class="carregando">Aguarde, carregando...</span>
                <select name="id_subcategoria" id="id_subcategoria" class="form-select rounded-0">
                    <option>Escolha a subcategoria ...</option>
                    
                </select>
            </p>
        </div>
        <div class="row mb-5 justify-content-end">
            <p class="col-md-3 me-5 text-end">
                <a href="produtos-listar.php" class="btn btn-outline-secondary rounded-0">Voltar</a>
                <button type="subtmit" class="btn btn-success rounded-0">Salvar</button>
            </p>
        </div>
    </form>
        
<?php include "rodape.php"; ?>