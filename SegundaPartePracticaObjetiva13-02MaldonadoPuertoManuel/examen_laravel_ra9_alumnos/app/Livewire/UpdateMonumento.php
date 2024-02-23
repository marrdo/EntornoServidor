<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Monumento;
use LivewireUI\Modal\ModalComponent;

class UpdateMonumento extends ModalComponent
{


    public function render()
    {
        return view('livewire.update-monumento');
    }
}
