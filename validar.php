<?php
require('conecta.php');
 session_start();
date_default_timezone_set('Africa/Luanda');
$data_p=date ("Y-m-d");
$datatime=date ("d-m-Y h:i");

$saida='';
$login = (isset($_POST['nome'])) ? $_POST['nome'] : '';
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
$centralidade=$pdo->prepare("SELECT * FROM `tb_usuario` INNER JOIN tb_nivel_acesso on tb_usuario.cod_nivel=tb_nivel_acesso.Cod_Nivel  where Login=:log and Senha=:senha and tb_usuario.status=0");
$centralidade->bindValue(':log', $login);
$centralidade->bindValue(':senha', $senha);
$centralidade->execute();

$linha=$centralidade->fetch(PDO::FETCH_ASSOC);

if(empty($linha)){
	echo"<script>alert(`Usuario ou senha invalidos`);</script>";

	$_SESSION['LoginErro']="usuario ou senha errado";
	header("Location:index.php");
}
else{
	$_SESSION['cod_us']=$linha['cod_usuario'];
	$_SESSION['Usuarioid']=$linha['cod_nivel'];
	$_SESSION['UsuarioNome']=$linha['Login'];
	$_SESSION['nivel']=$linha['Nivel'];

if($_SESSION['Usuarioid']==1) header("Location:../sistema_edgar/");

else if($_SESSION['Usuarioid']==2 )
	header("Location:../sistema_edgar/");

else if($_SESSION['Usuarioid']==3 ){
	header("Location:./mapa/indexmapa.php");

// Cria o cookie
$nomeCookie = "meuCookie";
$valorCookie = $linha['cod_usuario'];

// Define a data de expiração do cookie (1 hora a partir de agora)
$dataExpiracao = time() + (1 * 60 * 60);

// Cria o cookie
setcookie($nomeCookie, $valorCookie, $dataExpiracao, "/");

// Exibe uma mensagem informando que o cookie foi criado
echo "O cookie foi criado com sucesso!";

}
}

?>
