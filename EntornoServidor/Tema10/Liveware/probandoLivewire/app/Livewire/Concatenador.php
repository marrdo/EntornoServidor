<?php

namespace App\Livewire;

use Livewire\Component;

class Concatenador extends Component
{
    public String $cadena ='';

    public function mount($cadena = ''){
        $this->cadena = $cadena;
    }

    public function actualizaCadena(){
        $this->cadena='';
    }

    public function borrarCadena(){
        $this->cadena='';
    }
    public function render()
    {
        return view('livewire.concatenador');
    }
}
