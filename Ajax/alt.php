<?php
	include("conexao.php");
	$PK = $_POST['codigo'];
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$fab = $_POST['fabricante'];
	$descdet = $_POST['descricaoDetalhada'];
	$quant = $_POST['quantidade'];
	$alt = $_POST['altura'];
	$larg = $_POST['largura'];
	$prof = $_POST['profundidade'];
	$peso = $_POST['peso'];
	$codbarras = $_POST['codigoDeBarras'];
	$desc = $_POST['descricao'];
	$titulo = $_POST['tipoTitulo'];

	$img = $_POST['imgDados'];
	$foto = addslashes(file_get_contents($img));
	//
	if(!empty($nome)){
		$alteracao = "UPDATE produto SET Nome = ? WHERE Codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("s", $nome);
		$stamt->execute();
	}
	//
	if(!empty($preco)){
		$alteracao = "UPDATE produto SET Preco = ? WHERE codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("d", $preco);
		$stamt->execute();
	}
	//
	if(!empty($fab)){
		$alteracao = "UPDATE produto SET Fabricante = ? WHERE codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("s", $fab);
		$stamt->execute();
	}
	//
	if(!empty($descdet)){
		$alteracao = "UPDATE produto SET DescricaoDetalhada = ? WHERE codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("s", $descdet);
		$stamt->execute();
	}
	//
		
	if(!empty($quant)){
		$alteracao = "UPDATE produto SET Quantidade = ? WHERE Codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("i", $quant);
		$stamt->execute();
	}
	//
	if(!empty($alt)){
		$alteracao = "UPDATE produto SET Altura = ? WHERE codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("i", $alt);
		$stamt->execute();
	}
	//
	if(!empty($larg)){
		$alteracao = "UPDATE produto SET Largura = ? WHERE codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("i", $larg);
		$stamt->execute();
	}
	//
	if(!empty($prof)){
		$alteracao = "UPDATE produto SET Profundidade = ? WHERE codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("i", $prof);
		$stamt->execute();
	}
	//
	if(!empty($peso)){
		$alteracao = "UPDATE produto SET Peso = ? WHERE Codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("d", $peso);
		$stamt->execute();
	}
	//
	if(!empty($codbarras)){
		$alteracao = "UPDATE produto SET CodigoDeBarras = ? WHERE codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("s", $codbarras);
		$stamt->execute();
	}
	//
	if(!empty($desc)){
		$alteracao = "UPDATE produto SET Descricao = ? WHERE codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("s", $desc);
		$stamt->execute();
	}
	//
	if(!empty($titulo)){
		$alteracao = "UPDATE produto SET TipoTitulo = '$titulo' WHERE codigo = '$PK'";
		$stamt = $conn->prepare($alteracao);
		$stamt->bind_param("s", $titulo);
		$stamt->execute();
	}
	//

	if(!empty($foto)){
		$alteracao = "UPDATE produto SET Foto = '$foto' WHERE codigo = '$PK'";
		$conn->query($alteracao);
	}

	$conn->close();

	echo "Alterado com Sucesso!";
?>