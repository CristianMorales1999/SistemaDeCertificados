<?php

namespace App\Livewire;

use App\Http\Controllers\GrupoCertificacion as ControllersGrupoCertificacion;
use Livewire\Component;

class GrupoCertificacion extends Component
{
    public $showDropdownTiposCertificados = false;
    public $searchTipoCertificado = '';
    public $tiposCertificados = [];
    public $tipoCertificadoSeleccionado = null;

    public $showModalNuevaPersona = false;
    public $showDropdownAreas = false;
    public $areas = [];
    public $searchArea = '';
    public $areasFiltradas;
    public $areaSeleccionada = '';

    public $datosGrupos = [];
    public $sort = 'id';
    public $direction = 'asc';
    public $search = '';

    protected $grupoCertificacionController;

    /* PASAR DATOS DE CONTROLADOR A COMPONENTE */
    public function mount()
    {
        $this->grupoCertificacionController = new ControllersGrupoCertificacion();

        $this->tiposCertificados = collect($this->grupoCertificacionController->tiposCertificados);
        $this->areas = collect($this->grupoCertificacionController->areas);
        $this->datosGrupos = collect($this->grupoCertificacionController->grupos_certificacion)->all();
    }

    /* Para abrir y cerrar TIPOS DE CERTIFICADOS */
    public function toggleDropdownTiposCertificados()
    {
        $this->showDropdownTiposCertificados = !$this->showDropdownTiposCertificados;
    }

    /* Abrir y cerrar dropdown AREAS */
    public function toggleDropdownAreas()
    {
        $this->showDropdownAreas = !$this->showDropdownAreas;
    }

    /* Seleccionar un tipo de certificado */
    public function selectTipoCertificado($id)
    {
        $this->tipoCertificadoSeleccionado = collect($this->tiposCertificados)->firstWhere('id', $id);
        $this->showDropdownTiposCertificados = false;
    }

    /* Modal para añadir personas */
    public function openModalNuevaPersona()
    {
        $this->showModalNuevaPersona = true;
    }

    public function closeModalNuevaPersona()
    {
        $this->showModalNuevaPersona = false;
    }

    /* Selecionar un area */
    public function selectAreas($id)
    {
        $this->areaSeleccionada = collect($this->areas)->firstWhere('id', $id);
        $this->showDropdownAreas = false;
    }

    /* Ordenar columnas */
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
        $datos = collect($this->datosGrupos);

        // Filtrar datos
        if (!empty($this->search)) {
            $datos = $datos->filter(function($item) {
                return stripos($item['nombre'], $this->search) !== false ||
                       stripos($item['tipo'], $this->search) !== false;
            });
        }

        // Ordenar datos
        $datos = $datos->sortBy($this->sort, SORT_REGULAR, $this->direction === 'desc');

        return view('livewire.certificates.grupo-certificacion', [
            'datosGrupos' => $datos->all(),
        ]);
    }
}
