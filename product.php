<?php

$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

//PayPal Business Email
$paypalID = 'grldsuleh-facilitator@gmail.com';

class Product 
{
	public $product_id;
	public $category;
	public $type;
	public $title;
	public $price;
	public $description;
	public $image; 

	function setData($arrData)
	{
		if (array_key_exists('product_id',$arrData)) {
			$this->name = $arrData['product_id'];
		}
		if (array_key_exists('category',$arrData)) {
			$this->name = $arrData['category'];
		}
		if (array_key_exists('type',$arrData)) {
			$this->name = $arrData['type'];
		}
		if (array_key_exists('title',$arrData)) {
			$this->name = $arrData['title'];
		}
		if (array_key_exists('price',$arrData)) {
			$this->name = $arrData['price'];
		}
		if (array_key_exists('description',$arrData)) {
			$this->name = $arrData['description'];
		}
		if (array_key_exists('image',$arrData)) {
			$this->name = $arrData['image'];
		}
	}

	public function index()
	{

		 $host = 'localhost';
		 $password = '';
		 $user = 'root';
		 $dbname = 'tokoberu';

		$DBM = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
		$sql = "SELECT * FROM product";
		$statementHandler = $DBM->query($sql);
		$statementHandler->setFetchMode(PDO::FETCH_OBJ);
		return $statementHandler->fetchALL();
	}
}
?>