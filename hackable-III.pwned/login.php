<?php
include('config.php');

$usuario = $_POST['user'];
$senha = $_POST['pass'];

$query = " SELECT * FROM usuarios WHERE user = '{$usuario}' and pass = '{$senha}'";  

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);


#validaÃ§Ã£o conta
if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: 3.jpg');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: login_page/login.html');
	exit();
}


?>
