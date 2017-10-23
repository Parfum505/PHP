<?php
/**
*
*/
class Cart
{
	protected $cart_arr = [];

	function __construct()
	{
		if(!isset($_COOKIE['cart'])){
            $this->cart_arr = ['orderId' => uniqid('', true)];
            $this->saveToCart();
        }else{
            $this->cart_arr = unserialize(base64_decode($_COOKIE['cart']));
            }
        }
	private function saveToCart(){
		// print_r($this->cart_arr);
        $str = base64_encode(serialize($this->cart_arr));
        setcookie('cart', $str, 0x7FFFFFFF, '/');
	}
	public function count()
	{
		$count = 0;
		$arr = array_slice($this->cart_arr, 1);
			foreach ($arr as $value) {
				$count += (int)$value['qu'];
			}
		return $count;
	}
	private function add2Cart($item, $qu)
	{
		$id = $item->getId();
		$qu = $qu >= 1? (int)$qu : 1;

		if (isset($this->cart_arr[$id])) {
            $this->updateCart($id, $qu);
        } else {
            $this->cart_arr[$id] = array('item' => $item, 'qu' => $qu);
            $this->saveToCart();
        }
	}
	public function itemAdd2Cart(Items $item, $qu)
	{
		$this->add2Cart($item, $qu);
	}
	public function drinksAdd2Cart(Drinks $item, $qu)
	{
		$this->add2Cart($item, $qu);
	}
	public function updateCart($id, $qu)
	{
		$this->cart_arr[$id]['qu'] = (int)$qu >= 1? (int)$qu : 1;
		$this->saveToCart();
	}
	public function deleteItemFromCart($id)
	{
		$id = (int)$id;
		unset($this->cart_arr[$id]);
		$this->saveToCart();
	}
	public function myCart()
	{
		array_shift($this->cart_arr);
		return $this->cart_arr;
	}















}