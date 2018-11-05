<?php

class Cart 
{
	public $id;
	public $product_id;
	public $user_id;
	public $product_title;
	public $product_image;
	public $quantity;
	public $price;
	public $total;

	function setData($arrData)
	{
		if (array_key_exists('id',$arrData)) {
			$this->name = $arrData['id'];
		}
		if (array_key_exists('product_id',$arrData)) {
			$this->name = $arrData['product_id'];
		}
		if (array_key_exists('user_id',$arrData)) {
			$this->name = $arrData['user_id'];
		}
		if (array_key_exists('product_title',$arrData)) {
			$this->name = $arrData['product_title'];
		}
		if (array_key_exists('product_image',$arrData)) {
			$this->name = $arrData['product_image'];
		}
		if (array_key_exists('quantity',$arrData)) {
			$this->name = $arrData['quantity'];
		}
		if (array_key_exists('price',$arrData)) {
			$this->name = $arrData['price'];
		}
		if (array_key_exists('total',$arrData)) {
			$this->name = $arrData['total'];
		}
	}

	public function index()
	{

		 $host = 'localhost';
		 $password = '';
		 $user = 'root';
		 $dbname = 'tokoberu';

		$DBM = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
		$sql = "SELECT * FROM cart";
		$statementHandler = $DBM->query($sql);
		$statementHandler->setFetchMode(PDO::FETCH_OBJ);
		return $statementHandler->fetchALL();
	}


	 function insertDB($query, $params = array())
    {

    	$host = 'localhost';
		 $password = '';
		 $user = 'root';
		 $dbname = 'tokoberu';

		 $conn = mysqli_connect($host, $user, $password, $dbname);
    
        $sql_statement = $conn->prepare($query);
        if (! empty($params)) {
            $this->bindParams($sql_statement, $params);
        }
        $sql_statement->execute();
        
        $id = mysqli_insert_id ( $conn );
        return $id;
    }
    
     function updateDB($query, $params = array())
    {
    	$host = 'localhost';
		 $password = '';
		 $user = 'root';
		 $dbname = 'tokoberu';

		$conn = mysqli_connect($host, $user, $password, $dbname);

        $sql_statement = $conn->prepare($query);
        if (! empty($params)) {
            $this->bindParams($sql_statement, $params);
        }
        $sql_statement->execute();
    }

    function getDBResult($query, $params = array())
    {

    	$host = 'localhost';
		 $password = '';
		 $user = 'root';
		 $dbname = 'tokoberu';

		$conn = mysqli_connect($host, $user, $password, $dbname);

        $sql_statement = $conn->prepare($query);
        if (! empty($params)) {
            $this->bindParams($sql_statement, $params);
        }
        $sql_statement->execute();
        $result = $sql_statement->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if (! empty($resultset)) {
            return $resultset;
        }
    }



	function insertOrder($customer_detail, $member_id, $amount)
    {

 

        $query = "INSERT INTO tbl_order (customer_id, amount, name, address, city, state, zip, country, payment_type, order_status, order_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $amount
            ),
            array(
                "param_type" => "s",
                "param_value" => $customer_detail["name"]
            ),
            array(
                "param_type" => "s",
                "param_value" => $customer_detail["address"]
            ),
            array(
                "param_type" => "s",
                "param_value" => $customer_detail["city"]
            ),
            array(
                "param_type" => "s",
                "param_value" => $customer_detail["state"]
            ),
            array(
                "param_type" => "s",
                "param_value" => $customer_detail["zip"]
            ),
            array(
                "param_type" => "s",
                "param_value" => $customer_detail["country"]
            ),
            array(
                "param_type" => "s",
                "param_value" => "PAYPAL"
            ),
            array(
                "param_type" => "s",
                "param_value" => "PENDING"
            ),
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d H:i:s")
            )
        );

        $order_id = $this->insertDB($query, $params);
        return $order_id;
    }

    function bindParams($sql_statement, $params)
    {
        $param_type = "";
        foreach ($params as $query_param) {
            $param_type .= $query_param["param_type"];
        }
        
        $bind_params[] = & $param_type;
        foreach ($params as $k => $query_param) {
            $bind_params[] = & $params[$k]["param_value"];
        }
        
        call_user_func_array(array(
            $sql_statement,
            'bind_param'
        ), $bind_params);
    }

     function insertOrderItem($order, $product_id, $price, $quantity)
    {
        $query = "INSERT INTO tbl_order_item (order_id, product_id, item_price, quantity) VALUES (?, ?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $order
            ),
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $price
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            )
            );
        
        $this->insertDB($query, $params);
    }
    
    function insertPayment($order, $payment_status, $payment_response)
    {
        $query = "INSERT INTO tbl_payment(order_id, payment_status, payment_response) VALUES (?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $order
            ),
            array(
                "param_type" => "s",
                "param_value" => $payment_status
            ),
            array(
                "param_type" => "s",
                "param_value" => $payment_response
            )
        );
        
        $this->insertDB($query, $params);
    }
    
    function paymentStatusChange($order, $status) {
        $query = "UPDATE tbl_order SET  order_status = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $status
            ),
            array(
                "param_type" => "i",
                "param_value" => $order
            )
        );
        
        $this->updateDB($query, $params);
    }


    function getMemberCartItem($member_id)
    {
        $query = "SELECT product.*, cart.id as cart_id,cart.quantity FROM product, cart WHERE 
            product.id = cart.product_id AND cart.user_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }
}


?>