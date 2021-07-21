<?php 

include_once "../includes/conexao.php";

$stmt = $pdo->prepare("SELECT produtos.id, produtos.nome, produtos.preco, produtos.preco_antigo, produtos.descricao, produtos.cor, produtos.tamanho, produtos.quantidade_estoque, categorias.categoria as 'categoria', subcategorias.subcategoria as 'subcategoria' FROM produtos INNER JOIN categorias ON produtos.id_categoria = categorias.id INNER JOIN subcategorias ON produtos.id_subcategoria = subcategorias.id WHERE produtos.id = ?");
$stmt->execute([$_GET['id']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

include "cabecalho.php"; ?>
    <div class="container">
        <h2 class="mb-4 mt-5 text-center fs-4">Alterar produto</h2>

        <form name="formulario-alterar-produtos" method="post" action="produtos-alterar.php" enctype="multipart/form-data">
            <input type="hidden" name="id_produto" value="<?=$result['id']?>">
            <div class="row ms-5 me-5 mb-4">
                <p class="col-md-8">
                    <label class="form-label">Nome</label><br>
                    <input name="nome" class="form-control" maxlength="100" required value="<?=$result['nome']?>">
                </p>
                <p class="col-md-2">
                    <label class="form-label">Preço</label><br>
                    <input name="preco" class="form-control" required value="<?=$result['preco']?>">
                </p>
                <p class="col-md-2">
                    <label class="form-label">Preço antigo</label><br>
                    <input name="preco_antigo" class="form-control" required value="<?=$result['preco_antigo']?>">
                </p>
            </div>
            <div class="row ms-5 me-5 mb-4">
                <p class="col-md-12">
                    <label class="form-label">Descrição</label><br>
                    <textarea name="descricao" class="form-control" required><?=$result['descricao']?></textarea>
                </p>
            </div>
            <div class="row ms-5 me-5 mb-4">
                <p class="col-md-5">
                    <label for="cor" class="form-label">Cor</label>
                    <input type="file" name="cor" id="cor" class="form-control">
                </p>
                <p class="col-md-3">
                    <label for="tamanho" class="form-label">Tamanho</label>
                    <select name="tamanho" id="tamanho" class="form-select">
                        <option value="">Selecione ...</option>
                        <option value="pp" <?php if($result['tamanho'] == 'pp'){ echo 'selected'; } ?>>PP</option>
                        <option value="p" <?php if($result['tamanho'] == 'p'){ echo 'selected'; } ?>>P</option>
                        <option value="m" <?php if($result['tamanho'] == 'm'){ echo 'selected'; } ?>>M</option>
                        <option value="g">G</option>
                        <option value="gg">GG</option>
                    </select>
                </p>
                <p class="col-md-4">
                    <label for="quantidade" class="form-label">Quantidade estoque</label>
                    <input name="quantidade_estoque" id="quantidade" class="form-control" value="<?=$result['quantidade_estoque']?>">
                </p>
            </div>
            <div class="row ms-5 me-5 mb-4">
                <p class="col-md-5">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="arquivos[]" multiple id="foto" class="form-control">
                </p>
                <p class="col-md-4">
                    <label for="id_categoria" class="form-label">Categoria</label>
                    <select name="id_categoria" id="id_categoria" class="form-select">
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
                    <select name="id_subcategoria" id="id_subcategoria" class="form-select">
                        <option>Escolha a subcategoria ...</option>
                        
                    </select>
                </p>
            </div>
            <div class="row mb-5 justify-content-end">
                <p class="col-md-3 me-5 text-end">
                    <button type="subtmit" class="btn btn-success">Salvar</button>
                </p>
            </div>
        </form>
    </div>
        

    <!--jQuery-->
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/loader.js"></script>
    <!-- bootstrap -->
    <script src="../bootstrap/bootstrap.bundle.js"></script>
    <!--javascript-->
    <script src="../js/funcoes.js"></script>
		
    <script type="text/javascript">
    $(function(){
        $('#id_categoria').change(function(){
            if( $(this).val() ) {
                $('#id_subcategoria').hide();
                $('.carregando').show();
                $.getJSON('subcategorias.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
                    var options = '<option value="">Escolha a subcategoria</option>';	
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i].id + '">' + j[i].subcategoria + '</option>';
                    }	
                    $('#id_subcategoria').html(options).show();
                    $('.carregando').hide();
                });
            } else {
                $('#id_subcategoria').html('<option value="">– Escolha a subcategoria –</option>');
            }
        });
    });
    </script>
</body>
</html>