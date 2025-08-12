<!-- Menú Lateral -->
<div class="w-1/5 bg-white flex flex-col py-2 space-y-1 fixed top-24 bottom-0 overflow-y-auto">

  <!-- Botón Dashboard -->
  <div class="flex items-center">
    <div class="w-2 h-12 bg-accent-300 rounded-r-lg"></div>
    <button class="cursor-pointer bg-accent-300 hover:bg-primary-300 h-12 flex-1 flex items-center justify-center space-x-2 group active-nav-button rounded-lg mx-7"
      onclick="showSection('dashboard')" data-section="dashboard">
      <h1 class="text-left text-white font-semibold hidden md:block lg:text-md w-full ml-[25%]">
        Dashboard
      </h1>
    </button>
  </div>

  <!-- Botón Certificados -->
  <div class="flex items-center">
    <div class="w-2 h-12 bg-white rounded-r-lg"></div>
    <button class="cursor-pointer bg-white hover:bg-accent-50 h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
      onclick="showSection('certificados')" data-section="certificados">
      <h1 class="text-left text-white font-semibold hidden md:block lg:text-md w-full ml-[25%]">
        Certificados
      </h1>
    </button>
  </div>

  <!-- Botón Grupos -->
  <div class="flex items-center">
    <div class="w-2 h-12 bg-white rounded-r-lg"></div>
    <button class="cursor-pointer bg-white hover:bg-accent-50 h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
      onclick="showSection('grupos')" data-section="grupos">
      <h1 class="text-left text-white font-semibold hidden md:block lg:text-md w-full ml-[25%]">
        Grupos
      </h1>
    </button>
  </div>

  <!-- Botón Personas -->
  <div class="flex items-center">
    <div class="w-2 h-12 bg-white rounded-r-lg"></div>
    <button class="cursor-pointer bg-white hover:bg-accent-50 h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
      onclick="showSection('personas')" data-section="personas">
      <h1 class="text-left text-white font-semibold hidden md:block lg:text-md w-full ml-[25%]">
        Personas
      </h1>
    </button>
  </div>
  

  <!-- Botón Usuarios -->
  <div class="flex items-center">
    <div class="w-2 h-12 bg-white rounded-r-lg"></div>
    <button class="cursor-pointer bg-white hover:bg-accent-50 h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
      onclick="showSection('usuarios')" data-section="usuarios">
      <h1 class="text-left text-white font-semibold hidden md:block lg:text-md w-full ml-[25%]">
        Usuarios
      </h1>
    </button>
  </div>

  <!-- Botón Plantillas -->
  <div class="flex items-center">
    <div class="w-2 h-12 bg-white rounded-r-lg"></div>
    <button class="cursor-pointer bg-white hover:bg-accent-50 h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
      onclick="showSection('plantillas')" data-section="plantillas">
      <h1 class="text-left text-white font-semibold hidden md:block lg:text-md w-full ml-[25%]">
        Plantillas
      </h1>
    </button>
  </div>

  <!-- Botón Logos -->
  <div class="flex items-center">
    <div class="w-2 h-12 bg-white rounded-r-lg"></div>
    <button class="cursor-pointer bg-white hover:bg-accent-50 h-12 flex-1 flex items-center justify-center space-x-2 group nav-button rounded-lg mx-7"
      onclick="showSection('logos')" data-section="logos">
      <h1 class="text-left text-white font-semibold hidden md:block lg:text-md w-full ml-[25%]">
        Logos
      </h1>
    </button>
  </div>
</div>