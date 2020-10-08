<?php
session_start();

  spl_autoload_register(function($class){
	include("models/".strtolower($class).".class.php");
 });
 
if (isset($_SESSION["session_login"])) {
	unset($_SESSION);
	session_destroy();
	echo "<script type='text/javascript'>window.location ='index.php';</script>";


}



?>