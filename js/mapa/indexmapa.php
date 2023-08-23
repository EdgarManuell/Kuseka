


<?php
require('../conecta.php');

session_start();
$user=$_SESSION['UsuarioNome'];
$usuario=$_SESSION['cod_us'];
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title><?php echo $usuario;?></title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="../css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <!-- Modernizer for Portfolio -->
        <script type="text/javascript" src="../bootstrap.min.js"></script>
<script type="text/javascript" src="../jquery-3.2.1.min.js"></script>
    <script src="../js/modernizer.js"></script>
  <!-- Theme style -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 

<div class="modal fade" id="login1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Relaizar Registo</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
					<li><a href="#Registration" data-toggle="tab">Registrar</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" action='../validar.php' method='Post' class="form-horizontal">
						<b style="color:red">(Teste:Visistante(Login:Edgar,Senha:1234) Adminstrador(Login:Edgarteste,Senha:1234))</b>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" required id="email1" name='nome' placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" required id="exampleInputPassword1" name='senha' placeholder="Senha..." type="password">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Entrar
									</button>
									<a class="for-pwd" href="javascript:;">Forgot your password?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" id='formregistardados'>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name='login' placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email" name='email' placeholder="Email" type="email">
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name='senha' id="password" placeholder="Password" type="password">
								</div>
							</div>
							<div class="row">							
								<div class="col-sm-10">
									<button type="button" id='EnviarDados' class="btn btn-light btn-radius btn-brd grd1">
										Guardar 
									</button>
									<button type="button" id='EnviarDados' class="btn btn-light btn-radius btn-brd grd1">
										Cancel</button>
								</div>
							</div>
						</form>
<script type="text/javascript">
$('#EnviarDados').click(function(){
var form = new FormData($('#formregistardados')[0]);
$.ajax({
url:'../cadatrar.php',
type: 'post',
dataType:'text',
cache:false,
processData:false,
contentType:false,
data:form,
timeout:8000,
success:function(resultado){
  alert(resultado);
  $("#formregistardados")[0].reset();
}
});});
</script>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>



	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Relaizar Registo</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">LOCALIZAÇÃO DE PONTO INICIAL E FINAL (EDGAR)</a></li>
				
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" action='indexmapa1.php' method='Post' class="form-horizontal">

<div class="form-group">
                  <label for="">Ponto Inicial</code></label>
                  <select class="custom-select rounded-0"  name='inicio' id="">
<option  value="">~Escolhe a Opcao~</option>

      <?php
   $simestre=$pdo->prepare("SELECT * FROM tb_edificio ");
   $simestre->execute();
$sime = $simestre->fetchAll(PDO::FETCH_OBJ);
  foreach ($sime as $P) {
     ?>    
    <option value="<?php echo $P->Endereco ;?>"><?php echo $P->Endereco;?></option>
<?php }?>
                  </select>
 </div>

 <div class="form-group">
 <label for="">Ponto Final</code></label>
 <select class="custom-select rounded-0"  name='fim' id="">
<option  value="">~Escolhe a Opcao~</option>
<?php
   $simestre=$pdo->prepare("SELECT * FROM tb_edificio ");
   $simestre->execute();
$sime = $simestre->fetchAll(PDO::FETCH_OBJ);
  foreach ($sime as $P) {
     ?>    
 <option value="<?php echo $P->Endereco ;?>"><?php echo $P->Endereco;?></option>
<?php }?>
 </select>
 </div>


							<div class="row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Entrar
									</button>
									<a class="for-pwd" href="javascript:;">Forgot your password?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
					
<script type="text/javascript">
$('#EnviarDados').click(function(){
var form = new FormData($('#formregistardados')[0]);
$.ajax({
url:'../cadatrar.php',
type: 'post',
dataType:'text',
cache:false,
processData:false,
contentType:false,
data:form,
timeout:8000,
success:function(resultado){
  alert(resultado);
  $("#formregistardados")[0].reset();
}
});});
</script>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	
	
	<!-- Start header -->
<?php require('menu.php');?>
	<!-- End header -->
	

	<div id="domain" class="section wb">
        <div class="container">
            <div class="row text-center">

                <div class="col-lg-12">
                    <form class="checkdomain form-inline" action='indexmapa1.php'>
                        <div class="checkdomain-wrapper">
                            <div class="form-group">
                                <a href="#" data-toggle="modal" data-target="#login" class="btn btn-primary grd1"><i class="fa fa-map"></i></a>
                            <b><center>Click para introduzir a localização dos Pontos</center></b>
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                        
                         
                        </div><!-- end checkdomain-wrapper -->
                    </form>
                </div>
			
				
                <!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->


	
	<?php require('flooter.php');?>
    <!-- ALL JS FILES -->
    <script src="../js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../js/custom.js"></script>
	<script src="../js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>