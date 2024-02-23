<?php

namespace App\Livewire;

use App\Models\Monumento;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use PhpParser\Node\Scalar\String_;

class Fila extends Component
{
    public Monumento $monumento;
    public Collection $provincias;
    public Collection $users;

    public $datos;
    public $nombre;

    public function mount($monumento){
       $this->monumento = Monumento::find($monumento->id); 
       
       dd($monumento);
    }  

    public function update(){

    }

    public function render()
    {
        return view('livewire.fila');
    }
}
