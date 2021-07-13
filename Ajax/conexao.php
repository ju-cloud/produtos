<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "usbw";
	$banco = "americanas";

	// Create connection
	$conn = new mysqli($servidor, $usuario, $senha, $banco);
	// Check connection
	if ($conn->connect_error) {
	    die("Erro de conexão: " . $conn->connect_error);
	} 
?>