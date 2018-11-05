<?php
/* Displays user information and some useful messages */
$title ="Gift Boxes";
$selected ="Box";
require_once( "header.php");
include_once( "footer.php");


?>

<div class="main_content body">

  <div class="pimg1">
    <div class="ptext">
      <span class="border">
       <a href="#">Gift Boxes</a>
      </span>
    </div>
  </div>
  <section class="section section-light">
    <?php
    require_once("boxproducts.php");
    ?>
  </section>
</div>



        
        <style type="text/css">

 
.main-content{
  margin-top: 0px;
}
 .pimg1, .pimg2, .pimg3{
  position:relative;
  opacity:1.0;
  background-position:center;
  background-size:cover;
  background-repeat:no-repeat;

  /*
    fixed = parallax
    scroll = normal
  */
  background-attachment:fixed;
}

.pimg1{
  background-image:url('gift.jpg');
  min-height:550px;
}

.pimg2{
  background-image:url('t1.jpg');
  min-height:400px;
}

.pimg3{
  background-image:url('t2.jpg');
  min-height:400px;
}


.section-light{
  padding:10px 0px;
  background-color:#fff;/*#f4f4f4*/
  color:#666;
}

.section-dark{
  height: auto;
  width: 100%;
   padding:10 0px;
  background-color:#000000;
  color:#ddd;
}

.ptext{
  position:absolute;
  top:50%;
  width:100%;
  text-align:center;
  color:#000;
  font-size:27px;
  letter-spacing:8px;
  text-transform:uppercase;
}

.ptext .border{
    background-color:#E2472F;
  color:#000;
  padding:20px;
}

.ptext .border.trans{
  background-color:transparent;
}

@media(max-width:568px){
  .pimg1, .pimg2, .pimg3{
    background-attachment:scroll;
  }
}

h5{
  color: #fff;
  margin-top: 20px;
}

h1{
 text-align: center;
  color: #000;
  margin-top: 20px;
}

.section{
  height: auto;
  text-align:center;

}

a{
  text-decoration: none;
  color: #000;
}

        </style>

          