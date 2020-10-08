    </header>
    <header class="sticky-top bg-light border-bottom">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand logo-brand" href="index.php"><img src="images/logo-cps.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse pages" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto mx-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="about.php">a propos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="services.php">services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="fournisseurs.php">fournisseurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="repas.php">repas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">contact</a>
                            </li>                        
                        </ul>
                        <div class="line-effect"></div>

        <!-- if session open show  -->
			<?php if (!empty($_SESSION["session_login"])) { ?>
		<!-- if session open hide  -->
            <div class="dropdown">
              <button
                class="btn form-control dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
               <?php echo (strtoupper($_SESSION["session_login"])) ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			  		<?php if($id_profile=="2"){ echo '<a class="dropdown-item" href="profile.php?id='.$id.'">Modifier Profile</a>'?>	
					<?php }else if($id_profile=="3"){ echo '<a class="dropdown-item" href="profile_pro.php?id='.$id.'">Modifier Profile</a>'?>
					<?php } ?>
					<?php if($id_profile=="2"){ echo '<a class="dropdown-item" href="commande_liste.php">Mes commandes</a>'; } ?>
					<?php if($id_profile=="2"){ echo '<a class="dropdown-item" href="panier.php">Panier<span style="margin-left: 10px"><i class="fa fa-shopping-cart"></i></span></a>'; } ?>
					<?php if($id_profile=="2"){ echo '<a class="dropdown-item" href="favoris.php">Favoris<span style="margin-left: 10px"><i class="fa fa-heart"></i></span></a>'; } ?>
					<a class="dropdown-item" href="logout.php">Déconnexion</a> 
				</div>
			</div> 
	<!-- /if session open hide  -->	
				<div style="margin-left: 20px; margin-right: 20px; ">			
					<div class="carousel-info">
						<button  class="btn form-controlbtn btn-secondary" onclick="window.location.href='depot.php'">Déposer une annonce</button>
					</div>
				</div>

				<!-- //  -->
	<?php }else { ?>

                        <!-- if session open hide  -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Connexion
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="Connexion_part.php">passer une commande</a>
                            <a class="dropdown-item" href="connexion_pro.php">publier une annonce</a>
                        <!--     <a class="dropdown-item" href="commande.php">Mes commandes</a>
                            <a class="dropdown-item" href="panier.php">Panier<span style="margin-left: 10px; text-align: right;"><i class="fa fa-shopping-cart"></i></span><span style="border-radius: 50%; background-color: #009a8f; color: #fff; margin-left: 15px; padding: 2px;">+1</span></a>
                            <a class="dropdown-item" href="favoris.php">Favoris<span style="margin-left: 10px"><i class="fa fa-heart"></i></span></a>
                         --> </div>
                        </div>
                        <!-- //  -->
                        <!-- if session open show  -->
                        <div class="dropdown" style="display: none;">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {Nom d'utilisateur}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="panier.php">Panier<span style="margin-left: 10px; text-align: right;"><i class="fa fa-shopping-cart"></i></span><span style="border-radius: 50%; background-color: #009a8f; color: #fff; margin-left: 15px; padding: 2px;">+1</span></a>
                          <a class="dropdown-item" href="favoris.php">Favoris<span style="margin-left: 10px"><i class="fa fa-heart"></i></span></a>
                          </div>
                      </div>
                      <!-- //  -->	
	
	<?php } ?>
                    </div>
            </div>
    </nav>
</header>  