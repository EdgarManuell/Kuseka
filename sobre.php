<?php require('head.php');?>
<body class="host_version"> 

<?php require('menu.php');
	if(isset($_COOKIE['meuCookie'])) {
		echo '<script>window.location.href = "mapa/indexmapa.php";</script>';}
?>
	
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Customer Login</h4>
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
                        <form role="form" action='validar.php' method='Post' class="form-horizontal">
                        <b style="color:red">(Teste:Visistante(Login:Edgar,Senha:1234) Adminstrador(Login:Edgarteste,Senha:1234))</b>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" id="email1" name='nome' placeholder="Name" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" id="exampleInputPassword1" name='senha' placeholder="Senha..." type="password">
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
                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" placeholder="Name" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" id="email" placeholder="Email" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" id="mobile" placeholder="Mobile" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="form-control" id="password" placeholder="Password" type="password">
                                </div>
                            </div>
                            <div class="row">                           
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-light btn-radius btn-brd grd1">
                                        Save &amp; Continue
                                    </button>
                                    <button type="button" class="btn btn-light btn-radius btn-brd grd1">
                                        Cancel</button>
                                </div>
                            </div>
                        </form>
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
	
	<div class="all-title-box">
		<div class="container text-center">
			<h1 class="text-dark">Sobre Nos</h1>
		</div>
	</div>
	
    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead text-dark">A Fábrica de Software e Automação Tecnológica, é uma iniciativa do Governo Angolano por via do PAPE, com objectivo de dar resposta às Tecnologias Avançadas além de incubar projectos, tem também objectivo que é apoiar a mão de obra Nacional em Inovação Tecnológica.</p>
                </div>
            </div><!-- end title -->				
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

    <?php require('footer.php');?>