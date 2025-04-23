<x-layouts.app>

  <div class="min-h-screen flex flex-col">

    <!-- SECCIÓN PREINTERMEDIA -->

    <div id="main-content" class="transition-all duration-300">


      <div class="min-h-screen flex flex-col">

        <div class="pt-24">

          <!-- SECCIÓN INTERMEDIA -->
          <section class="flex flex-1 h-full">

            <!-- Sección 1/5 - Menú Lateral -->
            <div class="w-1/5 bg-white flex flex-col py-2 space-y-1 fixed top-24 bottom-0 overflow-y-auto">
              
              <!-- Botón Dashboard -->
              <div class="flex items-center">
                <div class="w-2 h-12 bg-accent-300 rounded-r-lg"></div>
                <button class="cursor-pointer bg-accent-300 hover:bg-[#3553A2] h-12 flex-1 flex items-center justify-center space-x-2 group active-nav-button rounded-lg mx-7"
                  onclick="showSection('dashboard')" data-section="dashboard">
                  <h1 class="text-left text-white hidden md:block lg:text-lg w-full ml-[25%]">
                    Dashboard
                  </h1>
                </button>
              </div>

              <!-- Botón Certificados -->
              <div class="flex items-center">
                <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                  onclick="showSection('certificados')" data-section="certificados">
                  <h1 class="text-left text-white hidden md:block lg:text-lg w-full ml-[25%]">
                    Certificados
                  </h1>
                </button>
              </div>

              <!-- Botón Grupos -->
              <div class="flex items-center">
                <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                  onclick="showSection('grupos')" data-section="grupos">
                  <h1 class="text-left text-white hidden md:block lg:text-lg w-full ml-[25%]">
                    Grupos
                  </h1>
                </button>
              </div>

              <!-- Botón Personas -->
              <div class="flex items-center">
                <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                  onclick="showSection('personas')" data-section="personas">
                  <h1 class="text-left text-white hidden md:block lg:text-lg w-full ml-[25%]">
                    Personas
                  </h1>
                </button>
              </div>

              <!-- Botón Usuarios -->
              <div class="flex items-center">
                <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                  onclick="showSection('usuarios')" data-section="usuarios">
                  <h1 class="text-left text-white hidden md:block lg:text-lg w-full ml-[25%]">
                    Usuarios
                  </h1>
                </button>
              </div>

              <!-- Botón Plantillas -->
              <div class="flex items-center">
                <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                  onclick="showSection('plantillas')" data-section="plantillas">
                  <h1 class="text-left text-white hidden md:block lg:text-lg w-full ml-[25%]">
                    Plantillas
                  </h1>
                </button>
              </div>

              <!-- Botón Logos -->
              <div class="flex items-center">
                <div class="w-2 h-12 bg-white rounded-r-lg"></div>
                <button class="cursor-pointer bg-white hover:bg-[#CF93DD] h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
                  onclick="showSection('logos')" data-section="logos">
                  <h1 class="text-left text-white hidden md:block lg:text-lg w-full ml-[25%]">
                    Logos
                  </h1>
                </button>
              </div>
            </div>

            <!-- Sección 4/5 -->
            <div class="w-4/5 bg-[#EBF1FD] py-5 px-0 flex flex-col ml-[20%]">
              <div class="flex-1">

                <div id="dashboard" class="content-section">

                  @include('dashboard-info')

                </div>

                <div id="certificados" class="content-section hidden">
                  @livewire('certificados-post')
                </div>

                <div id="grupos" class="content-section hidden">
                  @livewire('grupos-post')
                </div>

                <div id="personas" class="content-section hidden">
                  <x-section-title title="Personas"/>
                </div>

                <div id="usuarios" class="content-section hidden">
                  <x-section-title title="Usuarios"/>
                </div>

                <div id="plantillas" class="content-section hidden">
                  <x-section-title title="Plantillas"/>
                </div>

                <div id="logos" class="content-section hidden">
                  <x-section-title title="Logos"/>
                </div>

              </div>
            </div>

            <!-- SCRIPT PARA MANEJAR EL DASHBOARD -->
            @vite('resources/js/admin.js')
          </section>
        </div>

      </div>
    </div>
  </div>

  <!-- FIN SECCIÓN INTERMEDIA -->


</x-layouts.app>