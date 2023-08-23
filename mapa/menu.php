	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">
					<img src="images/kuseka2.png" alt="" width="150"/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="../index.php">Pagina Inicial</a></li> 
						<!-- <li class="nav-item"><a class="nav-link" href="../sobre.php">Sobre Nós</a></li> -->
						<?php
							if(isset($_COOKIE['meuCookie'])) {
								 echo '<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#geo" href="indexmap.php">Localizar Edificio </a></li>';
							}
						 ?>
						<!-- <li class="nav-item"><a class="nav-link" href="../contacto.php">Contacto</a></li> -->
					</ul>
					<ul class="nav navbar-nav navbar-right">

						<?php
							if(isset($_COOKIE['meuCookie'])) {
                                 // Fazer LogOut - O cookie existe
                                 echo '<li><a class="hover-btn-new log" href="#" onclick="apagarCookie()">
                                 		<span> Log out</span>
                                 </a></li>';
                                } 
                                else {
                                 // Fazer LogIn - O cookie não existe
                                	
                                 }
                                 	
                             ?>

                        <script type="text/javascript">
                        	function apagarCookie() {
                        		const valorDoCookie = retornarCookie("meuCookie");
								document.cookie = "meuCookie=valorDoCookie; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
								window.location.href = "../index.php";
}						

						function retornarCookie(nomeDoCookie) {
								  const cookies = document.cookie.split("; ");
								  for (let i = 0; i < cookies.length; i++) {
								    const parts = cookies[i].split("=");
								    if (parts[0] === nomeDoCookie) {
								      return parts[1];
								    }
								  }
								  return null;
								}
                        </script>
                    </ul>
				</div>
			</div>
		</nav>
	</header>


