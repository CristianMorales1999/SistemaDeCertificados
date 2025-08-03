<?php

namespace App\Livewire;

use Livewire\Component;

class ValidarCodigo extends Component
{
    public $codigo;
    public $message = '';
    public $showModal = false;
    public $certificadoData = null;

    public function validar()
    {
        // Validación del código
        $this->validate([
            'codigo' => 'required|min:5',
        ]);

        $this->certificadoData = [
            'nombres' => 'Christian Anthony',
            'apellidos' => 'Morales Esqivel',
            'certificacionPor' => 'Egresados 2024',
            'fecha' => '2025-03-15',
        ];

        $this->message = "Certificado validado exitosamente";
        $this->showModal = true;
    }

    public function cerrarModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.certificates.validar-codigo');
    }
}
