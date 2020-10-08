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
 include 'header.php';
 ?>

    <!-- Banner -->
    <section id="banner">
        <div class="principal-banner">
            <h1>A propos de nous</h1>
          <img src="images/banner.jpg" alt="" />
        </div>
    </section>

    <div class="container" id="lien-page">
        <p><a href="index.php" class="text-decoration-none text-secondary">Accueil</a> > A propos</p>
    </div>

    <!-- Section rubrique Start -->
    <section id="rubrique">
        <div class="container">
            <div class="subtitle">
                <h2>Qu'est-ce que le Lorem Ipsum</h2>
            </div>
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="text-rubrique">
                        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition 
                                et la mise en page avant impression. Le Lorem Ipsum est le faux texte 
                                standard de l'imprimerie depuis les années 1500, quand un imprimeur 
                                anonyme assembla ensemble des morceaux de texte pour réaliser un livre 
                                spécimen de polices de texte. 
                                <br>
                                Le Lorem Ipsum est simplement du faux texte employé dans la composition 
                                et la mise en page avant impression. Le Lorem Ipsum est le faux texte 
                                standard de l'imprimerie depuis les années 1500, quand un imprimeur 
                                anonyme assembla ensemble des morceaux de texte pour réaliser un livre 
                                spécimen de polices de texte.</p>
                                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition 
                                    et la mise en page avant impression. Le Lorem Ipsum est le faux texte 
                                    standard de l'imprimerie depuis les années 1500, quand un imprimeur 
                                    anonyme assembla ensemble des morceaux de texte pour réaliser un livre 
                                    spécimen de polices de texte. 
                                    <br>
                                    Le Lorem Ipsum est simplement du faux texte employé dans la composition 
                                    et la mise en page avant impression. Le Lorem Ipsum est le faux texte 
                                    standard de l'imprimerie depuis les années 1500, quand un imprimeur 
                                    anonyme assembla ensemble des morceaux de texte pour réaliser un livre 
                                    spécimen de polices de texte.</p>
                            </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="img_rubrique">
                        <img src="images/rubrique_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section rubrique End -->

    <!-- Section testimony Start -->
    <section id="testimony">
        <div class="container">
                <div class="subtitle">
                        <h2>Qu'est-ce que le Lorem Ipsum</h2>
                    </div>
                    <div class="text-testimony">
                        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition 
                                et la mise en page avant impression. Le Lorem Ipsum est le faux texte 
                                standard de l'imprimerie depuis les années 1500, quand un imprimeur 
                                anonyme assembla ensemble des morceaux de texte pour réaliser un livre 
                                spécimen de polices de texte. 
                                <br>
                                Le Lorem Ipsum est simplement du faux texte employé dans la composition 
                                et la mise en page avant impression. Le Lorem Ipsum est le faux texte 
                                standard de l'imprimerie depuis les années 1500, quand un imprimeur 
                                anonyme assembla ensemble des morceaux de texte pour réaliser un livre 
                                spécimen de polices de texte.</p>
                            </div>                
                </div>
        </div>
    </section>
    <!-- Section testimony End -->

    <!-- Section info Start -->
    <section id="info">
        <div class="container">
                <div class="subtitle">
                        <h2>Qu'est-ce que le Lorem Ipsum</h2>
                    </div>
                    <div class="text-info">
                        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition 
                                et la mise en page avant impression. Le Lorem Ipsum est le faux texte 
                                standard de l'imprimerie depuis les années 1500, quand un imprimeur 
                                anonyme assembla ensemble des morceaux de texte pour réaliser un livre 
                                spécimen de polices de texte. 
                                <br>
                                Le Lorem Ipsum est simplement du faux texte employé dans la composition 
                                et la mise en page avant impression. Le Lorem Ipsum est le faux texte 
                                standard de l'imprimerie depuis les années 1500, quand un imprimeur 
                                anonyme assembla ensemble des morceaux de texte pour réaliser un livre 
                                spécimen de polices de texte.</p>
                            </div>                
                </div>
        </div>
    </section>
    <!-- Section info End -->

    <!-- Section links Start  -->
    <section id="links">
        <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="subtitle">
                    <h2>Vous voulez en profiter ?</h2>
                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos fugiat cum placeat quidem quod at labore commodi reiciendis, itaque repellendus alias assumenda voluptatibus id incidunt.</p>
                <div class="button">
                    <a href="#">En savoir plus</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="subtitle">
                    <h2>Vous êtes commerçant ?</h2>
                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos fugiat cum placeat quidem quod at labore commodi reiciendis, itaque repellendus alias assumenda voluptatibus id incidunt.</p>
                <div class="button">
                    <a href="#">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>
    </section>
<?php include 'footer.php';?>