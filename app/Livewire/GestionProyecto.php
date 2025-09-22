<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Proyecto;
use App\Models\AreaPersona;
use App\Models\Persona;
use App\Models\GrupoDeCertificacion;
use App\Models\Certificado;
use Illuminate\Support\Facades\DB;

class GestionProyecto extends Component
{
    public $proyecto;
    public $personasDisponibles = [];
    public $personasSeleccionadas = [];
    public $gruposCertificacion = [];
    public $grupoSeleccionado = null;
    public $rolSeleccionado = 'Miembro';
    public $busquedaPersona = '';
    public $tabActive = 'personas';

    public function mount(Proyecto $proyecto)
    {
        $this->proyecto = $proyecto->load(['areaPersonas.persona']);
        $this->cargarDatos();
    }

    public function cargarDatos()
    {
        // Cargar personas disponibles (que no estén ya en el proyecto)
        $personasEnProyecto = $this->proyecto->areaPersonas->pluck('persona.id')->toArray();

        $this->personasDisponibles = AreaPersona::with('persona')
            ->whereNotIn('persona_id', $personasEnProyecto)
            ->when($this->busquedaPersona, function($query) {
                $query->whereHas('persona', function($q) {
                    $q->where('nombres', 'like', '%' . $this->busquedaPersona . '%')
                      ->orWhere('apellidos', 'like', '%' . $this->busquedaPersona . '%');
                });
            })
            ->limit(20)
            ->get();

        // Cargar grupos de certificación disponibles
        $this->gruposCertificacion = GrupoDeCertificacion::where('estado', '!=', 'Anulado')
            ->orderBy('nombre')
            ->get();
    }

    public function updatedBusquedaPersona()
    {
        $this->cargarDatos();
    }

    public function agregarPersona($areaPersonaId)
    {
        if (in_array($areaPersonaId, $this->personasSeleccionadas)) {
            return;
        }

        $this->personasSeleccionadas[] = $areaPersonaId;
    }

    public function quitarPersonaSeleccionada($index)
    {
        unset($this->personasSeleccionadas[$index]);
        $this->personasSeleccionadas = array_values($this->personasSeleccionadas);
    }

    public function asociarPersonasSeleccionadas()
    {
        if (empty($this->personasSeleccionadas)) {
            session()->flash('error', 'Debe seleccionar al menos una persona');
            return;
        }

        try {
            foreach ($this->personasSeleccionadas as $areaPersonaId) {
                $this->proyecto->areaPersonas()->syncWithoutDetaching([
                    $areaPersonaId => ['rol' => $this->rolSeleccionado]
                ]);
            }

            $this->personasSeleccionadas = [];
            $this->proyecto->refresh();
            $this->proyecto->load(['areaPersonas.persona']);
            $this->cargarDatos();

            session()->flash('success', 'Personas asociadas exitosamente');

        } catch (\Exception $e) {
            session()->flash('error', 'Error al asociar personas: ' . $e->getMessage());
        }
    }

    public function quitarPersonaDelProyecto($areaPersonaId)
    {
        try {
            $this->proyecto->areaPersonas()->detach($areaPersonaId);

            $this->proyecto->refresh();
            $this->proyecto->load(['areaPersonas.persona']);
            $this->cargarDatos();

            session()->flash('success', 'Persona removida del proyecto');

        } catch (\Exception $e) {
            session()->flash('error', 'Error al remover persona: ' . $e->getMessage());
        }
    }

    public function generarCertificadosMasivos()
    {
        if (!$this->grupoSeleccionado) {
            session()->flash('error', 'Debe seleccionar un grupo de certificación');
            return;
        }

        $grupoCertificacion = GrupoDeCertificacion::findOrFail($this->grupoSeleccionado);
        $certificadosCreados = 0;

        DB::beginTransaction();

        try {
            foreach ($this->proyecto->areaPersonas as $areaPerson) {
                // Verificar si ya existe un certificado
                $certificadoExistente = Certificado::where('persona_id', $areaPerson->persona->id)
                    ->where('grupo_de_certificacion_id', $grupoCertificacion->id)
                    ->first();

                if (!$certificadoExistente) {
                    Certificado::create([
                        'persona_id' => $areaPerson->persona->id,
                        'grupo_de_certificacion_id' => $grupoCertificacion->id,
                        'codigo' => $this->generarCodigoUnico(),
                        'estado' => 'Validado'
                    ]);
                    $certificadosCreados++;
                }
            }

            DB::commit();

            session()->flash('success', "Se crearon {$certificadosCreados} certificados para el grupo '{$grupoCertificacion->nombre}'");

        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Error al generar certificados: ' . $e->getMessage());
        }
    }

    private function generarCodigoUnico()
    {
        do {
            $codigo = 'CERT-' . date('Y') . '-' . strtoupper(substr(uniqid(), -6));
        } while (Certificado::where('codigo', $codigo)->exists());

        return $codigo;
    }

    public function render()
    {
        return view('livewire.gestion-proyecto');
    }
}
