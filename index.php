<?php
 $conexao = mysqli_connect("localhost","wadoryu","57641971");
 if (!$conexao){
     echo "Erro ao se conectar ao MySQL <br/>";
     exit;
 }
 $nome_banco = "manutencao";
 $banco = mysqli_select_db($conexao,$nome_banco);
 if (!$banco){
     echo "Erro ao se conectar ao banco manutencao...";
     exit;
 }
session_start();
if (isset($_SESSION['login'])) {	
	$_SESSION['login'] = 'N';
}
if (isset($_POST['btnGravar'])) {
	$usuario = trim($_POST['txtUsuario']);
	$senha = md5(trim($_POST['txtSenha']));
	$sql_select = "SELECT * FROM login WHERE (usuario = '$usuario') AND (Senha = '$senha')";
	$query = mysqli_query($conexao, $sql_select);
	if (mysqli_num_rows($query) > 0)  {
		$_SESSION['login'] = 'S';
		$_SESSION['usuario'] = mysqli_fetch_assoc($query);
		header('Location: conserto.php');
	} else {
		echo "<script> alert('Usuário ou Senha invalido.'); </script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script type="text/javascript" src="js/validacao.js" charset="iso-8859-1"></script>
</head>
<body class="login-body">

<form method="POST" action="" id="frmDados" name="frmDados">
	<fieldset>
		<h1>Bem Vindo</h1>
		<label>Usuário</label>
		<input type="text" name="txtUsuario" id="txtUsuario" value="<?php echo (isset($_POST['txtUsuario'])) ? $_POST['txtUsuario'] : ''; ?>">	
		<label>Senha</label>
		<input type="password" name="txtSenha" id="txtSenha" value="<?php echo (isset($_POST['txtSenha'])) ? $_POST['txtSenha'] : ''; ?>">
		<input type="submit" name="btnGravar" id="btnGravar" value="Entrar" onclick="return validaCampo();">
		<label id="lbl-conta"><a href="http://localhost/trabalho/conta.php">Criar uma conta</a></label>
	</fieldset>
</form>

</body>
</html>