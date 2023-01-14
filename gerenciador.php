<?php
// Inicialize a sessão
session_start();
 
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE HTML>
<html land="pt-BR">
<head>
	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>QUIZ</title>
		<meta name="description" content="QUIZ" />
		<meta name="robots" content="index, follow" />
		<meta name="author" content="Beatriz e Mikely"/>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" />
		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
</head>
<body>

	<div class="container">	
		<header class="masthead">
			<h1 class="muted">Manager</h1>
			<nav class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li class="active"><a href="gerenciador.php">Home Page</a></li>
							<li class="active"><a href="usuarios.php">Users</a></li>
							<li class="active"><a href="perguntas.php">Questions</a></li>
							<li class="active"><a href="disciplinas.php">School Subjects</a></li>
							<a href="logout.php" class="btn btn-danger ml-3">Log out</a>
							<a href="reset-password.php" class="btn btn-warning">Reset your password</a>
						</ul>
					</div>
				</div>
			</nav>
		</header>
	</div>

	
	
	<center><h1 class="my-5">Hello, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! Welcome to our website.</h1></center>
   

	<script src="js/jQuery.js"></script>
	<script src="js/bootstrap.js"></script>

</body>
</html>