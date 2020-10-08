<?php
 
 spl_autoload_register(function($class){
	include("../".strtolower($class).".class.php");
 });
Idao::connect();
extract($_GET); //$id, $action
extract($_POST);
switch ($action) {
    case 'store':
      categorie::store($_POST);
	  echo "<script type='text/javascript'>window.location = '../../depot.php';</script>";
        break;
    case 'delete':
        categorie::delete($id);
        break;
    case 'update':
        categorie::update($_POST, $id);
        break;

    default:
        # code...
        break;
}