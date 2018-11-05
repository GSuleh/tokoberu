<?php
/* Displays user information and some useful messages */
$title ="Cart";
$selected ="Cart";
require_once( "header.php");
include_once( "footer.php");
  $total_price = 0;

 $total_item =0; 
?>
<div class="main-content body ">
  <div style="width:80%;" class="log">
   <table style="width:100%;">
  <tr>
  
  <tr>  
            <th width="40%">Title</th>  
            <th width="10%">Quantity</th>  
            <th width="20%">Price</th>  
            <th width="15%">Total</th>  
            <th width="5%">Action</th>  
        </tr>
<?php
    require_once("cart.php");





    $cart = new Cart();
    $allData = $cart->index();

     
    foreach ($allData as $oneData) {
     if (  $oneData->user_id== $_SESSION['id']) {
      
    

    ?>




  <tr>
   <td><?php echo $oneData->product_title ?></td>
   <td>'<?php echo $oneData->quantity; ?>'</td>
   <td align="right">Ksh <?php echo $oneData->price; ?></td>
   <td align="right">Ksh <?php echo $oneData->quantity * $oneData->price; ?></td>
   <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button>
</td>
  </tr>


  <?php

  $total_price = $total_price + ( $oneData->quantity *   $oneData->price);
  $total_item = $total_item + 1;



 

  } 
}

$total_price= 'Ksh' . number_format($total_price, 2);
 $total_item  = $total_item; 
   ?>


  <tr style="font-style:bold;">
   <td>Total Price</td> 
   <td><?php echo $total_price ?></td>
   <td>Total Item</td>
   <td><?php echo $total_item; ?></td>
 
  </tr>
</table>
<div align="center" style="margin: 50px;">
          <a href="checkout.php" class="btn btn-primary" id="check_out_cart">
          <span class="glyphicon glyphicon-shopping-cart"></span> Check out
          </a>
          <a href="#" class="btn btn-default" id="clear_cart">
          <span class="glyphicon glyphicon-trash"></span> Clear
          </a>
</div>

</div>

   <style type="text/css">
     tr{
      text-align: center;
     }


body{
  background-image:url('logout.jpg');

  
  background-size:cover;
  background-repeat:no-repeat;

  
}

.log{
  background-color: #fff;
  width: 100%; 
  height: auto;
  background: rgba(255, 255, 255, 1);
  margin-left: 10%;

  box-sizing: border-box;
  padding: 70px 30px;
  border-radius: 10px;
}

   </style>