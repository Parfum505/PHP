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
	protected $ice;
	protected $lemon;
	function __construct($id, $name, $price, $group, $ice = '', $lemon = '')
	{
		$this->id = (int)$id;
		$this->name = (string)(trim(strip_tags($name)));
		$this->price = number_format($price, 2, '.', '');
		$this->group = (string)(trim(strip_tags($group)));
		$this->ice = (string)(trim(strip_tags($ice)));
		$this->lemon = (string)(trim(strip_tags($lemon)));
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
	public function getIce()
	{
		return $this->ice;
	}
	public function getLemon()
	{
		return $this->lemon;
	}
}