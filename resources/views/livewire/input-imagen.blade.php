<div class="bg-white rounded-lg p-6 shadow-sm w-full max-w-2xl mx-auto">
    <h2 class="text-center text-lg font-semibold text-primary-300 mb-4">
        @if ($tipo == 'plantilla')
            Subir plantilla
        @else
            Subir firma
        @endif
    </h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-6">
        <div
            x-data="{ isHovering: false, hasImage: false }"
            x-on:dragover.prevent="isHovering = true"
            x-on:dragleave.prevent="isHovering = false"
            x-on:drop.prevent="isHovering = false"
            x-init="$watch('$wire.imageUrl', value => { hasImage = value !== null })"
            class="border-2 border-dashed rounded-lg p-8 text-center cursor-pointer transition-all"
            :class="{
                'border-blue-400 bg-primary-50': isHovering,
                'border-gray-300 bg-primary-25': !isHovering && !hasImage,
                'border-green-400 bg-green-50': !isHovering && hasImage
            }"
            wire:drop="$refs.fileInput.files = $event.dataTransfer.files; $refs.fileInput.dispatchEvent(new Event('change'));"
            @click="$refs.fileInput.click()"
        >
            @if($imageUrl)
                <div class="mb-4">
                    <img src="{{ $imageUrl }}" class="max-h-64 mx-auto rounded" alt="Vista previa">
                </div>
            @else
                <div class="flex flex-col items-center justify-center h-40 gap-4">
                    <svg width="68" height="63" viewBox="0 0 68 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M66 34.9593V19.3918C66 14.8043 64.1776 10.4046 60.9337 7.16074C57.6899 3.91687 53.2902 2.09448 48.7027 2.09448H19.2973C14.7098 2.09448 10.3101 3.91687 7.06626 7.16074C3.82239 10.4046 2 14.8043 2 19.3918V43.608C2 45.8795 2.44741 48.1288 3.31668 50.2274C4.18595 52.326 5.46006 54.2328 7.06626 55.839C10.3101 59.0829 14.7098 60.9053 19.2973 60.9053H40.9535" stroke="#5C5C5C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.89948 48.7972L12.3784 37.7269C13.6233 36.4906 15.257 35.7223 17.0033 35.5521C18.7495 35.3818 20.5009 35.8202 21.9611 36.7929C23.4213 37.7656 25.1727 38.2039 26.9189 38.0337C28.6651 37.8635 30.2989 37.0952 31.5438 35.8588L39.6043 27.7983C41.9204 25.4743 44.9869 24.049 48.2566 23.7765C51.5262 23.504 54.7864 24.4022 57.4552 26.3107L66 32.9183M20.1968 25.1691C20.9509 25.1646 21.6968 25.0115 22.3918 24.7187C23.0868 24.4259 23.7173 23.9991 24.2473 23.4626C24.7774 22.9262 25.1966 22.2906 25.481 21.5921C25.7654 20.8936 25.9094 20.1459 25.9049 19.3918C25.9003 18.6377 25.7473 17.8918 25.4545 17.1968C25.1617 16.5018 24.7349 15.8713 24.1984 15.3412C23.6619 14.8112 23.0263 14.392 22.3279 14.1076C21.6294 13.8232 20.8817 13.6792 20.1276 13.6837C18.6045 13.6929 17.1475 14.3067 16.077 15.3902C15.0065 16.4736 14.4103 17.9379 14.4195 19.461C14.4287 20.9841 15.0425 22.4411 16.1259 23.5116C17.2094 24.582 18.6737 25.1783 20.1968 25.1691Z" stroke="#5C5C5C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M57.2026 41.8784V59.1757" stroke="#5C5C5C" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"/>
                        <path d="M65.1352 49.1603L58.3305 42.3556C58.1826 42.2071 58.0069 42.0892 57.8133 42.0088C57.6198 41.9284 57.4123 41.887 57.2027 41.887C56.9931 41.887 56.7856 41.9284 56.592 42.0088C56.3985 42.0892 56.2228 42.2071 56.0749 42.3556L49.2701 49.1603" stroke="#5C5C5C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    <p class="mt-2 text-sm text-neutral-800 font-semibold">Arrastra y suelta una imagen o <span class="text-primary-300"> selecciona</span></p>
                    <p class="text-xs text-neutral-800 mt-1 font-extralight">La imagen debe estar en formato JPEG, PJG O PNG y tener menos de 10 MB.</p>
                    <p class="text-xs text-neutral-800 mt-1 font-extralight">Procura que la firma esté sobre fondo blanco</p>
                </div>
            @endif

            <input
                type="file"
                class="hidden"
                wire:model="image"
                accept="image/jpeg,image/png"
                x-ref="fileInput"
            >
        </div>
    </div>

    <div class="mb-6">
        @if ($tipo == 'plantilla')
            <input
                type="text"
                wire:model="name"
                placeholder="Nombre"
                class="w-full px-4 py-3 bg-primary-50 rounded-lg border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition-colors"
            >
        @else
            <select name="" id=""
                    class="w-full px-5 py-3 text-neutral-800 bg-primary-50 rounded-lg border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition-colors"
            >
                <option value="default"  >Seleccione firmante</option>
                <option value="1">1</option>
                <option value="2">2</option>

            </select>
        @endif
    </div>

    <div class="flex gap-4 justify-center">
        <x-button-secondary
            wire:click="save"
            class=""
        >
            Guardar
        </x-button-secondary>
        <x-button-primary
            wire:click="clear"
            class=""
        >
            Limpiar
        </x-button-primary>
    </div>
