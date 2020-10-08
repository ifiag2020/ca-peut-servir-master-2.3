<?php
session_start();

 spl_autoload_register(function($class){
	include("models/".strtolower($class).".class.php");
 });

Idao::connect();

if (isset($_POST['go']) ) {
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];	
	$user = Idao::ConxPart($email,$pwd);
	if($user){
		$_SESSION["session_login"] = $user->nom;
		$_SESSION["id_user"] = $user->id_user;
		Idao::updatecarts($user->id_user);
		Idao::storecart($user->id_user);
		$_SESSION["id_cart"] = Idao::$cart_id;
		echo "<script type='text/javascript'>window.location = 'repas.php?result=true&user-loged=".$user->nom."';</script>";
	}else { 
		?>	<div class="col-md-12">
			<div class="box bl-red box-alert">
		Une erreur s'est produite lors de votre connection.
	</div></div>
	<?php }
}

include 'header.php';

?>
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
          <div class="col-md-6">
            <h1>Se connecter</h1>
            <form action="" method="POST" class="shadow pl-3 pr-3 pt-5 pb-5">
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail"/>
              </div>
              <div class="form-group">
                <input type="password" name="pwd" id="pwd" class="form-control"  placeholder="Mot de passe"/>
              </div>
              <div class="form-group">
                <div class="container-fluid" id="container-1">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="Reste_connecté">
					  <input id="Reste_connecté" type="checkbox" />
					  <span class="ml-2" >Reste connecté</span>
					  </label>
                    </div>
                    <div class="col-md-6 text-right">
                      <a href="">Mot de passe oublié ?</a>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <button type="submit" name="go" class="btn-block">SE CONNECTER</button>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <h1>Créer un compte</h1>
            <p class="mt-5">
              Créez votre compte client en quelques clics ! Vous pouvez vous
              inscrire en utilisant votre adresse e-mail.
            </p>
            <div class="mt-5">
              <button
                onclick="window.location.href ='creation_compte_part.php'"
                class="btn-block"
              >
                CREER VOTRE COMPTE
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php include 'footer.php';?>
