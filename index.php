<?php require('head.php');?>
<body class="host_version"> 

<?php require('menu.php');
	if(isset($_COOKIE['meuCookie'])) {
		echo '<script>window.location.href = "mapa/indexmapa.php";</script>';}
?>
	<!-- End header -->

<div id="body131">
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<!-- <li data-target="#carouselExampleControls" data-slide-to="2"></li> -->
		</ol>
		<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('images/slider-02.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-10 col-sm-10 text-left">
									<div class="big-tagline">
										<h2><strong>Kuseka</strong></h2>
										<p class="lead ml-5"> Geolocalização de edifícios na centralidade de Kilamba </p>
											<a href="#" class="hover-btn-new"><span>Contacte-nos</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="#" class="hover-btn-new"><span>Ler Mais</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider-01.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-10 col-sm-10 text-right">
									<div class="big-tagline">
										<h2><strong>Kuseka </strong>Geolocalização</h2>
										<p class="lead">Centralidade de Kilamba </p>
											<a href="#" class="hover-btn-new"><span>Contacte-nos</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="#" class="hover-btn-new"><span>Ler Mais</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	

		<!-- modal fade-->
		<div class="" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
					<li><a href="#Registration" data-toggle="tab">Registrar</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" action='validar.php' method='Post' class="form-horizontal">
						<b style="color:red"></b>
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
									</button><br>
									<a class="for-pwd" href="javascript:;">Forgot your password?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" id='formregistardados' action='./cadatrar.php' method='Post'>
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
									<button type="submit" id='EnviarDados' class="btn btn-light btn-radius btn-brd grd1">
										Cadastrar-se
									</button>
								</div>
							</div>
						</form>
<script type="text/javascript">
	$('#EnviarDados').click(function(){
		var form = new FormData($('#formregistardados')[0]);
		$.ajax({
			url:'cadatrar.php',
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
</div>

	<?php require('footer.php');?>