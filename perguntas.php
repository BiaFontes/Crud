<?php

function my_autoloader($class_name)
{
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
	<meta name="author" content="Beatriz e Mikely" />
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


$perguntas = new Perguntas();

if (isset($_POST['cadastrar'])) :

	$questao  = $_POST['questao'];
	$alternativa1 = $_POST['alternativa1'];
	$alternativa2 = $_POST['alternativa2'];
	$alternativa3 = $_POST['alternativa3'];
	$alternativa4 = $_POST['alternativa4'];
	$correta = $_POST['correta'];

	$perguntas->setQuestao($questao);
	$perguntas->setAlternativa1($alternativa1);
	$perguntas->setAlternativa2($alternativa2);
	$perguntas->setAlternativa3($alternativa3);
	$perguntas->setAlternativa4($alternativa4);
	$perguntas->setCorreta($correta);

	# Insert
	if ($perguntas->insert()) {
		echo "Successfully inserted!";
	}

endif;

?>
<?php
if (isset($_POST['atualizar'])) :

	$id_perg = $_POST['id_perg'];
	$questao = $_POST['questao'];
	$alternativa1 = $_POST['alternativa1'];
	$alternativa2 = $_POST['alternativa2'];
	$alternativa3 = $_POST['alternativa3'];
	$alternativa4 = $_POST['alternativa4'];
	$correta = $_POST['correta'];

	$perguntas->setQuestao($questao);
	$perguntas->setAlternativa1($alternativa1);
	$perguntas->setAlternativa2($alternativa2);
	$perguntas->setAlternativa3($alternativa3);
	$perguntas->setAlternativa4($alternativa4);
	$perguntas->setCorreta($correta);

	if ($perguntas->update($id_perg)) {
		echo "Successfully updated!";
	}

endif;
?>
<?php
if (isset($_GET['acao']) && $_GET['acao'] == 'deletar') :

	$id_perg = (int)$_GET['id_perg'];
	if ($perguntas->delete($id_perg)) {
		echo "Successfully deleted!";
	}

endif;
?>

<?php
if (isset($_GET['acao']) && $_GET['acao'] == 'editar') {

	$id_perg = (int)$_GET['id_perg'];
	$resultado = $perguntas->find($id_perg);
?>
	<form method="post" action="">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-search"></i></span>
			<input type="text" name="questao" value="<?php echo $resultado->questao; ?>" placeholder="Question:" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-play"></i></span>
			<input type="text" name="alternativa1" value="<?php echo $resultado->alternativa1; ?>" placeholder="Alternative 1:" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-play"></i></span>
			<input type="text" name="alternativa2" value="<?php echo $resultado->alternativa2; ?>" placeholder="Alternative 2:" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-play"></i></span>
			<input type="text" name="alternativa3" value="<?php echo $resultado->alternativa3; ?>" placeholder="Alternative 3:" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-play"></i></span>
			<input type="text" name="alternativa4" value="<?php echo $resultado->alternativa4; ?>" placeholder="Alternative 4:" />
		</div>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-ok"></i></span>
			<input type="text" name="correta" value="<?php echo $resultado->correta; ?>" placeholder="Correct:" />
		</div>
		<input type="hidden" name="id_perg" value="<?php echo $resultado->id_perg; ?>">
		<br />
		<input type="submit" name="atualizar" class="btn btn-primary" value="Update">
	</form>

<?php } else { ?>


	<form method="post" action="">
		<p>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-search"></i></span>
			<input type="text" name="questao" placeholder="Question:" />
		</div>
		</p>
		<p>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-play"></i></span>
			<input type="text" name="alternativa1" placeholder="Alternative 1:" />
		</div>
		</p>
		<p>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-play"></i></span>
			<input type="text" name="alternativa2" placeholder="Alternative 2:" />
		</div>
		</p>
		<p>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-play"></i></span>
			<input type="text" name="alternativa3" placeholder="Alternative 3:" />
		</div>
		</p>
		<p>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-play"></i></span>
			<input type="text" name="alternativa4" placeholder="Alternative 4:" />
		</div>
		</p>
		<p>

		<div class="input-prepend">
			<span class="add-on"><i class="icon-ok"></i></span>
			<input type="text" name="correta" placeholder="Correct:" />
		</div>
		</p>
		
		<br />
		<input type="submit" name="cadastrar" class="btn btn-primary" value="Register">
	</form>

<?php } ?>



<table class="table table-hover">

	<thead>
		<tr>
			<th>#</th>
			<th>Question:</th>
			<th>Alternative 1:</th>
			<th>Alternative 2:</th>
			<th>Alternative 3:</th>
			<th>Alternative 4:</th>
			<th>Correct:</th>
			<th>Actions:</th>
		</tr>
	</thead>

	<?php foreach ($perguntas->findAll() as $key => $value) : ?>

		<tbody>
			<tr>
				<td><?php echo $value->id_perg; ?></td>
				<td><?php echo $value->questao; ?></td>
				<td><?php echo $value->alternativa1; ?></td>
				<td><?php echo $value->alternativa2; ?></td>
				<td><?php echo $value->alternativa3; ?></td>
				<td><?php echo $value->alternativa4; ?></td>
				<td><?php echo $value->correta; ?></td>
				<td>
					<?php echo "<a href='perguntas.php?acao=editar&id_perg=" . $value->id_perg . "'>Edit</a>"; ?>
					<?php echo "<a href='perguntas.php?acao=deletar&id_perg=" . $value->id_perg . "' onclick='return confirm(\"Do you really want to delete?\")'>Delete</a>"; ?>
				</td>
			</tr>
		</tbody>

	<?php endforeach; ?>

</table>