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
let banners = ["hero-img.jpg"]

function TrocarBanner(banner){
    document.querySelector(".imagem-banner").src = "images/" + banners[banner];
};

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
/* váriaveis */
