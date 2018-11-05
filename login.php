<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->real_escape_string($_POST['email2']);
$result = $mysqli->query("SELECT * FROM user WHERE email='$email'");
$result2 = $mysqli->query("SELECT * FROM admin WHERE email='$email'");

if ( $result->num_rows == 0 && $result2->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();
     $admin = $result2->fetch_assoc();

    if ( password_verify ( $_POST['password2'] ,$user['password']) ) {
        
        $_SESSION['id'] = $user['id'];
        $_SESSION['bio'] = $user['bio'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['profile_pic'] = $user['profile_pic'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {

     if (password_verify ( $_POST['password2'] ,$admin['password'])) {
          $_SESSION['id'] = $admin['id'];
        $_SESSION['email'] = $admin['email'];
        $_SESSION['first_name'] = $admin['first_name'];
        $_SESSION['last_name'] = $admin['last_name'];
        $_SESSION['active'] = $admin['active'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: admin.php");
    }
    else{
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}
}

?>