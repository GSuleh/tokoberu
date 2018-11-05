<?php



if (isset($_POST['add_to_cart'])) {
    include_once 'db.php';
    //$_SESSION[ 'u_id'];





$id = $mysqli->real_escape_string($_POST['id']);
$uid = $mysqli->real_escape_string($_POST['uid']);
$title = $mysqli->real_escape_string($_POST['hidden_title']);
$price = $mysqli->real_escape_string($_POST['hidden_price']);
$quantity = $mysqli->real_escape_string($_POST['hidden_quantity']);
$total = $price * $quantity;
        
$sql = "INSERT INTO cart (product_id, user_id, product_title,quantity, price, total) VALUES ('$id','$uid','$title','$quantity','$price','$total');";
    mysqli_query($mysqli, $sql);
    header("Location: profile.php");
    exit();
}else{
 echo "erro posting";
}



?>