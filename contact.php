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
 
 
 
  $result="";
  if (isset($_POST['submit'])) {
  require 'phpmailer/PHPMailerAutoload.php'; 
  $mail = new PHPMailer;
  
    
    $mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'yahya.tdi202@gmail.com';
    $mail->Password = '123456';
    
  
    $mail->setFrom($_POST['email'],$_POST['name'],$_POST['commanderef']);
	$mail->addAddress('yahya.tdi202@gmail.com');
	$mail->addReplyTo($_POST['email'],$_POST['name'],$_POST['commanderef']);
	
	
    $mail->isHTML(true);
	$mail->Subject = 'Form Submission'.$_POST['subject'];
	 $mail->Body = '<h3 align=center>Name :'.$_POST['name'].' <br>Email : '.$_POST['email'].' <br>commanderef : '.$_POST['commanderef'].' <br>Message : '.$_POST['msg'].'</h3>';
	 
	 if(!$mail->send()){
		$result="Un problème est survenu. Veuillez réessayer. ";
	 }
	 else{
		$result="Merci".$_POST['name']."pour nous contacter. Nous vous recontacterons bientôt!";
	 }
	 
  }
 
 include 'header.php';
 ?>
 
    <div class="container" id="lien-page">
        <p><a href="index.php" class="text-decoration-none text-secondary">Accueil</a> > Contact</p>
    </div>

    <!-- Contact Start  -->
    <section id="title-contact">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-md-12">
                    <h1>Lorem ipsum dolor sit</h1>
                    <p>Envoyez-nous votre requête via le formulaire en ligne ci-contre et nous vous répondrons sous 2 jours ouvrables.</p>
                </div>
            </div>
            </div>
    </section>

    <section id="section-form">
        <div class="container">
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
					<h5 class="text-center text-success"><?= $result;?></h5>
                    <form accept="" method="POST" class="p-5 border">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control p-4" placeholder="Nom complet...">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control p-4" placeholder="Email...">
                        </div>
                        </div>
                        <div class="form-group">
                        <input type="text" name="commanderef" class="form-control p-4" placeholder="Numéro de commande...">
                        </div>
                        <div class="form-group">
                        <input type="text" name="subject" class="form-control p-4" placeholder="Choisissez le sujet...">
                        </div>
                        <div class="form-group">
                            <textarea name="msg" id="msg" class="form-control p-4" placeholder="Veuillez renseigner tous les détails de votre commande s'il vous plaît..." rows="5"></textarea>
                        </div>
                        <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                J'ai lu et j'accepte les conditions d'utilisation et notamment la mention relative à la protection des données personnelles.
                            </label>
                        </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn form-control">ENVOYER MAINTENANT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include 'footer.php';?>