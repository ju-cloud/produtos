<?php
	include("conexao.php");

	$cod = $_GET['codigo'];

	$sql = "DELETE FROM clientes WHERE codigo = $cod";
	$conn->query($sql);

	$conn->close();

	header("location: clientes.php");
?>