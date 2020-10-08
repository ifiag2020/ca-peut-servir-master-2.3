<?php

class Commande extends Idao
{
    public static $table = "commande";
	
	public $id;
	function __construct($id)
	{
		$this->id = $id;
	}
}

?> 