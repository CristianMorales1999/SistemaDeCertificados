<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrupoCertificacion extends Controller
{
    public $areas=[
        ['id'=> 1, 'name'=> "PMO"],
        ['id'=> 2, 'name'=> "GTH"],
        ['id'=> 3, 'name'=> "Marketing"],
        ['id'=> 4, 'name'=> "LTK & LNZ"],
        ['id'=> 5, 'name'=> "TI"],        
    ];
    public $tiposCertificados = [
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

    public $grupos_certificacion = [
        ['id' => 1, 'nombre' => 'Grupo de Certificación PMI 2024-I', 'tipo' => 'Certificado de voluntariado', 'descripcion' => 'Certificado de voluntariado para Enero 2024', 'fechainicio' => '2024-01-01', 'fechafin' => '2024-01-31', 'creadorgrupo' => 'Luis Perez', 'generadorcertificado' => 'Maria Lopez', 'firmante1' => 'Luis Perez', 'firmante2' => 'Lucia Gomez', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/voluntariado.png'],
        ['id' => 2, 'nombre' => 'Grupo de Certificación SCRUM 2024-I', 'tipo' => 'Certificado de metodología', 'descripcion' => 'Certificación en Scrum para el primer semestre 2024', 'fechainicio' => '2024-02-01', 'fechafin' => '2024-03-15', 'creadorgrupo' => 'Ana Martinez', 'generadorcertificado' => 'Carlos Rodríguez', 'firmante1' => 'Ana Martinez', 'firmante2' => 'Jorge Peña', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/scrum.png'],
        ['id' => 3, 'nombre' => 'Grupo de Certificación AGILE 2024-I', 'tipo' => 'Certificado de metodología', 'descripcion' => 'Certificación en metodologías ágiles', 'fechainicio' => '2024-03-01', 'fechafin' => '2024-04-30', 'creadorgrupo' => 'Pedro Sanchez', 'generadorcertificado' => 'Lucia Ramos', 'firmante1' => 'Pedro Sanchez', 'firmante2' => 'Sofia Nuñez', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/agile.png'],
        ['id' => 4, 'nombre' => 'Grupo de Certificación PRINCE2 2024-I', 'tipo' => 'Certificado de gestión de proyectos', 'descripcion' => 'Certificación en PRINCE2 para gestión de proyectos', 'fechainicio' => '2024-05-01', 'fechafin' => '2024-06-15', 'creadorgrupo' => 'Elena Vargas', 'generadorcertificado' => 'Antonio Herrera', 'firmante1' => 'Elena Vargas', 'firmante2' => 'Raul Diaz', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/prince2.png'],
        ['id' => 5, 'nombre' => 'Grupo de Certificación ITIL 2024-I', 'tipo' => 'Certificado de IT Service Management', 'descripcion' => 'Certificación en ITIL para la gestión de servicios TI', 'fechainicio' => '2024-06-01', 'fechafin' => '2024-07-15', 'creadorgrupo' => 'Laura Mendoza', 'generadorcertificado' => 'Ricardo Suarez', 'firmante1' => 'Laura Mendoza', 'firmante2' => 'Diego Torres', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/itil.png'],
        ['id' => 6, 'nombre' => 'Grupo de Certificación DevOps 2024-I', 'tipo' => 'Certificado de desarrollo y operaciones', 'descripcion' => 'Certificación en prácticas de DevOps', 'fechainicio' => '2024-07-01', 'fechafin' => '2024-08-15', 'creadorgrupo' => 'Roberto Ortega', 'generadorcertificado' => 'Sonia Herrera', 'firmante1' => 'Roberto Ortega', 'firmante2' => 'Carmen Ruiz', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/devops.png'],
        ['id' => 7, 'nombre' => 'Grupo de Certificación CISSP 2024-II', 'tipo' => 'Certificado de seguridad informática', 'descripcion' => 'Certificación en seguridad de la información CISSP', 'fechainicio' => '2024-08-01', 'fechafin' => '2024-09-30', 'creadorgrupo' => 'Juan Ramirez', 'generadorcertificado' => 'Beatriz Correa', 'firmante1' => 'Juan Ramirez', 'firmante2' => 'Hector Medina', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/cissp.png'],
        ['id' => 8, 'nombre' => 'Grupo de Certificación CCNA 2024-II', 'tipo' => 'Certificado de redes', 'descripcion' => 'Certificación Cisco CCNA en redes de comunicación', 'fechainicio' => '2024-09-01', 'fechafin' => '2024-10-15', 'creadorgrupo' => 'Silvia Mendoza', 'generadorcertificado' => 'Luis Campos', 'firmante1' => 'Silvia Mendoza', 'firmante2' => 'Hugo Paredes', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/ccna.png'],
        ['id' => 9, 'nombre' => 'Grupo de Certificación Python 2024-II', 'tipo' => 'Certificado de programación', 'descripcion' => 'Certificación en Python para desarrollo backend', 'fechainicio' => '2024-10-01', 'fechafin' => '2024-11-30', 'creadorgrupo' => 'Alberto Sandoval', 'generadorcertificado' => 'Mariana Castro', 'firmante1' => 'Alberto Sandoval', 'firmante2' => 'Fernando Pacheco', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/python.png'],
        ['id' => 10, 'nombre' => 'Grupo de Certificación Java 2024-II', 'tipo' => 'Certificado de programación', 'descripcion' => 'Certificación en desarrollo de aplicaciones Java', 'fechainicio' => '2024-11-01', 'fechafin' => '2024-12-15', 'creadorgrupo' => 'Erika Fernández', 'generadorcertificado' => 'Jose Luis Orozco', 'firmante1' => 'Erika Fernández', 'firmante2' => 'Daniela Herrera', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/java.png'],
        ['id' => 11, 'nombre' => 'Grupo de Certificación Red Hat 2024-II', 'tipo' => 'Certificado de administración de sistemas', 'descripcion' => 'Certificación en administración de servidores Red Hat', 'fechainicio' => '2024-11-01', 'fechafin' => '2024-12-15', 'creadorgrupo' => 'Miguel Rojas', 'generadorcertificado' => 'Sergio Medina', 'firmante1' => 'Miguel Rojas', 'firmante2' => 'Paula Gómez', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/redhat.png'],
        ['id' => 12, 'nombre' => 'Grupo de Certificación AWS 2024-II', 'tipo' => 'Certificado de computación en la nube', 'descripcion' => 'Certificación en soluciones de Amazon Web Services', 'fechainicio' => '2024-10-01', 'fechafin' => '2024-11-30', 'creadorgrupo' => 'Javier Ortega', 'generadorcertificado' => 'Clara Villanueva', 'firmante1' => 'Javier Ortega', 'firmante2' => 'Marina Estrada', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/aws.png'],
        ['id' => 13, 'nombre' => 'Grupo de Certificación Azure 2024-II', 'tipo' => 'Certificado de computación en la nube', 'descripcion' => 'Certificación en soluciones de Microsoft Azure', 'fechainicio' => '2024-09-01', 'fechafin' => '2024-10-15', 'creadorgrupo' => 'Fernando Paredes', 'generadorcertificado' => 'Carmen Torres', 'firmante1' => 'Fernando Paredes', 'firmante2' => 'Roberto Peña', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/azure.png'],
        ['id' => 14, 'nombre' => 'Grupo de Certificación CCNA 2024-II', 'tipo' => 'Certificado de redes', 'descripcion' => 'Certificación Cisco Certified Network Associate (CCNA)', 'fechainicio' => '2024-08-01', 'fechafin' => '2024-09-15', 'creadorgrupo' => 'Alberto Jiménez', 'generadorcertificado' => 'Sandra López', 'firmante1' => 'Alberto Jiménez', 'firmante2' => 'Luis Domínguez', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/ccna.png'],
        ['id' => 15, 'nombre' => 'Grupo de Certificación Python 2024-II', 'tipo' => 'Certificado de programación', 'descripcion' => 'Certificación en programación con Python', 'fechainicio' => '2024-07-01', 'fechafin' => '2024-08-30', 'creadorgrupo' => 'Sofia Herrera', 'generadorcertificado' => 'Martín Chávez', 'firmante1' => 'Sofia Herrera', 'firmante2' => 'Esteban Ríos', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/python.png'],
        ['id' => 16, 'nombre' => 'Grupo de Certificación Java 2024-II', 'tipo' => 'Certificado de programación', 'descripcion' => 'Certificación en desarrollo con Java', 'fechainicio' => '2024-06-01', 'fechafin' => '2024-07-30', 'creadorgrupo' => 'Natalia Gómez', 'generadorcertificado' => 'Andrés Espinoza', 'firmante1' => 'Natalia Gómez', 'firmante2' => 'Victor Muñoz', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/java.png'],
        ['id' => 17, 'nombre' => 'Grupo de Certificación C++ 2024-II', 'tipo' => 'Certificado de programación', 'descripcion' => 'Certificación en desarrollo con C++', 'fechainicio' => '2024-05-01', 'fechafin' => '2024-06-30', 'creadorgrupo' => 'Rodrigo Sánchez', 'generadorcertificado' => 'Liliana Duarte', 'firmante1' => 'Rodrigo Sánchez', 'firmante2' => 'Marta Ruiz', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/cpp.png'],
        ['id' => 18, 'nombre' => 'Grupo de Certificación SQL 2024-II', 'tipo' => 'Certificado de bases de datos', 'descripcion' => 'Certificación en manejo de bases de datos SQL', 'fechainicio' => '2024-04-01', 'fechafin' => '2024-05-31', 'creadorgrupo' => 'Verónica Medina', 'generadorcertificado' => 'Joaquín Ferrer', 'firmante1' => 'Verónica Medina', 'firmante2' => 'Gabriel Orozco', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/sql.png'],
        ['id' => 19, 'nombre' => 'Grupo de Certificación Docker 2024-II', 'tipo' => 'Certificado de virtualización', 'descripcion' => 'Certificación en contenedores con Docker', 'fechainicio' => '2024-03-01', 'fechafin' => '2024-04-15', 'creadorgrupo' => 'Ricardo Fuentes', 'generadorcertificado' => 'Beatriz Solís', 'firmante1' => 'Ricardo Fuentes', 'firmante2' => 'Francisco Lara', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/docker.png'],
        ['id' => 20, 'nombre' => 'Grupo de Certificación Kubernetes 2024-II', 'tipo' => 'Certificado de orquestación de contenedores', 'descripcion' => 'Certificación en administración de Kubernetes', 'fechainicio' => '2024-02-01', 'fechafin' => '2024-03-31', 'creadorgrupo' => 'Gustavo Varela', 'generadorcertificado' => 'Daniela Acosta', 'firmante1' => 'Gustavo Varela', 'firmante2' => 'Rodrigo Mena', 'firmante3' => 'Ninguno', 'firmante4' => 'Ninguno', 'plantilla' => '/templates/kubernetes.png'],
    ];

    /* ================================================================= */
    public $fonts = [
        ['name' => 'Roboto'],
        ['name' => 'Open Sans'],
        ['name' => 'Montserrat'],
    ];
    
    public $font_styles = [
        ['name' => 'Regular'],
        ['name' => 'Bold'],
        ['name' => 'Italic'],
    ];
    
    public $positions = [
        ['name' => 'Director General', 'is_internal_position' => true],
        ['name' => 'Coordinador Académico', 'is_internal_position' => true],
        ['name' => 'Estudiante Destacado', 'is_internal_position' => false],
    ];
    
    public $image_types = [
        ['name' => 'Fondo'],
        ['name' => 'Firma'],
        ['name' => 'Logo'],
    ];
    
    public $outstanding_values = [
        ['name' => 'Excelente'],
        ['name' => 'Muy Bueno'],
        ['name' => 'Bueno'],
    ];
    
    public $people = [
        ['first_name' => 'Juan', 'last_name' => 'Pérez', 'email' => 'juan.perez@example.com', 'gender' => 'masculino', 'signature_image_url' => null],
        ['first_name' => 'Anali', 'last_name' => 'Gómez', 'email' => 'anali.gomez@example.com', 'gender' => 'femenino', 'signature_image_url' => null],
        ['first_name' => 'Carlos', 'last_name' => 'Lopez', 'email' => 'carlos.lopez@example.com', 'gender' => 'masculino', 'signature_image_url' => null],
    ];
    
    public $image_statuses = [
        ['name' => 'Aprobado'],
        ['name' => 'Pendiente'],
        ['name' => 'Rechazado'],
    ];
    
    public $certificate_text_types = [
        ['name' => 'Nombre del Participante'],
        ['name' => 'Nombre del Evento'],
        ['name' => 'Fecha'],
    ];
    
    public $user_statuses = [
        ['name' => 'Activo'],
        ['name' => 'Inactivo'],
    ];
    
    public $certificate_statuses = [
        ['name' => 'Emitido'],
        ['name' => 'Pendiente'],
        ['name' => 'Anulado'],
    ];
    
    public $roles = [
        ['name' => 'Administrador', 'description' => 'Control total del sistema'],
        ['name' => 'Editor', 'description' => 'Puede gestionar certificados y usuarios'],
        ['name' => 'Invitado', 'description' => 'Acceso limitado solo lectura'],
    ];
    
    
    public $person_position = [
        ['person_id' => 1, 'position_id' => 1],
        ['person_id' => 2, 'position_id' => 2],
        ['person_id' => 3, 'position_id' => 3],
    ];
    
    public $area_person = [
        ['area_id' => 1, 'person_id' => 1],
        ['area_id' => 2, 'person_id' => 2],
        ['area_id' => 3, 'person_id' => 3],
    ];
    
    public $workshops = [
        ['name' => 'Taller de Ciberseguridad', 'description' => 'Seguridad en la red para usuarios.', 'start_date' => '2025-04-01', 'end_date' => '2025-04-05'],
        ['name' => 'Taller de Programación Web', 'description' => 'Desarrollo con Laravel y Vue.js.', 'start_date' => '2025-05-01', 'end_date' => '2025-05-10'],
    ];
    
    public $projects = [
        ['name' => 'Proyecto Blockchain UNT', 'description' => 'Aplicación de blockchain en educación', 'start_date' => '2025-03-01', 'end_date' => '2025-06-30'],
        ['name' => 'Sistema SEDIPRO', 'description' => 'Gestión de certificados académicos', 'start_date' => '2025-01-15', 'end_date' => '2025-12-20'],
    ];
    
    public $certification_groups = [
        ['name' => 'Grupo A - Taller Ciberseguridad', 'project_id' => 1, 'workshop_id' => 1],
        ['name' => 'Grupo B - Proyecto SEDIPRO', 'project_id' => 2, 'workshop_id' => null],
    ];
    
    public $certificate_templates = [
        ['name' => 'Plantilla General UNT', 'description' => 'Diseño clásico de UNT', 'background_image_url' => 'https://example.com/plantilla1.png'],
        ['name' => 'Plantilla Ciberseguridad', 'description' => 'Diseño tecnológico con logos', 'background_image_url' => 'https://example.com/plantilla2.png'],
    ];
    
    public $group_certificate_template = [
        ['certification_group_id' => 1, 'certificate_template_id' => 2],
        ['certification_group_id' => 2, 'certificate_template_id' => 1],
    ];
    
    public $images = [
        ['image_type_id' => 1, 'url' => 'https://example.com/fondo-certificado.jpg', 'name' => 'Fondo 1', 'status_id' => 1],
        ['image_type_id' => 2, 'url' => 'https://example.com/firma-luis.png', 'name' => 'Firma Luis', 'status_id' => 1],
    ];
    
    public $text_configurations = [
        [
            'certificate_template_id' => 1,
            'certificate_text_type_id' => 1,
            'x' => 100,
            'y' => 200,
            'font_size' => 16,
            'font_id' => 1,
            'font_style_id' => 1
        ],
        [
            'certificate_template_id' => 1,
            'certificate_text_type_id' => 2,
            'x' => 100,
            'y' => 250,
            'font_size' => 14,
            'font_id' => 2,
            'font_style_id' => 2
        ],
    ];
    
    
    /* ================================================================= */






    


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
        //
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
