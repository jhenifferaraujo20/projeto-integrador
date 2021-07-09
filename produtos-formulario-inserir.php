<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--fonte-adobe-->
    <link rel="stylesheet" href="https://use.typekit.net/ndt6lhf.css">
    <!--font-awesome-->
    <script src="https://use.fontawesome.com/86ea3a5af0.js"></script>
    <script src="https://kit.fontawesome.com/8ae2a7fd5c.js" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <!-- slick-slider -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <!--stylesheet-->
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .carregando{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mt-2">
            <a href="index.php"><img src="images/logo_2.jpg" width="280" alt=""></a>
        </div>
        <nav class="text-center mt-3">
            <a href="" class="btn">Clientes</a>
            <a href="produtos-listar.php" class="btn">Produtos</a>
            <a href="" class="btn">Categorias</a>
            <a href="" class="btn">Subcategorias</a>
        </nav>

        <h2 class="mb-4 mt-5 text-center text-uppercase fs-4">Cadastrar produto</h2>
        <form name="formulario-inserir-produtos" method="post" action="produtos-inserir.php" enctype="multipart/form-data">
            <div class="row ms-5 me-5 mb-4">
                <p class="col-md-8">
                    <label class="form-label">Nome</label><br>
                    <input name="nome" class="form-control" maxlength="100" required>
                </p>
                <p class="col-md-2">
                    <label class="form-label">Preço</label><br>
                    <input name="preco" class="form-control" required>
                </p>
                <p class="col-md-2">
                    <label class="form-label">Preço antigo</label><br>
                    <input name="preco_antigo" class="form-control" required>
                </p>
            </div>
            <div class="row ms-5 me-5 mb-4">
                <p class="col-md-12">
                    <label class="form-label">Descrição</label><br>
                    <textarea name="descricao" class="form-control" required></textarea>
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
                        <option value="pp">PP</option>
                        <option value="p">P</option>
                        <option value="m">M</option>
                        <option value="g">G</option>
                        <option value="gg">GG</option>
                    </select>
                </p>
                <p class="col-md-4">
                    <label for="quantidade" class="form-label">Quantidade estoque</label>
                    <input name="quantidade_estoque" id="quantidade" class="form-control">
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
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/loader.js"></script>
    <!-- bootstrap -->
    <script src="bootstrap/bootstrap.bundle.js"></script>
    <!-- slick-slider-->
    <script src="slick/slick.js"></script>
    <!--javascript-->
    <script src="js/funcoes.js"></script>
		
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