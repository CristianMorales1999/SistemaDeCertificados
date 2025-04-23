<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\DatosController;

class GruposPost extends Component
{
    public $datosGrupos;
    public $sort = 'id';
    public $direction = 'asc';
    public $search;

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
        $data = new DatosController();
        $this->datosGrupos = $data->grupos_certificacion;
        //dd($this->datosGrupos);
        $datos = collect($this->datosGrupos);
        
        if (!empty($this->search)) {
            $datos = $datos->filter(function($item) {
                return stripos($item['nombre'], $this->search) !== false ||
                       stripos($item['tipo'], $this->search) !== false;
            });
        }
        
        // Ordenar los datos después del filtrado
        $datos = $datos->sortBy($this->sort, SORT_REGULAR, $this->direction === 'desc');
        
        $this->datosGrupos = $datos->all();
        
        return view('livewire.grupos-post', compact('datos'));
    }
}