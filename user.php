<?php

class Cart 
{
	public $id;
	public $first_name;
	public $last_name;
	public $email;
	public $active;
	function setData($arrData)
	{
		if (array_key_exists('id',$arrData)) {
			$this->name = $arrData['id'];
		}
		if (array_key_exists('first_name',$arrData)) {
			$this->name = $arrData['first_name'];
		}
		if (array_key_exists('last_name',$arrData)) {
			$this->name = $arrData['last_name'];
		}
		if (array_key_exists('email',$arrData)) {
			$this->name = $arrData['email'];
		}
		if (array_key_exists('active',$arrData)) {
			$this->name = $arrData['active'];
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