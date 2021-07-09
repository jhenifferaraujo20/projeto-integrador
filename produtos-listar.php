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
</head>
<body>
    <div class="container-fluid">
        <div class="text-center mt-2">
            <a href="index.php"><img src="images/logo_2.jpg" width="280" alt=""></a>
        </div>
        <nav class="text-center mt-3">
            <a href="" class="btn">Clientes</a>
            <a href="produtos-listar.php" class="btn">Produtos</a>
            <a href="" class="btn">Categorias</a>
            <a href="" class="btn">Subcategorias</a>
        </nav>

        <p class="mt-3">
            <a href="produtos-formulario-inserir.php" class="btn btn-dark"><i class="bi bi-plus-circle"></i> Novo produto</a>
        </p>

        <?php if(isset($_GET['mensagem'])){
        if($_GET['mensagem'] == 'cadastrado'){ ?>
            <div class="alert alert-success">
                Cadastrado com sucesso!
            </div>
        <?php
        }
        if($_GET['mensagem'] == 'excluido'){ ?>
            <div class="alert alert-danger">
                Excluído com sucesso!
            </div>
        <?php
        }
        if($_GET['mensagem'] == 'alterado'){ ?>
            <div class="alert alert-warning">
                Alterado com sucesso!
            </div>
        <?php
        }
        }
        ?>

        <?php
        include "conexao.php";

        $sqlBusca = "SELECT 
                    produtos.id,
                    produtos.nome,
                    produtos.preco,
                    produtos.tamanho,
                    categorias.categoria as 'categoria',
                    subcategorias.subcategoria as 'subcategoria',
                    produtos.quantidade_estoque,
                    produtos.fotos
                    FROM produtos
                    INNER JOIN categorias ON produtos.id_categoria = categorias.id
                    INNER JOIN subcategorias ON produtos.id_subcategoria = subcategorias.id;";
        $listaDeProdutos = mysqli_query($conexao , $sqlBusca);
        ?>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Subcategoria</th>
                        <th>Tamanho</th>
                        <th>Estoque</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($produto = mysqli_fetch_assoc($listaDeProdutos)){
                        echo "<tr>";
                        $fotos = explode(',',$produto['fotos']);
                        echo "<td><img src='{$fotos[0]}' width=100></td>";
                        echo "<td>{$produto['nome']}</td>";
                        echo "<td>{$produto['preco']}</td>";
                        echo "<td>{$produto['categoria']}</td>";
                        echo "<td>{$produto['subcategoria']}</td>"; 
                        echo "<td>{$produto['tamanho']}</td>";
                        echo "<td>{$produto['quantidade_estoque']}</td>";
                        echo "<td><a href='pacientes-formulario-alterar.php?id_paciente={$produto['id']}' class='btn btn-warning'><i class='bi bi-pencil'></i></a> ";
                        echo "<a href='pacientes-excluir.php?id_paciente={$produto['id']}' class='btn btn-danger'><i class='bi bi-x-lg'></i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
        

    <!--jQuery-->
    <script src="js/jquery-3.5.1.js"></script>
    <!-- bootstrap -->
    <script src="bootstrap/bootstrap.bundle.js"></script>
    <!-- slick-slider-->
    <script src="slick/slick.js"></script>
    <!--javascript-->
    <script src="js/funcoes.js"></script>
</body>
</html>