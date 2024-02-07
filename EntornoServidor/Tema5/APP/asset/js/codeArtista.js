"use strict";

////////////
//FUNCTIONS
////////////




/////////////
//MAIN
////////////

const secIncorporar = document.querySelector('.incorporar');

const btnIncorporacion = document.querySelector('[name=incorporacion]');


secIncorporar.classList.add('oculto');

btnIncorporacion.addEventListener('click',()=>{
    secIncorporar.classList.toggle('oculto');
});



document.addEventListener('click',()=>{
    document.querySelector('.informacion').classList.add('oculto');
})

