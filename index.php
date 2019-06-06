<?php
	//inicializador de sessão;
	session_start();	
	// Comando utilizado para não exibir notificação e alertas;
	error_reporting(1);
		//verificar se clicou em entrar para autenticar;
		if ($_POST != NULL) {
			// Conecta ao BD
			// $conexao = new mysqli( "localhost", "id2569928_admin", "admin", "id2569928_gest2017" );
     $conexao = new mysqli( "localhost", "u226274981_dbleo", "leo666", "u226274981_dbleo" );  
			// Erro na conexão?
				if ( $conexao->connect_error == true ) {
					echo "Erro ao Conectar! Erro: ";
			}
			//pega as informações submetidas no formulário;
			$login = $_POST["login"];
			$senha = $_POST["senha"];
			//comando para criptografar a senha;
			$senha = md5($senha);
			// Cria comando SQL sem executa-lo
			$sql = "SELECT * 
					FROM usuario
					WHERE login = '$login'
					and senha = '$senha' ";
			//echo $sql; //opção para identificar erros (se acrescentar o exit; interrompe o código php );
			// agora executa o comando do banco e apos ele retorna um vetor(conjunto de dados em caso de uso de um select);
			$retorno = $conexao->query( $sql );
			
			//testar se não teve erro de retorno
			if ( $retorno == false ) {
				echo $conexao->error; exit;
			} 
			//verificando se encontrou algum registro no banco de dados;
			if ( $registro = $retorno->fetch_array() ){
				//cria variáveis 
				$_SESSION["logado"] = "ok";
				$_SESSION["id_usuario"] = $registro["id"];				
				//redirecionamento 
				header("location: main.php");
			} else { 
				//não conseguiu encontrar informações 
					echo "<script> 
						alert('Usuário e/ou senha Invalidos');
						location.href='index.php';
						</script>";
			}
		}
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<title> - PREVCOLO - </title>
		<meta charset="UTF-8">
	</head>
	<body>

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css\style.css">
<form method="POST">
<div class="logo"></div>
<div class="login-block">
  <h1>Acesso</h1>
  <input type="text" id="username" placeholder="Insira seu Login" name="login" required /> 
  <input type="password" id="password" placeholder="Insira sua senha" name="senha" required />
  <button type="submit">Entrar</button>

</div>
</form>
</body>
</html>