<?php

/**
*
*/
class Items
{
	protected $id;
	protected $name;
	protected $price;
	protected $group;
	function __construct($id, $name, $price, $group)
	{
		$this->id = (int)$id;
		$this->name = (string)$name;
		$this->price = number_format($price, 2, '.', '');
		$this->group = (string)$group;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getPrice()
	{
		return $this->price;
	}
	public function getGroup()
	{
		return $this->group;
	}
}