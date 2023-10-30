<?php

function determinar_estado($ejercicio, $kg, $reps)
{

    switch ($ejercicio) {
        case 'squat':
            # code...
            if ($kg<40 && $reps<8) {
                return 'principiante';
            }elseif ($kg>100 && $reps>8) {
                return 'avanzado';
            }else{
                return 'intermedio';
            }
            break;

        case 'pull up"':
            if ($reps<5 && $kg<65) {
                return 'principiante';
            }elseif ($reps>15 && $kg>15) {
                return 'avanzado';
            }else{
                return 'intermedio';
            }
            break;

        case 'deadlift':
            if($reps<10 && $kg<60){
                return 'principiante';
            }elseif ($reps>4 && $kg>180) {
                return 'avanzado';
            }else{
                return 'intermedio';
            }
            break;

        default:
            # code...
            break;
    }
}

function determinar_plazo($rendimiento,$ejercicio){
    switch ($ejercicio) {
        case 'squat':
            # code...
            if ($rendimiento == 'principiante') {
                return 1;
            }elseif ($rendimiento == 'intermedio') {
                return 4;
            }
            break;

        case 'pull up"':
            if ($rendimiento == 'principiante') {
                return 5;
            }elseif ($rendimiento == 'intermedio') {
                return 7;
            }
            break;

        case 'deadlift':
            if($rendimiento == 'principiante'){
                return 2;
            }elseif ($rendimiento == 'intermedio') {
                return 8;
            }
            break;

        default:
            # code...
            break;
    }
}