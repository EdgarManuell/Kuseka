<?php
	/* Database connection settings */
require('../conecta.php');
	$inicio=$_POST['inicio'];
  	$fim=$_POST['fim'];

session_start();
$user1=$_SESSION['UsuarioNome'];
$usuario=$_SESSION['cod_us'];

$Local=$pdo->prepare("SELECT * from tb_edificio  where Endereco='$inicio' || Endereco='$fim'");
$Local->execute();
$linha=$Local->fetch(PDO::FETCH_ASSOC);


if($Local->rowCount()>0)
{

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'location_db';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

 	$coordinates = array();
 	$latitudes = array();
 	$longitudes = array();

$query = "SELECT  `Latitude`, `Longitude` FROM `tb_edificio` where Endereco='$inicio' || Endereco='$fim' ";
	$result = $mysqli->query($query) or die('data selection for google map failed: ' . $mysqli->error);




 	while ($row = mysqli_fetch_array($result)) {

$latitudes[] = $row['Latitude'];
$longitudes[] = $row['Longitude'];
$coordinates[] = 'new google.maps.LatLng(' . $row['Latitude'] .','. $row['Longitude'] .'),';
$lat='Lat:';
$long='Log:';
$inserir=$pdo->prepare("INSERT INTO tb_mensagem (userna,cooordenada,cod_usuario) VALUES(:userna,:cooordenada,:cod_usuario )");
$inserir->bindValue(':userna',$user1);
$inserir->bindValue(':cod_usuario',$usuario);
$inserir->bindValue(':cooordenada',$lat.' '.$row['Latitude'].'-'.$long.' '.$row['Longitude'].' -'.$inicio);
$inserir->execute();

	}



	//remove the comaa ',' from last coordinate
	$lastcount = count($coordinates)-1;
	$coordinates[$lastcount] = trim($coordinates[$lastcount], ",");	
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
	
			<div id="map" style="width: 100%; height: 80vh;"></div>

		<script>
			function initMap() {
			  var mapOptions = {
			    zoom: 18,
			    center: {<?php echo'lat:'. $latitudes[0] .', lng:'. $longitudes[0] ;?>}, //{lat: --- , lng: ....}
			    mapTypeId: google.maps.MapTypeId.SATELITE
			  };

			  var map = new google.maps.Map(document.getElementById('map'),mapOptions);

			  var RouteCoordinates = [
			  	<?php
			  		$i = 0;
					while ($i < count($coordinates)) {
						echo $coordinates[$i];
						$i++;
					}
			  	?>
			  ];

			  var RoutePath = new google.maps.Polyline({
			    path: RouteCoordinates,
			    geodesic: true,
			    strokeColor: '#1100FF',
			    strokeOpacity: 1.0,
			    strokeWeight: 10
			  });

			  mark = 'img/mark.png';
			  flag = 'img/flag.png';

			  startPoint = {<?php echo'lat:'. $latitudes[0] .', lng:'. $longitudes[0] ;?>};
			  endPoint = {<?php echo'lat:'.$latitudes[$lastcount] .', lng:'. $longitudes[$lastcount] ;?>};

			  var marker = new google.maps.Marker({
			  	position: startPoint,
			  	map: map,
			  	icon: mark,
			  	title:"Start point!",
			  	animation: google.maps.Animation.BOUNCE
			  });

			  var marker = new google.maps.Marker({
			  position: endPoint,
			   map: map,
			   icon: flag,
			   title:"End point!",
			   animation: google.maps.Animation.DROP
			});

			  RoutePath.setMap(map);
			}

			google.maps.event.addDomListener(window, 'load', initialize);
    	</script>

    	<!--remenber to put your google map key-->
	    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCK-cmO-ACmpymBebiT7VepKcNBp3ocy1g&callback=initMap"></script>



	
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

<?php
}
else
{
header("Location:../index.php");
}?>