<?php
session_start();

if (!isset($_SESSION["session_login"]) && !empty($_SESSION["session_login"])) {	
    echo "<script type='text/javascript'>window.location = 'index.php';</script>";
 } 
    spl_autoload_register(function($class){
	include("models/".strtolower($class).".class.php");
 });
 
 if ( !empty($_SESSION["session_login"])) {
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
} 

Idao::connect();
$id_cart = $_SESSION["id_cart"];
$id_user = $_SESSION["id_user"];

if($id_cart != ""){
	Idao::storecommande($id_cart);
	 echo "<script type='text/javascript'>window.location = 'commande_liste.php';</script>";
}
$commande=Idao::listecommande($id_user);
include 'header.php';

 ?>
<script src="js/jquery-3.3.1.min.js"></script> 	
<script>
number_format = function (number, decimals, dec_point, thousands_sep) {
	number = number.toFixed(decimals);
	var nstr = number.toString();
	nstr += '';
	x = nstr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? dec_point + x[1] : '';
	var rgx = /(\d+)(\d{3})/;

	while (rgx.test(x1))
		x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');

	return x1 + x2;
}

function cartItemCount(){
	var sum = 0;
	$('.cartItemPrice').each(function(){
		sum += 1;
	});
	$('#cartItemCount').html(sum + "  produit(s)");
}

function updateCartSumPrice(){
	var sum = 0;
	$('.cartItemPrice').each(function(){
		sum += parseFloat($(this).val());
	});
	$('#cartSumVal').html(number_format(sum, 2, ',', ' '));
}

$(document).ready(function(){
	cartItemCount();
});
</script>
    <div class="container" id="lien-page">
      <p>
        <a href="index.php" class="text-decoration-none text-secondary"
          >Accueil</a
        >
        > Commande
      </p>
    </div>
    <div id="panier">
      <div class="container">
        <!-- Le nombre d'articles qu'il y'a au panier  -->
        <h1>Commande * <span id="cartItemCount"></span> *</h1>
		
		<?php foreach($commande as $co) :?> 
        
		   <section id="menu">
      <div class="container">
        <div class="commande">
          <div class="row">
            <div class="col-md-3">
              <img src="images/menu/pizza.png" alt="pizza" />
            </div>
            <div class="col-md-8 infos">
              <h1> </h1>

              <!-- onclick s'ajoute aux favoris  -->
              <a
                class="btn btn-custom btn-sm liketoggle d-flex justify-content-end"
                id="wishlist"
                name="like"
                ><i class="fa fa-heart"></i
              ></a>
              <!-- //  -->
              <h2>Référence:<?php echo $co->ref_commande; ?></h2>
              <hr />
              <span class="prix">Montant ht:<?php echo $co->montant_ht; ?> Dhs</span>
              <span class="prix">Montant ht:<?php echo $co->montant_ttc; ?> Dhs</span>
              <!-- Message indicateur de préparation de commande en cours -->
              <h3>Votre commande est en cours de préparation !</h3>
              <!-- Message indicateur qu'il n'y a aucune commande en cours -->
              <h3 style="text-align: center; display: none;">
                Vous n'avez effectué aucune commande pour l'instant !
              </h3>
            </div>
          </div>
        </div>
      </div>
    </section>
		
		
		
		<?php endforeach; ?>
		</div>
    </div>
<?php include 'footer.php';?>