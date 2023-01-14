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

	
		$disciplinas = new Disciplinas();

		if(isset($_POST['cadastrar'])):

			$nome_disc  = $_POST['nome_disc'];

			$disciplinas->setNome_disc($nome_disc);

			# Insert
			if($disciplinas->insert()){
				echo "Successfully inserted!";
			}

		endif;

		?>
        <?php 
		if(isset($_POST['atualizar'])):

			$id_disc = $_POST['id_disc'];
			$nome_disc = $_POST['nome_disc'];

			$disciplinas->setNome_disc($nome_disc);

			if($disciplinas->update($id_disc)){
				echo "Successfully updated!";
			}

		endif;
		?>
        <?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id_disc = (int)$_GET['id_disc'];
			if($disciplinas->delete($id_disc)){
				echo "Successfully deleted!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id_disc = (int)$_GET['id_disc'];
			$resultado = $disciplinas->find($id_disc);
		?>
        <form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-book"></i></span>
				<input type="text" name="nome_disc" value="<?php echo $resultado->nome_disc; ?>" placeholder="School subject name:" />
			</div>
			<input type="hidden" name="id_disc" value="<?php echo $resultado->id_disc; ?>">
			<br />
			<input type="submit" name="atualizar" class="btn btn-primary" value="Update">					
		</form>

		<?php }else{ ?>


		<form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-book"></i></span>
				<input type="text" name="nome_disc" placeholder="School subject name:" />
			</div>
			<br />
			<input type="submit" name="cadastrar" class="btn btn-primary" value="Register">					
		</form>

		<?php } ?>

        

		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>#</th>
					<th>School subject name:</th>
					<th>Actions:</th>
				</tr>
			</thead>
			
			<?php foreach($disciplinas->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->id_disc; ?></td>
					<td><?php echo $value->nome_disc; ?></td>
					<td>
						<?php echo "<a href='disciplinas.php?acao=editar&id_disc=" . $value->id_disc . "'>Edit</a>"; ?>
						<?php echo "<a href='disciplinas.php?acao=deletar&id_disc=" . $value->id_disc . "' onclick='return confirm(\"Do you really want to delete?\")'>Delete</a>"; ?>
					</td>
				</tr>
			</tbody>

			<?php endforeach; ?>

		</table>

