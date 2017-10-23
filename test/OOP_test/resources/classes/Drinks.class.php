<?php
include_once 'Items.class.php';
/**
*
*/
class Drinks extends Items
{
	protected $ice;
	protected $lemon;
	function __construct($id, $name, $price, $group, $ice, $lemon)
	{
		parent::__construct($id, $name, $price, $group);
		$this->ice = (string)(trim(strip_tags($ice)));
		$this->lemon = (string)(trim(strip_tags($lemon)));
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