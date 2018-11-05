<?php

if (isset($_POST['comment-post-btn'])) {
	include_once 'db.php';
	//$_SESSION[ 'u_id'];


		

		$pid = mysqli_real_escape_string($mysqli, $_POST['product_id']);
		$userid =mysqli_real_escape_string($mysqli, $_POST['user_id']);
		$nm =mysqli_real_escape_string($mysqli, $_POST['product_name']);
		$pr = mysqli_real_escape_string($mysqli, $_POST['product_price']);
		$qt =mysqli_real_escape_string($mysqli, $_POST['product_quantity']);
		$total =  mysqli_real_escape_string($mysqli, $_POST['product_total']);

	$sql = "INSERT INTO cart (product_id,user_id,product_name, product_price, product_quantity) VALUES ('$pid','$about','$userid','$nm','$pr','$qt','$total');";
	mysqli_query($mysqli, $sql);
	header("Location: notifications.php");
	exit();
}else{
 echo "error posting";
}
?>
