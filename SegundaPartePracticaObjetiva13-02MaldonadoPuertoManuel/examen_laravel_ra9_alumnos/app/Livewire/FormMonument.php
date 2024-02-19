<?php

namespace App\Livewire;

use Livewire\Component;

class FormMonument extends Component
{

    public int $monumento;

 

    public function mount(int $counter = 0)
    {
        
        

    }

    public function render()
    {
        return view('livewire.form-monument');
    }
}
