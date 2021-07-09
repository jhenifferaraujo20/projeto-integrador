<?php
include "cabecalho.php";
include "conexao.php";

if(!isset($_GET['buscar'])) {
    header("Location: index.php");
    exit;
}

$buscar = "%" . trim($_GET['buscar']) . "%";

$dbh = new PDO('mysql:host=127.0.0.1;dbname=loja_jadore', 'root', '');

$query = $dbh->prepare("SELECT * FROM produtos WHERE nome LIKE :nome");
$query->bindParam(':nome', $buscar, PDO::PARAM_STR);
$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container-fluid">
    <?php echo "<div class='mt-5'><h2 class='fs-4'>Sua busca: {$_GET['buscar']}</h2></div>"; ?>
    <div class="row mt-4">
        <?php
        if(count($result)) {
            foreach($result as $row) {
                $fotos = explode(',',$row['fotos']);
                echo "<div class='col-sm-2 col-md-3'>";
                echo    "<div class='slide-img'>";
                echo        "<a href='produto.php?id_produto={$row['id']}'><img src='{$fotos[0]}'></a>";
                echo    "</div>";
                echo    "<div class='detail-box ps-2'>";
                echo        "<a href='produto.php?id_produto={$row['id']}' class='text-uppercase'>{$row['nome']}</a><br>";
                echo        "R$ {$row['preco']}";
                echo    "</div>";
                echo "</div>";
            }
        }else {
            echo "<div class='m-5 text-center'>Não encontramos resultados pelo  termo buscado.</div>";
        }
        ?>
    </div>
</div>

<?php include "rodape.php"; ?>