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
	$depot = Idao::alldetprod($_GET['id_prod']);
	$fourni = Idao::libforniss($_GET['id_prod']);
 
  include 'header.php';
 ?>

    <div class="container" id="lien-page">
      <p>
        <a href="index.php" class="text-decoration-none text-secondary"
          >Accueil</a
        >
        >
        <a href="repas.php" class="text-decoration-none text-secondary"
          >Repas</a
        >
        >
        <a href="repas-detail.php" class="text-decoration-none text-secondary"
          >Menu1</a
        >
      </p>
    </div>
	
	<script src="js/jquery-3.3.1.min.js"></script> 
	<?php foreach($depot as $d) :?> 
    <section id="menu">
      <div class="container">
        <div class="commande">
          <div class="row">
            <div class="col-md-3">
              <img src="models/produit/<?=$d->image?>" alt="pizza" />
            </div>
            <div class="col-md-8 infos">
				<?php echo '<h2>'.$d->libelle.'</h2>';  ?>
              <!-- onclick s'ajoute aux favoris  -->
			  <?php if(isset($id_profile) && $id_profile=="2"){ echo '<a class="btn btn-custom btn-sm liketoggle d-flex justify-content-end" id="wishlist" name="like" ><i class="fa fa-heart"></i></a>'; } ?>             
              <!-- //  -->
			  <?php foreach($fourni as $f) :?> 
              <?php echo '<h2> Nom De Fournisseur: '.$f->nom.'</h2>';  ?>
			  <?php endforeach; ?> 
              <hr />
              <span class="prix"><?php echo number_format($d->prix, 2, ',', ' ');?> Dhs</span>
              <strike class="barre">100 Dhs</strike>
              <span class="reduction">-50%</span>
			   <?php if(isset($id_profile) && $id_profile=="2"){ ?>
			  <input id="qte_<?=$d->id_produit?>" class="" type="number" min="1" max="10" value="1" />
			   <?php } ?>
              <!-- Button trigger modal -->
			<?php if(isset($id_profile) && $id_profile=="2"){ ?>
			<form id="add_to_cart_<?=$d->id_produit?>">
				<input type="hidden" id="id_produit_<?=$d->id_produit?>" name="id_produit" value="<?=$d->id_produit?>" />
				<input type="hidden" id="id_user_<?=$d->id_produit?>" name="id_user" value="<?=$_SESSION['id_user']?>" />
				<input type="hidden" id="id_cart_<?=$d->id_produit?>" name="id_cart" value="<?=$_SESSION["id_cart"]?>" />
				<button name="cart_add" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Je commande</button>
			</form>	
			<script type="text/javascript">
				var req;
				$('#add_to_cart_<?=$d->id_produit?>').bind('submit', function (event) {
					event.preventDefault();
					var id_produit = $("#id_produit_<?=$d->id_produit?>").val();
					var qte = $("#qte_<?=$d->id_produit?>").val();
					var id_cart = $("#id_cart_<?=$d->id_produit?>").val();
					if (req) {
						req.abort();
					}
					req = $.ajax({
						url: "ajax_post.php",
						type: "post",
						data: "id_produit=" + id_produit + "&qte=" + qte + "&id_cart=" + id_cart + "&action=addToCart"
					});
					req.done(function (response, textStatus, jqXHR) {
						var data = JSON.parse(response);
						if(data.rep){
							$("#ajax_rep").html(data.message);
						}else{
							$("#ajax_rep").html(data.message);
						}
						//$("#ajax_rep").html(response);
					});
					req.fail(function (jqXHR, textStatus, errorThrown) {
						$("#ajax_rep").html(jqXHR.responseText);
					});
				});
			</script>
			<?php } ?>	
          

              <!-- Modal -->
              <div
                class="modal fade"
                id="exampleModalCenter"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">
                        Ajouté au panier !
                      </h5>
                      <a
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                      >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
						<div id="ajax_rep"></div>
                    </div>
                    <div class="modal-footer">
                      <button
                        onclick="window.location.href='repas.php'"
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                      >
                        Poursuivre vos achats
                      </button>
                      <button onclick="window.location.href='panier.php'" type="button" class="btn btn-primary">
                        finaliser la commande
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<?php
	endforeach;
	include 'footer.php'; ?>