<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	
	$host = "localhost"; 			
	$user = "root"; 
	$pass = ""; 
	$banco = "banco";
	
	try {
		$conexao = mysqli_connect($host, $user, $pass, $banco);
		mysqli_set_charset($conexao, "utf8");
	} catch (Exception $e) {
		throw new Exception("<h4>Problemas com a conexão
		do Banco de Dados<br>" . $e->GetMessage());
	}
?>
