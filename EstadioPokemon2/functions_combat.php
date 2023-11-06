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
                    return $ataque; //El ataque =.
                    break;
                case "psychic":
                    return $ataque *= 0.5; // Reduce el ataque a la mitad
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
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
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
                    return $ataque *= 1.5; // Aumenta el ataque en un 50%
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
}
/**
return $ataque *= 0.5; // Reduce el ataque a la mitad
return $ataque *= 1.5; // Aumenta el ataque en un 50%
return $ataque; //El ataque =.
return $ataque = 0; //No puede atacar a este tipo
 */



function fight($pokemonPc, $pokemonsUser)
{
    //Debugger
    // echo '<pre>';
    // echo 'Funcion fight<br>';
    // echo 'Pokemons PC que pelean<br>';
    // print_r($pokemonPc);
    // echo 'Pokemons Usuario Usuario que pelean<br>';
    // print_r($pokemonsUser);
    // echo '</pre>';

    $vidaTotalUsuario = 0;
    $vidaTotalPc = 0;
    $vidaPercentTotalUsuario = 0;
    $vidaPercentTotalPc = 0;

    $pokemonsGandores = array(
        'pokemonUser' => array(),
        'pokemonPc' => array(),
        'vidaTotalUser' => &$vidaTotalUsuario,
        'vidaTotalPc' => &$vidaTotalPc,
        'vidaPercentTotalPc' => &$vidaPercentTotalPc,
        'vidaPercentTotalUsuario' => &$vidaPercentTotalUsuario
    );

    $ganaUser = &$pokemonsGandores['pokemonUser'];
    $ganaPc = &$pokemonsGandores['pokemonPc'];

    for ($i = 0; $i < 4; $i++) {


        //Datos PC
        $ataquePc = $pokemonPc[$i]['attack'];
        $vidaPc = $pokemonPc[$i]['hp'];
        $typePc = $pokemonPc[$i]['type'];

        //Debugger
        // echo '<pre>';
        // echo '<br>';
        // echo '<h2>Combate ' . ($i + 1) . ' </h2>';
        // echo '<br>Funcion fight Datos Pc<br>';
        // echo 'Nombre pokemon pc<br>';
        // print_r($pokemonPc[$i]['name']);
        // echo '<br>Ataque pc<br>';
        // print_r($ataquePc);
        // echo '<br>Tipo del pc: <br>';
        // print_r($typePc);
        // echo '<br>';
        // echo '</pre>';

        //Datos usuario
        $ataqueUser = $pokemonsUser[$i]['attack'];
        $vidaUser = $pokemonsUser[$i]['hp'];
        $typeUser = $pokemonsUser[$i]['type'];

        //Debugger
        // echo '<pre>';
        // echo '<br>';
        // echo 'Funcion fight Datos usuario<br>';
        // echo 'Nombre pokemon User<br>';
        // print_r($pokemonsUser[$i]['name']);
        // echo '<br>Ataque del Usuario<br>';
        // print_r($ataqueUser);
        // echo '<br>Tipo del usuario:<br>';
        // print_r($typeUser);
        // echo '<br>';
        // echo '</pre>';

        //Variar el ataque dependiendo del tipo
        $ataqueUser = comprobarType($ataqueUser, $typeUser, $typePc);
        $ataquePc = comprobarType($ataquePc, $typePc, $typeUser);

        //Debugger
        // echo '<pre>';
        // echo '<br>Funcion fight Aplicamos el comprobartype<br>';
        // echo 'Ataque pc despues de type<br>';
        // print_r($ataquePc);
        // echo '<br>Ataque user despues de type<br>';
        // print_r($ataqueUser);
        // echo '<br>';
        // echo '</pre>';

        //Ataca el usuario
        $vidaPcRestante = $vidaPc - $ataqueUser;
        $vidaPercentPc = ($vidaPcRestante * 100) / $vidaPc;

        //Ataca el pc
        $vidaUserRestante = $vidaUser - $ataquePc;
        $vidaPercentUser = ($vidaUserRestante * 100) / $vidaUser;

        // echo '<pre>';
        // echo '<br>Funcion fight Comrpobamos VIDA<br>';
        // echo 'Vida Pc: ' . $vidaPercentPc . '<br>';
        // print_r($ataquePc);
        // echo '<br>Vida Usuario: ' . $vidaPercentUser . '<br>';
        // print_r($ataqueUser);
        // echo '<br>';
        // echo '</pre>';

        //Comprobar quien gana
        if ($vidaPercentUser > $vidaPercentPc) {
            // echo '<pre>';
            // echo '<br>GANA USER<br>';
            // echo '</pre>';
            // Datos del ganador
            $statGanaUser = [
                'id' => $pokemonsUser[$i]['id'],
                'name' => $pokemonsUser[$i]['name'],
                'sprite' => $pokemonsUser[$i]['sprite'],
            ];

            // Almacenar el ganador en el array de ganadores
            $ganaUser[] = &$statGanaUser;
            // echo '<pre>';
            // echo '<br>Array de pokemons GANADORES del USER<br>';
            // print_r($pokemonsGanadores['pokemonUser']);
            // echo '<br>';
            // echo '</pre>';
            //Vida restante
            $vidaTotalUsuario = $vidaTotalUsuario + $vidaUser;
            $vidaTotalPc = $vidaTotalPc + $vidaPc;

            //Porcentaje de vida restante para el cumulo
            $vidaPercentTotalUsuario = $vidaPercentTotalUsuario + $vidaPercentUser;
            $vidaPercentTotalPc = $vidaPercentTotalPc + $vidaPercentPc;

        } else if ($vidaPercentUser < $vidaPercentPc) {

            // echo '<pre>';
            // echo '<br>GANA PC<br>';
            // echo '</pre>';

            // Datos del ganador
            $statGanaPc = [
                'id' => $pokemonPc[$i]['id'],
                'name' => $pokemonPc[$i]['name'],
                'sprite' => $pokemonPc[$i]['sprite'],
            ];

            // Almacenar el ganador en el array de ganadores
            $ganaPc[] = &$statGanaPc;
            
            // echo '<pre>';
            // echo '<br>Array de pokemons GANADORES del PC<br>';
            // print_r($pokemonsGanadores['pokemonPc']);
            // echo '<br>';
            // echo '</pre>';

            //Vida restante
            $vidaTotalUsuario = $vidaTotalUsuario + $vidaUser;
            $vidaTotalPc = $vidaTotalPc + $vidaPc;

            //Porcentaje de vida restante para el cumulo
            $vidaPercentTotalUsuario = $vidaPercentTotalUsuario + $vidaPercentUser;
            $vidaPercentTotalPc = $vidaPercentTotalPc + $vidaPercentPc;
        } else {
            // echo '<pre>';
            // echo '<br>EMPATE<br>';
            // echo '</pre>';


            //Metemos los dos debido al empate
            // Datos del ganador Usuario
            $statGanaUser = [
                'id' => $pokemonsUser[$i]['id'],
                'name' => $pokemonsUser[$i]['name'],
                'sprite' => $pokemonsUser[$i]['sprite'],
            ];

            // Almacenar el ganador en el array de ganadores
            $ganaUser[] = &$statGanaUser;
            //Datos del pc empate
            $statGanaPc = [
                'id' => $pokemonPc[$i]['id'],
                'name' => $pokemonPc[$i]['name'],
                'sprite' => $pokemonPc[$i]['sprite'],
            ];

            // Almacenar el ganador en el array de ganadores
            $ganaPc[] = &$statGanaPc;

            //Vida restante
            $vidaTotalUsuario = $vidaTotalUsuario + $vidaUser;
            $vidaTotalPc = $vidaTotalPc + $vidaPc;

            //Porcentaje de vida restante para el cumulo
            $vidaPercentTotalUsuario = $vidaPercentTotalUsuario + $vidaPercentUser;
            $vidaPercentTotalPc = $vidaPercentTotalPc + $vidaPercentPc;
        }
    }
    //Debugger
    echo '<pre>';
    echo 'Funcion fight<br>';
    echo 'Arrays de pokemons que ganan<br>';
    print_r($pokemonsGandores);
    echo '</pre>';
    return $pokemonsGandores;
}
