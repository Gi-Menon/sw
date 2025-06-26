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
		
		</style>
	</head>
	<body>
		<?php
			try {
				include('conexao.php');
				// recuperando 
				$id = base64_decode( $_GET['id']);

				// criando a linha do  SELECT
				$sqlconsulta =  "select * from tabelaimg where id = $id";
				
				// executando instrução SQL
				$resultado = mysqli_query($conexao, $sqlconsulta);

				$num = @mysqli_num_rows($resultado);
				if ($num==0){
				echo "<b>Prefixo: </b>Não localizado !!!!<br><br>";
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				exit;
				}else{
					$dados=mysqli_fetch_assoc($resultado);
				}
				
				mysqli_close($conexao);
				
			} catch (Exception $e) {
				echo "<h2> aconteceu um erro:<br>".
				$e->GetMessage()."</h2>\n";
			}
		?>
		<nav class="navbar navbar-expand-lg bg-body-tertiary"  data-bs-theme="dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="logo/78 Sem Título_20250624084711.png" alt="Bootstrap" width="120" height="50">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
						  <a class="nav-link active"  href="inclusao.php">Cadastro</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link active" href="index.php">Atualizar</a>
						</li>
					</ul>
					<form class="d-flex" role="search" action="#" method = "post">
						<input type= "text" class="barra" name= "modelo" maxlength = "80">&nbsp;&nbsp;
						<button class="pesq" type="submit"  >Pesquisar</button>	
					</form>
				</div>
			</div>
		</nav>
		<div class="fundo">
			<div class="fundo2">
				<form name="modelo" action="alterar.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $dados["id"]; ?>">
					<b>Prefixo:</b> <input type="text" name="prefixo" maxlength="80" style="width:550px" value="<?php echo $dados['prefixo']; ?>"><br><br>
					<b>Modelo:</b> <input type="text" name="modelo"  maxlength="80" style="width:550px" value="<?php echo $dados['modelo']; ?>"><br><br>
					<b>Tripulação: </b><br><input type="number" name="tripulacao" value="<?php echo $dados['tripulacao'];?>"><br><br>
					<b>Data de Fabricação: </b> <input type="date" name="datafab" value="<?php echo date_format(date_create ($dados["datafab"]), "Y-m-d"); ?>"><br><br>
					<!--<b>Foto: </b> <input type="file" name="foto" value="<?php echo "imagens/" . $dados["imagem"]; ?>"><br><br>-->
					
					 <!-- Exibir a imagem atual -->
					<b>Imagem Atual:</b><br>
					<img src="imagens/<?php echo !empty($dados['imagem']) ? $dados['imagem'] : 'semimagem.jpg'; ?>"
						 alt="Imagem do modelo" width="200"><br><br>
				 
					<b>Nova Imagem:</b> <input type="file" name="foto" id="nova_imagem" onchange="previewImagem(event)"><br><br>
				 
					<!-- Exibir prévia da nova imagem abaixo -->
					<img id="preview" src="" alt="Prévia da nova imagem" width="200" style="display: none;"><br>

					
					<input type="submit" value="Ok" class="nao">&nbsp;&nbsp;
					<input type="reset" value="Limpar" class="nao" >
					<input type='button' onclick="window.location='index.php';" value="Voltar" class="aceita">
				</form>
			</div>
		</div>
	</body>
	<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
</html>
