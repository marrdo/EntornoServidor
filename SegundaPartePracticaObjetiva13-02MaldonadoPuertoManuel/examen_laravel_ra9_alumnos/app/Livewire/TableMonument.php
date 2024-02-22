<?php

namespace App\Livewire;

use App\Models\Monumento;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class TableMonument extends Component
{
    // public $monumentos = Monumento::all();
    public Collection $monumentos;
    public $mostrarModal = false;
    public $monumentoSeleccionado;

    public function mount($monumentos){
        $this->monumentos = $monumentos;
    }
    public function destroy($id)
    {
        Monumento::destroy($id);//Destruimos el monumento
        $this->monumentos = Monumento::all();
        //actualizamos la lista de monumentos almacenando los monumentos de neuvo despues de haber eliminado el último.
    }

    public function mostraModal($monumentoID)
    {
        $this->monumentoSeleccionado = $monumentoID;
        $this->mostrarModal = true;
    }

    public function render()
    {
        return view('livewire.table-monument');
    }
}
