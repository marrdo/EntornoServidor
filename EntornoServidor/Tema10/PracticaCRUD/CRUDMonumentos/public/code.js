// function mostrarMonumentos(monumentos){
//     const container = document.querySelector('#json');

//     const listaMonumentos = document.createElement('ul');

//     monumentos.forEach(monumento => {
//         const item = document.createElement('li');
//         item.textContent = monumento.nombre+" "+monumento.aforo;
//         listaMonumentos.appendChild(item);
//     });

//     container.appendChild(listaMonumentos);
// }




// fetch('/monumento/index')
// .then(response =>{
//     if(!response.ok){
//         throw new Error('Ocurrió un error al obtener los datos');
//     }
//     return response.json();
// })
// .then(data=>{
//     mostrarMonumentos(data);
// })
// .catch(error=>{
//     console.error('Error: ',error)
// })

