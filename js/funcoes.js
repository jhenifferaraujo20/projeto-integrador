/* ==================== LOGIN/ CADASTRO ==================== */
$(document).on('click','.user,.voltarlogin',function(){
    $('.modal-login-cadastro').addClass('login-active').removeClass('cadastro-active')
});

$(document).on('click', '.cadastro',function(){
    $('.modal-login-cadastro').addClass('cadastro-active').removeClass('login-active')
});

$(document).on('click', '.fechar-login',function(){
    $('.modal-login-cadastro').removeClass('login-active').removeClass('cadastro-active')
});

let modal = document.querySelector(".modal-login-cadastro");
window.onclick = function(event) {
    if(event.target == modal) {
        modal.classList.remove("login-active");
        modal.classList.remove("cadastro-active");
    }
};

/* ====================== HERO SLIDER ===================== */
var slides = document.querySelectorAll('.slide');
var btns = document.querySelectorAll('.btn');
let currentSlide = 1;

// Javascript for image slider manual navigation
var manualNav = function(manual){
  slides.forEach((slide) => {
    slide.classList.remove('active');

    btns.forEach((btn) => {
      btn.classList.remove('active');
    });
  });

  slides[manual].classList.add('active');
  btns[manual].classList.add('active');
}

btns.forEach((btn, i) => {
  btn.addEventListener("click", () => {
    manualNav(i);
    currentSlide = i;
  });
});

// Javascript for image slider autoplay navigation
var repeat = function(activeClass){
  let active = document.getElementsByClassName('active');
  let i = 1;

  var repeater = () => {
    setTimeout(function(){
      [...active].forEach((activeSlide) => {
        activeSlide.classList.remove('active');
      });

    slides[i].classList.add('active');
    btns[i].classList.add('active');
    i++;

    if(slides.length == i){
      i = 0;
    }
    if(i >= slides.length){
      return;
    }
    repeater();
  }, 8000);
  }
  repeater();
}
repeat();
/* =================== PRODUTOS SLIDER ===================== */
$(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });

/* ==================== PÁGINA PRODUTO ==================== */
function mostrarInfo(){
    $(".info").toggle()
};

function mostrarCaracteristicas(){
    $(".caracteristicas").toggle()
};

$(document).ready(function() {
    $('#vertical').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        vertical: true,
        verticalHeight: 600,
        thumbMargin: 0,
        vThumbWidth: 100,
        slideMargin: 0,
        thumbItem: 3,
        controls: false
    });
});

/* ====================== SACOLA ====================== */
$(document).on('click','.bag',function(){
    $('.sacola, .sacola-overlay').addClass('showSacola')
});

$(document).on('click','.fechar-sacola',function(){
    $('.sacola, .sacola-overlay').removeClass('showSacola')
});
/*
const bagBtn = document.querySelector(".bag");
const fecharBag = document.querySelector(".fechar-sacola");
const checkOut = document.querySelector(".finalizar-compra");
const sacola = document.querySelector(".sacola");
const bagOverlay = document.querySelector(".sacola-overlay");
const bagItens = document.querySelector(".itens-sacola");
const bagTotal = document.querySelector(".sacola-total");
const bagConteudo = document.querySelector(".conteudo-sacola");

let bag = [];

class Produtos{
    getProdutos(){
        fetch('products.json')
    }
}

class DisplayProdutos{

}

class Storage{

}

document.addEventListener("DOMContentLoaded", ()=>{
    const DisplayProdutos = new DisplayProdutos();
    const Produtos = new Produtos();
})*/