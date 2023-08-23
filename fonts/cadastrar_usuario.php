<?php
require('../biblioteca/conecta.php');

$login=$_POST['login'];
$senha=$_POST['senha'];

if($login=='' || $senha=='')
{

	if($login=='')
		echo "Por Favor Preenche o Campo Nome ou login ";
	else
		if($senha=='')
			echo "Preenche o Campo Senha";
}
else
{


$centralidade=$pdo->prepare("SELECT * FROM `tb_usuario` INNER JOIN tb_nivel_acesso ON tb_usuario.cod_nivel=tb_nivel_acesso.Cod_Nivel  WHERE Login=:log AND Senha=:senha ");
$centralidade->bindValue(':log', $login);
$centralidade->bindValue(':senha', $senha);
$centralidade->execute();

if($centralidade->rowCount()>0)
{
	echo "O usuario ja esta registado";
}
else
{
$inserir=$pdo->prepare("INSERT INTO tb_usuario(Nome,Senha,cod_nivel) VALUES(:Nome,:Senha,:cod_nivel)");
$inserir->bindValue(':Nome',$login);
$inserir->bindValue(':Senha',$senha);
$inserir->bindValue(':cod_nivel',3);
$inserir->execute();
if ($inserir->rowCount()>0) {
  //echo ("Livro registrada com Sucesso.");

	echo "Conta Criada com Sucesso";


}}
}
?>
