<?php include_once("conexao.php");

	$id_categoria = $_REQUEST['id_categoria'];
	
	$sqlBusca = "SELECT * FROM subcategorias WHERE id_categoria_pai=$id_categoria ORDER BY subcategoria";
	$subcategoriasLista = mysqli_query($conexao, $sqlBusca);
	
	while ($subcategoria = mysqli_fetch_assoc($subcategoriasLista)) {
		$subcategorias_post[] = array(
			'id'	=> $subcategoria['id'],
			'subcategoria' => $subcategoria['subcategoria'],
		);
	}
	
	echo(json_encode($subcategorias_post));
