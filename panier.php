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
$cart = Idao::cartElements($_SESSION["id_cart"]);
	
//$depot = Idao::alldetprod($_GET['id_prod']);
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

function updateCartElmQty(id_cart_produit, new_qte){
	req = $.ajax({
		url: "ajax_post.php",
		type: "post",
		data: "id_cart_produit=" + id_cart_produit + "&qte=" + new_qte + "&action=updateCartElmQty"
	});
	req.done(function (response, textStatus, jqXHR) {
		/*var data = JSON.parse(response);
		if(data.rep){
			Swal.fire(
				'Succès',
				data.message,
				'success'
			);
		}else{
			Swal.fire(
				'Erreur',
				data.message,
				'error'
			);
		}*/
	});
	req.fail(function (jqXHR, textStatus, errorThrown) {
		$("#ajax_rep").html(jqXHR.responseText);
	});
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
        > Panier
      </p>
    </div>
    <div id="panier">
      <div class="container">
        <!-- Le nombre d'articles qu'il y'a au panier  -->
        <h1>Panier * <span id="cartItemCount"></span> *</h1>
		
          <!-- Boucle  -->
		<?php 
		$sum_total = 0;
		foreach($cart as $c) :?> 
			<?php
			Idao::$table = "produit";
			$produit = Idao::find($c->id_produit);
			
			Idao::$table = "user";
			$fournisseur = Idao::find($produit->id_user);
			
			$sum_total += $c->qte * $produit->prix;
			?>
        <div class="card-panier">
          <!-- //  -->
          <div class="row">
            <div class="col-md-2">
              <!-- Image de l'article en format small  -->
              <img src="models/produit/<?php echo $produit->image; ?>" alt="" />
            </div>
            <!-- Afficher les informations du vendeur et du produit  -->
            <div class="col-md-3 infos">
              <span>Vendeur : <?php echo $fournisseur->nom; ?></span>
              <h2><?php echo $produit->libelle; ?></h2>
              <!-- Mettre ou enlever des favoris -->
              <a href=""><span><i class="fa fa-heart"></i>Ajouter aux favoris</span></a>
              <!-- delete du panier-->		
			  <a onclick="return confirm('voulez vous vraiement supprimer <?php echo $produit->libelle; ?>?')" href="models/cart/controller.php?action=delete&id_cart_produit=<?=$c->id_cart_produit?>"><span><i class="fa fa-trash"></i>supprimer</span></a>													

            </div>
            <!-- //  -->
            <div class="col-md-2 quantity">
              <!-- quantité  -->
              <label for="quantity">Choisir la quantité</label>
              <!-- s'il n'y a pas de stock 
              <label for="stock">Out of stock</label> -->
			  <input id="qte<?=$c->id_cart_produit?>" name="qte" type="number" min="1" max="10" value="<?=$c->qte;?>" class="form-control" />	
			<script type="text/javascript">
			$(document).ready(function(){
				$('#qte<?=$c->id_cart_produit?>').change(function () {
					var qte = $(this).val();
					var price = $('#price<?=$c->id_cart_produit?>').val();
					var total = qte * price;
					$('#sum_val<?=$c->id_cart_produit?>').html(number_format(total, 2, ',', ' '));
					$('#cart_sum_val<?=$c->id_cart_produit?>').val(total);
					updateCartSumPrice();
					updateCartElmQty(<?=$c->id_cart_produit?>, qte);
				});
			});
			</script>
			  
            </div>
            <div class="col-md-3 price">
              <!-- prix de l'unité -->
              <span class="prix-unitaire" style="font-weight: 900;"><?php echo number_format($produit->prix, 2, ',', ' ');?> Dhs</span>
              <input type="hidden" id="price<?=$c->id_cart_produit?>" value="<?php echo $produit->prix;?>" />
              <strike><?php echo number_format($produit->prix*2, 2, ',', ' ');?> Dhs</strike>
              <p>Economie: 50%</p>
            </div>
            <div class="col-md-2 total">
              <p>Total</p>
              <span><div id="sum_val<?=$c->id_cart_produit?>" style="display: inline; font-weight: 900;"><?php echo number_format(($c->qte * $produit->prix), 2, ',', ' ');?></div> Dhs</span>
              <input id="cart_sum_val<?=$c->id_cart_produit?>" type="hidden" class="cartItemPrice" value="<?php echo $c->qte * $produit->prix;?>" />
            </div>
          </div>
        </div>
	
	    <?php endforeach; ?>
          <!-- //  -->
		  
        <div class="ttc">
          <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
              <h2>Total ttc:</h2>
              <span><div id="cartSumVal" style="display: inline; font-weight: 900;"><?php echo number_format($sum_total, 2, ',', ' ');?></div> Dhs</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
              <p>Frais de livraison non inclus pour le moment</p>
            </div>
          </div>
        </div>
      </div>
	  
	  
	  
      <div class="links">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 buttons">
              <a href="repas.php">poursuivre vos achats</a>
              <a href="commande.php">finaliser la commande</a>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include 'footer.php';?>