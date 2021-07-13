<?php
	include("conexao.php");

	$cod = $_GET['codigo'];

	$sql = "DELETE FROM produto WHERE codigo = $cod";
	$conn->query($sql);

	$conn->close();

	header("location: index.php");
?>