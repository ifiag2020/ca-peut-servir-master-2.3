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
		<?php if (isset($_GET['cone']) && $_GET['cone'] == "1") { ?>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
		<style type="text/css">
		#overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: #000;
		filter:alpha(opacity=70);
		-moz-opacity:0.7;
		-khtml-opacity: 0.7;
		opacity: 0.7;
		z-index: 100;
		display: none;
		}
		.cnt223 a{
		text-decoration: none;
		}
		.popup{
		width: 100%;
		margin: 0 auto;
		display: none;
		position: fixed;
		z-index: 101;
		}
		.cnt223{
		min-width: 600px;
		width: 600px;
		min-height: 150px;
		margin: 100px auto;
		background: #f3f3f3;
		position: relative;
		z-index: 103;
		padding: 15px 35px;
		border-radius: 5px;
		box-shadow: 0 2px 5px #000;
		}
		.cnt223 p{
		clear: both;
			color: #555555;
			/* text-align: justify; */
			font-size: 20px;
			font-family: sans-serif;
		}
		.cnt223 p a{
		color: #d91900;
		font-weight: bold;
		}
		.cnt223 .x{
		float: right;
		height: 35px;
		left: 22px;
		position: relative;
		top: -25px;
		width: 34px;
		}
		.cnt223 .x:hover{
		cursor: pointer;
		}
		</style>
		<script type='text/javascript'>
		$(function(){
		var overlay = $('<div id="overlay"></div>');
		overlay.show();
		overlay.appendTo(document.body);
		$('.popup').show();
		$('.close').click(function(){
		$('.popup').hide();
		overlay.appendTo(document.body).remove();
		return false;
		});


		 

		$('.x').click(function(){
		$('.popup').hide();
		overlay.appendTo(document.body).remove();
		return false;
		});
		});
		</script>
		<div class='popup'>
		<div class='cnt223'>
		<h1>Bienvenu</h1>
		<p>
		Votre compte à été ajouté avec succès.
		<br/>
		<br/>
		<a href='' class='close'>Fermer</a>
		</p>
		</div>
		</div>

		<?php }else{ ?>
	<div class="">
	</div>
	<?php } ?>

    <!-- Slider Start  -->
    <section id="slider">
      <div class="owl-carousel my-carousel">
        <div class="my-carousel-item">
          <img src="images/banner_cps.jpg" alt="" />
          <div class="carousel-info">
            <h1>Lorem ipsum dolor</h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Repellendus cupiditate
            </p>
            <a href="repas.php">decouvrir</a>
          </div>
        </div>
        <div class="my-carousel-item">
          <img src="images/banner_cps.jpg" alt="" />
          <div class="carousel-info">
            <h1>Lorem ipsum dolor</h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Repellendus cupiditate
            </p>
            <a href="repas.php">decouvrir</a>
          </div>
        </div>
      </div>
    </section>

<!-- Info Start  --> 
<section id="information">
    <div class="container">
        <h1>About fresh meals</h1>
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <img src="images/vegetable.png" alt="">
            </div>
            <div class="col-md-7 col-sm-12"> 
                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod inventore, 
                    aliquam excepturi repudiandae modi quidem iure reiciendis! Nobis illo voluptatem 
                    natus voluptas quibusdam nostrum sit. Dolorum est fuga facere consectetur? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi cum nam odit, natus delectus animi. Quidem animi eaque, ipsum ullam nobis quod suscipit quam accusamus ipsa expedita libero optio unde.</p>
                <a href="repas.php">Repas</a>
            </div>
        </div>
      </div>
    </section>


    <!-- Affichage des 3 derniers produits  -->
    <!-- Catalogue Start  -->
    <section id="catalogue">
      <div class="container">
        <h1>lorem ipsum</h1>
        <div class="row justify-content-center">
          <div class="col-md-4 col-sm-12">
            <div class="elements">
              <img src="images/meal.png" alt="" width="200" />
              <h2>Restaurant</h2>
              <div class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
              </div>
              <span class="price">15 DH</span>
              <a href="Connexion_part.php" class="justify-content-center">Ajouter au panier</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 mr-auto mx-auto">
            <div class="elements">
              <img src="images/meal.png" alt="" width="200" />
              <h2>Restaurant</h2>
              <div class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
              </div>
              <span class="price">15 DH</span>
              <div class="panier mx-auto">
                <a href="Connexion_part.php" class="justify-content-center">Ajouter au panier</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 mr-auto mx-auto">
            <div class="elements">
              <img src="images/meal.png" alt="" width="200" />
              <h2>Restaurant</h2>
              <div class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
              </div>
              <span class="price">15 DH</span>
              <a href="Connexion_part.php" class="justify-content-center">Ajouter au panier</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Info Start  -->
    <section id="information">
      <div class="container">
        <h1>Notre vision</h1>
        <div class="row">
          <div class="col-md-5 col-sm-12">
            <img src="images/photo-1532634896-26909d0d4b89.jpg" alt="" />
          </div>
          <div class="col-md-7 col-sm-12">
            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
              inventore, aliquam excepturi repudiandae modi quidem iure
              reiciendis! Nobis illo voluptatem natus voluptas quibusdam nostrum
              sit. Dolorum est fuga facere consectetur? Lorem ipsum dolor sit
              amet consectetur, adipisicing elit. Eligendi cum nam odit, natus
              delectus animi. Quidem animi eaque, ipsum ullam nobis quod
              suscipit quam accusamus ipsa expedita libero optio undeLorem ipsum
              dolor sit amet, consectetur adipisicing elit. Quod inventore,
              aliquam excepturi repudiandae modi quidem iure reiciendis! Nobis
              illo voluptatem natus voluptas quibusdam nostrum sit. Dolorum est
              fuga facere consectetur? Lorem ipsum dolor sit amet consectetur,
              adipisicing elit. Eligendi cum nam odit, natus delectus animi.
              Quidem animi eaque, ipsum ullam nobis quod suscipit quam accusamus
              ipsa expedita libero optio unde.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Start  -->
    <section id="services">
      <div class="container">
        <h1>Nos services</h1>
        <div class="row">
          <div class="col-md-4 col-sm-12 service-mobile">
            <div class="card-service first">
              <div class="rectangle" id="rectangle">
                <span class="fa fa-truck shipping" id="shipping"></span>
              </div>
              <div class="information" id="info-card">
                <h2 id="title-info">Livraison</h2>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Neque odit, sit amet consectetur adipisicing elit. Neque odit
                </p>
                <a href="services.php" class="stretched-link" id="detect">découvrir</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card-service second">
              <div class="rectangle" id="rectangle-check">
                <span class="fa fa-check shipping" id="check"></span>
              </div>
              <div class="information" id="info-card-check">
                <h2 id="title-info-check">Qualité</h2>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Neque odit, sit amet consectetur adipisicing elit. Neque odit
                </p>
                <a href="services.php" class="stretched-link" id="detect-check"
                  >découvrir</a
                >
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card-service">
              <div class="rectangle" id="rectangle-pay">
                <span class="paiement" id="pay">$</span>
              </div>
              <div class="information" id="info-card-pay">
                <h2 id="title-info-pay">Paiement</h2>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Neque odit, sit amet consectetur adipisicing elit. Neque odit
                </p>
                <a href="services.php" class="stretched-link" id="detect-pay">découvrir</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Start  -->
    <section id="services-mobile">
      <div class="container">
        <h1>Nos services</h1>
        <div class="row">
          <div class="col-md-4 col-sm-12 service-mobile">
            <div class="card-service first">
              <div class="rectangle" id="rectangle">
                <span class="fa fa-truck shipping" id="shipping"></span>
              </div>
              <div class="information" id="info-card">
                <h2 id="title-info">Livraison</h2>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Neque odit, sit amet consectetur adipisicing elit. Neque odit
                </p>
                <a href="services.php" class="stretched-link" id="detect">découvrir</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card-service second">
              <div class="rectangle" id="rectangle-check">
                <span class="fa fa-check shipping" id="check"></span>
              </div>
              <div class="information" id="info-card-check">
                <h2 id="title-info-check">Qualité</h2>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Neque odit, sit amet consectetur adipisicing elit. Neque odit
                </p>
                <a href="services.php" class="stretched-link" id="detect-check"
                  >découvrir</a
                >
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card-service">
              <div class="rectangle" id="rectangle-pay">
                <span class="paiement" id="pay">$</span>
              </div>
              <div class="information" id="info-card-pay">
                <h2 id="title-info-pay">Paiement</h2>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Neque odit, sit amet consectetur adipisicing elit. Neque odit
                </p>
                <a href="services.php" class="stretched-link" id="detect-pay">découvrir</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Dernière partie à développer  -->
    <!-- Newsletter Start  -->
    <section id="news">
      <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <img src="images/pain panier.png" alt="">
            </div>
            <div class="offset-md-1 col-md-6 col-sm-12">
                <div class="newsletter">
                    <h1>Subscribe to our Newsletter</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente eveniet nostrum impedit ab non quo necessitatibus itaque vero at reprehenderit. Obcaecati laborum, neque sequi pariatur sunt sed amet autem saepe.</p>
                   
                    <form action="">
                        <input type="email">
                        <button type="button">Subscribe</button>
                    </form>

                </div>
            </div>
          </div>
        </div>
    </div>
</section>
<?php include 'footer.php';?>