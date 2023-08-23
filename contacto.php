<!DOCTYPE html>
<?php require('head.php');?>
<body class="host_version"> 

	<!-- Modal -->
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
                        <form role="form" action='validar.php' method='Post' class="form-horizontal">
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


    <!-- Start header -->
	<?php require('menu.php');?>
	<!-- End header -->
	
	<div class="all-title-box">
		<div class="container text-center">
			<h1 class="text-dark">Contacto<span class="m_1"></span></h1>
		</div>
	</div>
	
    <div id="support" class="section wb">
        <div class="container-fulid">
            <div class="section-title text-center">
                <h3>Precisas de Ajuda? Estamos  Online!</h3>
            </div><!-- end title -->

          <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <center>  <div class="contact_form">
                        <div id="message"></div>
                        <form id="contactform" class="" action="contact.php" name="contactform" method="post">
                            <fieldset class="row row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Primeiro Nome...">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Ultimo Nome">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Teu email">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Teu Telefone">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Diga-nos mas detalhes."></textarea>
                                </div>
                                <div class="text-center pd">
                                    <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Enviar</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
            </div></center><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
    <?php require('footer.php');?>