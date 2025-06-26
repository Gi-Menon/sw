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
						<button class="pesq" type="submit">Pesquisar</button>	
					</form>
				</div>
			</div>
		</nav>
		<div class="fundo">
			<div class="fundo2">
				<form name="modelo" action="incluir.php" method="post" enctype="multipart/form-data">
					<b>Tripulação:</b> <input type="number" name="tripulacao" required="required"><br><br>  
					<b>Modelo:</b> <input type="text" name="modelo" maxlength='15' style="width:550px"><br><br>
					<b>Prefixo: </b><br><textarea name="prefixo" rows='3' cols='100' style="resize: none;" ></textarea><br><br>
					<b>Data de Fabricação: </b> <input type="date" name="datafab"><br><br>
					<b>Foto: </b><input type="file"  name="foto"><br><br>
					<input type="submit" value="Ok" class="nao">&nbsp;&nbsp;
					<input type="reset" value="Limpar" class="nao" >
					<input type='button' onclick="window.location='index.php';" class="aceita" value="Voltar">
				</form>
			</div>
		</div>
	</body>
	<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
</html>
		