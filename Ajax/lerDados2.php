<?php
	include("conexao.php");
	
	$sql = "SELECT * FROM usuarios WHERE Codigo =".$_POST['codigo'];
	$result = $conn->query($sql);

	if ($row = $result->fetch_assoc()) {
	    echo $row["Codigo"].'|'.$row["Nome"].'|'.$row["Login"].'|'.$row["Senha"].'|'.$row["Funcao"].'|'.base64_encode($row['Foto']);
	}
?>