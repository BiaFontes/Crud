<?php
	
	function my_autoloader($class_name) {
		include 'classes/' . $class_name . '.php';
	}
	
	spl_autoload_register('my_autoloader');
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
	<script src="js/jQuery.js"></script>
	<script src="js/bootstrap.js"></script>

</body>
<?php

	
		$usuario = new Usuarios();

		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];

			$usuario->setNome($nome);
			$usuario->setEmail($email);
			$usuario->setSenha($senha);

			# Insert
			if($usuario->insert()){
				echo "Successfully inserted!";
			}

		endif;

		?>
        <?php 
		if(isset($_POST['atualizar'])):

			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];

			$usuario->setNome($nome);
			$usuario->setEmail($email);
			$usuario->setSenha($senha);

			if($usuario->update($id)){
				echo "Successfully updated!";
			}

		endif;
		?>
        <?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($usuario->delete($id)){
				echo "Successfully deleted!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $usuario->find($id);
		?>
        <form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Name:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="email" value="<?php echo $resultado->email; ?>" placeholder="E-mail:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-ok"></i></span>
				<input type="text" name="senha" value="<?php echo $resultado->senha; ?>" placeholder="Password:" />
			</div>
			<input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
			<br />
			<input type="submit" name="atualizar" class="btn btn-primary" value="Update">					
		</form>

		<?php }else{ ?>


		<form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" name="nome" placeholder="Name:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="text" name="email" placeholder="E-mail:" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-ok"></i></span>
				<input type="text" name="senha" placeholder="Password:" />
			</div>
			<br />
			<input type="submit" name="cadastrar" class="btn btn-primary" value="Register">					
		</form>

		<?php } ?>

        

		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Name:</th>
					<th>E-mail:</th>
					<th>Password:</th>
					<th>Actions:</th>
				</tr>
			</thead>
			
			<?php foreach($usuario->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->id; ?></td>
					<td><?php echo $value->nome; ?></td>
					<td><?php echo $value->email; ?></td>
					<td><?php echo $value->senha; ?></td>
					<td>
						<?php echo "<a href='usuarios.php?acao=editar&id=" . $value->id . "'>Edit</a>"; ?>
						<?php echo "<a href='usuarios.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Do you really want to delete?\")'>Delete</a>"; ?>
					</td>
				</tr>
			</tbody>

			<?php endforeach; ?>

		</table>

