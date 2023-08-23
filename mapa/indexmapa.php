
<?php
require('../conecta.php');
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title></title>  
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
<?php require('menu.php');?>
<div class="modal fade" id="login1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Realizar Registro</h4>
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
	<div class="modal fade" id="geo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<h4 class="modal-title text-center">LOCALIZAÇÃO DE PONTO INICIAL E FINAL</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">LOCALIZAÇÃO DE PONTO INICIAL E FINAL </a></li>
				
				</ul> -->
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" action='indexmapa1.php' method='Post' class="form-horizontal">


<script>
var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="O seu navegador não suporta Geolocalização.";}
  }
function showPosition(position)
  {
  x.innerHTML="Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude; 
  }
</script>


<div class="form-group">
                  <label for="">Ponto Inicial</code></label>
                  <select class="custom-select rounded-0"  name='inicio' id="">
<option  value="">~Escolhe a Opcao~</option>
<option  value="R">Ponto Inicial</option>


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
										Localizar
									</button>
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
	<!-- End header -->
	

	<div id="domain" class="section wb">
        <div class="container">
            <div class="row text-center justify-content-md-center my-auto">

                <div class="col-lg-6">
                    <form class="checkdomain form-inline" action='indexmapa1.php'>
                        <div class="checkdomain-wrapper">
                            <div class="form-group">
                                <a href="#" data-toggle="modal" data-target="#geo" class="btn btn-primary grd1">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
  <path strokeLinecap="round" strokeLinejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
</svg>

								</a>
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


	
	<?php //require('./flooter.php');?>
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