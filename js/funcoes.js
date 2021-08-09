/* ==================== LOGIN/ CADASTRO ==================== */
$(function(){
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
});

/* =================== MENU ===================== */
$(document).on('click','#bt-menu',function(){
    $('.barra-navegacao, .menu').addClass('showNavbar')
});

$(document).on('click','.fechar-menu',function(){
    $('.barra-navegacao').removeClass('showNavbar')
});


$(document).on('click','.roupas-btn',function(){
    $('.roupas').toggle()
});

$(document).on('click','.praia-btn',function(){
    $('.praia').toggle()
});

$(document).on('click','.calcados-btn',function(){
    $('.calcados').toggle()
});

$(document).on('click','.acessorios-btn',function(){
    $('.acessorios').toggle()
});

/* =================== SLICK SLIDER / MAIS VENDIDOS ===================== */
$('.slick').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: '<button class="slick-prev" aria-label="Previous" type="button"><i class="bi bi-chevron-left"></i></button>',
    nextArrow: '<button class="slick-next" aria-label="Next" type="button"><i class="bi bi-chevron-right"></i></button>',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
});

/* ==================== PÁGINA PRODUTOS FILTRO =================== */
$(document).on('click','.filtro-btn',function(){
  $('.showFiltro').toggle()
});

/* ==================== PÁGINA PRODUTO SLIDER VERTICAL  ==================== */
$('.slider-for').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    asNavFor: '.slider-nav',
    responsive: [
        {
          breakpoint: 992,
          settings: {
            dots: true
          }
        },
    ]
});

$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    vertical: true,
    asNavFor: '.slider-for',
    dots: false,
    focusOnSelect: true,
    verticalSwiping: true
});

/* ====================== SACOLA ====================== */
$(function(){
  $(document).on('click','.cart-btn',function(){
    $('.cart-overlay, .cart').addClass('transparentBcg, showCart')
  });
  
  $(document).on('click','.close-cart',function(){
    $('.cart, .cart-overlay').removeClass('showCart')
  });
  
  /*let overlay = document.querySelector(".cart-overlay");
  let cart = document.querySelector(".cart");
  window.onclick = function(event) {
      if(event.target == overlay) {
          overlay.classList.remove("showCart");
          cart.classList.remove("showCart");
      }
  };*/
  
});

/* ================== TAMANHO ================== */
$(".tamanho").on('click', function(){
  $(this).toggleClass('ativo').siblings().removeClass('ativo');
})