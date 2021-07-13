<?php
	include("conexao.php");
	
	$sql = "SELECT * FROM clientes WHERE Codigo =".$_POST['codigo'];
	$result = $conn->query($sql);

	if ($row = $result->fetch_assoc()) {
	    echo $row["Codigo"].'|'.$row["Nome"].'|'.$row["Endereco"].'|'.base64_encode($row['Foto']);
	}
?>