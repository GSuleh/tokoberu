<?php
require_once "cart.php";


$shoppingCart = new Cart();

?>
<HTML>
<HEAD>
<TITLE>Enriched Responsive Shopping Cart in PHP</TITLE>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<?php
$cartItem = $shoppingCart->user_id;
$item_quantity = 0;
$item_price = 0;
if (! empty($cartItem)) {
    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {
            $item_quantity = $item_quantity + $item->quantity;
            $item_price = $item_price + ($item->price * $item->quantity);
        }
    }
}
?>
<div id="shopping-cart">
        <div class="txt-heading">
            <div class="txt-heading-label">Shopping Cart</div>

            <a id="btnEmpty" href="index.php?action=empty"><img
                src="image/empty-cart.png" alt="empty-cart"
                title="Empty Cart" class="float-right" /></a>
            <div class="cart-status">
                <div>Total Quantity: <?php echo $item_quantity; ?></div>
                <div>Total Price: <?php echo $item_price; ?></div>
            </div>
        </div>
        <?php
        if (! empty($cartItem)) {
            ?>
<?php
          <?php
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


</div>
            ?>
<?php
        } // End if !empty $cartItem
        $shoppingCart->emptyCart($member_id);
        ?>

</div>
    
    <div class="success">
        Thank you for shopping with us. Your order has been placed. You order Id is <?php echo $_GET["item_number"]; ?>
    </div>
    <div>
        <a href="./"><button class="btn-continue">Continue Shopping</button></a>
    </div>
</BODY>
</HTML>