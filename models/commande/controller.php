<?php
 
 spl_autoload_register(function($class){
	include("../".strtolower($class).".class.php");
 });
Idao::connect();
extract($_GET); //$id, $action
extract($_POST);

switch ($action) {
    case 'store':
		Idao::storecommande($id);
	  echo "<script type='text/javascript'>window.location = '../../commande.php?rep=1';</script>";
        break;
    case 'delete':
		Idao::updatecart($_GET['id_cart_produit']);
	    echo "<script type='text/javascript'>window.location = '../../commande2.php';</script>";
        break;
    case 'update':
        commande::update($id);
	    echo "<script type='text/javascript'>window.location = '../../commande2.php';</script>";
        break;

    default:
        # code...
        break;
}