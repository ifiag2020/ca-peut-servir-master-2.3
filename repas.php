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
	
	//pagination	
	
	$count= Idao::countprod();
	
	@$page=$_GET["page"];
	if(empty($page)) $page=1;
	$nbr_element_par_page=4;
	$nbr_de_page=ceil($count[0]["cpt"]/$nbr_element_par_page);
	$debut=($page-1) * $nbr_element_par_page;
		
	$depot = Idao::allprod($debut,$nbr_element_par_page);
	if(count($depot)==0) header("location:repas.php");
	$prev = $page-1;
	if($page == 1) $prev = 1;
	$next = $page+1;
	if($page == $nbr_de_page) $next = $nbr_de_page;
	
include 'header.php';
 ?>
    <!-- Banner -->
    <section id="banner">
      <div class="principal-banner">
        <h1>Nos repas</h1>
        <img src="images/banner.jpg" alt="" />
      </div>
    </section>

    <div class="container" id="lien-page">
      <p>
        <a href="index.php" class="text-decoration-none text-secondary"
          >Accueil</a
        >
        > Repas
      </p>
    </div>

    <!-- filtre start  -->
    <div class="container">
      <div class="filter-background d-flex align-items-center">
        <div class="row">
          <div class="col-md-4">
            <h1>commandez votre repas dès maintenant !</h1>
          </div>

          <!-- Recherche avec php  -->
          <div class="col-md-5">
            <form role="search" method="get" class="search-form form" action="">
              <label>
                <input
                  type="search"
                  class="search-field"
                  placeholder="Rechercher..."
                  value=""
                  name="s"
                  title=""
                />
              </label>
              <input
                type="button"
                class="search-submit button"
                value="&#xf002"
              />
              <!-- <i class="fa fa-search"></i> -->
            </form>
          </div>
          <!-- //  -->


            <div class="categorie col-md-3 d-flex justify-content-center">
              <div class="dropdown deroulant">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Choisir la catégorie
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <button class="dropdown-item" type="button">Reastaurant</button>
                  <button class="dropdown-item" type="button">Boulangerie</button>
                  <button class="dropdown-item" type="button">Patisserie</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Repas Start  -->
	<script src="js/jquery-3.3.1.min.js"></script> 
    <section id="repas" class="text-center">
    <div class="container">
       <h1>Lorem ipsum</h1>
      <div class="row justify-content-between" style="position:relative;">
          <!-- Boucle  -->
		<?php foreach($depot as $d) :?> 
		  <input type="hidden" id="id_produit_<?= $d->id_produit ?>" name="id_produit" value="<?= $d->id_produit ?>"/>
		  <input type="hidden" id="id_user_<?= $d->id_produit ?>" value="<?= $_SESSION['id_user'] ?>"/>
          <div class="col-md-3 col-sm-12 menu">
			<div id="ajax_rep_<?= $d->id_produit ?>" class="alert_bulle"></div>
            <a href="repas-detail.php?id_prod=<?= $d->id_produit ?>"><img  src="models/produit/<?=$d->image?>" alt="" width="250" height="250"></a>
			<?php echo '<h2>'.$d->libelle.'</h2><a class="plus" href="repas-detail.php?id_prod='.$d->id_produit.'"><i class="fa fa-plus-square"></i></a>';  ?>
			<?php 
			if (!isset($id_profile)) {
				echo '<h3>Voir plus de détail<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"></button></h3>';
			}elseif($id_profile=="2"){ 
				echo '<h3><a id="addToWishlist_'.$d->id_produit.'" class="btn btn-primary btn-sm liketoggle" style="cursor:pointer; color:#fff;"><i class="fa fa-heart"></i> Ajouter aux favoris</a></h3>';
			}elseif($id_profile=="3"){ 
				echo '<h3>Voir plus de détail<button type="submit" class="btn btn-custom btn-sm liketoggle" name="like"></button></h3>'; 
			}  ?>    	
          </div>	
		<script type="text/javascript">
			$('#addToWishlist_<?=$d->id_produit?>').click(function () {
				var id_produit = $("#id_produit_<?=$d->id_produit?>").val();
				var id_user = $("#id_user_<?= $d->id_produit ?>").val();
				req = $.ajax({
					url: "ajax_post.php",
					type: "post",
					data: "id_produit=" + id_produit + "&id_user=" + id_user + "&action=addToWishlist"
				});
				req.done(function (response, textStatus, jqXHR) {
					var data = JSON.parse(response);
					if(data.rep){
						$("#ajax_rep_<?= $d->id_produit ?>").html(data.message);
					}else{
						$("#ajax_rep_<?= $d->id_produit ?>").html(data.message);
					}
					$("#ajax_rep_<?= $d->id_produit ?>").animate({
						opacity: "0"
						}, 2000, function() {
							
					});
				});
				req.fail(function (jqXHR, textStatus, errorThrown) {
					$("#ajax_rep_<?= $d->id_produit ?>").html(jqXHR.responseText);
				});
			});
		</script>		  
	    <?php endforeach; ?>
          <!-- //  -->
      </div>
      <!-- Pagination plus que  12 produits -->
      <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center mt-5">
            <li class="page-item <?php if($page == 1){ ?> disabled <?php } ?> ">
              <a class="page-link" href="?page=<?= $prev ?>" tabindex="-1">Previous</a>
            </li>
			<?php
				for($i=1; $i<=$nbr_de_page;$i++){
					/*if($page!=$i){
					echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
					}else { echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';}*/
					echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
				}	
			?>	
            <li class="page-item <?php if($page == $nbr_de_page){ ?> disabled <?php } ?> ">
              <a class="page-link" href="?page=<?= $next ?>">Next</a>
            </li>
          </ul>
        </nav>
        <!-- //  -->

    </div>
  </section>
<?php include 'footer.php';?>