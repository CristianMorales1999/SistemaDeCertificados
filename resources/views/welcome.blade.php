@extends('layouts.app')

@section('content')

        <div class="min-h-screen flex flex-col">

        <!-- SECCIÓN PREINTERMEDIA -->

        <div id="main-content" class="transition-all duration-300">

        <section class="bg-[#EBF1FD]">

        <div class="pt-24">
        <h1 class="text-center font-bold mt-8 mb-8 md:text-2xl md:mx-8 lg:text-3xl lg:mx-8">GENERADOR DE CERTIFICADOS<h1>
        <h1 class="text-center ml-4 mr-4 mb-4 md:text-2xl md:mx-8 lg:text-sm lg:mx-8">Carga tu plantilla, logo y firmas para poder generar y descargar tus diferentes tipos de <br> certificados para cierto grupo de personas.<h1>
        </div>
        <!-- BOTONES -->

        <div class="p-4 rounded-lg flex items-center justify-center ">
                <a class="ml-1 mr-2 px-5 py-3 flex items-center justify-center bg-[#9636AD] bg-[#9636AD] hover:bg-[#3454A1] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[#9636AD] hover:border-[#3454A1] border-2 lg:ml-2">
                    <h1 class="flex items-center justify-center text-center text-xs text-white lg:text-xl lg:text-center ">Generar certificados</h1>
                </a>
                <a class="ml-1 mr-2 px-5 py-3 flex items-center justify-center bg-white hover:bg-[#E7C9EE] text-[#9636AD] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[#9636AD] border-2 lg:ml-2">
                    <h1 class="flex items-center justify-center text-center text-xs text-[#9636AD] lg:text-xl lg:text-center">Validar certificados</h1>
                </a>
        </div>


        <!-- FIN BOTONES -->

        <!-- IMAGEN EJEMPLO DE CERTIFICADO-->
            <!-- Imagen -->
            <div class="p-4 flex items-center justify-center">
                <div class="rounded-xl p-1 flex item-center" style="background: linear-gradient(to right, #3E1A6D, #6C2D91, #B57CBE);">
                <img src="/imagenes/exampleCertificates/defaultCertificate.png" alt="Descripción de la imagen" class="rounded-xl">
                <div>
            </div>
        <!-- FIN IMAGEN EJEMPLO DE CERTIFICADO-->

        </section>

        <section>
            <h1 class="text-center pt-6 mt-10 ml-4 mr-4 mb-10 md:text-2xl md:mx-8 lg:text-sm lg:mx-8">Si aún no tienes una plantilla personalizada, puedes elegir una de nuestras plantillas prediseñadas.<h1>
                <div class="mx-4 lg:mx-40 flex items-center bg-gradient-to-r from-[#3E1A6D] via-[#6C2D91] to-[#B57CBE] flex justify-center gap-4 p-4 rounded-lg">
                    <div class="w-1/5 flex items-center">
                    <img src="/imagenes/exampleCertificates/exampleCertificate01.jpg" alt="Plantilla 1" class="w-full h-auto rounded-lg hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="w-1/5 flex items-center">
                        <img src="/imagenes/exampleCertificates/exampleCertificate02.jpg" alt="Plantilla 2" class="w-full h-auto rounded-lg hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="w-1/5 flex items-center">
                        <img src="/imagenes/exampleCertificates/exampleCertificate03.jpeg" alt="Plantilla 3" class="w-full h-auto rounded-lg hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="w-1/5 flex items-center">
                        <img src="/imagenes/exampleCertificates/exampleCertificate04.jpeg" alt="Plantilla 4" class="w-full h-auto rounded-lg hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="w-1/5 flex items-center">
                        <img src="/imagenes/exampleCertificates/exampleCertificate05.jpeg" alt="Plantilla 5" class="w-full h-auto rounded-lg hover:scale-105 transition-transform duration-300">
                    </div>
                </div>
            <h1 class="pb-6 mb-10">
        </section>


        <section class="bg-[#EBF1FD]">
        <div class="pt-10 mt-5">
        <div>

        <!-- IMAGEN LOGO-->
            <!-- Imagen -->
            <div class="flex items-center justify-center">
                <img src="/imagenes/logoDeSedipro.svg" alt="Descripción de la imagen" class="w-44 h-auto cursor-pointer">
            </div>
        <!-- FIN IMAGEN LOGO-->

        <h1 class="text-center ml-4 mt-10 mr-4 mb-10 md:text-2xl md:mx-8 lg:text-sm lg:mx-8">Sección Estudiantil de Dirección de Proyectos de la UNT.<h1>

        <div class="mb-8 rounded-lg flex items-center justify-center ">
                <a class="ml-1 mr-2 px-5 py-3 flex items-center justify-center bg-[#9636AD] bg-[#9636AD] hover:bg-[#3454A1] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[#9636AD] hover:border-[#3454A1] border-2 lg:ml-2">
                    <h1 class="flex items-center justify-center text-center text-xs text-white lg:text-xl lg:text-center ">Contáctanos</h1>
                </a>
        </div>

        <div class="max-w-6xl mx-auto flex justify-center gap-4">
            <div class="w-8 flex items-center">
                <img src="/imagenes/icons/icons8-facebook.svg" alt="Icono 1" class="w-full h-auto">
            </div>
            <div class="w-8 flex items-center">
                <img src="/imagenes/icons/icons8-instagram.svg" alt="Icono 2" class="w-full h-auto">
            </div>
            <div class="w-8 flex items-center">
                <img src="/imagenes/icons/icons8-linkedin.svg" alt="Icono 3" class="w-full h-auto">
            </div>
            <div class="w-8 flex items-center">
                <img src="/imagenes/icons/icons8-tiktok.svg" alt="Icono 4" class="w-full h-auto">
            </div>
            <div class="w-8 flex items-center">
                <img src="/imagenes/icons/icons8-youtube.svg" alt="Icono 5" class="w-full h-auto">
            </div>
            <div class="w-8 flex items-center">
                <img src="/imagenes/icons/icons8-whatsapp.svg" alt="Icono 6" class="w-full h-auto">
            </div>
        </div>

        <div class=" py-10 md:py-20">
        <div>

        </section>

        </div>

        <!-- FIN SECCIÓN INTERMEDIA -->

@endsection
