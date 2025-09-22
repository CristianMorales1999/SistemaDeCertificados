<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\AreaPersona;
use App\Models\GrupoDeCertificacion;
use App\Models\Certificado;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Browsershot\Browsershot;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::with(['area', 'areaPersonCargoDP.areaPersona.persona'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        // Cargar datos necesarios para crear un proyecto
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:proyectos',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'area_persona_cargo_id_dp' => 'required|exists:area_persona_cargo,id',
            'area_persona_cargo_id_codp' => 'nullable|exists:area_persona_cargo,id',
            'area_id' => 'nullable|exists:areas,id',
            'imagen_logo' => 'nullable|string|max:300',
        ]);

        $proyecto = Proyecto::create($request->all());

        return redirect()->route('proyectos.show', $proyecto)
            ->with('success', 'Proyecto creado exitosamente');
    }

    public function show(Proyecto $proyecto)
    {
        $proyecto->load([
            'areaPersonCargoDP.areaPersona.persona',
            'areaPersonCargoCODP.areaPersona.persona',
            'area',
            'areaPersonas.persona',
            'gruposDeCertificacion'
        ]);

        return view('proyectos.show', compact('proyecto'));
    }

    public function gestion(Proyecto $proyecto)
    {
        return view('proyectos.gestion', compact('proyecto'));
    }

    public function edit(Proyecto $proyecto)
    {
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:proyectos,nombre,' . $proyecto->id,
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'area_persona_cargo_id_dp' => 'required|exists:area_persona_cargo,id',
            'area_persona_cargo_id_codp' => 'nullable|exists:area_persona_cargo,id',
            'area_id' => 'nullable|exists:areas,id',
            'imagen_logo' => 'nullable|string|max:300',
        ]);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.show', $proyecto)
            ->with('success', 'Proyecto actualizado exitosamente');
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto eliminado exitosamente');
    }

    /**
     * Asociar personas al proyecto
     */
    public function asociarPersonas(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'area_persona_ids' => 'required|array',
            'area_persona_ids.*' => 'exists:area_persona,id',
            'rol' => 'required|in:Miembro,Staff de apoyo'
        ]);

        foreach ($request->area_persona_ids as $areaPersonaId) {
            $proyecto->areaPersonas()->syncWithoutDetaching([
                $areaPersonaId => ['rol' => $request->rol]
            ]);
        }

        return redirect()->route('proyectos.show', $proyecto)
            ->with('success', 'Personas asociadas al proyecto exitosamente');
    }

    /**
     * Quitar personas del proyecto
     */
    public function quitarPersonas(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'area_persona_ids' => 'required|array',
            'area_persona_ids.*' => 'exists:area_persona,id',
        ]);

        $proyecto->areaPersonas()->detach($request->area_persona_ids);

        return redirect()->route('proyectos.show', $proyecto)
            ->with('success', 'Personas removidas del proyecto exitosamente');
    }

    /**
     * Generar certificados para todas las personas del proyecto
     */
    // public function generarCertificados(Request $request, Proyecto $proyecto)
    // {
    //     $request->validate([
    //         'grupo_certificacion_id' => 'required|exists:grupos_de_certificacion,id'
    //     ]);

    //     $grupoCertificacion = GrupoDeCertificacion::with([
    //         'tipoDeCertificacion',
    //         'imagenPlantilla',
    //         'configuraciones.seccionDeInformacion'
    //     ])->findOrFail($request->grupo_certificacion_id);

    //     // Obtener todas las personas del proyecto
    //     $personasDelProyecto = $proyecto->areaPersonas()->with('persona')->get();

    //     $certificadosCreados = 0;
    //     $certificadosPDF = [];

    //     DB::beginTransaction();

    //     try {
    //         foreach ($personasDelProyecto as $areaPerson) {
    //             $persona = $areaPerson->persona;

    //             // Verificar si ya existe un certificado para esta persona en este grupo
    //             $certificadoExistente = Certificado::where('persona_id', $persona->id)
    //                 ->where('grupo_de_certificacion_id', $grupoCertificacion->id)
    //                 ->first();

    //             if (!$certificadoExistente) {
    //                 // Preparar datos para el template
    //                 $templateData = $this->prepararDatosTemplate($grupoCertificacion, $persona, $proyecto);

    //                 // Generar PDF
    //                 $html = view('certificates.pdf-template', $templateData)->render();

    //                 $filename = 'certificado_' . $persona->id . '_grupo_' . $grupoCertificacion->id . '_' . time() . rand(100, 999) . '.pdf';
    //                 $relativePath = 'certificados/' . $filename;
    //                 $fullPath = storage_path('app/public/' . $relativePath);

    //                 // Crear directorio si no existe
    //                 if (!file_exists(dirname($fullPath))) {
    //                     mkdir(dirname($fullPath), 0755, true);
    //                 }

    //                 // Generar PDF con orientación horizontal
    //                 Browsershot::html($html)
    //                     ->format('A4')
    //                     ->landscape()
    //                     ->margins(0, 0, 0, 0)
    //                     ->savePdf($fullPath);

    //                 // Crear registro en base de datos
    //                 $certificado = Certificado::create([
    //                     'persona_id' => $persona->id,
    //                     'grupo_de_certificacion_id' => $grupoCertificacion->id,
    //                     'codigo' => $this->generarCodigoUnico(),
    //                     'fecha_emision' => $grupoCertificacion->fecha_emision ?? now(),
    //                     'ruta_archivo' => $relativePath,
    //                     'estado' => 'Generado'
    //                 ]);

    //                 $certificadosPDF[] = $fullPath;
    //                 $certificadosCreados++;
    //             }
    //         }

    //         DB::commit();

    //         if ($certificadosCreados > 0) {
    //             // Crear ZIP con todos los PDFs
    //             $zipFileName = 'certificados_' . $proyecto->nombre . '_' . time() . '.zip';
    //             $zipPath = storage_path('app/public/' . $zipFileName);

    //             $zip = new \ZipArchive();
    //             if ($zip->open($zipPath, \ZipArchive::CREATE) === TRUE) {
    //                 foreach ($certificadosPDF as $pdfPath) {
    //                     if (file_exists($pdfPath)) {
    //                         $zip->addFile($pdfPath, basename($pdfPath));
    //                     }
    //                 }
    //                 $zip->close();

    //                 return response()->download($zipPath, $zipFileName)->deleteFileAfterSend(true);
    //             }
    //         }

    //         return redirect()->route('proyectos.show', $proyecto)
    //             ->with('success', "Se crearon {$certificadosCreados} certificados para el grupo '{$grupoCertificacion->nombre}'");

    //     } catch (\Exception $e) {
    //         DB::rollback();

    //         return redirect()->route('proyectos.show', $proyecto)
    //             ->with('error', 'Error al generar certificados: ' . $e->getMessage());
    //     }
    // }

    /**
     * Generar un solo certificado PDF
     */
    public function generarCertificadoIndividual($certificadoId)
    {
        $certificado = Certificado::with([
            'persona',
            'grupoDeCertificacion.tipoDeCertificacion',
            'grupoDeCertificacion.imagenPlantilla',
            'grupoDeCertificacion.configuraciones.seccionDeInformacion',
            'grupoDeCertificacion.proyecto'
        ])->findOrFail($certificadoId);

        try {
            // Preparar datos para el template
            $templateData = $this->prepararDatosTemplate(
                $certificado->grupoDeCertificacion,
                $certificado->persona,
                $certificado->grupoDeCertificacion->proyecto
            );

            $html = view('certificates.pdf-template', $templateData)->render();

            $filename = 'certificado_' . $certificado->codigo . '.pdf';
            $path = storage_path('app/public/temp/' . $filename);

            // Crear directorio temporal si no existe
            if (!file_exists(dirname($path))) {
                mkdir(dirname($path), 0755, true);
            }

            Browsershot::html($html)
                ->format('A4')
                ->landscape()
                ->margins(0, 0, 0, 0)
                ->savePdf($path);

            return response()->download($path, $filename)->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al generar PDF: ' . $e->getMessage());
        }
    }

    /**
     * Generar código único para certificado
     */
    private function generarCodigoUnico()
    {
        do {
            $codigo = 'CERT-' . date('Y') . '-' . strtoupper(substr(uniqid(), -6));
        } while (Certificado::where('codigo', $codigo)->exists());

        return $codigo;
    }

    /**
     * Ver certificados del proyecto
     */
    public function certificados(Proyecto $proyecto)
    {
        // Obtener todos los certificados de las personas del proyecto
        $personasIds = $proyecto->areaPersonas()->with('persona')->get()->pluck('persona.id');

        $certificados = Certificado::whereIn('persona_id', $personasIds)
            ->with([
                'persona',
                'grupoDeCertificacion.tipoDeCertificacion'
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('proyectos.certificados', compact('proyecto', 'certificados'));
    }

    /**
     * Preparar datos estructurados para el template de certificado
     */
    private function prepararDatosTemplate($grupo, $persona, $proyecto = null)
    {
        // Obtener la plantilla de fondo
        $templatePath = null;
        $templateDataUri = null;

        if ($grupo->imagenPlantilla && $grupo->imagenPlantilla->ruta) {
            $templatePath = storage_path('app/public/' . $grupo->imagenPlantilla->ruta);
            if (file_exists($templatePath)) {
                $templateDataUri = 'data:image/' . pathinfo($templatePath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($templatePath));
            }
        }

        // Si no hay plantilla, usar una por defecto
        if (!$templateDataUri) {
            $defaultTemplate = public_path('images/certificado-ejemplo.png');
            if (file_exists($defaultTemplate)) {
                $templateDataUri = 'data:image/png;base64,' . base64_encode(file_get_contents($defaultTemplate));
            }
        }

        // Preparar logos (máximo 2)
        $logos = $this->prepararLogos($proyecto);

        // Preparar firmas (de 1 a 3)
        $signatures = $this->prepararFirmas();

        // Preparar sello SEDIPRO
        $selloDataUri = $this->prepararSello();

        // Preparar código QR
        $qrCode = $this->generarQR($persona, $grupo);

        // Descripción personalizada
        $descripcionPersonalizada = $this->generarDescripcion($persona, $grupo, $proyecto);

        return [
            'grupo' => $grupo,
            'persona' => $persona,
            'proyecto' => $proyecto,
            'templateDataUri' => $templateDataUri,
            'logos' => $logos,
            'signatures' => $signatures,
            'showSelloPresidenta' => true, // Siempre mostrar por ahora
            'selloDataUri' => $selloDataUri,
            'qrCode' => $qrCode,
            'descripcion' => $descripcionPersonalizada,
        ];
    }

    /**
     * Preparar logos para el certificado (máximo 2)
     */
    private function prepararLogos($proyecto)
    {
        $logos = [];

        // Logo de SEDIPRO (siempre presente)
        $sedipro = public_path('imagenes/logoDeSedipro.svg');
        if (file_exists($sedipro)) {
            $logos[] = [
                'name' => 'SEDIPRO UNT',
                'dataUri' => 'data:image/svg+xml;base64,' . base64_encode(file_get_contents($sedipro))
            ];
        }

        // Logo del proyecto (si existe)
        if ($proyecto && $proyecto->imagen_logo) {
            $logoProyecto = storage_path('app/public/' . $proyecto->imagen_logo);
            if (file_exists($logoProyecto)) {
                $ext = pathinfo($logoProyecto, PATHINFO_EXTENSION);
                $logos[] = [
                    'name' => $proyecto->nombre,
                    'dataUri' => 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($logoProyecto))
                ];
            }
        }

        return $logos;
    }

    /**
     * Preparar firmas para el certificado (de 1 a 3)
     */
    private function prepararFirmas()
    {
        $signatures = [];

        // Usar las firmas del directorio público como ejemplos por defecto
        $firmasPublicas = [
            'Firma 01.png' => ['name' => 'Lucía de Fátima Amaya Cáceda', 'cargo' => 'DIRECTOR'],
            'Firma 02.png' => ['name' => 'Cristian Anthony Morales Esquivel', 'cargo' => 'COORDINADOR'],
        ];

        foreach ($firmasPublicas as $archivo => $datos) {
            $firmaPath = public_path('imagenes/firmas/' . $archivo);
            if (file_exists($firmaPath)) {
                $ext = pathinfo($firmaPath, PATHINFO_EXTENSION);
                $signatures[] = [
                    'name' => $datos['name'],
                    'cargo' => $datos['cargo'],
                    'esPresidenta' => ($datos['cargo'] === 'DIRECTOR'),
                    'dataUri' => 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($firmaPath))
                ];
            }
        }

        // Si no hay firmas públicas, intentar buscar en storage
        if (empty($signatures)) {
            $firmasDisponibles = [
                [
                    'file' => 'Cinthya Soledad Gil Toribio.png',
                    'name' => 'Cinthya Gil Toribio',
                    'cargo' => 'Presidenta',
                    'esPresidenta' => true
                ],
                [
                    'file' => 'Cristian Anthony Morales Esquivel.png',
                    'name' => 'Cristian Morales Esquivel',
                    'cargo' => 'Director de Proyecto',
                    'esPresidenta' => false
                ]
            ];

            foreach ($firmasDisponibles as $firmaData) {
                $firmaPath = storage_path('app/public/fotos_firmas/' . $firmaData['file']);
                if (file_exists($firmaPath)) {
                    $ext = pathinfo($firmaPath, PATHINFO_EXTENSION);
                    $signatures[] = [
                        'name' => $firmaData['name'],
                        'cargo' => $firmaData['cargo'],
                        'esPresidenta' => $firmaData['esPresidenta'],
                        'dataUri' => 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($firmaPath))
                    ];
                }
            }
        }

        return $signatures;
    }

    /**
     * Preparar sello SEDIPRO
     */
    private function prepararSello()
    {
        $selloPath = storage_path('app/public/fotos_sellos/SEDIPRO UNT 2025.png');
        if (file_exists($selloPath)) {
            return 'data:image/png;base64,' . base64_encode(file_get_contents($selloPath));
        }
        return null;
    }

    /**
     * Generar código QR
     */
    private function generarQR($persona, $grupo, $urlBase = null)
    {
        try {
            // URL base para verificación (puede venir personalizada desde Livewire)
            $baseUrl = $urlBase ?? 'https://sediprano.gob.pe/verificar-certificado/';

            // Crear un código único para el certificado
            $codigoCertificado = md5($grupo->id . '-' . $persona->id . '-' . $grupo->fecha_emision);

            // URL completa para verificación
            $urlVerificacion = $baseUrl . $codigoCertificado;

            // Generar QR usando Simple QR Code
            $qrCodeSvg = QrCode::format('png')
                ->size(200)
                ->margin(1)
                ->generate($urlVerificacion);

            // Convertir a data URI para embeberse en el PDF
            $qrDataUri = 'data:image/png;base64,' . base64_encode($qrCodeSvg);

            return $qrDataUri;

        } catch (\Exception $e) {
            \Log::error('Error generando QR: ' . $e->getMessage());
            return null; // Si falla, no mostrar QR
        }
    }

    /**
     * Generar descripción personalizada del certificado
     */
    private function generarDescripcion($persona, $grupo, $proyecto)
    {
        if ($grupo->descripcion) {
            return $grupo->descripcion;
        }
        // usar propiedades directamente del modelo
        $cargo = strtoupper($persona['nombres']);
        $area  = strtoupper($persona->area_nombre);

        $nombreProyecto = $proyecto
            ? $proyecto->nombre
            : ($grupo->proyecto->nombre ?? 'EVENTO INSTITUCIONAL');

        return "Por su destacada participación como {$cargo} del área de {$persona->area_nombre} "
            . "del proyecto \"{$nombreProyecto}\" organizado por la Sección "
            . "Estudiantil de Dirección de Proyectos de la Universidad Nacional de Trujillo";
    }

    /**
     * Método de prueba para el template de certificado
     */
    public function testCertificado()
    {
        // Obtener datos de prueba
        $grupo = GrupoDeCertificacion::with(['tipoDeCertificacion', 'imagenPlantilla', 'proyecto'])->first();
        $persona = Persona::first();

        if (!$grupo || !$persona) {
            return "No hay datos de prueba disponibles. Necesitas al menos un grupo de certificación y una persona.";
        }

        // Preparar datos para el template
        $templateData = $this->prepararDatosTemplate($grupo, $persona, $grupo->proyecto);

        // Mostrar el HTML sin generar PDF
        return view('certificates.pdf-template', $templateData);
    }

    /**
     * Generar PDF personalizado desde la vista de generación de certificados
     */
    public function generarPDFPersonalizado(Request $request)
    {
        \Log::info('=== INICIO GENERACIÓN PDF PERSONALIZADO ===');
        \Log::info('Request params: ', $request->all());

        // Validar que tenemos los datos mínimos
        if (!$request->has('grupo_id') || !$request->has('tipo_certificado_id')) {
            \Log::error('Faltan datos mínimos: grupo_id o tipo_certificado_id');
            return response()->json(['error' => 'Faltan datos necesarios para generar el PDF'], 400);
        }

        try {
            // Cargar datos base
            $grupo = GrupoDeCertificacion::with(['tipoDeCertificacion', 'imagenPlantilla', 'proyecto'])->find($request->grupo_id);

            // Obtener la primera persona del proyecto asociado al grupo
            $persona = null;
            if ($grupo && $grupo->proyecto) {
                $areaPersona = AreaPersona::whereHas('proyectos', function($q) use ($grupo) {
                    $q->where('proyecto_id', $grupo->proyecto->id);
                })->with(['persona', 'area', 'areaPersonaCargos.cargo'])->first();

                if ($areaPersona && $areaPersona->persona) {
                    $persona = $areaPersona->persona;
                    $persona->area_nombre = $areaPersona->area->nombre ?? null;
                    $persona->cargo_nombre = $areaPersona->areaPersonaCargos
                                                        ->pluck('cargo.nombre')
                                                        ->first();
                }
                \Log::info('Persona obtenida del proyecto: ' . ($persona ? $persona : 'NULL'));
            }

            $persona = $persona ?? Persona::first();

            if (!$grupo || !$persona) {
                return response()->json(['error' => 'No se encontraron los datos necesarios'], 404);
            }

            if (!$grupo || !$persona) {
                \Log::error('Datos no encontrados - Grupo: ' . ($grupo ? 'OK' : 'NULL') . ', Persona: ' . ($persona ? 'OK' : 'NULL'));
                return response()->json(['error' => 'No se encontraron los datos necesarios'], 404);
            }

            \Log::info('Datos cargados - Grupo: ' . $grupo->id . ', Persona: ' . $persona->id);

            // Preparar datos base para el template
            $templateData = $this->prepararDatosTemplate($grupo, $persona, $grupo->proyecto);

            \Log::info('Datos template preparados');

            // Aplicar personalización de elementos
            $templateData = $this->aplicarPersonalizacionLivewire($templateData, $request);

            // generar descripción personalizada con generarDescripcion


            \Log::info('Personalización aplicada', $templateData);

            // Mostrar el HTML del template para debug (temporal)
            if ($request->has('debug') && $request->debug == 'true') {
                \Log::info('Retornando vista debug');
                return view('certificates.pdf-template', $templateData);
            }

            \Log::info('Generando PDF...');

            // Generar el PDF
            $pdfContent = $this->generarPDFConTemplate($templateData, $grupo, $persona);

            \Log::info('PDF generado exitosamente, tamaño: ' . strlen($pdfContent) . ' bytes');

            // Retornar el PDF
            return response($pdfContent)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="certificado_personalizado.pdf"');

        } catch (\Exception $e) {
            \Log::error('=== ERROR GENERANDO PDF PERSONALIZADO ===');
            \Log::error('Error: ' . $e->getMessage());
            \Log::error('Trace: ' . $e->getTraceAsString());
            return response()->json(['error' => 'Error generando el PDF: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Aplicar personalización de elementos al template (desde Livewire)
     */
    private function aplicarPersonalizacionLivewire($templateData, $request)
    {
        // Aplicar firmas personalizadas (vienen como parámetros JSON)
        if ($request->has('firmas')) {
            $firmasJson = $request->firmas;
            if (is_string($firmasJson)) {
                $firmasData = json_decode($firmasJson, true);
            } else {
                $firmasData = $firmasJson;
            }

            if (is_array($firmasData) && !empty($firmasData)) {
                $firmasPersonalizadas = [];
                foreach ($firmasData as $index => $firmaData) {
                    \Log::info('Procesando firma ' . ($index + 1) . ': ' . json_encode($firmaData));
                    if (isset($firmaData['ruta'])) {
                        $firmaPath = storage_path('app/public/' . $firmaData['ruta']);
                        if (file_exists($firmaPath)) {
                            $ext = pathinfo($firmaPath, PATHINFO_EXTENSION);
                            $firmasPersonalizadas[] = [
                                'name' => $firmaData['name'] ?? "Firma " . ($index + 1),
                                'cargo' => $firmaData['cargo'] ?? "DIRECTOR", // Cargo por defecto
                                'esPresidenta' => $firmaData['cargo'] == 'Presidente SEDIPRO UNT' ? true : false,
                                'dataUri' => 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($firmaPath))
                            ];
                        }
                    }
                }
                if (!empty($firmasPersonalizadas)) {
                    $templateData['signatures'] = $firmasPersonalizadas; // Usar 'signatures' no 'firmas'
                    $templateData['cantidad_firmas'] = $request->cantidad_firmas ?? count($firmasPersonalizadas);
                }
            }
        }

        // Aplicar logos personalizados
        if ($request->has('logos')) {
            $logosJson = $request->logos;
            if (is_string($logosJson)) {
                $logosData = json_decode($logosJson, true);
            } else {
                $logosData = $logosJson;
            }

            if (is_array($logosData) && !empty($logosData)) {
                $logosPersonalizados = [];
                foreach ($logosData as $index => $logoData) {
                    if (isset($logoData['ruta'])) {
                        $logoPath = storage_path('app/public/' . $logoData['ruta']);
                        if (file_exists($logoPath)) {
                            $ext = pathinfo($logoPath, PATHINFO_EXTENSION);
                            $logosPersonalizados[] = [
                                'name' => $logoData['name'] ?? "Logo " . ($index + 1),
                                'dataUri' => 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($logoPath))
                            ];
                        }
                    }
                }
                if (!empty($logosPersonalizados)) {
                    $templateData['logos'] = $logosPersonalizados;
                    $templateData['cantidad_logos'] = $request->cantidad_logos ?? count($logosPersonalizados);
                }
            }
        }

        // Aplicar sello personalizado
        if ($request->has('sello')) {
            $selloJson = $request->sello;
            if (is_string($selloJson)) {
                $selloData = json_decode($selloJson, true);
            } else {
                $selloData = $selloJson;
            }

            if (is_array($selloData) && isset($selloData['ruta'])) {
                $selloPath = storage_path('app/public/' . $selloData['ruta']);
                if (file_exists($selloPath)) {
                    $ext = pathinfo($selloPath, PATHINFO_EXTENSION);
                    $templateData['selloDataUri'] = 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($selloPath));
                }
            }
        }

        // Aplicar textos personalizados
        if ($request->has('titulo_certificado')) {
            $templateData['titulo_certificado'] = $request->titulo_certificado;
        }
        if ($request->has('subtitulo_certificado')) {
            $templateData['subtitulo_certificado'] = $request->subtitulo_certificado;
        }
        if ($request->has('texto_descripcion') && !empty($request->texto_descripcion)) {
            $templateData['descripcionPersonalizada'] = $request->texto_descripcion;
        }
        if ($request->has('texto_lugar') && !empty($request->texto_lugar)) {
            $templateData['lugar_personalizado'] = $request->texto_lugar;
        }

        // Aplicar estilos de textos personalizados
        if ($request->has('estilos_textos')) {
            $estilosJson = $request->estilos_textos;
            if (is_string($estilosJson)) {
                $estilosData = json_decode($estilosJson, true);
            } else {
                $estilosData = $estilosJson;
            }

            if (is_array($estilosData)) {
                $templateData['estilos_textos'] = $estilosData;
            }
        }

        // Aplicar configuración de código QR
        if ($request->has('codigo_qr')) {
            $templateData['codigo_qr'] = $request->codigo_qr;
        }
        if ($request->has('url_qr')) {
            $templateData['url_qr'] = $request->url_qr;
            // Regenerar QR con URL personalizada si se especificó
            $templateData['qrCode'] = $this->generarQR($templateData['persona'], $templateData['grupo'], $request->url_qr);
        }

        return $templateData;
    }

    /**
     * Generar PDF usando el template y los datos proporcionados
     */
    private function generarPDFConTemplate($templateData, $grupo, $persona)
    {
        try {
            // Verificar si dompdf está disponible
            if (!class_exists(\Barryvdh\DomPDF\PDF::class)) {
                throw new \Exception('DomPDF no está instalado. Ejecute: composer require barryvdh/laravel-dompdf');
            }

            // Generar HTML del template
            $html = view('certificates.pdf-template', $templateData)->render();

            // Crear el PDF usando DomPDF
            $pdf = app(\Barryvdh\DomPDF\PDF::class);

            // Configuraciones para mejor calidad visual y manejo de imágenes
            $pdf->setOptions([
                'isPhpEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'serif',
                'dpi' => 96, // DPI estándar para web
                'fontSubsetting' => true,
                'chroot' => [storage_path(), public_path()],
                'enableCssFloat' => true,
                'enableHtml5Parser' => true,
                'defaultMediaType' => 'print',
                'isFontSubsettingEnabled' => true,
                'isHtml5ParserEnabled' => true,
                'debugKeepTemp' => false,
                'logOutputFile' => storage_path('logs/dompdf.log'),
            ]);

            $pdf->loadHTML($html);
            $pdf->setPaper('A4', 'landscape');

            return $pdf->output();

        } catch (\Exception $e) {
            \Log::error('Error generando PDF con template: ' . $e->getMessage());
            throw new \Exception('Error generando PDF: ' . $e->getMessage());
        }
    }

    /**
     * Generar certificados masivos en ZIP
     */
    public function generarCertificadosMasivos(Request $request)
    {
        \Log::info('=== INICIO GENERACIÓN CERTIFICADOS MASIVOS ===');
        \Log::info('Request params: ', $request->all());

        // Validar que tenemos los datos mínimos
        if (!$request->has('grupo_id') || !$request->has('tipo_certificado_id')) {
            \Log::error('Faltan datos mínimos: grupo_id o tipo_certificado_id');
            return response()->json(['error' => 'Faltan datos necesarios para generar certificados'], 400);
        }

        try {
            // Cargar grupo
            $grupo = GrupoDeCertificacion::with(['tipoDeCertificacion', 'imagenPlantilla', 'proyecto'])->find($request->grupo_id);
            if (!$grupo) {
                return response()->json(['error' => 'Grupo no encontrado'], 404);
            }

            // Obtener todos los certificados del grupo con sus personas
            $certificados = Certificado::where('grupo_de_certificacion_id', $grupo->id)
            ->with([
                'person.areaPersonas.area',
                'person.areaPersonas.areaPersonaCargos.cargo',
            ])
            ->get();

            if ($certificados->isEmpty()) {
                return response()->json(['error' => 'No hay personas registradas en este grupo'], 404);
            }

            \Log::info('Encontrados ' . $certificados->count() . ' certificados para generar');

            // Crear directorio temporal para los PDFs
            $tempDir = storage_path('app/temp/certificados_masivos');
            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0755, true);
            }

            // Limpiar archivos temporales anteriores
            array_map('unlink', glob("$tempDir/*"));

            $pdfFiles = [];
            $processedCount = 0;

            foreach ($certificados as $certificado) {
                if (!$certificado->person) {
                    \Log::warning('Certificado ID ' . $certificado->id . ' no tiene persona asociada');
                    continue;
                }

                try {
                    $persona = $certificado->person;
                    $areaPersona = $persona->areaPersonas->first();

                    // Valores por defecto
                    $persona->area_nombre  = 'AREA';
                    $persona->cargo_nombre = 'CARGO';

                    if ($areaPersona) {
                        $persona->area_nombre = $areaPersona->area->nombre ?? null;

                        $primerCargo = $areaPersona->areaPersonaCargos->first();
                        $persona->cargo_nombre = $primerCargo?->cargo?->nombre;
                    }
                    \Log::info("Generando certificado para: {$persona}");

                    // Preparar datos base para cada certificado
                    $templateData = $this->prepararDatosTemplate($grupo, $persona, $grupo->proyecto);

                    // Aplicar personalización de elementos
                    $templateData = $this->aplicarPersonalizacionLivewire($templateData, $request);

                    // Generar el PDF para esta persona
                    $pdfContent = $this->generarPDFConTemplate($templateData, $grupo, $persona);

                    // Guardar PDF temporal
                    $nombrePersona = $this->sanitizeFilename($persona->nombres . '_' . $persona->apellidos);
                    $pdfFileName = "certificado_{$nombrePersona}.pdf";
                    $pdfPath = $tempDir . '/' . $pdfFileName;

                    file_put_contents($pdfPath, $pdfContent);
                    $pdfFiles[] = $pdfPath;
                    $processedCount++;

                    \Log::info("Certificado generado para: {$nombrePersona}");

                } catch (\Exception $e) {
                    \Log::error("Error generando certificado para {$certificado->person->nombres}: " . $e->getMessage());
                    continue; // Continuar con el siguiente certificado
                }
            }

            if (empty($pdfFiles)) {
                return response()->json(['error' => 'No se pudo generar ningún certificado'], 500);
            }

            // Crear archivo ZIP con todos los certificados
            $zipFileName = "certificados_{$grupo->nombre}_" . date('Y-m-d_H-i-s') . '.zip';
            $zipPath = $tempDir . '/' . $zipFileName;

            $zip = new \ZipArchive();
            if ($zip->open($zipPath, \ZipArchive::CREATE) === TRUE) {
                foreach ($pdfFiles as $pdfPath) {
                    $zip->addFile($pdfPath, basename($pdfPath));
                }
                $zip->close();

                // Limpiar PDFs individuales después de crear el ZIP
                foreach ($pdfFiles as $pdfPath) {
                    unlink($pdfPath);
                }

                \Log::info("ZIP creado exitosamente: {$zipFileName} con {$processedCount} certificados");

                // Retornar el ZIP para descarga
                return response()->download($zipPath, $zipFileName)->deleteFileAfterSend(true);

            } else {
                throw new \Exception('No se pudo crear el archivo ZIP');
            }

        } catch (\Exception $e) {
            \Log::error('=== ERROR GENERANDO CERTIFICADOS MASIVOS ===');
            \Log::error('Error: ' . $e->getMessage());
            \Log::error('Trace: ' . $e->getTraceAsString());
            return response()->json(['error' => 'Error generando certificados masivos: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Sanitizar nombre de archivo para evitar caracteres problemáticos
     */
    private function sanitizeFilename($filename)
    {
        // Reemplazar caracteres especiales y espacios
        $filename = preg_replace('/[^A-Za-z0-9_\-]/', '_', $filename);
        // Eliminar múltiples underscores consecutivos
        $filename = preg_replace('/_+/', '_', $filename);
        // Remover underscores al inicio y final
        return trim($filename, '_');
    }
}
