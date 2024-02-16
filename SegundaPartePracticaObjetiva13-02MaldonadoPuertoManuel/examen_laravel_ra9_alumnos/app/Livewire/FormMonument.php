<?php

namespace App\Livewire;

use Livewire\Component;

class FormMonument extends Component
{

    // public $title;
    // public $content;

 

    public function mount($post)

    {
        // $this->title = $post->title;
        // $this->content = $post->content;

    }
    public function render()
    {
        return view('livewire.form-monument');
    }
}
