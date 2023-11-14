<?php
session_start();

$_SESSION['usuarioSenha'];

if (!isset($_SESSION["usuarioSenha"])) {

	header("Location: frm_logar.html");

	exit;
} else {

	?>
	<html>

	<head>
		<title>Perfil Usuário </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/estilo_index.css">
	</head>

	<body>
		<div>
			<?php echo "<span>";
			echo "Seja bem vindo, ";
			echo "</span>";
			echo "<span>";
			echo $_SESSION['usuarioNome'];
			echo "</span>"; ?>
			<br><br>
			<fieldset>
				<legend>Sistema</legend>
				<a href="frm_cadastro_ado.html">Cadastrar adotantes</a><br><br>
				<a href="adotantes_cadastrados.php">Vizualizar adotantes</a><br><br><br>
				<a href="frm_cadastro_usuarios.html">Cadastrar novos usuarios</a><br><br>
				<a href="usuarios_cadastrados.php">Vizualizar usuarios</a><br><br><br>
				<a href="frm_cadastro_equipes.html">Cadastrar Equipes</a><br><br>
				<a href="equipes_cadastradas.php">Vizualizar Equipes</a><br><br><br>
				<a href="termos_aceitos.php">Vizualizar quem aceitou o termo</a><br><br>
			</fieldset>
			<br>
			<form action="sair.php">
				<input type="submit" value="Deslogar" name="deslogar">
			</form>
		</div>
	</body>

	</html>
<?php } ?>