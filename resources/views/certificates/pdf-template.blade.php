<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body, html {
            margin: 0;
            padding: 0;
            width: 297mm;
            height: 210mm;
            font-family: 'Times New Roman', serif;
            overflow: hidden;
            page-break-inside: avoid !important;
            page-break-after: avoid !important;
            page-break-before: avoid !important;
            position: relative;
        }

        .certificate-container {
            position: relative;
            top: 0;
            left: 0;
            width: 297mm;
            height: 210mm;
            page-break-inside: avoid !important;
            page-break-after: avoid !important;
            page-break-before: avoid !important;
        }

        /* Imagen de fondo como elemento separado para DOMPDF */
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 297mm;
            height: 210mm;
            z-index: -1;
            object-fit: cover;
        }

        /* === LOGOS SUPERIORES === */
        .logos-container {
            position: absolute;
            top: 8mm;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
            width: 280mm;
            height: 25mm;
        }

        .logos-container.logos-1 {
            gap: 0;
        }

        .logos-container.logos-2 {
            gap: 50mm;
        }

        .logo-element {
            max-height: 22mm;
            max-width: 100mm;
            object-fit: contain;
            display: block;
        }

        .logos-container.logos-1 .logo-element {
            max-width: 120mm;
        }

        /* === TÍTULO CERTIFICADO === */
        .titulo-certificado {
            position: absolute;
            top: 35mm;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 280mm;
            text-transform: uppercase;
            @if(isset($estilos_textos['titulo']))
                font-family: "{{ $estilos_textos['titulo']['font_family'] ?? 'Times New Roman' }}", serif;
                font-size: {{ $estilos_textos['titulo']['font_size'] ?? 48 }}px;
                font-weight: {{ $estilos_textos['titulo']['font_weight'] ?? 'bold' }};
                color: {{ $estilos_textos['titulo']['color'] ?? '#000000' }};
                text-align: {{ $estilos_textos['titulo']['text_align'] ?? 'center' }};
            @else
                font-size: 48px;
                font-weight: bold;
                color: #000000;
                letter-spacing: 8px;
            @endif
        }

        .subtitulo-certificado {
            position: absolute;
            top: 55mm;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 280mm;
            text-transform: uppercase;
            @if(isset($estilos_textos['subtitulo']))
                font-family: "{{ $estilos_textos['subtitulo']['font_family'] ?? 'Times New Roman' }}", serif;
                font-size: {{ $estilos_textos['subtitulo']['font_size'] ?? 28 }}px;
                font-weight: {{ $estilos_textos['subtitulo']['font_weight'] ?? 'bold' }};
                color: {{ $estilos_textos['subtitulo']['color'] ?? '#D97706' }};
                text-align: {{ $estilos_textos['subtitulo']['text_align'] ?? 'center' }};
            @else
                font-size: 28px;
                font-weight: bold;
                color: #D97706;
                letter-spacing: 3px;
            @endif
        }

        /* === OTORGADO A === */
        .otorgado-texto {
            position: absolute;
            top: 75mm;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-size: 16px;
            color: #000000;
            width: 120mm;
            padding: 3mm;
        }

        /* === NOMBRE COMPLETO === */
        .persona-nombre {
            position: absolute;
            top: 88mm;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 260mm;
            padding: 6mm 0;
            border-bottom: 2px solid #000000;
            text-transform: uppercase;
            @if(isset($estilos_textos['nombre']))
                font-family: "{{ $estilos_textos['nombre']['font_family'] ?? 'Times New Roman' }}", serif;
                font-size: {{ $estilos_textos['nombre']['font_size'] ?? 32 }}px;
                font-weight: {{ $estilos_textos['nombre']['font_weight'] ?? 'bold' }};
                color: {{ $estilos_textos['nombre']['color'] ?? '#000000' }};
                text-align: {{ $estilos_textos['nombre']['text_align'] ?? 'center' }};
            @else
                font-size: 32px;
                font-weight: bold;
                color: #000000;
                font-style: italic;
                letter-spacing: 2px;
            @endif
        }

        /* === DESCRIPCIÓN === */
        .descripcion-principal {
            position: absolute;
            top: 108mm;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 260mm;
            line-height: 1.4;
            padding: 4mm 0;
            @if(isset($estilos_textos['descripcion']))
                font-family: "{{ $estilos_textos['descripcion']['font_family'] ?? 'Times New Roman' }}", serif;
                font-size: {{ $estilos_textos['descripcion']['font_size'] ?? 16 }}px;
                font-weight: {{ $estilos_textos['descripcion']['font_weight'] ?? 'normal' }};
                color: {{ $estilos_textos['descripcion']['color'] ?? '#000000' }};
                text-align: {{ $estilos_textos['descripcion']['text_align'] ?? 'justify' }};
            @else
                font-size: 16px;
                font-weight: normal;
                color: #000000;
                text-align: justify;
            @endif
        }

        /* === FECHA === */
        .fecha-emision {
            position: absolute;
            top: 130mm;
            right: 15mm;
            text-align: right;
            padding: 2mm 4mm;
            @if(isset($estilos_textos['ubicacion']))
                font-family: "{{ $estilos_textos['ubicacion']['font_family'] ?? 'Times New Roman' }}", serif;
                font-size: {{ $estilos_textos['ubicacion']['font_size'] ?? 14 }}px;
                font-weight: {{ $estilos_textos['ubicacion']['font_weight'] ?? 'normal' }};
                color: {{ $estilos_textos['ubicacion']['color'] ?? '#000000' }};
            @else
                font-size: 14px;
                color: #000000;
                font-weight: normal;
            @endif
        }

        /* === CÓDIGO QR === */
        .qr-container {
            position: absolute;
            left: 15mm;
            bottom: 15mm;
            text-align: center;
            padding: 2mm;
        }

        .qr-code {
            width: 22mm;
            height: 22mm;
            display: block;
        }

        .qr-text {
            font-size: 7px;
            color: #000000;
            margin-top: 1mm;
            text-align: center;
            width: 22mm;
            font-weight: bold;
            line-height: 1.2;
        }

        /* === FIRMAS === */
        .firmas-container {
            position: absolute;
            bottom: 15mm;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: flex-end;
            width: 200mm;
            height: 40mm;
            gap: 20mm;
        }

        .firmas-container.firmas-1 {
            justify-content: center;
            gap: 0;
        }

        .firmas-container.firmas-2 {
            justify-content: space-between;
            gap: 40mm;
        }

        .firmas-container.firmas-3 {
            justify-content: space-between;
            gap: 15mm;
        }

        .firma-element {
            text-align: center;
            position: relative;
            display: inline-block;
        }

        .firmas-container.firmas-1 .firma-element {
            width: 80mm;
        }

        .firmas-container.firmas-2 .firma-element {
            width: 75mm;
        }

        .firmas-container.firmas-3 .firma-element {
            width: 60mm;
        }

        .firma-imagen {
            width: 50mm;
            height: 18mm;
            object-fit: contain;
            margin-bottom: 2mm;
            display: block;
        }

        .firma-linea {
            width: 55mm;
            height: 2px;
            background-color: #D97706;
            margin: 2mm auto;
        }

        .firma-nombre {
            font-size: 11px;
            font-weight: bold;
            color: #000000;
            margin: 1mm 0;
            text-transform: uppercase;
            line-height: 1.1;
        }

        .firma-cargo {
            font-size: 9px;
            color: #D97706;
            margin: 0.5mm 0;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.1;
        }

        /* === SELLO PRESIDENTA === */
        .sello-presidenta {
            position: absolute;
            top: -15mm;
            right: -10mm;
            width: 18mm;
            height: 18mm;
            object-fit: contain;
            opacity: 0.9;
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        {{-- IMAGEN DE FONDO COMO ELEMENTO IMG PARA DOMPDF --}}
        @if(isset($templateDataUri) && $templateDataUri)
            <img src="{{ $templateDataUri }}" alt="Background" class="background-image">
        @endif

        {{-- LOGOS SUPERIORES --}}
        @if(isset($logos) && count($logos) > 0)
        <div class="logos-container logos-{{ count($logos) }}">
            @foreach ($logos as $logo)
                @if(isset($logo['dataUri']))
                    <img src="{{ $logo['dataUri'] }}" alt="{{ $logo['name'] ?? 'Logo' }}" class="logo-element">
                @endif
            @endforeach
        </div>
        @endif

        {{-- TÍTULO --}}
        <div class="titulo-certificado">
            {{ $titulo_certificado ?? 'CERTIFICADO' }}
        </div>

        {{-- SUBTÍTULO --}}
        <div class="subtitulo-certificado">
            {{ $subtitulo_certificado ?? 'DE ' . strtoupper($grupo->tipoDeCertificacion->nombre ?? 'RECONOCIMIENTO') }}
        </div>

        {{-- OTORGADO A --}}
        <div class="otorgado-texto">
            Otorgado a:
        </div>

        {{-- NOMBRE --}}
        <div class="persona-nombre">
            {{ strtoupper($persona->nombres . ' ' . $persona->apellidos) }}
        </div>

        {{-- DESCRIPCIÓN --}}
        <div class="descripcion-principal">
            @if(isset($descripcionPersonalizada) && $descripcionPersonalizada)
                {!! nl2br(e($descripcionPersonalizada)) !!}
            @else
                Por su destacada participación como {{ $persona->cargo_nombre ?? 'PARTICIPANTE' }} del área de {{ $persona->area_nombre ?? 'GENERAL' }} del proyecto "{{ $grupo->proyecto->nombre ?? 'NAVISEDIPRO 11.0' }}" organizado por la Sección Estudiantil de Dirección de Proyectos de la Universidad Nacional de Trujillo
            @endif
        </div>

        {{-- FECHA --}}
        <div class="fecha-emision">
            @if(isset($lugar_personalizado) && $lugar_personalizado)
                {{ $lugar_personalizado }}, {{ \Carbon\Carbon::parse($grupo->fecha_emision)->locale('es')->isoFormat('DD [de] MMMM [,] YYYY') }}
            @else
                Trujillo, {{ \Carbon\Carbon::parse($grupo->fecha_emision)->locale('es')->isoFormat('DD [de] MMMM [,] YYYY') }}
            @endif
        </div>

        {{-- CÓDIGO QR --}}
        @if(isset($qrCode) && $qrCode)
        <div class="qr-container">
            <img src="{{ $qrCode }}" alt="QR Code" class="qr-code">
        </div>
        @endif

        {{-- FIRMAS --}}
        @if(isset($signatures) && count($signatures) > 0)
        <div class="firmas-container firmas-{{ count($signatures) }}">
            @foreach ($signatures as $signature)
                <div class="firma-element">
                    @if(isset($signature['dataUri']) && $signature['dataUri'])
                        <img src="{{ $signature['dataUri'] }}" alt="{{ $signature['name'] ?? 'Firma' }}" class="firma-imagen">
                    @endif

                    <div class="firma-linea"></div>
                    <div class="firma-nombre">{{ $signature['name'] ?? 'DIRECTOR' }}</div>
                    <div class="firma-cargo">{{ $signature['cargo'] ?? 'PRESIDENTA' }}</div>
                    <div class="firma-cargo">SEDIPRO UNT</div>

                    {{-- SELLO SUPERPUESTO --}}
                    @if(($signature['esPresidenta'] ?? false) && isset($selloDataUri) && $selloDataUri)
                        <img src="{{ $selloDataUri }}" alt="Sello" class="sello-presidenta">
                    @endif
                </div>
            @endforeach
        </div>
        @endif
    </div>
</body>
</html>
