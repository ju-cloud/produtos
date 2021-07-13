<?php
	include("conexao.php");

	$info[0] = $_POST["nome"];
	$info[1] = $_POST["preco"];
	$info[2] = $_POST["descricao"];
    $info[3] = $_POST["quantidade"];
	$info[4] = $_POST["altura"];
	$info[5] = $_POST["largura"];
	$info[6] = $_POST["profundidade"];
    $info[7] = $_POST["peso"];
	$info[8] = $_POST["fabricante"];
	$info[9] = $_POST["codigoDeBarras"];
	
	$img = $_POST['imgDados'];
	$info[10] = addslashes(file_get_contents($img));
	
	$info[11] = $_POST["descricaoDetalhada"];
    $info[12] = $_POST["tipoTitulo"];

	$sql = "INSERT INTO produto (Nome, Preco, Descricao, Quantidade, Altura, Largura, 
	Profundidade, Peso, Fabricante, CodigoDeBarras, Foto, DescricaoDetalhada, TipoTitulo) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '$info[10]', ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssssssssssss", $info[0], $info[1], $info[2], $info[3], $info[4], $info[5], 
		$info[6], $info[7], $info[8], $info[9], $info[11], $info[12]);
	
	if (!$stmt->execute()) {
 	 	echo $conn->error;
	}else{
		echo "Inserido com Sucesso!";
	}

	$conn->close();
?>