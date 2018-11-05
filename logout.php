<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>LOGOUT</title>
  <link rel="stylesheet" type="text/css" href="sup.css">
</head>

<body>
    <div class="form">
          <h1>Thanks for stopping by</h1>
              
          <p><?php echo'You have logged out successfully!'; ?></p>
          
          <a href="index.php"><button class="button"/>Home</button></a>

    </div>
</body>
</html>

