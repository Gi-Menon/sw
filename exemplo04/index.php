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
				include("conexao.php");
				$sql = "select * from tabelaimg order by id";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$modelo = $_POST["modelo"];
					$sql = "select * from tabelaimg where 
					modelo like '%$modelo%' order by modelo";
				}
				$query = mysqli_query($conexao,$sql);
				
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
									<li class=\"nav-item\">
									  <a class=\"nav-link active\" href=\"index.php\">Atualizar</a>
									</li>
								  </ul>
								  <form class=\"d-flex\" role=\"search\" action=\"#\" method = \"post\">
									<input type= \"text\" class=\"barra\" name= \"modelo\" maxlength = \"80\">&nbsp;&nbsp;
									<button class=\"pesq\" type=\"submit\">Pesquisar</button>
								  </form>
								</div>
							  </div>
						</nav>&nbsp;&nbsp;";
					
				// ajustando a instrução select para ordenar por modelo
				
				echo "<div class=\"fundo\">";
				echo"<div class=\"tabela\">";
				echo"<table class=\"table table-bordered \">\n";// note que abri echo com aspas para executar
				//comando html e os atributos das tags com apostrofe 
				echo "<tr class=\"table-dark text-center\">
						<th width=\"30px\" align=\"center\">Id</th>
						<th width=\"150px\">Prefixo</th>
						<th width=\"50px\">Tripulação</th>
						<th width=\"150px\">Modelo</th>
						<th width=\"10px\">Imagem</th>
						<th width=\"200px\">Opções</th>
					</tr>\n";

				while($dados = mysqli_fetch_assoc($query)){
					echo "<tr class=\"text-center\">";
					echo "<td align='center'>". $dados['id']."</td>\n";
					echo "<td>". $dados['prefixo']."</td>\n";
					echo "<td>{$dados['tripulacao']}</td>\n";
					echo "<td>". $dados['modelo']."</td>\n";
					
					// buscando a na pasta imagem
					if (empty($dados["imagem"])){
						$imagem = "foto.jpg";
					}else{
						$imagem = $dados["imagem"];
					}
					$id = base64_encode($dados["id"]);
					echo "<td>
							<a href=\"verproduto.php?id=$id\">
								<img class=\"imagem\" src=\"imagens/$imagem\">
							</a>
						</td>\n";
					echo "<td>
							<a href=\"verproduto.php?id=$id\"><button class=\"aceita\">Visualizar</button></a>&nbsp;&nbsp;
							<a href=\"alteracao.php?id=$id\"><button class=\"aceita\">Alterar</button></a>&nbsp;&nbsp;
							<!-- modal -->
							<input type='button' class=\"aceita\" onclick=\"abrirModal('{$dados['id']}')\" value=\"Excluir\">
							&nbsp;&nbsp;
							
						</td>\n";
						
					echo "</tr>\n";
				}
				
				echo "</table>
					</div>";
				
				mysqli_close($conexao);
				
			} catch (Exception $e) {
				echo "<h2> aconteceu um erro:<br>".
				$e->GetMessage()."</h2>\n";
			}
		?>
		<!-- Modal -->
		<div id="modalExcluir" class="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<span class="close" onclick="fecharModal()"></span>
						<h4>Tem certeza que deseja excluir este registro?</h4><br>
					</div>
					<div class="modal-body">
						<h5>Ao excluir este elemento você não poderá mais restaurá-lo!</h5><br>
					</div>
					 <div class="modal-footer">
						<form method="POST" action="excluir.php">
							<input type="hidden" name="id" id="idExcluir">
							<button type="submit" class="aceita">Sim</button>
							<button type="button" class="nao" onclick="fecharModal()">Cancelar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</body>
	<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="js/js.js" type="text/javascript"></script>
</script>
</html>
