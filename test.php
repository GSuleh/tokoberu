
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tokoberu";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

for ($i=1;  $i<=10; $i++) {


$image= addslashes($_FILES['file']['tmp_name']);
$image= file_get_contents($image);
$image= base64_encode($image);


$pic = $image;


$sql = "INSERT INTO product (category, type, title, price, description,image)
VALUES ('Card', 'African','Dashiki', '450', 'wall','$pic' )";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>