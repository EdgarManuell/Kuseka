<?php
require('../biblioteca/conecta.php');
 session_start();
date_default_timezone_set('Africa/Luanda');
$data_p=date ("Y-m-d");
$datatime=date ("d-m-Y h:i");


$saida='';
$login = (isset($_POST['nome'])) ? $_POST['nome'] : '';
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
$patentes=$pdo->prepare("SELECT * from tb_usuario where Nome=:log and Senha=:senha and status=0");
$patentes->bindValue(':log', $login);
$patentes->bindValue(':senha', $senha);
$patentes->execute();

$linha=$patentes->fetch(PDO::FETCH_ASSOC);

if(empty($linha) ){



	$_SESSION['LoginErro']="usuario ou senha errado";
header("Location:index.php");

}
else
{
$_SESSION['cod_us']=$linha['cod_usuario'];
$_SESSION['Usuarioid']=$linha['cod_nivel'];
$_SESSION['UsuarioNome']=$linha['Nome'];
$_SESSION['Usuariologin']=$linha['Senha'];
//$_SESSION['cod_pessoa']=$linha['cod_pessoa'];
//$_SESSION['Usuariocod_patente']=$linha['cod_patente'];	
//$_SESSION['reparticao']=$linha['cod_reparticao'];

$cod=$_SESSION['cod_us'];


$Local12=$pdo->prepare("SELECT tb_u_e_o.cod_u_e_o, tb_pessoa.cod_pessoa , tb_emprestimo_externo.Quant_Emp, tb_emprestimo_externo.Data_Devolucao, tb_emprestimo_externo.cod_emprestimo_externo, tb_emprestimo_externo.Estado, tb_pessoa.Numero_BI, tb_tipo_leitor.Nome_Tipo_Leitor, tb_editora.Designacao_Editora, tb_emprestimo_externo.Quant_Emp, tb_pessoa.cod_pessoa, tb_u_e_o.Designacao_U_E_O, tb_livro.cod_livro, tb_prateleira.Designacao_Prateleira,tb_emprestimo_externo.Data_Entrega,tb_emprestimo_externo.Data_Devolucao,tb_pessoa.Nome ,tb_livro.Titulo,tb_livro.ISBN,tb_livro.Ano_Publicacao,tb_livro.Quant_Maxima,tb_livro.Cod_Autor,tb_cdu.Designacao_CDU,tb_armario.Armario,tb_coluna.Designacao_Coluna FROM tb_livro INNER JOIN tb_coluna on tb_livro.cod_coluna=tb_coluna.cod_coluna INNER JOIN tb_prateleira on tb_coluna.cod_prateleira=tb_prateleira.cod_prateleira INNER JOIN tb_armario on tb_prateleira.cod_armario=tb_armario.cod_armario INNER JOIN tb_cdu on tb_livro.Cod_Cdu=tb_cdu.cod_cdu INNER JOIN tb_emprestimo_externo on tb_emprestimo_externo.cod_livro=tb_livro.cod_livro INNER JOIN tb_pessoa on tb_emprestimo_externo.cod_pessoa=tb_pessoa.cod_pessoa INNER JOIN tb_u_e_o on tb_emprestimo_externo.Cod_u_e_o=tb_u_e_o.cod_u_e_o INNER JOIN tb_editora on tb_livro.Cod_Editora=tb_editora.cod_editora INNER JOIN tb_tipo_leitor
on tb_pessoa.cod_tipo_leitor=tb_tipo_leitor.cod_tipo_leitor ");
$Local12->execute();

if($Local12->rowCount()>0)
{
while ($linhas12=$Local12->fetch(PDO::FETCH_ASSOC)) 
{
$dt=$linhas12['Data_Devolucao'];
$cod_pessoa=$linhas12['cod_pessoa'];
$cod_u_e_o=$linhas12['cod_u_e_o'];


  $date = $linhas12['Data_Devolucao'];
  $celke_data_inicio = strtotime($date);
  $celke_data_fim = strtotime('+2 day', $celke_data_inicio);
  $r=date('Y-m-d', $celke_data_fim);



//$t= somar_data('dt', 02, 0, 0); /* Imprime 21/06/2012 */;


if($r==$data_p)
{

/*$patentes=$pdo->prepare("SELECT * from tb_sancao where cod_p=:log and cod_u_e_o=:senha and Data=:Data");
$patentes->bindValue(':log',$cod_pessoa);
$patentes->bindValue(':senha',$cod_u_e_o);
$patentes->bindValue(':Data',$data_p);
$patentes->execute();
*/

$tipo='O Leitor Não Pode Fazer Emprestimo';
$inserir=$pdo->prepare("INSERT INTO tb_sansao(cod_p,Tipo_sancao,cod_u_e_o,Data) VALUES(:cod,:Tipo_sancao,:cod_u_e_o,:Data)");
$inserir->bindValue(':cod',$cod_pessoa);
$inserir->bindValue(':Tipo_sancao',$tipo);
$inserir->bindValue(':cod_u_e_o',$cod_u_e_o);
$inserir->bindValue(':Data',$data_p);
$inserir->execute();

if($cod_u_e_o!=100)
{
$modificar1=$pdo->prepare("UPDATE tb_u_e_o   SET 	EstadoUEO=1 where cod_u_e_o=:cod_distribuidora");
$modificar1->bindValue(':cod_distribuidora',$cod_u_e_o);
$modificar1->execute();
}


$modificar1=$pdo->prepare("UPDATE tb_pessoa   SET 	Est=1 where cod_pessoa=:cod_distribuidora");
$modificar1->bindValue(':cod_distribuidora',$cod_pessoa);
$modificar1->execute();


}
}
}

//else
//{
//if($_SESSION['Usuarionivel']==1){
//header("Location:Livro.php");	
//}
if($_SESSION['Usuarioid']==1)

header("Location:../biblioteca/principal.php");
else



if($_SESSION['Usuarioid']==2 )
header("Location:../biblioteca/principal.php");



}

?>
