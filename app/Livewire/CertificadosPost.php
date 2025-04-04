<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\DatosController;
use Livewire\WithPagination;

class CertificadosPost extends Component
{
    public $datosOriginales = []; // Datos sin modificar
    public $datos = []; // Datos que se muestran en la vista
    public $sort = 'id';
    public $direction = 'asc';
    public $search = '';
    public $editando = null;
    public $certificadoEditado = [];

    public function mount()
    {
        $datosController = new DatosController();
        $this->datosOriginales = $datosController->certificados;
        $this->datos = $this->datosOriginales; // Inicialmente, la lista es igual a los originales
    }

    public function order($sort)
    {
        if ($this->sort === $sort) {
            $this->direction = $this->direction === 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        $this->filtrarDatos(); // Reordenar después de cambiar el criterio
    }

    public function editarCertificado($id)
    {
        $indice = array_search($id, array_column($this->datos, 'id'));

        if ($indice !== false) {
            $this->certificadoEditado = $this->datos[$indice];
            $this->editando = $id;
        }
    }

    public function guardarCertificado()
    {
        if ($this->editando !== null) {
            // Encontrar el índice correcto en $datos usando el ID que estamos editando
            $indice = array_search($this->editando, array_column($this->datos, 'id'));
            if ($indice !== false) {
                $this->datos[$indice] = $this->certificadoEditado;
            }

            // Encontrar y actualizar en datosOriginales
            $indiceOriginal = array_search($this->editando, array_column($this->datosOriginales, 'id'));
            if ($indiceOriginal !== false) {
                $this->datosOriginales[$indiceOriginal] = $this->certificadoEditado;
            }
        }

        $this->editando = null;
        $this->certificadoEditado = [];
    }

    public function filtrarDatos()
    {
        // Filtrar sobre `$datosOriginales` en lugar de `$datos`
        $datosFiltrados = collect($this->datosOriginales);

        if (!empty($this->search)) {
            $datosFiltrados = $datosFiltrados->filter(function ($item) {
                return stripos($item['codigo'], $this->search) !== false ||
                       stripos($item['titular'], $this->search) !== false ||
                       stripos($item['grupo_certificacion'], $this->search) !== false;
            });
        }

        // Aplicar ordenamiento
        $datosFiltrados = $datosFiltrados->sortBy($this->sort, SORT_REGULAR, $this->direction === 'desc');

        $this->datos = $datosFiltrados->all();
    }

    public function updatedSearch()
    {
        $this->filtrarDatos(); // Se ejecuta cada vez que cambia `$search`
    }

    public function render()
    {
        return view('livewire.certificados-post', ['datos' => $this->datos]);
    }
}
