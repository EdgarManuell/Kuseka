<?php

require('conecta.php');

$login=(isset($_POST['login'])) ? $_POST['login'] : '';
$senha=(isset($_POST['senha'])) ? $_POST['senha'] : '';
$email=(isset($_POST['email'])) ? $_POST['email'] : '';
$nivel=3;

$patentes=$pdo->prepare("SELECT * from tb_usuario where Login=:log and Senha=:senha");
$patentes->bindValue(':log', $login);
$patentes->bindValue(':senha', $senha);
$patentes->execute();


if($patentes->rowCount()>0)
{
	echo "Por Favor tente Novamente o cadastramento";
}
else
{


$inserir=$pdo->prepare("INSERT INTO tb_usuario (Login,Senha,cod_nivel,Email) VALUES(:Login,:Senha,:cod_nivel,:Email)");
$inserir->bindValue(':Email',$email);
$inserir->bindValue(':Login',$login);
$inserir->bindValue(':Senha',$senha);
$inserir->bindValue(':cod_nivel',$nivel);
$inserir->execute();

if($inserir->rowCount()>0)
{
echo "Visitante Cadastrado com Sucesso";  
header("Location:index.php");
}

}

?>