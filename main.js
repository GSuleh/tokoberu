//get element
var modal = document.getElementById('lg');
//get open btn
var modalbtn = document.getElementById('mbtn');
//get close btn
var closebtn = document.getElementsByClassName('close1')[0];

//listen for mouse click open
modalbtn.addEventListener('click',openModal);

closebtn.addEventListener('click',closeModal);

window.addEventListener('click',outsideClick);


function openModal(){
	modal.style.display = 'block';
}

function closeModal(){
	modal.style.display = 'none';
}

function outsideClick(e){
	if(e.target == modal){
	modal.style.display = 'none';
	}
}


//get element
var modal2 = document.getElementById('sp');
//get open btn
var modalbtn2 = document.getElementById('mbtn2');
//get close btn
var closebtn2 = document.getElementsByClassName('close2')[0];

//listen for mouse click open
modalbtn2.addEventListener('click',openModal2);

closebtn2.addEventListener('click',closeModal2);

window.addEventListener('click',outsideClick1);


function openModal2(){
	modal2.style.display = 'block';
}

function closeModal2(){
	modal2.style.display = 'none';
}

function outsideClick1(e){
	if(e.target == modal2){
	modal2.style.display = 'none';
	}
}



$(document).ready(function() {
	$('.nav-trigger').click(function() {
		$('.side-nav').toggleClass('visible');
	});
});


//get element
var cart = document.getElementById('cart');
//get open btn
var modalbtn5 = document.getElementById('mbtn3');
//get close btn
var closebtn5 = document.getElementsByClassName('close3')[0];

//listen for mouse click open
modalbtn5.addEventListener('click',openModal5);

closebtn5.addEventListener('click',closeModal5);

window.addEventListener('click',outsideClick5);


function openModal5(){
	cart.style.display = 'block';
}

function closeModal5(){
	cart.style.display = 'none';
}

function outsideClick5(e){
	if(e.target == cart){
	cart.style.display = 'none';
	}
}




















