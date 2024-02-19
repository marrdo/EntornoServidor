<?php

namespace App\Livewire;

use App\Models\Monumento;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class TableMonument extends Component
{
    // public $monumentos = Monumento::all();
    public Collection $monumentos;
    public function mount($monumentos){

    }
    public function render()
    {
        return view('livewire.table-monument');
    }
}
