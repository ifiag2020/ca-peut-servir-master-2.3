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
        <h1>Nos services</h1>
        <img src="images/banner.jpg" alt="" />
      </div>
    </section>

    <div class="container" id="lien-page">
      <p>
        <a href="index.php" class="text-decoration-none text-secondary"
          >Accueil</a
        >
        > Services
      </p>
    </div>

    <!-- Service Start  -->
    <section id="service">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Lorem ipsum dolor sit</h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat
              unde architecto blanditiis. Totam quam expedita, laudantium,
              aspernatur voluptate necessitatibus ullam quo possimus doloremque
              animi quae suscipit, quos sequi ea sunt.
            </p>
          </div>
        </div>
      </div>
      <div class="services-icons">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-12">
              <span><i class="fa fa-truck"></i></span>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet,
                temporibus necessitatibus ab delectus.
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
              <span><i class="fa fa-shopping-cart"></i></span>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet,
                temporibus necessitatibus ab delectus.
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
              <span><i class="fa fa-dollar"></i></span>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet,
                temporibus necessitatibus ab delectus.
              </p>
            </div>
            <div class="col-md-3 col-sm-12">
              <span><i class="fa fa-hourglass-start"></i></span>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet,
                temporibus necessitatibus ab delectus.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="title-service">
      <div class="container mb-5">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8 text-center mb-5 mt-5">
            <h1>Lorem ipsum dolor</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="thumb">
              <img
                class="img-fluid"
                src="images/photo-1532634896-26909d0d4b89.jpg"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </section>
<?php include 'footer.php';?>