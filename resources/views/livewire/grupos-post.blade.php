<div>

  <x-section-title title="Grupos" />

  <div class="mx-10">
    <div class="bg-white p-4 rounded-lg shadow-lg">
      <div class="bg-[#F7FAFF] p-4 rounded-lg">

        <!-- Filtro de tabla -->
        <div class="flex items-center gap-4">
          <div class="bg-white mb-4 p-2 rounded-lg shadow-lg">
            <img src="{{asset('/imagenes/icons/Shearch Icon.svg')}}" alt="Search Icon" class="w-5 h-5">
          </div>

          <div class="relative mt-1 mb-5 flex-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  clip-rule="evenodd"></path>
              </svg>
            </div>
            <input wire:model.live="search"
              type="text"
              id="table-search"
              class="bg-white border shadow-md border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Buscar por código, titular o grupo...">
          </div>

          <div class="flex items-center gap-4">
            <button id="deleteMultiple"
              class="px-4 py-1.5 mb-4 flex items-center justify-center bg-white hover:bg-[#E7C9EE] text-accent-300 font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-accent-300 border-2 disabled:opacity-50 disabled:cursor-not-allowed"
              disabled>
              <img src="{{asset('/imagenes/icons/supertrash.svg')}}" alt="Delete Icon" class="w-6 h-6 mr-2">
              <span class="text-center text-xs lg:text-sm">Borrar</span>
            </button>

            <a href="{{ route('login') }}"
              class="px-4 py-1.5 mb-4 flex items-center justify-center bg-white hover:bg-[#E7C9EE] text-accent-300 font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-accent-300 border-2">
              <img src="{{asset('/imagenes/icons/plus.svg')}}" alt="Add Icon" class="w-4 h-4 mr-2">
              <span class="text-center text-xs lg:text-sm">Añadir registro</span>
            </a>
            <a href="{{ route('register') }}"
              class="px-4 py-1.5 mb-4 flex items-center justify-center bg-accent-300 hover:bg-primary-300 font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-accent-300 hover:border-primary-300 border-2">
              <img src="{{asset('/imagenes/icons/upload.svg')}}" alt="Upload Icon" class="w-3.5 h-3.5 mr-2">
              <span class="text-center text-xs text-white lg:text-sm">Cargar Archivo</span>
            </a>
          </div>

        </div>

        @if(is_array($datosGrupos) && count($datosGrupos) > 0)
        <!-- Resto del contenido de la tabla -->
        <div class="overflow-auto ">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

              <th scope="col whitespace-nowrap" class="p-4">
                <div class="flex items-center relative">

                  <input id="checkbox-all-search" type="checkbox"
                    wire:model.live="selectAll"
                    class="peer appearance-none w-5 h-5 border border-accent-300 rounded-sm hover:bg-accent-100 checked:bg-accent-300 checked:border-accent-300 focus:outline-none focus:shadow-md focus:shadow-accent-100" />

                  <!-- Aspa visible solo si está checked -->
                  <span
                    class="pointer-events-none absolute left-[0.5px] top-0 w-5 h-5 flex items-center justify-center text-white text-sm font-bold hidden peer-checked:flex">
                    <!-- SVG del aspa blanca -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M5 13l4 4L19 7" />
                    </svg>
                  </span>

                  <label for="checkbox-all-search" class="sr-only">Seleccionar todos los elementos</label>
                </div>

              </th>
              <th>
                <div class="flex items-center">
                  Id
                  <div class="flex flex-col ml-3">
                    <img src="{{ asset('icons/triangle.svg') }}" wire:click="order('id')"
                      class="w-3 h-3 cursor-pointer {{ $sort === 'id' && $direction === 'asc' ? 'opacity-100' : 'opacity-40' }}"
                      alt="Ascendente">
                    <img src="{{ asset('icons/triangle-inverted.svg') }}" wire:click="order('id')"
                      class="w-3 h-3 cursor-pointer {{ $sort === 'id' && $direction === 'desc' ? 'opacity-100' : 'opacity-40' }}"
                      alt="Descendente">
                  </div>
                </div>
              </th>
              <th class="pl-6 whitespace-nowrap">
                <div class="flex items-center">
                  Nombre
                  <div class="flex flex-col ml-3">
                    <img src="{{ asset('icons/triangle.svg')}}" wire:click="order('nombre')"
                      class="w-3 h-3 cursor-pointer {{ $sort === 'nombre' && $direction === 'asc' ? 'opacity-100' : 'opacity-40' }}"
                      alt="Ascendente">
                    <img src="{{ asset('icons/triangle-inverted.svg') }}" wire:click="order('nombre')"
                      class="w-3 h-3 cursor-pointer {{ $sort === 'nombre' && $direction === 'desc' ? 'opacity-100' : 'opacity-40' }}"
                      alt="Descendente">
                  </div>
                </div>
              </th>
              <th class="pl-6 whitespace-nowrap">
                <div class="flex items-center">
                  Tipo
                  <div class="flex flex-col ml-3">
                    <img src="{{ asset('icons/triangle.svg') }}" wire:click="order('tipo')"
                      class="w-3 h-3 cursor-pointer {{ $sort === 'tipo' && $direction === 'asc' ? 'opacity-100' : 'opacity-40' }}"
                      alt="Ascendente">
                    <img src="{{ asset('icons/triangle-inverted.svg') }}" wire:click="order('tipo')"
                      class="w-3 h-3 cursor-pointer {{ $sort === 'tipo' && $direction === 'desc' ? 'opacity-100' : 'opacity-40' }}"
                      alt="Descendente">
                  </div>
                </div>
              </th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap">Descripción</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap">Fecha de inicio</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap">Fecha de término</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap ">Creador</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap ">Generador</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap ">Firmante 1</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap ">Firmante 2</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap ">Firmante 3</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap ">Firmante 4</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap ">Plantilla</th>
              <th scope="col" class="px-6 py-3 whitespace-nowrap text-center">Acciones</th>

            </thead>

            <tbody>
              @foreach($datosGrupos as $dato)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <td scope="col whitespace-nowrap" class="p-4">
                  <div class="flex items-center relative">
                    <!-- Checkbox oculto visualmente, pero funcional -->
                    <input id="checkbox-table-search-{{ $dato['id'] }}" type="checkbox"
                      wire:model.live="selectedGrupos"
                      value="{{ $dato['id'] }}"
                      class="peer appearance-none w-5 h-5 border border-accent-300 rounded-sm hover:bg-accent-100 checked:bg-accent-300 checked:border-accent-300 focus:outline-none focus:shadow-md focus:shadow-accent-100" />

                    <!-- Aspa visible solo si está checked -->
                    <span
                      class="pointer-events-none absolute left-[0.5px] top-0 w-5 h-5 flex items-center justify-center text-white text-sm font-bold hidden peer-checked:flex">
                      <!-- SVG del aspa blanca -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 13l4 4L19 7" />
                      </svg>
                    </span>

                    <label for="checkbox-table-search-{{ $dato['id'] }}" class="sr-only">Seleccionar registro</label>
                  </div>
                </td>

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                  {{ $dato['id'] }}
                </th>
                <td class="px-6 py-4 whitespace-nowrap">
                  @if($editando === $dato['id'])
                  <input type="text"
                    wire:model="grupoEditado.nombre"
                    class="w-full border-gray-300 rounded-md shadow-sm">
                  @else
                  {{ $dato['nombre'] }}
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  @if($editando === $dato['id'])
                  <input type="text"
                    wire:model="grupoEditado.tipo"
                    class="w-full border-gray-300 rounded-md shadow-sm">
                  @else
                  {{ $dato['tipo'] }}
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  @if($editando === $dato['id'])
                  <input type="text"
                    wire:model="grupoEditado.descripcion"
                    class="w-full border-gray-300 rounded-md shadow-sm">
                  @else
                  {{ $dato['descripcion'] }}
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                @if($editando === $dato['id'])
                  <input type="text"
                    wire:model="grupoEditado.fechainicio"
                    class="w-full border-gray-300 rounded-md shadow-sm">
                  @else
                  {{ $dato['fechainicio'] }}
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                @if($editando === $dato['id'])
                  <input type="text"
                    wire:model="grupoEditado.fechafin"
                    class="w-full border-gray-300 rounded-md shadow-sm">
                  @else
                  {{ $dato['fechafin'] }}
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $dato['creadorgrupo'] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $dato['generadorcertificado'] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap"> 
                  {{ $dato['firmante1'] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $dato['firmante2'] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $dato['firmante3'] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $dato['firmante4'] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex items-center justify-center">
                  <a href="{{ $dato['plantilla'] }}" target="_blank" rel="noreferrer"
                    class="p-2 bg-gray-500 rounded-lg hover:scale-110 transition-transform w-10 h-10 flex items-center justify-center">
                    <img src="{{asset('imagenes/icons/eye.svg')}}" alt="view-icon" class="w-5 h-5">
                  </a>

                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center w-32">
                  <div class="flex items-center justify-center space-x-3">
                    @if($editando === $dato['id'])
                    <button wire:click="guardarGrupo"
                      class="p-2 cursor-pointer bg-green-500 rounded-lg hover:scale-110 transition-transform w-10 h-10 flex items-center justify-center">
                      <img src="{{asset('/imagenes/icons/save.svg')}}" alt="Guardar" class="w-5 h-5">
                    </button>
                    <button disabled
                      class="p-2 cursor-pointer bg-red-500 opacity-50 disabled:cursor-not-allowed rounded-lg w-10 h-10 flex items-center justify-center">
                      <img src="{{asset('/imagenes/icons/borrar.svg')}}" alt="Eliminar" class="w-5 h-5">
                    </button>
                    @else
                    <button wire:click="editarGrupo({{ $dato['id'] }})"
                      class="p-2 cursor-pointer bg-blue-500 rounded-lg hover:scale-110 transition-transform w-10 h-10 flex items-center justify-center">
                      <img src="{{asset('/imagenes/icons/editar.svg')}}" alt="Editar" class="w-5 h-5">
                    </button>
                    <button wire:click="confirmarEliminacion({{ $dato['id'] }})"
                      class="p-2 cursor-pointer bg-red-500 rounded-lg hover:scale-110 transition-transform w-10 h-10 flex items-center justify-center">
                      <img src="{{asset('/imagenes/icons/borrar.svg')}}" alt="Eliminar" class="w-5 h-5">
                    </button>
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>

        @else
        <div class="rounded-lg text-lg ml-4 text-gray-700 bg-[#F8D7DA] dark:bg-gray-700 dark:text-gray-400">
          <h1 class="px-3 py-3 text-[#991C24] dark:text-gray-300">
            No existe ningún registro.
          </h1>
        </div>
        @endif

      </div>
    </div>
  </div>
</div>