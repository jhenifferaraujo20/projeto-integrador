/* ==================== LOGIN/ CADASTRO ==================== */
/*function abrirLogin(){
    document.querySelector(".modal-login-cadastro").style.display = "flex";
}

function fecharLogin(){
    document.querySelector(".modal-login-cadastro").style.display = "none";
}*/

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