<?php
 
 spl_autoload_register(function($class){
	include("../".strtolower($class).".class.php");
 });
Idao::connect();
extract($_GET); //$id, $action
extract($_POST);
switch ($action) {
    case 'store':
        $data = $_POST;
        if (!empty($_FILES['image']['name'])) {
            $chemin =  Idao::uploader($_FILES['image'], "images");
            $data['image'] = $chemin;
        }	 
		produit::store($data);
	  echo "<script type='text/javascript'>window.location = '../../depot.php?rep=1';</script>";
        break;
    case 'delete':
        produit::deleteProduit($id_produit);
		 echo "<script type='text/javascript'>window.location = '../../profile.php';</script>";
        break;
		case 'deletepro':
        produit::deleteProduit($id_produit);
		 echo "<script type='text/javascript'>window.location = '../../profile_pro.php';</script>";
        break;
    case 'update':
        produit::update($_POST, $id);
        break;

    default:
        # code...
        break;
}