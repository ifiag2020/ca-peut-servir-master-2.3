<?php

class Produit extends Idao
{
    public static $table = "produit";
	
	public $id;
	function __construct($id)
	{
		$this->id = $id;
	}
}

?> 