



/* slide */





let currentSlide = 0;
let slideTotal = document.querySelectorAll('.slide-item').length;

let currentBall = 0;
document.querySelectorAll('.bola');


document.querySelector('.slide-width').style.width = `calc(100vw  * ${slideTotal})`;

document.querySelector('.controls').style.height = `${document.querySelector('.slide').clientHeight}px`;


//funções

const voltar = ()=>{
	currentSlide--;
	if(currentSlide < 0){
		currentSlide = slideTotal - 1;
	}

	updateMargin();
}

const passar = ()=>{
   currentSlide++;
   if(currentSlide > (slideTotal - 1)){
	   currentSlide = 0;
   }

   updateMargin();
}


const updateMargin =()=>{
   let slideItemWidth = document.querySelector('.slide-item').clientWidth;
   let newMargin = (currentSlide * slideItemWidth);
   document.querySelector('.slide-width').style.marginLeft = `${-newMargin}px`;
}

setInterval(passar, 9000);





/*Scroll Menu */

window.addEventListener("scroll",()=>{
   let menu = document.querySelector('header');
   menu.style.color = "#fff";
   menu.classList.toggle('sticky', window.scrollY > 90);

});



/* Efeito de passar o mouse no whatspp */

let whatsappText = ()=>{
  let texto = document.querySelector('.w-area');

  if(texto.classList.contains('w')){
	   texto.classList.remove('w');
  }else{
	  texto.classList.add('w');
  }
}