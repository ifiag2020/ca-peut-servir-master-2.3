<?php
 
 spl_autoload_register(function($class){
	include("../".strtolower($class).".class.php");
 });
Idao::connect();
extract($_GET); //$id, $action
extract($_POST);
switch ($action) {
    case 'store':
		favoris::store($_POST);
		echo "<script type='text/javascript'>window.location = '../../favoris.php';</script>";
        break;
    case 'delete':
		Idao::updatefav($_GET['id_favoris']);
	    echo "<script type='text/javascript'>window.location = '../../favoris.php';</script>";
        break;
    case 'deletepro':
		Idao::updatefav($_GET['id_favoris']);
		$a=$_GET['id'];
	    echo "<script type='text/javascript'>window.location = '../../profile.php?id=$a';</script>";
        break;
    case 'update':
        cart::update($id);
	    echo "<script type='text/javascript'>window.location = '../../favoris.php';</script>";
        break;

    default:
        # code...
        break;
}