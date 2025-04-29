<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\DatosController;

class PersonasPost extends Component
{
    public $datosPersonas;
    public $datosPersonasOriginales;
    public $direction = 'asc';
    public $sort = 'id';

    public function mount()
    {
        $datos= new DatosController();
        $this->datosPersonas = $datos ->personas;
        $this->datosPersonasOriginales = $datos ->personas;

    }

    public function order($sort)
    {
        if ($this->sort === $sort) {
            $this->direction = $this->direction === 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function render()
    {
        return view('livewire.personas-post', ['datosPersonas' => $this->datosPersonas,]);
    }
}
