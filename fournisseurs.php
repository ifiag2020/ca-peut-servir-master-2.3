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
	
	$count= Idao::countfourniss();
	
 	@$page=$_GET["page"];
	if(empty($page)) $page=1;
	$nbr_element_par_page=2;
	$nbr_de_page=ceil($count[0]["cpt"]/$nbr_element_par_page);
	$debut=($page-1) * $nbr_element_par_page;
	
	$fournisseur = Idao::forniss($debut,$nbr_element_par_page);
	
	
	if(count($fournisseur)==0){header("location:fournisseurs.php");}
	$prev = $page-1;
	if($page == 1) $prev = 1;
	$next = $page+1;
	if($page == $nbr_de_page) $next = $nbr_de_page;

include 'header.php';
 ?>
    <!-- Banner -->
    <section id="banner">
      <div class="principal-banner">
        <h1>Surfaces alimentaires</h1>
        <img src="images/banner.jpg" alt="" />
      </div>
    </section>

    <div class="container" id="lien-page">
      <p>
        <a href="index.php" class="text-decoration-none text-secondary"
          >Accueil</a
        >
        > Fournisseurs
      </p>
    </div>

    <!-- filtre start  -->
    <div class="container">
      <div class="filter-background d-flex align-items-center">
        <div class="row">
          <div class="col-md-4">
            <h1>Cherchez votre fournisseur préféré !</h1>
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
	
    <section id="repas" class="text-center">
    <div class="container">
      <h1>Lorem ipsum</h1>
	  <?php   foreach($fournisseur as $fr) :?> 
      <div class="menu">
        <div class="row">
                <div class="col-md-4 col-sm-12">
                    <a href="repas-detail.php"><img src="images/menu/salade.png" alt=""></a>
                </div>
                <div class="col-md-6 col-sm-12 infos-etab">
				<?php echo '<h2> Nom de l\' enseigne: '.$fr->nom.'<span class="fa fa-star checked"></span>4,5/5</h2>';  ?>
				<?php echo '<h3> Adresse: '.$fr->adresse.'</h3>';  ?>
				<?php echo '<h3> Numéro de tel: '.$fr->telephone.'</h3>'; ?>
			
                    <h3>Livraison : Non (Récupérer chez le fournisseur)</h3>
                    <!-- Afficher uniquement les offres de ce vendeur  -->
                    <div class="d-flex justify-content-start"><a href="repas.php">voir toutes Les offres</a></div>
                    <!-- //  -->
                </div>
            </div>
    </div>
	  <?php endforeach;  ?>
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