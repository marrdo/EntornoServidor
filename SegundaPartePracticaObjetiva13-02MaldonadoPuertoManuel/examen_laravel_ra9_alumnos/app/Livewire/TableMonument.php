<?php

namespace App\Livewire;

use App\Models\Monumento;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class TableMonument extends Component
{
    
    public Collection $monumentos;
    public $nombre;
    public $aforo;
    public $provincia;
    public $user;
    

    public function mount($monumentos){
        $this->monumentos = $monumentos;
    }
    public function destroy($id)
    {
        Monumento::destroy($id);//Destruimos el monumento
        $this->monumentos = Monumento::all();
        //actualizamos la lista de monumentos almacenando los monumentos de neuvo despues de haber eliminado el último.
    }

    public function update($id){
        $monumento = Monumento::findOrFail($id);
        dd($this->nombre, $this->aforo, $this->provincia, $this->user);
        $monumento->update([
            'nombre'=> $this->nombre,
            'aforo'=>$this->aforo,
            'provincia'=>$this->provincia,
            'user_id'=>$this->user
        ]);
    }
    public function render()
    {
        return view('livewire.table-monument');
    }
}
