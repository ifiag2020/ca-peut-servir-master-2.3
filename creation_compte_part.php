<?php

 spl_autoload_register(function($class){
	include("models/".strtolower($class).".class.php");
 });

Idao::connect();
$action = "store";
if (isset($_GET['id']) && !empty($_GET['id'])) {
   $action = "update";
   $user =  User::find($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Header Start  -->
    <header class="container border-bottom pb-2">
      <div class="row d-flex justify-content-between">
        <div class="col-md-4 col-sm-6">
          <div class="social">
            <a href="#"><img src="images/facebook_icon.png" alt="" /></a>
            <a href="#"><img src="images/Instagram-Icon.png" alt="" /></a>
            <a href="#"><img src="images/Twitter_icon.png" alt="" /></a>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-end">
          <div class="phone">
            telephone : +212 666 666 666
          </div>
        </div>
      </div>
    </header>
    <header class="sticky-top bg-light border-bottom">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand logo-brand" href="index.php"
            ><img src="images/logo-cps.png" alt=""
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse pages"
            id="navbarSupportedContent"
          >
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
                <a class="nav-link" href="#">fournisseurs</a>
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
            <button
              href=""
              style="display: none;"
              class="btn btn-secondary"
              type="button"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Déconnexion
            </button>
            <!-- //  -->

            <!-- if session open hide  -->
            <div class="dropdown">
              <button
                class="btn btn-secondary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Connexion
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="Connexion_part.php"
                  >passer une commande</a
                >
                <a class="dropdown-item" href="connexion_pro.php"
                  >publier une annonce</a
                >
              </div>
            </div>
            <!-- //  -->
          </div>
        </div>
      </nav>
    </header>

    <div class="container" id="lien-page">
      <p>
        <a href="index.php" class="text-decoration-none text-secondary"
          >Accueil</a
        >
        > Connexion particulier
      </p>
    </div>

    <!-- Contact Start  -->
    <section id="title-contact">
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col-md-12">
            <h1>Lorem ipsum dolor sit</h1>
            <p>
              Envoyez-nous votre requête via le formulaire en ligne ci-contre et
              nous vous répondrons sous 2 jours ouvrables.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="connexion_particulier">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-left">Créer un compte</h1>
			
			<!-- Form -->	
            <form action="models/user/controller.php?action=<?= $action ?>&id=<?= $user->id ?>" method="POST">
			<?php
                    if (isset($user)) {
                    ?>
                        <input type="hidden" name="id" value=<?= $user->id ?>>
                    <?php }	 ?>
					
			 <div class="form-row">
                <div class="form-group col-md-6">
                  <input value="<?= (isset($user)) ? $user->prenom : '' ?>" type="text" class="form-control p-4" placeholder="Prénom" required id="prenom" name="prenom" />
                </div>
                <div class="form-group col-md-6">
                  <input value="<?= (isset($user)) ? $user->nom : '' ?>" type="text"  class="form-control p-4" placeholder="Nom"required id="nom" name="nom"/>	  
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input value="<?= (isset($user)) ? $user->email : '' ?>"type="email" class="form-control p-4" placeholder="Adresse e-mail"required id="email" name="email" />
                </div>
                <div class="form-group col-md-6">
                  <input value="<?= (isset($user)) ? $user->pwd : '' ?>" type="password"  class="form-control p-4"placeholder="Mot de passe" required id="pwd" name="pwd"/>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
					<TEXTAREA name="adresse" COLS=40 ROWS=2 placeholder="Votre Adresse" class="form-control p-4" value="<?= (isset($user)) ? $user->adresse : ''?>"></TEXTAREA>
				</div>
                <div class="form-group col-md-6">
                  <input value="<?= (isset($user)) ? $user->telephone : '' ?>" type="tel"class="form-control p-4" placeholder="Téléphone mobile (optionnel)"required id="telephone" name="telephone"/>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check mb-3">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="gridCheck"
                  />
                  <label class="form-check-label" for="gridCheck">
                    J'ai lu et j'accepte les conditions générales de vente
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="gridCheck1"
                  />
                  <label class="form-check-label" for="gridCheck1">
                    Je souhaite recevoir la newsletter de ça peut servir avec
                    mes meilleurs offres
                  </label>
                </div>
              </div>
				<input type="hidden" name="id_profile" id="id_profile" value="2">
              <div class="form-group">
                <button type="submit" class="btn form-control">
                  CREER VOTRE COMPTE
                </button>
              </div>

              <div class="text-center mb-4">Vous possédez déjà un compte ?</div>
              <div class="text-center">
                <a href="connexion_part.php">CONNECTEZ-VOUS</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer Start -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="info-footer">
              <a href="index.php"><img src="images/logo-cps.png" alt="" /></a>
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe
                quisquam tenetur veniam nesciunt error sequi aliquam accusamus
                sit suscipit itaque distinctio, quasi soluta vero alias
                reprehenderit illum impedit provident beatae?
              </p>
              <ul>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">terms and conditions</a></li>
              </ul>
              <span>Copyright © 2020 DIGITALGRID</span>
            </div>
          </div>
          <div class="col-md-2 offset-md-1">
            <div class="footer-menu1">
              <ul>
                <li><a href="about.php">a propos</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="#">fournisseurs</a></li>
                <li><a href="repas.php">repas</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 offset-md-1">
            <div class="footer-menu2">
              <ul>
                <li><a href="#">particulier</a></li>
                <li><a href="#">professionel</a></li>
                <li><a href="#">contact</a></li>
                <li><a href="#">plan du site</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <div class="footer-social">
              <span>follow us</span>
              <a href="#"><img src="images/facebook_icon.png" alt="" /></a>
              <a href="#"><img src="images/Instagram-Icon.png" alt="" /></a>
              <a href="#"><img src="images/Twitter_icon.png" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
