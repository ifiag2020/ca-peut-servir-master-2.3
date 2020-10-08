<?php
 
 spl_autoload_register(function($class){
	include("../".strtolower($class).".class.php");
 });
Idao::connect();
extract($_GET); //$id, $action
extract($_POST);
switch ($action) {
    case 'store':
      cart::store($_POST);
	  echo "<script type='text/javascript'>window.location = '../../depot.php';</script>";
        break;
    case 'delete':
		Idao::updatecart($_GET['id_cart_produit']);
	    echo "<script type='text/javascript'>window.location = '../../panier.php';</script>";
        break;
    case 'update':
        cart::update($id);
	    echo "<script type='text/javascript'>window.location = '../../panier.php';</script>";
        break;

    default:
        # code...
        break;
}