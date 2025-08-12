@extends('layouts.app')

@section('content')

  <div class="min-h-screen flex flex-col">

    <!-- SECCIÓN PREINTERMEDIA -->

    <div id="main-content" class="transition-all duration-300">


      <div class="min-h-screen flex flex-col">

        <div class="pt-24">

          <!-- SECCIÓN INTERMEDIA -->
          <section class="flex flex-1 h-full">

            <!-- Sección 1/5 - Menú Lateral -->
            @include('admin.sidebar')

            <!-- Sección 4/5 - Contenido -->
            <div class="w-4/5 bg-primary-50 pt-5 px-0 flex flex-col ml-[20%] pb-28" style="min-height: calc(100vh - 96px);">
              <div class="flex-1">

                <div id="dashboard" class="content-section">

                  @include('components.admin.dashboard-info')

                </div>

                <div id="certificados" class="content-section hidden">
                  @livewire('certificados-post')
                </div>

                <div id="grupos" class="content-section hidden">
                  @livewire('grupos-post')
                </div>

                <div id="personas" class="content-section hidden">
                  <x-ui.section-title title="Personas"/>
                </div>

                <div id="usuarios" class="content-section hidden">
                  <x-ui.section-title title="Usuarios"/>
                </div>

                <div id="plantillas" class="content-section hidden">
                  <x-ui.section-title title="Plantillas"/>
                </div>

                <div id="logos" class="content-section hidden">
                  <x-ui.section-title title="Logos"/>
                </div>

              </div>
            </div>

            <!-- SCRIPT PARA MANEJAR EL DASHBOARD -->
            @vite('resources/js/admin.js')
          </section>
        </div>
    </div>
</div>


@endsection
