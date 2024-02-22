<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Monumento;

class UpdateMonumento extends Component
{
    public $monumento;
    public $monumentoId;
    protected $listeners = ['closeModal' => 'cerrarModal'];
    

    public function mount($monumentoId){
        $this->monumentoId = $monumentoId;
        $this->monumento = Monumento::findOrFail($monumentoId);
    }

    public function closeModal(){
        $this->emit('closeModal');
    }

    public function render()
    {
        return view('livewire.update-monumento');
    }
}
