<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneracionCertificados extends Controller
{

    public $plantillas = [
        [
            'id' => 1,
            'name' => 'Voluntariado',
            'imagen' => '/imagenes/tipoCertificados/CERTIFICADOS-PLANTILLAS.webp',
        ],
        [
            'id' => 2,
            'name' => 'Director de Área',
            'imagen' => '/imagenes/tipoCertificados/CERTIFICADOS-PLANTILLAS-DIRECTOR-AREA.webp',
        ],
        [
            'id' => 3,
            'name' => 'Director de Proyecto',
            'imagen' => '/imagenes/tipoCertificados/CERTIFICADOS-PLANTILLAS-DP.webp',
        ],
    ];


    public $tiposCertificados=[
        ['id' => 1, 'name' => 'Egresado / retiro voluntario'],
        ['id' => 2, 'name' => 'Directiva'],
        ['id' => 3, 'name' => 'Certificado DPS'],
        ['id' => 4, 'name' => 'Certificado CoDP'],
        ['id' => 5, 'name' => 'Coordinadores de área de proyecto'],
        ['id' => 6, 'name' => 'Miembro interno del proyecto'],
        ['id' => 7, 'name' => 'Reconocimiento por colaboración externa'],
        ['id' => 8, 'name' => 'Staff de apoyo'],
        ['id' => 9, 'name' => 'Staff apoyo externo'],
        ['id' => 10, 'name' => 'Participación como ponente para capacitación'],
        ['id' => 11, 'name' => 'Participación como ponente para taller'],
        ['id' => 12, 'name' => 'Participación como ponente para proyecto'],
        ['id' => 13, 'name' => 'Participación en taller'],
        ['id' => 14, 'name' => 'Participación en capacitación'],
        ['id' => 15, 'name' => 'Participación en taller de proyecto'],
        ['id' => 16, 'name' => 'Participación en capacitación de proyecto'],
        ['id' => 17, 'name' => 'Valores Sedipranos'],
    ];


    public $grupos = [
        ['id' => 101, 'name' => 'Grupo Egresados 2023-I', 'certification_type_id' => 1],
        ['id' => 102, 'name' => 'Grupo Egresados 2023-II', 'certification_type_id' => 1],
        ['id' => 201, 'name' => 'Directiva 2022-2023', 'certification_type_id' => 2],
        ['id' => 202, 'name' => 'Directiva 2023-2024', 'certification_type_id' => 2],
        ['id' => 301, 'name' => 'Proyecto Innovación 2024', 'certification_type_id' => 3],
        ['id' => 401, 'name' => 'Proyecto de Impacto 2023', 'certification_type_id' => 4],
        ['id' => 501, 'name' => 'Miembros Proyecto Alpha', 'certification_type_id' => 5],
        ['id' => 502, 'name' => 'Miembros Proyecto Beta', 'certification_type_id' => 5],
        ['id' => 601, 'name' => 'Ponentes Congreso 2024', 'certification_type_id' => 6],
        ['id' => 701, 'name' => 'Participantes Taller UX', 'certification_type_id' => 7],
        ['id' => 702, 'name' => 'Participantes Evento PMO', 'certification_type_id' => 7],
        ['id' => 801, 'name' => 'Taller Gestión Proyectos', 'certification_type_id' => 8],
        ['id' => 901, 'name' => 'Taller Área Técnica', 'certification_type_id' => 9],
        ['id' => 1001, 'name' => 'Voluntariado Social 2024', 'certification_type_id' => 10],
        ['id' => 1002, 'name' => 'Voluntariado Medioambiente', 'certification_type_id' => 10],
        ['id' => 1101, 'name' => 'Grupo Valores 2023', 'certification_type_id' => 11],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Datos estáticos de prueba (templates de certificados)
        

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
