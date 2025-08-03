<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\DatosController;

class GruposPost extends Component
{
    public $datosOriginales = [];
    public $datosGrupos;
    public $sort = 'id';
    public $direction = 'desc';
    public $search;
    public $selectedGrupos = [];
    public $selectAll;
    public $editando = null;
    public $grupoEditado = [];
    public $grupoAEliminar = null;
    public $showDeleteModal = false;
    public $showNotification = false;
    public $notificationMessage = '';
    public $eliminacionmode = 'unico';

    public function order($sort)
    {
        if ($this->sort === $sort) {
            $this->direction = $this->direction === 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedGrupos = collect($this->datosGrupos)->pluck('id')->toArray();
        } else {
            $this->selectedGrupos = [];
        }
    }

    public function updatedSelectedGrupos()
    {
        $this->selectAll = count($this->selectedGrupos) === count($this->datosGrupos);
    }

    public function editarGrupo($id)
    {
        $indice = array_search($id, array_column($this->datosGrupos, 'id'));

        if ($indice !== false) {
            $this->grupoEditado = $this->datosGrupos[$indice];
            $this->editando = $id;
        }
    }

    public function guardarGrupo()
    {
        if ($this->editando !== null) {
            // Encontrar el índice correcto en $datos usando el ID que estamos editando
            $indice = array_search($this->editando, array_column($this->datosGrupos, 'id'));
            if ($indice !== false) {
                $this->datosGrupos[$indice] = $this->grupoEditado;
            }

            // Encontrar y actualizar en datosOriginales
            $indiceOriginal = array_search($this->editando, array_column($this->datosOriginales, 'id'));
            if ($indiceOriginal !== false) {
                $this->datosOriginales[$indiceOriginal] = $this->certificadoEditado;
            }
        }

        $this->editando = null;
        $this->grupoEditado = [];
    }

    public function eliminarGrupo()
    {
        if ($this->grupoAEliminar) {
            // Encontrar y eliminar el certificado de datosOriginales
            $this->datosOriginales = array_filter($this->datosOriginales, function($certificado) {
                return $certificado['id'] != $this->grupoAEliminar;
            });


            // Actualizar los datos mostrados
            $this->filtrarDatos();

            // Mostrar notificación
            $this->notificationMessage = 'El registro ha sido eliminado correctamente';
            $this->showNotification = true;

            // Cerrar el modal de confirmación
            $this->showDeleteModal = false;
            $this->grupoAEliminar = null;
        }
    }

    public function confirmarEliminacion($id)
    {
        $this->grupoAEliminar = $id;
        $this->showDeleteModal = true;
    }

    public function cancelarEliminacion()
    {
        $this->showDeleteModal = false;
        $this->grupoAEliminar = null;
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

        return view('livewire.admin.grupos-post', compact('datos'));
    }
}
