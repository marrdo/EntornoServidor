<?php

namespace App\Livewire;

use App\Models\Monumento;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FormMonument extends Component
{
    // Mensajes
    public String $feedback = "";
    // Mount
    public $monumentos;
    public $users;
    public $provincias;
    // Store
    #[Rule('required|min:2|max:70')]
    public $nombre="";
    #[Rule('required')]
    public $aforo= "";
    #[Rule('required|integer')]
    public $provinciaId="";
    #[Rule('required|integer')]
    public $userId="";
    // Listeners



    public function mount($monumentos = [], $users = [], $provincias = [])
    {
        $this->monumentos = $monumentos;
        $this->users = $users;
        $this->provincias = $provincias;
    }

    public function store()
    {
        // dd($this->nombre, $this->aforo, $this->provinciaId, $this->userId);
        Monumento::create([
            'nombre' => $this->nombre,
            'aforo' => $this->aforo,
            'provincia' => $this->provinciaId,
            'user_id' => $this->userId
        ]);
        // dd($this->nombre, $this->aforo, $this->provinciaId, $this->userId);
        $this->reset(['nombre','aforo','provinciaId','userId']);
        session()->flash('succes', 'Monumento creado satisfactoriamente!!');
        $this->dispatch('monumento-creado');
    }

    public function render()
    {
        return view('livewire.form-monument');
    }
}
