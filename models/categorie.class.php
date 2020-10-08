<?php

class Categorie extends Idao
{
    public static $table = "categorie";
	
	public $id;
	function __construct($id)
	{
		$this->id = $id;
	}
}

?> 