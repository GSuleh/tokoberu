<?php
/* Displays user information and some useful messages */
$title ="Home";
$selected ="Home";
require_once( "header.php");
include_once( "footer.php");


if(!isset($_SESSION["id"])){
    header("location:index.php");


}
?>
<div class="main-content body">
        
  <div class="pimg1">
    <div class="ptext">
      
       <p style="font-size: 30px; font-family: cursive;"> Welcome to Tokoberu Kenya</p>
     
    </div>
  </div>

  <section class="section section-light" style="background-image:url('bg.jpg'); min-height:400px;">
          <div class="card">

<div class="image">
   <img src="gb.jpg">
</div>
<div class="title">
 <h1>Gift Boxes</h1>
</div>
<div class="des">

<button><a href="box.php"> More...</a></button>
</div>
</div>
<!--cards -->


<div class="card">

<div class="image">
   <img src="t1.jpg">
</div>
<div class="title">
 <h1>
Gift Cards</h1>
</div>
<div class="des">
<button><a href="cards.php"> More...</a></button>

</div>
</div>
<!--cards -->


<div class="card">

<div class="image">
   <img src="t2.jpg">
</div>
<div class="title">
 <h1>About Us</h1>
</div>
<div class="des">
 
<button><a href="about.php"> More...</a></button>
</div>
</div>
<!--cards -->
  </section>


  <div class="pimg2">
    <div class="ptext">
      <span class="border">
       <a href="#pimg2"> PRODUCTS</a>
      </span>
    </div>
  </div>

  <section class="section section-light">
 <?php
		include_once("items.php");
    ?>
  </section>

  <section class="section section-light">
    <h2></h2>
    <p>
     

    </p>
  </section>

  <div class="pimg4">
    <div class="ptext">
      <span class="border trans">
        Find US
      </span>
    </div>
  </div>

  <section class="section section-light contacts">
    <h2>CONTACTS</h2>
    <p>
      Email: tokoberukenya@gmail.com <br>
      Telephone: +254 719 251 800 <br>
    </p>
  </section>

  <div class="pimg1">
    <div class="ptext">
      <span class="border">
       <a href="categories.php">LIFE IS ABOUT LIVING</a>
      </span>
    </div>
  </div>
</div>


<style type="text/css">

body, html{
  background: none;
  height:100%;
  margin:0;
  font-size:16px;
  font-family:"Lato", sans-serif;
  font-weight:400;
  line-height:1.8em;
  color:#000000;
}

 .pimg1, .pimg2, .pimg3, .pimg4{
  position:relative;
  opacity:1;
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
  background-image:url('nancy.jpg');
  min-height:550px;
  background-position: top;
}

.pimg2{
  background-image:url('tokob.jpg');
  min-height:400px;
}

.pimg3{
  background-image:url('st.jpg');
  min-height:400px;
}

.pimg4{
  background-image:url('nancy1.jpg');
  min-height:400px;
}

.section{
  text-align:center;
  padding:50px 80px;
}

.section-light{

  background-color:#fff;/*#f4f4f4*/
  color:#666;
}

.section-dark{
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
  .pimg1, .pimg2, .pimg3, .pimg4{
    background-attachment:scroll;
  }
}

a{
	text-decoration: none;
	color: #000;
}



.card{
	transition: 0.3s;
     width: 20%;
     display: inline-block;
     box-shadow: 2px 2px 20px black;
     border-radius: 10px; 
     margin: 2%;
    }
 .card:hover{
 	transition: 0.3s;
     width: 25%;
     display: inline-block;
     box-shadow: 4px 4px 20px #E2472F ;
     border-radius: 10px; 
     margin: 2%;
    }

.image img{
  height: 25%;
  width: 100%;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
  

 
 }

.title{
 
  text-align: center;
  padding: 10px;
  
 }

h1{
  font-size: 20px;
 }

.des{
  padding: 3px;
  text-align: center;
 
  padding-top: 0px;
        border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
}
button{
  margin-top: 40px;
  margin-bottom: 10px;
  background-color:#39dc79;
  border: 1px solid black;
  border-radius: 5px;
  padding:10px;
}
button:hover{
  background-color: #E2472F;
  color: white;
  transition: .5s;
  cursor: pointer;
}

</style>
