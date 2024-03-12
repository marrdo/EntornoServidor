<?php

namespace App\Livewire;

use App\Models\Monumento;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class TableMonument extends Component
{

    public Collection $monumentos;
    public Collection $provincias;
    public Collection $users;
    public $monumentoUpdate;
    public $modal = false;
    public $nombre;
    public $provincia;
    public $aforo;
    public $user;


    public function mount($monumentos, $provincias, $users,)
    {
        $this->monumentos = $monumentos;
        $this->provincias = $provincias;
        $this->users = $users;
        $this->modal = false;
        $this->monumentoUpdate = $this->monumentos->first();
        $this->nombre = $this->monumentoUpdate->nombre;
        $this->provincia = $this->monumentoUpdate->provincia;
        $this->aforo = $this->monumentoUpdate->aforo;
        $this->user = $this->monumentoUpdate->user;
    }

    #[On(['monumento-creado'])]
    public function viewUpdate()
    {
        $this->monumentos = Monumento::all();
    }
    #[On(['monumento-eliminado'])]
    public function monumentDestroy()
    {
        $this->monumentos = Monumento::all();
        session()->flash('destroySucces', 'Monumento eliminado satisfactoriamente!!');
    }
    #[On(['showModal',])]
    public function desplegarModal($monumentoId)
    {
        $this->monumentoUpdate = Monumento::findOrFail($monumentoId);
        $this->nombre = $this->monumentoUpdate->nombre;
        $this->provincia = $this->monumentoUpdate->provincias->id;
        $this->aforo = $this->monumentoUpdate->aforo;
        $this->user = $this->monumentoUpdate->user->id;
        $this->modal = true;
    }
    public function cerrarModal()
    {
        $this->modal = false;
        // dd($this->modal);
    }
    public function update()
    {
        Monumento::findOrFail($this->monumentoUpdate->id)->update([
            'nombre' => $this->nombre,
            'aforo' => $this->aforo,
            'provincia' => $this->provincia,
            'user_id' => $this->user
        ]);
        // dd($this->nombre, $this->aforo, $this->provincia, $this->user);
        // dd($this->monumentos);
        $this->cerrarModal();
        $this->dispatch('updateModal', $this->monumentoUpdate->id);
        $this->monumentos = Monumento::all();
    }
    public function closeModal()
    {
        $this->modal = false;
    }
    public function render()
    {
        return view('livewire.table-monument');
    }
}
