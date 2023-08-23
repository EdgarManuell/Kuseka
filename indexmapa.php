<?php
require('conecta.php');

if(isset($_POST['inicio'])){
	$inicio=$_POST['inicio'];
	$fim=$_POST['fim'];

	$Local=$pdo->prepare("SELECT * from tb_edificio  where Endereco='$inicio' || Endereco='$fim'");
	$Local->execute();

	if($Local->rowCount()>0){
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'location_db';
		$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

		$coordinates = array();
		$latitudes = array();
		$longitudes = array();

		$query = "SELECT  `Latitude`, `Longitude` FROM `tb_edificio` where Endereco='$inicio' ";
		$result = $mysqli->query($query) or die('data selection for google map failed: ' . $mysqli->error);

		while ($row = mysqli_fetch_array($result)) {
			$latitudes[] = $row['Latitude'];
			$longitudes[] = $row['Longitude'];
			$coordinates[] = 'new google.maps.LatLng(' . $row['Latitude'] .','. $row['Longitude'] .'),';
	}

	$query = "SELECT  `Latitude`, `Longitude` FROM `tb_edificio` where Endereco='$fim' ";
	$result = $mysqli->query($query) or die('data selection for google map failed: ' . $mysqli->error);

	while ($row = mysqli_fetch_array($result)) {
		$latitudes1[] = $row['Latitude'];
		$longitudes1[] = $row['Longitude'];
		$coordinates1[] = 'new google.maps.LatLng(' . $row['Latitude'] .','. $row['Longitude'] .'),';
	}

	//remove the comaa ',' from last coordinate
	$lastcount = count($coordinates)-1;
	$coordinates[$lastcount] = trim($coordinates[$lastcount], ",");	

	}
	}else{
			$latitudes[0]= -8.98684;
			$latitudes1[0]= -9.00784;
			$longitudes[0]= 13.24260;
			$longitudes1[0]= 13.29160;
	}
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Kuseka</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="js/modernizer.js"></script>
  <!-- Theme style -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



	<!-- Posição Atual
<script>
	function getLocation(){
        navigator.geolocation.getCurrentPosition(
          function(posicao) {
            var latitude = posicao.coords.latitude;
            var longitude = posicao.coords.longitude;
            alert('Latitude: ' + latitude + '\nLongitude: ' + longitude);
          },
          function(erro) {
            alert('Erro ao obter a posição atual: ' + erro.message);
          },{
			  key: 'AIzaSyCQxWCemJpiYz1AVC7zR1Emd8VRA4JnA3o'
		  }
        );
      }

</script>-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQxWCemJpiYz1AVC7zR1Emd8VRA4JnA3o"></script>
    <script>
        function initMap() {
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
			var startPHP = {lat:<?php echo $latitudes[0] ?>, lng:<?php echo $longitudes[0]?>}
			var endPHP = {lat: <?php echo $latitudes1[0] ?>, lng:<?php echo $longitudes1[0]?>}
			
			var map = new google.maps.Map(document.getElementById('map'), {
               
			restriction: { // Define a restrição geográfica ao bairro desejado
            latLngBounds: {
              north: -8.98684, // Latitude máxima permitida
              south: -9.00784, // Latitude mínima permitida
              west: 13.24260, // Longitude mínima permitida
              east: 13.29160 // Longitude máxima permitida
            },
            strictBounds: false // Habilita a restrição estrita, que impede que o usuário arraste o mapa para fora da área restrita
          }
			});

            directionsRenderer.setMap(map);
            var start = new google.maps.LatLng(startPHP.lat,startPHP.lng);
            var end = new google.maps.LatLng(endPHP.lat,endPHP.lng); // substituir por coordenadas reais de partida e destino
            
			var request = {
                origin: start,
                destination: end,
                travelMode: 'DRIVING' // pode ser DRIVING, WALKING, BICYCLING ou TRANSIT
            };
            
			
			directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    directionsRenderer.setDirections(result);
                }
            });
        }
    </script>



</head>
<body class="host_version"  onload="initMap()" style="background-color:grey;"> 
<!-- COD 1 REMOVIDO -->

	<!-- Modal Localizar Pontos-->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
	  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header tit-up">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body customer-box">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
						<li><a class="active" href="#Login" data-toggle="tab">LOCALIZAÇÃO DE PONTO INICIAL E FINAL</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="Login">
							<form role="form" action='indexmapa.php' method='Post' class="form-horizontal">
								<!-- Buscando Pontos na BD (PONTO INICIAL)-->
								<div class="form-group">
								    <label for="">Ponto Inicial</code></label>
								    <select class="custom-select rounded-0"  name='inicio' id="">
										<option value="">~Escolhe a Opcao~</option>
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

								<!-- (PONTO FINAL)-->
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

			 					<!-- Butao Localizar -->
								<div class="row">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
											Localizar
										</button>
									</div>
								</div>
							</form>
						</div>
		
								<!-- COD 2 REMOVIDO -->
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
	
	<div id="map"></div>


	<div id="" class="" style="background-color:grey;">
        <div class="container" >
            <div class="row text-center">
                <div class="col-lg-7" >
                    <form class="checkdomain form-inline" action='indexmapa.php' style="background-color:grey;">
                        <div class="checkdomain-wrapper">
                            <div class="form-group">
                                <a href="#" data-toggle="modal" data-target="#login" class="btn btn-primary grd1"><i class="fa fa-map"></i></a>
                            	<b><center> Click para introduzir a localização dos Pontos</center></b>
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
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
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