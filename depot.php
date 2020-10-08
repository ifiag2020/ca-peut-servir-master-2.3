<?php
session_start();
if (!isset($_SESSION["session_login"])) {
	
     echo "<script type='text/javascript'>window.location = 'index.php';</script>";
 } 
  spl_autoload_register(function($class){
	include("models/".strtolower($class).".class.php");
 });
 
$nom=$_SESSION["session_login"];
Idao::connect();
$all = Idao::findid($nom,$nom);
	if($all){
		$id= $all->id_user;
	}
$profile = Idao::findidProfil($nom,$nom);	
	if($profile){
		$id_profile= $profile->id_profile;	
  }
  
$categorie = Idao::allcat();

$action = "store";
if (isset($_GET['id']) && !empty($_GET['id'])) {
   $action = "update";
   $produit = Produit::find($_GET['id']);
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
          <div class="phone">Bonjour : <?php echo($_SESSION["session_login"]) ?></div>
        </div>       
		<div class="col-md-4 col-sm-6 d-flex justify-content-end">
          <div class="phone">telephone : +212 666 666 666</div>
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
			<?php if (isset($_SESSION["session_login"])) { ?>
	
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
                <?php echo((strtoupper($_SESSION["session_login"]))) ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<?php if($id_profile=="2"){ echo '<a class="dropdown-item" href="profile.php">Modifier Profile</a>'; ?>					
				<?php }else if($id_profile=="3"){ echo '<a class="dropdown-item" href="profile_pro.php">Modifier Profile</a>'?>	
				<?php } ?>
				<?php if($id_profile=="2"){ echo '<a class="dropdown-item" href=""commande.php">Mes commandes</a>'; } ?>
				<?php if($id_profile=="2"){ echo '<a class="dropdown-item" href="panier.php">Panier<span style="margin-left: 10px"><i class="fa fa-shopping-cart"></i></span></a>'; } ?>
				<?php if($id_profile=="2"){ echo '<a class="dropdown-item" href="favoris.php">Favoris<span style="margin-left: 10px"><i class="fa fa-heart"></i></span></a>'; } ?>
				<a class="dropdown-item" href="logout.php">Déconnexion</a> 
              </div>
            </div>
            <!-- //  -->
<?php } ?>

            <!-- //  -->


            <!-- if session open show  -->
            <div class="dropdown" style="display: none">
              <button
                class="btn btn-secondary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                {Nom d'utilisateur}
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="panier.php"
                  >Panier<span style="margin-left: 10px; text-align: right"
                    ><i class="fa fa-shopping-cart"></i></span
                  ><span
                    style="
                      border-radius: 50%;
                      background-color: #009a8f;
                      color: #fff;
                      margin-left: 15px;
                      padding: 2px;
                    "
                    >+1</span
                  ></a
                >
                <a class="dropdown-item" href="favoris.php"
                  >Favoris<span style="margin-left: 10px"
                    ><i class="fa fa-heart"></i></span
                ></a>
              </div>
            </div>
            <!-- //  -->
          </div>
        </div>
      </nav>
    </header>
<?php if (isset($_GET['rep']) && $_GET['rep'] == "1") { ?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
		<style type="text/css">
		#overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: #000;
		filter:alpha(opacity=70);
		-moz-opacity:0.7;
		-khtml-opacity: 0.7;
		opacity: 0.7;
		z-index: 100;
		display: none;
		}
		.cnt223 a{
		text-decoration: none;
		}
		.popup{
		width: 100%;
		margin: 0 auto;
		display: none;
		position: fixed;
		z-index: 101;
		}
		.cnt223{
		min-width: 600px;
		width: 600px;
		min-height: 150px;
		margin: 100px auto;
		background: #f3f3f3;
		position: relative;
		z-index: 103;
		padding: 15px 35px;
		border-radius: 5px;
		box-shadow: 0 2px 5px #000;
		}
		.cnt223 p{
		clear: both;
			color: #555555;
			/* text-align: justify; */
			font-size: 20px;
			font-family: sans-serif;
		}
		.cnt223 p a{
		color: #d91900;
		font-weight: bold;
		}
		.cnt223 .x{
		float: right;
		height: 35px;
		left: 22px;
		position: relative;
		top: -25px;
		width: 34px;
		}
		.cnt223 .x:hover{
		cursor: pointer;
		}
		</style>
		<script type='text/javascript'>
		$(function(){
		var overlay = $('<div id="overlay"></div>');
		overlay.show();
		overlay.appendTo(document.body);
		$('.popup').show();
		$('.close').click(function(){
		$('.popup').hide();
		overlay.appendTo(document.body).remove();
		return false;
		});


		 

		$('.x').click(function(){
		$('.popup').hide();
		overlay.appendTo(document.body).remove();
		return false;
		});
		});
		</script>
		<div class='popup'>
		<div class='cnt223'>
		<h1>Félicitation</h1>
		<p>
		Votre produit à été ajouté avec succès.
		<br/>
		<br/>
		<a href='' class='close'>Fermer</a>
		</p>
		</div>
		</div>
	  		<?php }else{ ?>
	<div class="">
	</div>
	<?php } ?>

    <!-- Publier repas Start -->
    <section id="P_repas">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-left">Publier un repas</h1>
            <form action="models/produit/controller.php?action=<?= $action ?>" accept="" method="POST" class="shadow border p-3" enctype="multipart/form-data">
              <input type="hidden" name="id_user" value="<?=$id?>"/>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="select">Catégorie repas</label>
				<select id="select" name="id_categorie" class="form-control custom-select form-control-md p-2" type="text"  required name="categorie">
					<?php
						foreach(Idao::allcat() as $cat){
							$selected = $d->id_categorie == $cat->id_categorie ? " selected=''" : "";
							echo '<option value="'.$cat->id_categorie.'"'.$selected.'>'.$cat->libelle.'</option>';
						}
					?>
				</select>
                </div>
                <div class="form-group col-md-6">
                  <label for="libelle">Libellé</label>
                  <input type="text" class="form-control p-2" id="libelle" required name="libelle"/>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="prix">Prix</label>
                  <input
                    type="number"
                    step="0.01"
                    class="form-control p-2"
                    id="prix"
                    name="prix"
                    required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="image">Image</label>
                  <input type="file" class="form-control-file p-2" id="image" required name="image" />
                </div>
              </div>
			  <div class="form-row">
				<div class="form-group col-md-6">
				 <label for="description">Déscription</label>
				  <TEXTAREA name="description" COLS=40 ROWS=2  class="form-control p-4" required value="<?=$description?>"></TEXTAREA>
				</div>
			  </div>
              <div class="form-group">
                <button type="submit" class="btn form-control">PUBLIER</button>
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
                <li><a href="fournisseurs.php">fournisseurs</a>
                <li><a href="repas.php">repas</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 offset-md-1">
            <div class="footer-menu2">
              <ul>
                <!-- if session open do not show  -->
                <li><a href="Connexion_part.php">particulier</a></li>
                <li><a href="connexion_pro.php">professionel</a></li>
                <!-- // -->
                <li><a href="contact.php">contact</a></li>
                <li><a href="#">plan du site</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <div class="footer-social footer-menu2">
              <span>follow us</span>
              <ul>
                <li><a href="partenaires.php">partenaires</a></li>
              </ul>
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
