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
    
        foreach ($cartItem as $item) {
           $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
        
    }
}
?>

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

<?php
        } // End if !empty $cartItem
        ?>

</div>
    <form name="frm_customer_detail" action="process-order.php" method="POST">
    <div class="frm-heading">
        <div class="txt-heading-label">Customer Details</div>
    </div>
    <div class="frm-customer-detail">
        <div class="form-row">
            <div class="input-field">
                <input type="text" name="name" id="name"
                    PlaceHolder="Customer Name" required>
            </div>

            <div class="input-field">
                <input type="text" name="address" PlaceHolder="Address" required>
            </div>
        </div>

        <div class="form-row">
            <div class="input-field">
                <input type="text" name="city" PlaceHolder="City" required>
            </div>

            <div class="input-field">
                <input type="text" name="state" PlaceHolder="State" required>
            </div>
        </div>

        <div class="form-row">
            <div class="input-field">
                <input type="text" name="zip" PlaceHolder="Zip Code" required>
            </div>

            <div class="input-field">
                <input type="text" name="country" PlaceHolder="Country" required>
            </div>
        </div>
    </div>
    <div>
        <input type="submit" class="btn-action"
                name="proceed_payment" value="Proceed to Payment">
    </div>
    </form>


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
