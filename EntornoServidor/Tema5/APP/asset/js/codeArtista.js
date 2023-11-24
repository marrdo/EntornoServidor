"use strict";

////////////
//FUNCTIONS
////////////

function ocultarSecciones(){
    document.querySelectorAll('section').forEach((section)=>{
        section.classList.add('oculto');
    });
}


/////////////
//MAIN
////////////

ocultarSecciones();

document.querySelector('[name=incorporacion]').addEventListener('click',()=>{
    ocultarSecciones();
    document.querySelector('.incorporar').classList.remove('oculto');
});

document.querySelector('[name=listar]').addEventListener('click',()=>{
    ocultarSecciones();
    document.querySelector('.modificar').classList.remove('oculto');
});