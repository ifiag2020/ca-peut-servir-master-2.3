<?php

class Cart extends Idao
{
    public static $table = "cart";
	
	public $id;
	function __construct($id)
	{
		$this->id = $id;
	}
}

?> 