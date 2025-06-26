<!DOCTYPE html>
<html>
	<head>
		<title> Semana 01 - Exemplo 14 </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Free Web tutorials">
		<meta name="keywords" content="HTML, CSS, JavaScript">
		<meta name="author" content="John Doe">
		<link rel="stylesheet" href="mystyle.css">
		<style>
		
		</style>
	</head>
	<body>
		<h3>Semana 01 - Exemplo 19 - Alterar</h3>
		<?php
			try {
				include_once('conexao.php');
				// recuperando 
				$id = $_POST['id'];
				$tripulacao = $_POST['tripulacao'];
				$modelo = $_POST['modelo'];	
				$prefixo = $_POST['prefixo'];	
				$datafab = $_POST['datafab'];	
				
				
				$foto =""; 
				$target_dir = "imagens/";
				$target_file = $target_dir . basename($_FILES["foto"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$sqlconsulta =  "select * from tabelaimg where id = $id";
				$resultado = mysqli_query($conexao, $sqlconsulta);
				$dados=mysqli_fetch_assoc($resultado);
				$imagemant = $dados["imagem"];
				$caminant = $target_dir . $imagemant;

				// verificando se o arquivo e mesmo uma imagem
				if(isset($_POST["submit"])) {
				  $check = getimagesize($_FILES["foto"]["tmp_name"]);
				  if($check !== false) {
					echo "<h4>O arquivo é uma imagem - " . $check["mime"] . ".</h4>\n";
					$uploadOk = 1;
				  } else {
					echo "<h4>O arquivo não é uma imagem.</h4>\n";
					$uploadOk = 0;
				  }
				}

				// verificando se o arquivo já existe
				if (file_exists($target_file)) {
				  echo "<h4>O arquivo já existe no repositório</h4>";
				  $uploadOk = 0;
				}

				// verificando o tamanho do arquivo
				if ($_FILES["foto"]["size"] > 500000) {
				  echo "<h4> O arquivo excede o tamanho máximo(480kb)!</h4>";
				  $uploadOk = 0;
				}

				// verificando o formato do arquivo pela extensão
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				  echo "<h4> Só são permitidas imagens JPG,JPEG,PNG E GIF!</h4>";
				  $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				  echo "<h4>Erro: Não foi possível fazer o upload da foto</h4>";
				// if everything is ok, try to upload file
				} else {
				if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
					$foto = basename( $_FILES["foto"]["name"]);
					echo "O arquivo ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " foi gravado com sucesso";
				}else {
					echo "<h4>Erro: Não foi possível fazer o upload da foto</h4>";
				  }
				}
								
				// criando a linha do  UPDATE
				if($uploadOk == 0){
					$sqlupdate =  "update tabelaimg set 
					tripulacao='$tripulacao', modelo='$modelo',prefixo='$prefixo',
					datafab='$datafab' where id=$id";
				}
				else {
					$sqlupdate =  "update tabelaimg set 
					tripulacao='$tripulacao', modelo ='$modelo',prefixo='$prefixo',
					datafab='$datafab',imagem='$foto' where id=$id";
					if(file_exists($caminant)){
						unlink($caminant);
					}
				}
				//TIRO GRANDE :vD
				// executando instrução SQL
				$resultado = @mysqli_query($conexao, $sqlupdate);
				if (!$resultado) {
					die('<b>Query Invalida:<b>' . mysqli_error($conexao));  
				} else {
					echo "Registro Alterado com Sucesso";
				} 
				mysqli_close($conexao);
				
			} catch (Exception $e) {
				echo "<h2> aconteceu um erro:<br>".
				$e->GetMessage()."</h2>\n";
			}
		?>
		<br><br>
		<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>
