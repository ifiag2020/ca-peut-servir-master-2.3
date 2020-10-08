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
		$favo = Idao::favpart($_SESSION["id_user"]);
	
  include 'header.php';
?>
    <div class="container" id="lien-page">
        <p><a href="index.php" class="text-decoration-none text-secondary">Accueil</a> > Favoris</p>
    </div>

    <!-- Favoris Start  -->
    <section id="favoris">
        <?php foreach($favo as $f) :?> 
		<?php
			Idao::$table = "produit";
			$produit = Idao::find($f->id_produit);
			?>
        <div class="container">
            <div class="card p-3">
                <div class="wrapper row">
                    <div class="col-md-6">
                        <div><img class="img-fluid" src="models/produit/<?php echo $produit->image; ?>" /></div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="row">
                            <div class="col-md-10 text-secondary"><h3><?php echo $produit->libelle; ?></h3></div>
                            <div class="col-md-2"><i class="fa fa-heart fa-2x text-danger" aria-hidden="true"></i></div>
                        </div>
                        <p class="text-justify pr-4"><?php echo $produit->description; ?></p>
                        <div class="position-titre">
                       <!-- delete du panier-->		
						<a onclick="return confirm('voulez vous vraiement supprimer <?php echo $produit->libelle; ?>?')" href="models/favoris/controller.php?action=delete&id_favoris=<?=$f->id_favoris?>"><span><i class="fa fa-trash"></i>supprimer</span></a>	
                        </div>
                    </div>	
                </div>	
            </div>
        </div>
		<?php endforeach; ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-5">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
            </ul>
        </nav>
    </section>
	
<?php include 'footer.php';?>