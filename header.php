<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tokoberu</title>
    
    <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link rel="stylesheet" type="text/css" href="style3.css">
    
    <link rel="php" type="text/php" href="./loginvalidation.php">
   
              <script src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" "></script>
    
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script type="text/javascript">
        $(document).ready(function(){
            $('.search-icon').click(function(){
                $('.search').slideToggle()
            })
             $('.close').click(function(){
                $('.search').slideToggle()
            })
        })
    </script>
 
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
<header>

    <section>
            <div class="full-width search">
                <div class="search-form">
                <form method="POST" action="search.php">
                    <input type="text" name="search" placeholder="Search.." style="display: inline; ">
                    <input type="submit" name="sc" style="display: inline; margin: 0px;" value="Search">
                </form>
                    <div class="close"><i class="fa fa-times" aria-hidden="true"></i>
                </div>  
                </div>             
            </div>
            <div class="full-width navbar">
            <a href="<?php
                        if(isset($_SESSION["id"])){
                            echo 'profile.php';}
                                else{
                            echo 'index.php';
                    }?>" class="<?php 
                if($selected=="Home"){
                echo 'selected-link';}
            ?>"><img class= "brand" src="toko.jpg"></img></a>
            <ul>
            
                <li><a href="
                    <?php
                        if(isset($_SESSION["id"])){
                            echo 'profile.php';}
                                else{
                            echo 'index.php';
                    }?>" class="<?php 
                if($selected=="Home"){
                echo 'selected-link';}
            ?>">HOME</a></li>


            
            <?php 

if(isset($_SESSION["id"])){
            ?>
             <li ><a href="shoppingcart.php" class="<?php 
                if($selected=="Cart"){
                echo 'selected-link';}
                ?>" id="mbtn3" >Cart</a></li>

             <li><a href="logout.php" >SIGN OUT</a></li>
            
         
            <?php 
            }
            else{
            ?>    
               <li><a href="#login" id="mbtn">SIGN IN</a></li>

                <li><a href="#" id="mbtn2">SIGN UP</a></li>
            <?php   
             }

            ?>

                <li><a href="cards.php" class="<?php 
                if($selected=="Card"){
                echo 'selected-link';}
                ?>">    Gift Cards</a></li>

                <li><a href="box.php" class="<?php 
                if($selected=="Box"){
                echo 'selected-link';}
                ?>">Gift Boxes</a></li>

                <li><a href="about.php" class="<?php 
                if($selected=="About"){
                echo 'selected-link';}
            ?>">ABOUT</a></li>
            
                <li><a class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a></li>
            </ul>


             
            <div id="lg" class="login">
        <img src="avatar.png" class="avatar">
        <span class="close1">&times;</span>
        <h1>Login</h1>
        <form method="POST" action="index.php">             
            <p>Email</p>
            <input type="text" name="email2" placeholder="Email">
            <p>Password</p>
            <input type="password" name="password2" placeholder="Enter password">
            <input type="submit" name="login" value="Login">
          
            <a href="#">Forgot password</a>
        </form>
    </div>

           <div id="sp" class="login">
        <img src="avatar.png" class="avatar">
        <span class="close2">&times;</span>
        <h1>Login</h1>
                
        <form method="POST" action="index.php">
            <p>First Name</p>
            <input type="text" name="fname" placeholder="firstname">
            <p>Second Name</p>
            <input type="text" name="lname" placeholder="Second name">
            <p>Email</p>
            <input type="text" name="email" placeholder="Email">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter password">
            <input type="submit" name="register" value="Sign Up">
            <a href="#">Forgot password</a>
        </form>
    </div>

    </section>    
</header>
<script src="main.js" type="text/javascript"></script>
