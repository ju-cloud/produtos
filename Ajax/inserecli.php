<?php
include("conexao.php");

if(empty($_POST["website"]))
	{
		$website = "";
	}
	else
	{
		$website = test_input($_POST["website"]);
		if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-0+&@#\/%=~_|]/i",$website))
			$websiteErr = "URL inválido";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$info[0] = $_POST["Nome"];
			$info[1] = $_POST["Endereco"];
			$img = $_POST['imgDados'];
			$info[2] = addslashes(file_get_contents($img));
}

		$sqlstring = "INSERT INTO clientes (Nome, Endereco, Foto) 
		VALUES (?, ?, '$info[2]')";
		$stmt = $conn->prepare($sqlstring);
		$stmt->bind_param("ss", $info[0], $info[1]);
		
		if($stmt->execute()){
			echo "Dados inseridos com sucesso!";
		 }else{ 	
			echo "Falha ao enviar os dados!";
		}

	$conn->close();

	?>