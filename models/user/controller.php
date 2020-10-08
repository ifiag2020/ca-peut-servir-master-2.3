<?php
 
 spl_autoload_register(function($class){
	include("../".strtolower($class).".class.php");
 });
Idao::connect();
extract($_GET); //$id, $action
extract($_POST);
switch ($action) {
    case 'store':
      user::store($_POST);
	  echo "<script type='text/javascript'>window.location = '../../index.php?cone=1';</script>";
        break;
    case 'delete':
        user::delete($id);
        break;
    case 'update':
        user::update($_POST, $id);
        break;

    default:
        # code...
        break;
}