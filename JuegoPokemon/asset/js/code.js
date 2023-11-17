"use strict";

////////////
//FUNCTIONS
////////////


////////////
//MAIN
////////////


/*      //////// LOGIN ////////         */
/*      /// REGISTRO  ////////          */
const artRegistro = document.querySelector('.registro');
const artLogeo = document.querySelector('.logeo');
const btnRegistro = document.querySelector('#registro');
const btnInicioSesion = document.querySelector('#volverInicio');

artRegistro.classList.add('oculto');

btnRegistro.addEventListener('click', ()=>{
    artRegistro.classList.remove('oculto');
    artLogeo.classList.add('oculto');
});

btnInicioSesion.addEventListener('click', ()=>{
    artRegistro.classList.add('oculto');
    artLogeo.classList.remove('oculto');
});