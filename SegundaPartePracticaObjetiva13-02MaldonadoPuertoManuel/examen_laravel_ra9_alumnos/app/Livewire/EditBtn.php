<?php

namespace App\Livewire;

use Livewire\Component;

class EditBtn extends Component
{
    protected $listeners = ['abrirModal'=>'desplegar'];

    public function desplegar(){
        $this->dispatch('desplegarModal');
    }
    public function render()
    {
        return view('livewire.edit-btn');
    }
}
