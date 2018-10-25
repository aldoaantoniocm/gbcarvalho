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

if (isset($_POST['btnGravar'])) {
	$usuario = trim($_POST['txtUsuario']);
	$senha = md5(trim($_POST['txtSenha']));
    
    $duplicidade = mysqli_num_rows(mysqli_query($conexao, "SELECT usuario FROM login WHERE ( usuario = '$usuario' )"));
    if ($duplicidade == 0) {
        mysqli_query($conexao, "INSERT INTO login (usuario, Senha) VALUES ('$usuario','$senha')");
        echo "<script> alert('Sua conta foi criada com sucesso!'); </script>";
        header("Location: http://localhost/trabalho/index.php");
    } else {
        echo "<script> alert('Não é permitido este nome de usuário.'); </script>";
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
<body>

<div class="container-conta">
	<h2>Inscreva-se e comece a se surpreender!</h2>
	<form method="POST" action="" id="frmDados" name="frmDados">
		<label for="txtUsuario">Usuário</label>
		<input type="text" name="txtUsuario" id="txtUsuario" value="<?php echo (isset($_POST['txtUsuario'])) ? $_POST['txtUsuario'] : ''; ?>" maxlength="20">
		<label for="txtSenha">Senha</label>
		<input type="text" name="txtSenha" id="txtSenha" value="<?php echo (isset($_POST['txtSenha'])) ? $_POST['txtSenha'] : ''; ?>" maxlength="32">
		<input type="submit" name="btnGravar" id="btnGravar" value="Cadastre-se" class="btnGravar" onclick="return validaCampo();">
	</form>
	<a href="http://localhost/trabalho/index.php" id="link-conta">Já possui conta? então clique aqui.</a>
</div>

</body>
</html>