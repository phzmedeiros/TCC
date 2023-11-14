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

			<fieldset>
				<legend>Sistema</legend>
				<a href="frm_cadastro_ado.html">Cadastrar adotantes</a><br><br>
				<a href="adotantes_cadastrados.php">Vizualizar adotantes</a><br><br><br>
				<a href="frm_cadastro_usuarios.html">Cadastrar novos usuarios</a><br><br>
				<a href="usuarios_cadastrados.php">Vizualizar usuarios</a><br><br><br>
				<a href="frm_cadastro_equipes.html">Cadastrar Equipes</a><br><br>
				<a href="equipes_cadastradas.php">Vizualizar Equipes</a><br><br><br>
				<a href="frm_adesao.html">FORM ADESAO</a><br><br>
				<a href="frm_desligamento.html">FORM Desligamento</a><br><br>
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
<!-- botão para se adicionar -->
<!-- <form action="sair.php">
	<input type="submit" value="Deslogar" name="deslogar">
</form> -->

<!-- paginas -->
<!-- <a href="frm_cadastro_ado.html">Cadastrar adotantes</a><br><br>
				<a href="adotantes_cadastrados.php">Vizualizar adotantes</a><br><br><br>
				<a href="frm_cadastro_usuarios.html">Cadastrar novos usuarios</a><br><br>
				<a href="usuarios_cadastrados.php">Vizualizar usuarios</a><br><br><br>
				<a href="frm_cadastro_equipes.html">Cadastrar Equipes</a><br><br>
				<a href="equipes_cadastradas.php">Vizualizar Equipes</a><br><br><br>
				<a href="frm_adesao.html">FORM ADESAO</a><br><br>
				<a href="frm_desligamento.html">FORM Desligamento</a><br><br>
				<a href="termos_aceitos.php">Vizualizar quem aceitou o termo</a><br><br> -->