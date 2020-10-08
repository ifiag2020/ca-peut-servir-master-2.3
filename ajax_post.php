<?php

spl_autoload_register(function($class){
	include("models/".strtolower($class).".class.php");
});

Idao::connect();

$json_rep['rep'] = false;
$json_rep['message'] = "";
$json_rep['redirect'] = "";

if(isset($_POST['action']) && $_POST['action'] == 'addToCart'){
	$id_produit = $_POST['id_produit'];
	$qte = $_POST['qte'];
	$id_cart = $_POST['id_cart'];
	
	Idao::$table = "produit";
	$produit = Idao::find($id_produit);
	
	$data_val = array(
		"id_cart"=> $id_cart,
		"id_produit"=> $id_produit,
		"qte"=> $qte,
		"date_add"=> date('Y-m-d H:i:s')
	);
	
	$rep = cart::storepanier($data_val);
	if($rep){
		$json_rep['rep'] = true;
		$json_rep['message'] = "<h2>Votre article a été ajouté.</h2>";
		$json_rep['redirect'] = "";
	}else{
		$json_rep['rep'] = false;
		$json_rep['message'] = "<h2>Une erruer s'est produite lors de l'ajout du produit au panier.</h2>";
		$json_rep['redirect'] = "";
	}
	echo json_encode($json_rep);
	//echo $id_cart;
}

if(isset($_POST['action']) && $_POST['action'] == 'addToWishlist'){
	$id_produit = $_POST['id_produit'];
	$id_user = $_POST['id_user'];

	$data_val = array(
		"id_produit"=> $id_produit,
		"id_user"=> $id_user
	);
	
	$rep = cart::storefavoris($data_val);
	if($rep){
		$json_rep['rep'] = true;
		$json_rep['message'] = "<span>Votre article a été ajouté au favoris.</span>";
		$json_rep['redirect'] = "";
	}else{
		$json_rep['rep'] = false;
		$json_rep['message'] = "<span>Une erruer s'est produite lors de l'ajout du produit au favoris.</span>";
		$json_rep['redirect'] = "";
	}
	echo json_encode($json_rep);
	//echo $produit;
}

if(isset($_POST['action']) && $_POST['action'] == 'updateCartElmQty'){
	$id_cart_produit = $_POST['id_cart_produit'];
	$qte = $_POST['qte'];
	$rep = Idao::updateCartElmQty($id_cart_produit, $qte);
	if($rep){
		$json_rep['rep'] = true;
		//$json_rep['message'] = "<span>La quantité a été modifiée avec succès.</span>";
	}else{
		$json_rep['rep'] = false;
		//$json_rep['message'] = "<span>Une erreur s'est produite lors de l'ajout du produit au favoris.</span>";
	}
	echo json_encode($json_rep);
}

?>