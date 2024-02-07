"use strict";
const btnAniadirConcierto = document.querySelector('button[name=aniadirConcierto]');

const secIncorporar = document.querySelector('.incorporar');

secIncorporar.classList.add('oculto');

btnAniadirConcierto.addEventListener('click',()=>{
    secIncorporar.classList.toggle('oculto');
});

document.addEventListener('click',()=>{
    document.querySelector('.informacion').classList.add('oculto');
})