<?php

namespace App\Livewire;

use App\Http\Controllers\GeneracionCertificados as ControllersGeneracionCertificados;
use Livewire\Component;

class GeneracionCertificados extends Component
{
    public $showDropdownPlantilla = false;
    public $showDropdownTipoCertificado = false;
    public $showDropdownGrupo = false;

    public $fechaEmision;

    public $searchPlantilla = '';
    public $searchTipoCertificado = '';
    public $searchGrupo = '';

    public $plantillas = [];
    public $plantillaSeleccionada = null;

    public $tiposCertificados = [];
    public $tipoCertificadoSeleccionado = null;

    public $grupos = [];
    public $grupoSeleccionado = null;

    public function mount()
    {
        $datos = new ControllersGeneracionCertificados();
        $this->plantillas = collect($datos->plantillas);
        $this->tiposCertificados = collect($datos->tiposCertificados);
        $this->grupos = collect($datos->grupos);
    }

    /* PARA PLANTILLAS */
    public function toggleDropdownPlantilla()
    {
        $this->showDropdownPlantilla = !$this->showDropdownPlantilla;
    }

    public function selectPlantilla($id)
    {
        $this->plantillaSeleccionada = collect($this->plantillas)->firstWhere('id', $id);
        $this->showDropdownPlantilla = false;
    }

    /* PARA TIPO DE CERTIFICADOS */
    public function toggleDropdownTipoCertificado()
    {
        $this->showDropdownTipoCertificado = !$this->showDropdownTipoCertificado;
    }

    public function selectTipoCertificado($id)
    {
        $this->tipoCertificadoSeleccionado = collect($this->tiposCertificados)->firstWhere('id', $id);
        $this->showDropdownTipoCertificado = false;
        $this->grupoSeleccionado = null; // Limpiar grupo si cambia el tipo
        $this->searchGrupo = ''; // Reset buscador de grupo
    }

    /* PARA GRUPO DE CERTIFICADOS */
    public function toggleDropdownGrupo()
    {
        $this->showDropdownGrupo = !$this->showDropdownGrupo;
    }

    public function selectGrupo($id)
    {
        $this->grupoSeleccionado = $this->gruposFiltrados->firstWhere('id', $id);
        $this->showDropdownGrupo = false;
    }

    public function getGruposFiltradosProperty()
    {
        if (!$this->tipoCertificadoSeleccionado) {
            return collect();
        }

        return collect($this->grupos)->filter(function ($grupo) {
            return $grupo['certification_type_id'] === $this->tipoCertificadoSeleccionado['id'];
        });
    }

    /* DEFAULT */
    public function render()
    {
        return view('livewire.certificates.generacion-certificados');
    }
}
