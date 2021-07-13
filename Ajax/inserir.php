<?php
	include("conexao.php");

	$info[0] = $_POST["Nome"];
	$info[1] = $_POST["Login"];
	$info[2] = md5($_POST["Senha"]);
    $info[3] = $_POST["Funcao"];
	
	$img = $_POST['imgDados'];
	$info[4] = addslashes(file_get_contents($img));
	
	$query_select = "SELECT Login FROM usuarios WHERE Login = ?";
	$stmt = $conn->prepare($query_select);
	$stmt->bind_param("s", $info[1]);
	$array = $stmt->get_result();
	
	$logarray = $array['Login'];
	
	if($info[1] == "" || $info[1] == null){
		echo"O campo login deve ser preenchido";
	 
    }else{
		if($logarray == $info[1]){
			echo"Esse login já existe";
			die();
		}else{
			$sql = "INSERT INTO usuarios (Nome, Login, Senha, Funcao, Foto)
			VALUES (?, ?, ?, ?, '$info[4]')";
			
			$stamt = $conn->prepare($sql);
			$stamt->bind_param("ssss", $info[0], $info[1], $info[2], $info[3]);

			if (!$stamt->execute()) {
				echo $conn->error;
			}else{
				echo "Inserido com Sucesso!";
			}
			
		}
	}

	$conn->close();
?>