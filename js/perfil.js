let btEditar = document.querySelector('input#botaoEditar');
let btSalvar = document.querySelector('input#botaoSalvar');
let formulario = document.querySelector('form#form');

function editar(){
    
    if(btSalvar.classList.contains('hide')){
        btEditar.classList.add('hide');
        btSalvar.classList.remove('hide');
    } else if(btEditar.classList.contains('hide')){
        btEditar.classList.remove('hide');
        btSalvar.classList.add('hide');
    }
}