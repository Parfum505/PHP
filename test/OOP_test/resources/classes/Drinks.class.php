<?php
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
		$this->ice = (string)$ice;
		$this->lemon = (string)$lemon;
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