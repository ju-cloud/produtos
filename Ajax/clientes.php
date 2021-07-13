<?php

include("conexao.php");

$consulta = "SELECT * FROM clientes";

$con = $conn->query($consulta) or die($conn->error);
session_start();
?>
<html>
<title> Consulta clientes </title>
	<head>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script type="text/javascript">

			function abrirDialog(){
			var maskHeight = $(document).height();
			var maskWidth = $(window).width();
		
			$('#mask').css({'width':maskWidth,'height':maskHeight});
	 
			$('#mask').fadeIn(1000);	
			$('#mask').fadeTo("slow",0.8);

			var winH = $(window).height();
			var winW = $(window).width();
	              
			$('#dialog2').css('top',  winH/3-$('#dialog2').height()/2);
			$('#dialog2').css('left', winW/2-$('#dialog2').width()/2);
		
			$('#dialog2').fadeIn(2000); 
			}


			$(document).ready(function() {
				$('.window .close').click(function (e) {
					e.preventDefault();
					
					$('#mask').hide();
					$('.window').hide();
				});		
			
				$('#mask').click(function () {
					$(this).hide();
					$('.window').hide();
				});	


				var operacao = "";
					$('#inserir').click(function () {
						operacao = "inserir";

					//Inicialização dos Campos
					$('#txtCodigo').val("");
					$('#txtNome').val("");
					$('#txtEndereco').val("");
					abrirDialog();
					});
			
				$('.btnEditar').click(function () {
					operacao = "editar";
					$.post( "lerDados3.php", "codigo=" + $(this).attr('codigo') , function(data) {
					var res = data.split("|");
					//Inicialização dos Campos
					$('#txtCodigo').val(res[0]);
					$('#txtNome').val(res[1]);
					$('#txtEndereco').val(res[2]);
					$('#arquivo').val(null);
					$('#fotoDados').attr('src', 'data:image/png;base64,'+res[3]);
					abrirDialog();
				});
			});	
			
			$('#confirmaDados').click(function () {
				var pagOperacao = "";

				if (operacao == "inserir"){
					pagOperacao = "inserecli.php";
				}else{
					pagOperacao = "editacli.php";
				}

				//coloca a imagem no campo hidden
				$('#imgDados').val($('#fotoDados').attr('src'));

				$.post(pagOperacao, $('#formDados').serialize() , function(data) {
					alert(data);
					window.location.reload();
				});
			});
			$("#arquivo").change(function () {
	            if (this.files && this.files[0]) {
	                var reader = new FileReader();
	                reader.onload = function (e) {
	                    $('#fotoDados').attr('src', e.target.result);
	                }
	                reader.readAsDataURL(this.files[0]);
	            }
	       	 });				
			});					
		</script>
		
		<meta charset="utf8">
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<style>
	*{
		margin:0 auto;
		text-decoration:none;
		font-weight: 500;
	}

	/*menu*/
	.menu{
		list-style:none; 
		border:1px solid #c0c0c0; 
		float:left;
		width: 100%;
		background-color:white;
	}

	.menu li{
		position:relative; 
		float:left; 
		padding-left: 3px;
		padding-right: 3px;

	}

	.menu li a{
		color:#333; 
		text-decoration:none; 
		padding:5px 10px; 
		display:block;
		border-radius: 10px;
	}
	 
	.menu li a:hover{
	background:#06F; 
	color:#fff; 
	}

	.menu li  ul{
	position:absolute; 
	top:25px; 
	left:0;
	background-color:#fff; 
	display:none;
	}   

	/*menu fim*/


	.central{
		width:80%;
		height:100%;
		margin:0 auto;
	}

	.caixa{
		width:24%;
		height:450px;
		margin-top:5px;
		margin-left:1%;
		color:black;
		background-color:aliceblue;
		text-align:center;
		border-radius: 10px;
		float:left;
	}

	.cab_caixa{
		width:100%;
		height:10%;
		background-color:#06F;
		text-align:center;
		line-height:35px;
		color:white;
		border-top-left-radius:10px;
		border-top-right-radius:10px;
	}

	.caixa img{
		width: 90%;
		margin:1%;
	}

	.caixa_info{
		width:90%;
		margin-top:0,5%;
		font-size:15px;
		font-weight:bold;
	}

	label{
		float:left;
		margin-bottom:0;
	}

	input{
		margin-right: 30px;
		margin-left: 10px;
	}

	caixa button a{
		text-decoration: none;
	}


	button{
		color: black;
		background-color: white;
		text-decoration:none;
		margin-bottom: 1%;
		border-style:solid;
		border-color: lightblue;
		border-radius: 5px;
	}
	div.body-content{
	  /** Essa margem vai evitar que o conteudo fique por baixo do rodapé **/
	  margin-bottom: 40px;
	}

	footer.fixar-rodape{
	  border-top: 1px solid #000;
	  bottom: 0;
	  left: 0;
	  height: 40px;
	  position:fixed;
	  width: 100%;
	  margin-top:100%;
	  background-color: skyblue;
	}

	.redes{
		float: left;
		margin: 5px 0 0 30px;
	}

	.redes img{
		width: 50%;
	}

	#mask {
	 position:absolute;
	 left:0;
	 top:0;
	 z-index:9000;
	 background-color:black;
	 display:none;
	}
			  
	#boxes .window {
	  position:absolute;
	  left:0;
	  top:0;
	  width:440px;
	  display:none;
	  z-index:9999;
	  padding:20px;
	  margin-top:0;
	}
			 
	#boxes #dialog2 {
		background:transparent; 
		width:650px;
		height:350px;
		margin:0 auto;
		margin-top:0;
		background-color:white;
	}
			 
	.close{display:block; text-align:right;}

	#fotoDados{
		width: 100px;
		height: 100px;
		position: absolute;
		top: 20px;
		right: 20px;
	}
	
	#inserir{
		position:fixed;
		bottom: 30px;
		right: 30px;
		display: block;
		width: 50px;
		height: 50px;
		border-radius: 50%;
		background-color: #FFF;
		color: #06F;
		text-decoration: none;
		text-align: center;
		line-height: 40px;
		font-size: 40px;
		font-weight: bold;
		margin-bottom:30px;
	}
	
	table{
		width: 100%;
	}
	</style>
	</head>
	<body style="background-color:lightblue; padding-bottom:75%">
		<nav>
			<?php
					echo "<ul class='menu'>";
						echo"<li><a href='index.php'> Produtos </a></li>";
						if(isset($_SESSION["funcao"])){
							if($_SESSION["funcao"] == "Administrador"){
								echo "<li><a href='usuarios.php'>Usuários</a></li>";
							}
						}
						
						if(isset($_SESSION["funcao"])){
							if($_SESSION["funcao"] == "Usuario"||$_SESSION["funcao"] == "Gerente"||$_SESSION["funcao"] == "Administrador"){
								echo "<li><a href='clientes.php'>Clientes</a></li>";
							}
						}

						if (isset($_SESSION["Login"])){
							echo "<a href='deslogar.php'><img src='sair.png' style='width:30px;; height:30px;; float:right;'></a>";
							echo "<p style='float:right; margin-top:4px; margin-right:20px;'> Olá, ".$_SESSION["funcao"]."</p>";
						}else{
							echo '<form action="logar.php" method="post">';
							echo '	Login:' ;
							echo '	<input type="text" name="login">';
							echo '	Senha:';
							echo '	<input type="password" name="senha">';
							echo '	<input type="submit">';
							echo '</form>';
						}
				?>
			</ul>
		</nav>
		
		<div class="central" style="margin-bottom:40px">
		<h1 style="text-align:center; color:black">Clientes</h1>
		<?php
			include("conexao.php");

			$sql = "SELECT * FROM clientes";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

				echo "<table border='2'><tr><td>Código</td><td>Nome</td><td>Endereço</td><td>Foto</td></tr>";

				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>". $row["Codigo"]. "</td>";
					echo "<td>". $row["Nome"]. "</td>";
					echo "<td>". $row["Endereco"]. "</td>";
					echo "<td><img src='data:image/png;base64,".base64_encode($row['Foto'])."' style='width:100px;height:100px;'/></td>";
					if(isset($_SESSION["funcao"])){
						if($_SESSION["funcao"] == "Administrador"|| $_SESSION["funcao"] == "Gerente"){
							echo "<td style='text-align: center;'><a href='#' codigo='".$row["Codigo"]."'' class='btnEditar'><img src='alterar.png' style='width:40px;height:40px;'/></a></td>";
						}
					}
					if(isset($_SESSION["funcao"])){
						if($_SESSION["funcao"] == "Administrador"){
							echo "<td style='text-align: center;'><a href='excluirclientes.php?codigo=".$row["Codigo"]."'><img src='lixeira.png' style='width:40px;height:40px;'/></a></td>";
						}
					}
					echo "</tr>";
				}

		    echo "</table>";
		} else {
		    echo "0 resultados";
		}
		$conn->close();

		?>
		</table>
		<a id="inserir" href="#">+</a>	

			<div id="boxes">
 		<!-- Janela Modal -->
		<div id="dialog2" class="window">
			<form action="ins.php" enctype="multipart/form-data" method="post" id="formDados">
				<input type="hidden" name="Codigo" id="txtCodigo">
				<label style="float:left">Nome: </label>
				<input type="text" name="Nome" id="txtNome"/><br/>
				
				<br/><label style="float:left">Endereço: </label>
				<input type="text" name="Endereco" id="txtEndereco"><br/>
				
				<br/><label style="float:left">Selecione uma imagem: </label><input id="arquivo" name="arquivo" type="file" /><br/>
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" id="fotoDados" alt="Foto"/><br/>
				<input type="hidden" id="imgDados" name="imgDados"/>
				<input type="button" value="Confirmar" id="confirmaDados"/><br/>
			</form>
		</div>
		<!-- Fim Janela Modal-->
 
		<!-- Máscara para cobrir a tela -->
		<div id="mask"></div>
		</div>

	</body>
</html>	