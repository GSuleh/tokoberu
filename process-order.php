<?php
require_once "cart.php";
require_once( "header.php");
include_once( "footer.php");
$shoppingCart = new Cart();

$allData = $shoppingCart->index();
$member_id =$_SESSION["id"];
$cartItem = $shoppingCart->getMemberCartItem($member_id);

$item_quantity = 0;
$item_price = 0;
if (! empty($cartItem)) {
    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {
            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
        }
    }
}

if(!empty($_POST["proceed_payment"])) {
    $name = $_POST ['name'];
    $address = $_POST ['address'];
    $city = $_POST ['city'];
    $zip = $_POST ['zip'];
    $country = $_POST ['country'];
}
$order = 0;
if (! empty ($name) && ! empty ($address) && ! empty ($city) && ! empty ($zip) && ! empty ($country)) {
   
    
        $order = $shoppingCart->insertOrder ($_POST, $member_id, $item_price);
    if(!empty($order)) {

        if (! empty($cartItem)) {
            
            if (! empty($cartItem)) {
                foreach ($cartItem as $item) {
                    $shoppingCart->insertOrderItem ( $order, $item["id"], $item["price"], $item["quantity"]);
                }
            }
        }
    }
}

?>
<HTML>
<HEAD>
<TITLE>Process-Order</TITLE>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
        <div class="txt-heading">
            <div class="txt-heading-label">Shopping Cart</div>

            <div class="cart-status">
                <div>Total Quantity: <?php echo $item_quantity; ?></div>
                <div>Total Price: $ <?php echo $item_price; ?></div>
            </div>
        </div>
        <?php
        if (! empty($cartItem)) {
            ?>
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

   <tr></tr>
  <tr style="font-style:bold;">
   
   <td>Total Item</td>
   <td><?php echo $total_item; ?></td>
   <td>Total Price</td> 
   <td><?php echo $total_price ?></td>
 
  </tr>
</table>


</div>
          
<?php
        } // End if !empty $cartItem
        ?>

</div>
<?php if(!empty($order)) { ?>
    <form name="frm_customer_detail" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
    <input type='hidden'
							name='business' value='grldsuleh-facilitator@gmail.com'> <input
							type='hidden' name='item_name' value='Cart Item'> <input
							type='hidden' name='item_number' value="<?php echo $order;?>"> <input
							type='hidden' name='amount' value='<?php echo $item_price; ?>'> <input type='hidden'
							name='currency_code' value='USD'> <input type='hidden'
							name='notify_url'
							value='localhost/tokoberu/notify.php'> <input
							type='hidden' name='return'
							value='localhost/tokoberu/response.php'> <input type="hidden"
							name="cmd" value="_xclick">  <input
							type="hidden" name="order" value="<?php echo $order;?>">
    <div>
        <input type="submit" class="btn-action"
                name="continue_payment" value="Continue Payment">
    </div>
    </form>
<?php } else { ?>
<div class="success">Problem in placing the order. Please try again!</div>
<div>
        <button class="btn-action">Back</button>
    </div>
<?php } ?>
</BODY>
</HTML>