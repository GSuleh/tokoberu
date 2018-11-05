<?php
/* Displays user information and some useful messages */
$title ="About Us";
$selected ="About";
require_once( "header.php");
include_once( "footer.php");



?>
<div class="main-content body">
        
  <div class="pimg1">
    <div class="ptext">
      <span class="border">
       <a href="home.php">Tokoberu</a>
      </span>
    </div>
  </div>

  <section class="section section-light">
    <h2>Brief</h2>
    <p>
     Tokoberu</p>
    <p>
   Tokoberu Kenya is a creative arts company that deals with custom cards designing and graphic design. 
    </p>
    <p>
   Art is the expression of one’s creativity and imagination in a skilful visual, auditory, or performing arts representation. This is all done with the aim of creating a lasting emotional impact, to convey ideas, technical skill and for decoration of people and objects. The culture of Art in Kenya is evident in arts and crafts designed by different communities which Tokobru aims to represent wit its products. Kenya’s cultural background in Art is rich and diverse, encompassing many different styles such as paintings, beadwork, ornaments, sculptures as well as fabric design and Tokoberu aims to exemplify this adornment and creation of designs for aesthetic, ritual and functional purposes. 
    </p>
  </section>

  <div class="pimg2">
    <div class="ptext">
      <span class="border trans">
        PURPOSE
      </span>
    </div>
  </div>

  <section class="section section-dark">
    <h2>PURPOSE</h2>
    <p>
      In a city with a variety of beautiful and creative cultural footprints,Tokoberu aims to communicate and convey this beautiful culture through its products and designs in order to cater for your gifting needs. 

    </p>
  </section>

  <div class="pimg3">
    <div class="ptext">
      <span class="border trans">
        Find US
      </span>
    </div>
  </div>

  <section class="section section-dark contacts">
    <h2>CONTACTS</h2>
    <p>
      Email: lookitup@gmail.com <br>
      Telephone: +254 713141007 <br>
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

 .pimg1, .pimg2, .pimg3{
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
  min-height:510px;
  background-position: top;
}

.pimg2{
  background-image:url('nancy1.jpg');
  min-height:400px;
}

.pimg3{
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
  .pimg1, .pimg2, .pimg3{
    background-attachment:scroll;
  }
}

a{
	text-decoration: none;
	color: #000;
}
</style>
