<?php

namespace App\Livewire;

use App\Models\Monumento;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use PhpParser\Node\Scalar\String_;
use Livewire\Attributes\On;

class Fila extends Component
{
    public Monumento $monumento;
    public Collection $provincias;
    public Collection $users;

    public $datos;
    public $nombre;
    public $provincia;
    public $aforo;
    public $user;

    public $feedback;

    public function mount($monumento, $provincias, $users)
    {
        $this->provincias = $provincias;
        $this->users = $users;
        $this->monumento = $monumento;
        $this->nombre = $monumento->nombre;
        $this->provincia = $monumento->provincia;
        $this->aforo = $monumento->aforo;
        $this->user = $monumento->user->id;
        //  ? $monumento->phone->numero : null;
        // dd($this->monumento->user);
    }


    public function destroy($id)
    {
        Monumento::destroy($id); //Destruimos el monumento
        $this->dispatch('monumento-eliminado');
        //actualizamos la lista de monumentos almacenando los monumentos de neuvo despues de haber eliminado el último.
    }
    #[On(['updateModal'])]
    public function updateMessage()
    {
        
    }
    #[On(['updateModal'])]
    public function updateView($monumentoUpdateId)
    {   
        // $this->monumento = Monumento::findOrFail($monumentoUpdateId);
        // dd($this->monumento);
        $this->nombre = $this->monumento->nombre;
        $this->provincia = $this->monumento->provincia;
        $this->aforo = $this->monumento->aforo;
        $this->user = $this->monumento->user->id;
        session()->flash('succes', 'Monumento actualizado satisfactoriamente!!');
        session()->flash('id', $monumentoUpdateId);
    }
    public function update()
    {
        // dd($this->nombre, $this->aforo, $this->provincia, $this->user);
        Monumento::findOrFail($this->monumento->id)->update([

            'nombre' => $this->nombre,
            'aforo' => $this->aforo,
            'provincia' => $this->provincia,
            'user_id' => $this->user
        ]);
        $this->dispatch('updateModal',$this->monumento->id);
        // $this->updateView($this->monumento->id);
    }

    public function showModal()
    {
        // $this->monumento->id;
        // dd($this->monumento->id);
        $this->dispatch('showModal', $this->monumento->id);
    }
    public function render()
    {
        return view('livewire.fila');
    }
}
