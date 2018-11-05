<?php
 
                                       
 
require_once("db.php");
require_once( "header.php");
include_once( "footer.php");  

$s = $_POST['search'];

$db = new PDO('mysql:host=127.0.0.1;dbname=tokoberu','root','');
         
                                       
$result = $db->prepare("SELECT * FROM product where title='$s' or category='$s' or type='$s'");
                                       $result->execute();


if ( $result->rowCount() == 0 ){ // User doesn't exist
    $output = "no results";
    print_r("$output");
}
else {
?>
    <div class="main_content body">
<section>
<?php
	while ($ftch = $result->fetch(PDO::FETCH_ASSOC)) 
                                        {
                                          $id= $ftch['id'];
                                          $category= $ftch['category'];
                                           $type= $ftch['type'];
                                            $title=$ftch['title'] ; 
                                             $description=$ftch['description'] ; 
                                              $price=$ftch['price'] ; 
                                               $pic=$ftch['image'] ; 
		# code...
	

    ?>
<div class="app">
  <div class="tain">
    <div class="img-tain">
      <?php if($pic == null){
            echo '<img src="avatar.png" >' ;}else{ echo '<img class="mg" height="1000px" width="750px" src="data:profile_pic;base64,'.$pic.' ">';} ?>
      
    </div>
    
    <div class="tent" style="text-align: left;">
      <div class="head">
           
          <p><?php echo $title; ?></p>
          <h6><?php echo $category; ?></h6>
          <span><?php echo $description; ?></span>
           <p>Price: <?php echo $price;?> </p>
      </div>
      <div class="datas"">
  <?php
  if(isset($_SESSION["id"])){
    ?>


        <div class="inner-datas">
    <form method="POST" action="action.php">
            <input type="text" name="hidden_quantity" class="form-control" value="" style="width: 100px; height: 30px; padding: 5px;">
            <input type="hidden" name="id"  value="<?php echo $id; ?>">
             <input type="hidden" name="uid"  value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="hidden_title"  value="<?php echo $title; ?>">
            <input type="hidden" name="hidden_category"  value="<?php echo $category; ?>">
            <input type="hidden" name="hidden_description"  value="<?php echo $description; ?>">
            <input type="hidden" name="hidden_price"  value="<?php echo $price; ?>">
            <input type="hidden" name="hidden_image" value="<?php echo $image; ?>">
           <input type="submit" name="add_to_cart"  class="add_to_cart" value="Add To Cart" style="display: inline;"></form>
      </form>
        </div>
    </form>  
       <?php }
       else{ ?>
         <input type="submit" name="ac" id="ac" class="add_to_cart" value="Add To Cart" style="display: inline;">


       
    <?php   }
    ?>

      </div> 

</div>
</div>
  </div>

    <?php
	}


}

?>
</div>
</section>


<style type="text/css">
 /* import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600');*/

*{
  margin: 0;
  padding: 0;
}

body{
  background: #fff;
  font-family: 'Open Sans', sans-serif;
}

.app{
  display: inline-block;
height: auto;
width: 350px;
padding: 20px 80px;
;
  

}



.tain{
  padding: 10px 0px;
 display: inline-block; 
  width: 350px;
  height: 250px;
  background: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0,0,0,0.5);
}

.img-tain{
  width: 40%;
  height: 100%;
  float: left;
/*position: relative;*/
}

.img-tain img{
  width: 100%;
  height: 100%;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}

.tent{
  width: 60%;
  height: 100%;
  float: left;
  padding: 0px 20px 0px 20px;
  box-sizing: border-box;
}

.head{
  overflow: hidden;
  padding-bottom: 0px;
}

.head p{
  font-size: 18px;
  color: red;
  font-weight: 600;
}

.head span{
  color: #000;
  font-size: 10px;
}

span{
  display: inline-block;
}
h6{
  color: grey;
}

.datas{
  width: 90%;
  overflow: hidden;
}

.inner-datas{
  width: 50%;
  float: left;
  text-align: left;
  color: #aaabaf;
}

.inner-datas p{
  font-size: 14px;
  padding-bottom: 0px;
}

.inner-datas span{
  font-size: 18px;
  font-weight: 400;
}

#sd{
  display: inline-block;
  background: #E2472F;
  color: #fff;
    height: 32px;
    width: 100px;
    bottom: 8%;
    left: 17%;
    border-style: none;
    border: 1px solid #fff;
    padding: 0px 0px;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.5s ease;
}

#sc:hover{
   color: #fff;
   background: #ff8300;
}
input[type="submit"]{
  width: 100px;
  padding: 2px 0px 2px 0px;
  height: 30px;
  margin-top: 0px;
  margin-bottom: 0px;
  background-color:#E2472F;
  border: 1px solid black;
  border-radius: 5px;
  display: inline;
  color: #fff;
}
input[type="submit"]:hover{
  background-color: #39dc79;
  color: white;
  transition: .5s;
  cursor: pointer;
}


</style>






