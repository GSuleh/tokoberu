  <table style="width:100%">
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
      while (  $oneData->user_id; ? == $_SESSION['id']) {
      
    

    ?>




  <tr>
   <td><?php echo $oneData->title; ?></td>
   <td>'<?php echo $oneData->quantity; ?>'</td>
   <td align="right">$ '.<?php echo $oneData->price; ?>.'</td>
   <td align="right">$ '.number_format(<?php echo $oneData->quantity; ?> * <?php echo $oneData->price; ?>, 2).'</td>
   <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button></td>
  </tr>

  <?php
  $total_price = $total_price + ( echo $oneData->quantity; ? *   $oneData->price; );
  $total_item = $total_item + 1;


  } 
}


  
  $data = array(
 'cart_details'  => $output,
 'total_price'  => 'Ksh'
 . number_format($total_price, 2),
 'total_item'  => $total_item
); 

echo json_encode($data);
   ?>
</table>

