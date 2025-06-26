<!DOCTYPE html>
<html>
	<head>
		<title> HyperAirplane</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="informações sobre aviões">
		<meta name="keywords" content="AVIÃO, AVIÕES,avião,aviões">
		<meta name="author" content="Giovanna e Murilo Aparecido Lino">
		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
			table, th, td {
				border: 1px solid #000000;
			}
			.imagem {
				width: 250px;
			}
		</style>
	</head>
	<body>
	<?php
		try{
			date_default_timezone_set("America/Sao_Paulo"); 
		include('conexao.php');
		//0123456789
		//2017-05-01 00:00:00
		function formataData($datafab, $formato){
			$novadata= date_create($datafab);
			return date_format($novadata, $formato);
		}
		function convertedata2($datafab){
			$novadata = substr($datafab, 8, 2).'/'.substr($datafab, 5, 2).'/'.substr($datafab, 0, 4);
			return $novadata;
		}
		function convertedata($datafab){
			$data_vetor = explode('-', substr($datafab,0,10));
			$novadata = implode('/', array_reverse ($data_vetor));
			return $novadata;
		}
		// recuperando a informação da URL
		// verifica se parâmetro está correto e dento da normalidade 
		
		if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
				$id = base64_decode($_GET['id']);
		} else {
			header("Location: index.php");
		}
		//$id = base64_decode($_GET['id']);
		
		// realizando a pesquisa com o id recebido
		//IMPORTANTE
		
		$sql = "select* from tabelaimg where id = $id";
		$query = mysqli_query($conexao,$sql);
		$dados=mysqli_fetch_array($query);
		
		//IMPORTANTE
		echo"<nav class=\"navbar navbar-expand-lg bg-body-tertiary\"  data-bs-theme=\"dark\">
						  <div class=\"container-fluid\">
							<a class=\"navbar-brand\" href=\"#\">
							  <img src=\"logo/78 Sem Título_20250624084711.png\" alt=\"Bootstrap\" width=\"120\" height=\"50\">
							</a>
							<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
							  <span class=\"navbar-toggler-icon\"></span>
							</button>
							<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
							  <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
								<li class=\"nav-item\">
								  <a class=\"nav-link active\"  href=\"inclusao.php\">Cadastro</a>
								</li>
							  </ul>
							  <form class=\"d-flex\" role=\"search\" action=\"#\" method = \"post\">
								<input type= \"text\" class=\"barra\" name= \"modelo\" maxlength = \"80\">&nbsp;&nbsp;
								<button class=\"pesq\" type=\"submit\">Pesquisar</button>
							  </form>
							</div>
						  </div>
					</nav>&nbsp;&nbsp;";
		echo"<div class=\"fundo\">";
		echo"<div class=\"fundo2\">";
		echo "<table >
			<tr>
			<td>";
			
		if (empty($dados["imagem"])){
				$imagem = "foto.jpg";
		}else{
				$imagem = $dados["imagem"];
			}
		echo "<img class=\"imagem\"src=\"imagens/$imagem\" >";
		echo "</td><td width='400px'>";
		echo "<b>Id: </b>".$dados['id']."<br>";
		echo "<b>Tripulação: </b>".$dados['tripulacao']."<br>";
		echo "<b>Modelo: </b>".$dados['modelo']."<br>";	
		echo "<b>Prefixo: </b>".$dados['prefixo']."<br>";				
		echo "<b>Data de fabricação: </b>".date_format(date_create($dados['datafab']),"d/m/Y")."<br>\n";
		echo "</td></tr></table><br>";
		echo "<input type='button' onclick=\"window.location='index.php';\" value=\"Voltar\"  class=\"aceita\">";
		echo"</div>";
		echo"</div>";
		
		
		mysqli_close($conexao);
		} catch (Exception $e) {
			echo "<h2> aconteceu um erro:<br>".
			$e->GetMessage()."</h2>\n";
		}
	?>
	<br>	
	</body>
	<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
</html>
