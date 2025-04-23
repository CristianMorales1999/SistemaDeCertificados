<div>

    <div class="flex items-center justify-between pb-4 px-10">
        <h1 class="text-xs md:text-sm lg:text-lg xl:text-2xl">Grupos</h1>
    </div>

  <div class="mx-10">
    <div class="bg-white p-4 rounded-lg shadow-lg">
      <div class="bg-[#F7FAFF] p-4 rounded-lg">

        <!-- Filtro de tabla -->
        <div class="flex items-center gap-4">
          <div class="bg-white mb-4 p-2 rounded-lg shadow-lg">
            <img src="/imagenes/icons/Shearch Icon.svg" alt="Search Icon" class="w-5 h-5">
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
              class="px-4 py-1.5 mb-4 flex items-center justify-center bg-white hover:bg-[#E7C9EE] text-[#9636AD] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[#9636AD] border-2 disabled:opacity-50 disabled:cursor-not-allowed"
              disabled>
              <img src="/imagenes/icons/supertrash.svg" alt="Search Icon" class="w-6 h-6 mr-2">
              <span class="text-center text-xs lg:text-sm">Borrar</span>
            </button>

            <a href="{{ route('login') }}"
              class="px-4 py-1.5 mb-4 flex items-center justify-center bg-white hover:bg-[#E7C9EE] text-[#9636AD] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[#9636AD] border-2">
              <img src="/imagenes/icons/plus.svg" alt="Search Icon" class="w-4 h-4 mr-2">
              <span class="text-center text-xs lg:text-sm">Añadir registro</span>
            </a>
            <a href="{{ route('register') }}"
              class="px-4 py-1.5 mb-4 flex items-center justify-center bg-[#9636AD] hover:bg-[#3454A1] font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-[#9636AD] hover:border-[#3454A1] border-2">
              <img src="/imagenes/icons/upload.svg" alt="Search Icon" class="w-3.5 h-3.5 mr-2">
              <span class="text-center text-xs text-white lg:text-sm">Cargar Archivo</span>
            </a>
          </div>

        </div>

        @if(is_array($datosGrupos) && count($datosGrupos) > 0)
        <!-- Resto del contenido de la tabla -->
        <div class="overflow-auto ">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col whitespace-nowrap" class="p-4">
                  <div class="flex items-center">
                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-[#F7FAFF] border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                  </div>
                </th>
                <th>
                  <div class="flex items-center">
                    ID
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
                    NOMBRE
                    <div class="flex flex-col ml-3">
                      <img src="{{ asset('icons/triangle.svg')}}" wire:click="order('nombre')"
                        class="w-3 h-3 cursor-pointer }}"
                        alt="Ascendente">
                      <img src="{{ asset('icons/triangle-inverted.svg') }}" wire:click="order('nombre')"
                        class="w-3 h-3 cursor-pointer "
                        alt="Descendente">
                    </div>
                  </div>
                </th>
                <th class="pl-6 whitespace-nowrap">
                  <div class="flex items-center">
                    TIPO
                    <div class="flex flex-col ml-3">
                      <img src="{{ asset('icons/triangle.svg') }}" wire:click="order('tipo')"
                        class="w-3 h-3 cursor-pointer "
                        alt="Ascendente">
                      <img src="{{ asset('icons/triangle-inverted.svg') }}" wire:click="order('tipo')"
                        class="w-3 h-3 cursor-pointer "
                        alt="Descendente">
                    </div>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3  whitespace-nowrap">DESCRIPCIÓN</th>
                <th scope="col" class="px-6 py-3  whitespace-nowrap">FECHA DE INICIO</th>
                <th scope="col" class="px-6 py-3  whitespace-nowrap">FECHA DE TÉRMINO</th>
                <th scope="col" class="px-6 py-3  whitespace-nowrap ">CREADOR</th>
                <th scope="col" class="px-6 py-3  whitespace-nowrap ">GENERADOR</th>
                <th scope="col" class="px-6 py-3  whitespace-nowrap ">FIRMANTE 1</th>
                <th scope="col" class="px-6 py-3  whitespace-nowrap ">FIRMANTE 2</th>
                <th scope="col" class="px-6 py-3  whitespace-nowrap ">FIRMANTE 3</th>
                <th scope="col" class="px-6 py-3  whitespace-nowrap ">FIRMANTE 4</th>
                <th scope="col" class="px-6 py-3  whitespace-nowrap text-center">ACCIONES</th>
              </tr>
            </thead>

            <tbody>
              @foreach($datosGrupos as $dato)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <input id="checkbox-table-search-{{ $dato['id'] }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-table-search-{{ $dato['id'] }}" class="sr-only">checkbox</label>
                  </div>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                  {{ $dato['id'] }}
                </th>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $dato['nombre'] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $dato['tipo'] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $dato['descripcion'] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $dato['fechainicio'] }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ $dato['fechafin'] }}
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
                <td class="px-6 py-4 whitespace-nowrap text-center w-32">
                  <div class="flex items-center justify-center space-x-3">
                    <button class="p-2 bg-blue-500 rounded-lg hover:scale-110 transition-transform w-10 h-10 flex items-center justify-center">
                      <img src="/imagenes/icons/editar.svg" alt="Editar" class="w-5 h-5">
                    </button>
                    <button class="p-2 bg-red-500 rounded-lg hover:scale-110 transition-transform w-10 h-10 flex items-center justify-center" data-certificado-id="{{ $dato['id'] }}">
                      <img src="/imagenes/icons/borrar.svg" alt="Eliminar" class="w-5 h-5">
                    </button>
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
            No existe ningún registro
          </h1>
        </div>
        @endif

      </div>
    </div>
  </div>
</div>