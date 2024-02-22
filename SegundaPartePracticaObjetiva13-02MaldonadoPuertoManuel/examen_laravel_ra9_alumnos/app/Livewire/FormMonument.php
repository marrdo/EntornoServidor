<?php

namespace App\Livewire;

use App\Models\Monumento;
use App\Models\User;
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
    public $nombre;
    public $aforo;
    public $provinciaId;
    public $userId;


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
        $this->feedback = "Monumento creado";
    }

    public function render()
    {
        return view('livewire.form-monument');
    }
}
