<?php

class User extends Idao
{
    public static $table = "user";
	
	public $id;
	function __construct($id)
	{
		$this->id = $id;
	}
}

?> 