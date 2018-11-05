<?php



if (isset($_POST['edit'])) {
    include_once 'db.php';
    //$_SESSION[ 'u_id'];




$image= addslashes($_FILES['file']['tmp_name']);
$image= file_get_contents($image);
$image= base64_encode($image);


$category = $mysqli->real_escape_string($_POST['category']);
$type = $mysqli->real_escape_string($_POST['type']);
$title = $mysqli->real_escape_string($_POST['title']);
$price = $mysqli->real_escape_string($_POST['price']);
$picture = $image;
$description = $mysqli->real_escape_string($_POST['description']);
        
$sql = "INSERT INTO product (category, type, title, price, description, image) VALUES ('$category','$type','$title','$price','$description','$picture');";
    mysqli_query($mysqli, $sql);
    header("Location: admin.php");
    exit();
}else{
 echo "error posting";
}



?>