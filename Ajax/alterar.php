<?php
	include("conexao.php");
	$PK = $_POST['Codigo'];
	$nome = $_POST['Nome'];
	$login = $_POST['Login'];
	$senha = md5($_POST['Senha']);
	$funcao = $_POST['Funcao'];

	$img = $_POST['imgDados'];
	$foto = addslashes(file_get_contents($img));
	//
	$query_select = "SELECT Login FROM usuarios WHERE Login = ?";
	$stmt = $conn->prepare($query_select);
	$stmt->bind_param("s", $login);
	$array = $stmt->get_result();
	
	$logarray = $array['Login'];
	//
	$sql = "SELECT * FROM usuarios WHERE Codigo = '$PK'";
	$teste = $conn->query($sql);
	$row = $teste->fetch_assoc();
	//
	if(!empty($nome)){
		$alteracao = "UPDATE usuarios SET Nome = ? WHERE Codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("s", $nome);
		$stamt->execute();
	}
	
	if($row["Login"] != $login){
		if($logarray == $login){
			echo "Esse login já existe";
			die();
		}else{
			$alteracao = "UPDATE usuarios SET Login = ? WHERE Codigo = '$PK'";
			$stamt = $conn->prepare($alteracao);
			$stamt->bind_param("s", $login);
			$stamt->execute();
		}
	}
	//
	if(!empty($senha)){
		$alteracao = "UPDATE usuarios SET Senha = ? WHERE Codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("s", $senha);
		$stamt->execute();
	}
	//
	if(!empty($funcao)){
		$alteracao = "UPDATE usuarios SET Funcao = '$funcao' WHERE Codigo = '$PK'";
		$conn->query($alteracao);
	}
	//
	
	if(!empty($foto)){
		$alteracao = "UPDATE usuarios SET Foto = '$foto' WHERE Codigo = '$PK'";
		$conn->query($alteracao);
	}

	$conn->close();

	echo "Alterado com Sucesso!";
?>