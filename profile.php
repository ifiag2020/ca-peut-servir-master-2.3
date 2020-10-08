<?php
session_start();
if (!isset($_SESSION["session_login"])) {
	
     echo "<script type='text/javascript'>window.location = 'index.php';</script>";
 } 
 
  spl_autoload_register(function($class){
	include("models/".strtolower($class).".class.php");
 });

Idao::connect();
$action = "store";
if (isset($_SESSION["id_user"]) && !empty($_SESSION["id_user"])) {
   $action = "update";
   $u =  Idao::finduser($_SESSION["id_user"]);
}

if(isset($_POST['form_user']) && !empty($_POST['form_user']) && $_POST['form_user'] == 'update_user'){
	$id_user =  $_POST['id_user'];
	$nom =  $_POST['nom'];
	$prenom =  $_POST['prenom'];
	$email =  $_POST['email'];
	$telephone =  $_POST['telephone'];
	$adresse =  $_POST['adresse'];
	$data_array = array(
		'nom' => $nom,
		'prenom' => $prenom,
		'email' => $email,
		'telephone' => $telephone,
		'adresse' => $adresse
	);
	Idao::update($data_array, $id_user);
	Idao::redirect('profile.php?id='.$id_user.'&rep=1');
}
if(isset($_POST['form_produit']) && !empty($_POST['form_produit']) && $_POST['form_produit'] == 'update_produit'){
	
	if(isset($_POST['form_upd'])){
		$id_produit =  $_POST['id_produit'];
		$id_categorie =  $_POST['id_categorie'];
		$libelle =  $_POST['libelle'];
		$prix =  $_POST['prix'];
		$data_array = array(
			'id_categorie' => $id_categorie,
			'libelle' => $libelle,
			'prix' => $prix,
		);
		Idao::updateProduct('produit', $data_array, $id_produit);
		Idao::redirect('profile.php?rep=1');
	}
	
}
	$depot = Idao::alldep($_SESSION["id_user"]);
	$favo = Idao::favpart($_SESSION["id_user"]);


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
          <div class="phone">Bonjour : <?php echo ($_SESSION["session_login"]) ?>	</div>
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
                <a class="dropdown-item" href="commande.php">Mes commandes</a>
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
				<a class="dropdown-item" href="logout.php">Déconnexion</a> 
              </div>
            </div>     
			<div style="margin-left: 20px; margin-right: 20px; ">			
				<div class="carousel-info">
					<button  class="btn form-controlbtn btn-secondary" onclick="window.location.href='depot.php'">Déposer une annonce</button>
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

    <!-- Tabs -->
    <section id="tabs" class="project-tab">
      <div class="container">
		<?php if (isset($_GET['rep']) && !empty($_GET['rep'])) { ?>
        <div class="row">
          <div class="col-md-12">
			<?php if ($_GET['rep'] == "1") { ?>
			<div class="box bl-green box-alert">
				La mise à jour à été effectuée avec succès.
			</div>
			<?php }else{ ?>
			<div class="box bl-red box-alert">
				Une erreur s'est produite lors de la mise à jour du profil.
			</div>
			<?php } ?>
		  </div>
		 </div>
		<?php } ?>
			
		 
        <div class="row">
          <div class="col-md-12">
		  
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a
                  class="nav-item nav-link"
                  id="nav-annonce-tab"
                  data-toggle="tab"
                  href="#nav-annonce"
                  role="tab"
                  aria-controls="nav-annonce"
                  aria-selected="false"
                  >Mes annonces</a>
                <a
                  class="nav-item nav-link"
                  id="nav-favoris-tab"
                  data-toggle="tab"
                  href="#nav-favoris"
                  role="tab"
                  aria-controls="nav-favoris"
                  aria-selected="false"
                  >Mes favoris</a>
                <a
                  class="nav-item nav-link active"
                  id="nav-reglage-tab"
                  data-toggle="tab"
                  href="#nav-reglage"
                  role="tab"
                  aria-controls="nav-reglage"
                  aria-selected="true"
                  >Réglages</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div
                class="tab-pane fade"
                id="nav-annonce"
                role="tabpanel"
                aria-labelledby="nav-annonce-tab"
              >
			    <section id="profile">
                  <div class="container">
                    <?php foreach($depot as $d) :?>  
                    <div class="row">
                      <table class="table table-striped">
                      <tbody>
                        <tr>
							<td>
								<form accept="" method="POST">
									<input type="hidden" name="id_produit" value="<?= $d->id_produit ?>"/>
									<input type="hidden" name="form_produit" value="update_produit"/>
									<table style="width:100%">
										<thead>
											<tr>
												<th>Image</th>
												<th>Categorie</th>
												<th>Libelle</th>
												<th>Prix</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<img width="100" class="img-thumbnail" src="models/produit/<?=$d->image?>" alt="">
												</td>
												<td>
													<select name="id_categorie" class="form-control">
														<?php
															foreach(Idao::allcat() as $cat){
																$selected = $d->id_categorie == $cat->id_categorie ? " selected=''" : "";
																echo '<option value="'.$cat->id_categorie.'"'.$selected.'>'.$cat->libelle.'</option>';
															}
														?>
													</select>
												</td>
												<td>
													<input type="text" name="libelle" value="<?=$d->libelle?>" class="form-control"  placeholder="Libelle"/>
												</td>
												<td>
													<input type="text" name="prix" value="<?= number_format($d->prix, 2, ',', ' ');?>" class="form-control"  placeholder="prix"/>
												</td>
												<td> 
													<button name="form_upd" name="update" class="btn sm btn-warning" type="submit" >Modifier</button>
													<a onclick="return confirm('voulez vous vraiement supprimer cet element?')" href="models/produit/controller.php?action=delete&id_produit=<?= $d->id_produit ?>" class="btn sm btn-danger">Supprimer</a>													
												</td>
											</tr>
										</tbody>
									</table>
								</form>
							</td>
						</tr>
                      </tbody>
                      
                      </table>
					  </form>
                    </div>
                    <?php endforeach; ?>
                  </div>
                </section>
              </div>
              <div
                class="tab-pane fade"
                id="nav-favoris"
                role="tabpanel"
                aria-labelledby="nav-favoris-tab"
              >
                                  <div class="container">
                    <?php foreach($favo as $f) :?>  
							<?php
									Idao::$table = "produit";
									$produit = Idao::find($f->id_produit);
								?>
                    <div class="row">
                      <table class="table table-striped">
                      <tbody>
                        <tr>
							<td>
								<form accept="" method="POST">
									<input type="hidden" name="id_produit" value="<?= $f->id_produit ?>"/>
									<input type="hidden" name="form_produit" value="update_produit"/>
									<table style="width:100%">
										<thead>
											<tr>
												<th>Image</th>
												<th>Libelle</th>
												<th>Déscription</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<img width="100" class="img-medium" src="models/produit/<?php echo $produit->image; ?>" alt="">
												</td>
												<td>
													<p class="text-justify pr-4"><?php echo $produit->libelle; ?></p>
												</td>
												<td>
													<p class="text-justify pr-4"><?php echo $produit->description; ?></p>
												</td>
												<td> 
													<a onclick="return confirm('voulez vous vraiement supprimer <?php echo $produit->libelle; ?>?')" href="models/favoris/controller.php?action=deletepro&id_favoris=<?=$f->id_favoris?>&id=<?=$_SESSION["id_user"]?>"><span><i class="fa fa-trash"></i>supprimer</span></a>	
												</td>
											</tr>
										</tbody>
									</table>
								</form>
							</td>
						</tr>
                      </tbody>
                      
                      </table>
					  </form>
                    </div>
                    <?php endforeach; ?>
                  </div>
              </div>
              <div
                class="tab-pane fade show active"
                id="nav-reglage"
                role="tabpanel"
                aria-labelledby="nav-reglage-tab"
              >
                <section id="profile">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
						
                        <form accept="" method="POST">
						 <input type="hidden" name="id_user" value="<?= $u->id_user ?>"/>
						 <input type="hidden" name="form_user" value="update_user"/>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <input type="text" name="nom" value="<?= $u->nom ?>" class="form-control"  placeholder="Nom"/>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" name="prenom" value="<?= $u->prenom ?>" class="form-control" placeholder="Prenom"/>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <input type="email" name="email" value="<?= $u->email ?>" class="form-control" placeholder="Adresse e-mail"/>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="tel" name="telephone" value="<?= $u->telephone ?>" class="form-control" placeholder="Téléphone mobile (optionnel)"/>
							  </div>
                          </div>
                          <div class="form-row">
							<div class="form-group col-md-6">
							  <TEXTAREA name="adresse" COLS=40 ROWS=2  class="form-control p-4" value="<?= $u->adresse ?>"><?= $u->adresse ?></TEXTAREA>
							</div>
                          </div>
                          <div class="form-group">
                            <button  class="btn form-control" type="submit">MODIFIER</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php include 'footer.php';?>