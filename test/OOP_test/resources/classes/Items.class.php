<?php
include_once "Food.class.php";
/**
*
*/
class Items implements Food
{
	protected $id;
	protected $name;
	protected $price;
	protected $group;
	function __construct($id, $name, $price, $group, $ice = '', $lemon = '')
	{
		$this->id = (int)$id;
		$this->name = (string)(trim(strip_tags($name)));
		$this->price = number_format($price, 2, '.', '');
		$this->group = (string)(trim(strip_tags($group)));
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