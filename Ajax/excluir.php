<?php
	include("conexao.php");

	$cod = $_GET['codigo'];

	$sql = "DELETE FROM usuarios WHERE codigo = $cod";
	$conn->query($sql);

	$conn->close();

	header("location: usuarios.php");
?>