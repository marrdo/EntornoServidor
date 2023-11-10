"use strict";

///////////////
//Functions
///////////////

////////////////
//MAIN
///////////////

document.addEventListener("DOMContentLoaded", () => {
  const btnadd = document.querySelectorAll("#addProduct");
  const btnrmv = document.querySelectorAll("#rmProduct");

  btnadd.forEach((botonSuma) => {
    botonSuma.addEventListener("click", () => {
      const input = botonSuma.parentNode.querySelector("input[type='number']");
      input.value = Number(input.value) + 1;
    });
  });

  btnrmv.forEach((botonResta) => {
    botonResta.addEventListener("click", () => {
      const input = botonResta.parentNode.querySelector("input[type='number']");
      if (Number(input.value > 0)) {
        input.value = Number(input.value) - 1;
      }
    });
  });
});
