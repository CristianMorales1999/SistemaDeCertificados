<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class inputImagen extends Component
{
    use WithFileUploads;

    public $image;
    public $name = '';
    public $imageUrl = null;
    public $savedImage = null;
    public $tipo;

    public function render()
    {
        return view('livewire.input-imagen');
    }

    public function save()
    {
        $this->validate([
            'image' => 'required|image|max:10240', // 10MB Max
            'name' => 'required|string|max:255',
        ]);

        $path = $this->image->store('images', 'public');
        $this->savedImage = $path;
        $this->imageUrl = null;
        $this->image = null;

        session()->flash('message', 'Imagen guardada correctamente');
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:10240', // 10MB Max
        ]);

        $this->imageUrl = $this->image->temporaryUrl();
    }

    public function clear()
    {
        $this->image = null;
        $this->name = '';
        $this->imageUrl = null;
    }
}
