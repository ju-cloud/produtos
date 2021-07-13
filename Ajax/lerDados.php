<?php
	include("conexao.php");
	
	$sql = "SELECT * FROM produto WHERe Codigo =".$_POST['codigo'];
	$result = $conn->query($sql);

	if ($row = $result->fetch_assoc()) {
	    echo $row["Codigo"].'|'.$row["Nome"].'|'.$row["Preco"].'|'.$row["Descricao"].'|'.$row["Quantidade"].'|'.$row["Altura"].
		'|'.$row["Largura"].'|'.$row["Profundidade"].'|'.$row["Peso"].'|'.$row["Fabricante"].'|'.$row["CodigoDeBarras"].
		'|'.base64_encode($row['Foto']).'|'.$row["DescricaoDetalhada"].'|'.$row["TipoTitulo"];
	}
?>