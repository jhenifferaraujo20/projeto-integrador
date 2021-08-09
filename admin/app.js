let status = document.querySelectorAll('.status');
status.forEach(status => {
    if(status.innerText == 'pendente'){
        status.classList.add('bg-warning');
    }
    if(status.innerText == 'confirmado'){
        status.classList.add('bg-success');
    }
    if(status.innerText == 'finalizado'){
        status.classList.add('bg-info');
    } 
    if(status.innerText == 'cancelado'){
        status.classList.add('bg-danger');
    } 
});

$(document).ready(function(){
    $(document).on('click','#confirmar', function(){
        $('.toast').toast('show');
    })
});