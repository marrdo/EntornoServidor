<?php

namespace App\Livewire;

use Livewire\Component;

class FormMonument extends Component
{

    public $counter;

 

    public function mount($counter)
    {
        
        $this->counter=$counter;

    }
    public function incrementar(){
        $this->counter++;
    }
    public function decrementar(){
        $this->counter--;
    }
    public function render()
    {
        return view('livewire.form-monument');
    }
}
