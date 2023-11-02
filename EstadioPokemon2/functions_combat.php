<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function comprobarType($ataque, $typeatacante, $typedefiende)
{

    // Switch para verificar la ventaja o desventaja del tipo del primer Pokémon
    switch ($typeatacante) {
        case "fire":
            switch ($typedefiende) {
                case "fire":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
        
                    break;
        
                case "water":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "grass":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "ice":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
        
                    break;
                case "psychic":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "bug":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "rock":
                    return $ataque; //El ataque =.
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;

        case "water":
            switch ($typedefiende) {
                case "fire":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "water":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "grass":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque; //El ataque =.
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;

        case "grass":
            switch ($typedefiende) {
                case "fire":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "water":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "grass":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "rock":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;
        case "electric":
            switch ($typedefiende) {
                case "fire":
                    return $ataque; //El ataque =.
                    break;
        
                case "water":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "grass":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "electric":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque = 0; //No puede atacar a este tipo
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque; //El ataque =.
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque; //El ataque =.
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;

        case "normal":
            switch ($typedefiende) {
                case "fire":
                    return $ataque; //El ataque =.
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque; //El ataque =.
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "ghost":
                    return $ataque = 0; //No puede atacar a este tipo
                    break;
                case "steel":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;

        case "ground":
            switch ($typedefiende) {
                case "fire":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "electric":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque = 0; //No puede atacar a este tipo
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "rock":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;

        case "fighting":
            switch ($typedefiende) {
                case "fire":
                    return $ataque; //El ataque =.
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque; //El ataque =.
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "poison":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "psychic":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "bug":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "rock":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "ghost":
                    return $ataque = 0; //No puede atacar a este tipo
                    break;
                case "steel":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "dark":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "fairy":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                    
            }
            break;

        case "dragon":
            switch ($typedefiende) {
                case "fire":
                    return $ataque; //El ataque =.
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque; //El ataque =.
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque; //El ataque =.
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque = 0; //No puede atacar a este tipo
                    break;
                    
            }
            break;

        case "ice":
            switch ($typedefiende) {
                case "fire":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "water":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "grass":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "ice":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque; //El ataque =.
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;
        case "poison":
            switch ($typedefiende) {
                case "fire":
                    return $ataque; //El ataque =.
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "ghost":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "steel":
                    return $ataque = 0; //No puede atacar a este tipo
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                    
            }
            break;
        
        case "flying":
            switch ($typedefiende) {
                case "fire":
                    return $ataque; //El ataque =.
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "electric":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "flying":
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "rock":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;
        case "psychic":
            switch ($typedefiende) {
                case "fire":
                    return $ataque; //El ataque =.
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque; //El ataque =.
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "fighting":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "flying":
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque; //El ataque =.
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "dark":
                    return $ataque = 0; //No puede atacar a este tipo
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;
        case "bug":
            switch ($typedefiende) {
                case "fire":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque; //El ataque =.
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "fighting":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "flying":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque; //El ataque =.
                    break;
                case "ghost":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "steel":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                    
            }
            break;
        case "rock":
            switch ($typedefiende) {
                case "fire":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque; //El ataque =.
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "rock":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;
        case "ghost":
            switch ($typedefiende) {
                case "fire":
                    return $ataque; //El ataque =.
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque; //El ataque =.
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque = 0; //No puede atacar a este tipo
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque; //El ataque =.
                    break;
                case "ghost":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "steel":
                    return $ataque; //El ataque =.
                    break;
                case "dark":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;
        case "steel":
            switch ($typedefiende) {
                case "fire":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "water":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "grass":
                    return $ataque; //El ataque =.
                    break;
                case "electric":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
                case "flying":
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "ghost":
                    return $ataque; //El ataque =.
                    break;
                case "steel":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "dark":
                    return $ataque; //El ataque =.
                    break;
                case "fairy":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                    
            }
            break;
        case "dark":
            switch ($typedefiende) {
                case "fire":
                    return $ataque; //El ataque =.
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque; //El ataque =.
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque; //El ataque =.
                    break;
                case "fighting":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "flying":
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque; //El ataque =.
                    break;
                case "ghost":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "steel":
                    return $ataque; //El ataque =.
                    break;
                case "dark":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "fairy":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                    
            }
            break;
        case "fairy":
            switch ($typedefiende) {
                case "fire":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
        
                case "water":
                    return $ataque; //El ataque =.
                    break;
        
                case "grass":
                    return $ataque; //El ataque =.
                    break;
                case "electric":
                    return $ataque; //El ataque =.
                    break;
        
                case "normal":
                    return $ataque; //El ataque =.
                    break;
        
                case "ground":
                    return $ataque; //El ataque =.
                    break;
        
                case "fighting":
                    return $ataque; //El ataque =.
                    break;
        
                case "dragon":
                    return $ataque; //El ataque =.
                    break;
        
                case "ice":
                    return $ataque; //El ataque =.
                    break;
                case "poison":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "fighting":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "flying":
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque; //El ataque =.
                    break;
                case "bug":
                    return $ataque; //El ataque =.
                    break;
                case "rock":
                    return $ataque; //El ataque =.
                    break;
                case "ghost":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "steel":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
                    break;
                case "dark":
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
                    break;
                case "fairy":
                    return $ataque; //El ataque =.
                    break;
                    
            }
            break;
            
    }
}/**
return $ataque *= 0.5; // Reduce el ataque a la mitad
return $ataque *= 1.5; // Aumenta el ataque en un 50%
return $ataque; //El ataque =.
return $ataque = 0; //No puede atacar a este tipo
*/



function fight($pokemonPc, $pokemonsUser)
{

    for ($i = 0; $i < 4; $i++) {
        //Datos PC
        $ataquePc = $pokemonPc[$i]['attack'];
        $vidaPc = $pokemonPc[$i]['hp'];
        $typePc = $pokemonPc[$i]['type'];
        //Datos usuario
        $ataqueUser = $pokemonsUser[$i]['attack'];
        $vidaUser = $pokemonsUser[$i]['hp'];
        $typeUser = $pokemonsUser[$i]['type'];
        //Variar el ataque dependiendo del tipo
        $ataqueUser = comprobarType($ataqueUser, $typeUser, $typePc);
        $ataquePc = comprobarType($ataquePc,$typePc,$typeUser);

        //Ataca el usuario

        //Ataca el pc
    }
}


switch ($typedefiende) {
    case "planta":
        $ataque *= 1.5; // Aumenta el ataque en un 50%
        break;
    case "agua":
        $ataque *= 0.5; // Reduce el ataque a la mitad
        break;
}
