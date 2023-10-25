<?php 



function generar_abecedario_con_check(){
    $abecedario = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");    
    foreach ($abecedario as $letra) {
        echo '<label>'.ucfirst($letra).'<input type="checkbox" name="letras[]" value="'.$letra.'"></label>';
    }

}


function mostrarJuegos($juegos=array()){

    foreach ($juegos as $juego) {
        echo '<tr>';
        foreach ($juego as $key => $value) {
            echo'<td>'.$value.'</td>';
            
        }
         echo '</tr>';
    }

    

}

function filtrarVideojuegos($arrayVideojuegos=array(),$letrasSeleccionadas=array()){
    $juegosFiltrados=[];
    foreach($arrayVideojuegos as $juego){

        foreach($juego as $key=>$value){
            if($key=="nombre"){
                $letraInicial=substr($value,0,1);
                if(in_array($letraInicial,$letrasSeleccionadas)){
                    $juegosFiltrados[]=$juego;
                } 
            }
        }

    }
    return $juegosFiltrados;
} 

?>