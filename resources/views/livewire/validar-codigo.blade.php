<div class="bg-primary-50 min-h-screen justify-center items-start flex">
    <div class="mt-32">
        <h1 class="my-10 text-2xl text-center font-semibold mx-auto">Validación de Certificados</h1>
        <div class="bg-white drop-shadow-sm rounded-md p-10 max-w-[400px] md:w-[400px] flex flex-col gap-6">
            <flux:input
                wire:model="codigo"
                :label="__('Código')"
                :label-class="'text-black'"
                type="text"
                required
                autofocus
                autocomplete="code"
                placeholder="1D03-3013-1VIW-3DSD"
                class="[&>input]:bg-primary-50 [&>input]:p-4"
            />
            <p class="text-center text-success text-sm">{{ $message }}</p>
            <x-button-primary
                wire:click="validar"
                title="Validar"
                class="rounded-xl w-fit mx-auto"
            >
                Validar
            </x-button-primary>
        </div>
    </div>

    <!-- Modal para mostrar los detalles del certificado -->
    @if($showModal)
    <div class="fixed inset-0 flex items-center justify-center z-50 p-2 sm:p-4 overflow-auto">
        <div class="fixed inset-0 bg-black opacity-50" wire:click="cerrarModal"></div>
        <div class="bg-white p-4 sm:p-6 rounded-lg z-10 w-full max-w-xs sm:max-w-md md:max-w-lg  max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-base sm:text-lg md:text-xl text-primary-300 font-bold text-center w-full">Detalles del Certificado</h2>
            </div>

            @if($certificadoData)
            <div class="space-y-4">
                <img src="images/certificado-ejemplo.png" alt="Certificado" class="w-full rounded-md max-h-48 object-contain sm:max-h-64 md:max-h-80">
                <div class="space-y-3">
                    <div>
                        <p class="mb-1 text-xs sm:text-sm md:text-base">Nombres</p>
                        <p class="font-medium p-3 sm:p-4 bg-neutral-200 text-neutral-800 rounded-lg text-xs sm:text-sm md:text-base">
                            {{ $certificadoData['nombres'] }}
                        </p>
                    </div>
                    <div>
                        <p class="mb-1 text-xs sm:text-sm md:text-base">Apellidos</p>
                        <p class="font-medium p-3 sm:p-4 bg-neutral-200 text-neutral-800 rounded-lg text-xs sm:text-sm md:text-base">
                            {{ $certificadoData['apellidos'] }}
                        </p>
                    </div>
                    <div>
                        <p class="mb-1 text-xs sm:text-sm md:text-base">Certificación por</p>
                        <p class="font-medium p-3 sm:p-4 bg-neutral-200 text-neutral-800 rounded-lg text-xs sm:text-sm md:text-base">
                            {{ $certificadoData['certificacionPor'] }}
                        </p>
                    </div>
                    <div>
                        <p class="mb-1 text-xs sm:text-sm md:text-base">Fecha de emisión</p>
                        <p class="font-medium p-3 sm:p-4 bg-neutral-200 text-neutral-800 rounded-lg text-xs sm:text-sm md:text-base">
                            {{ $certificadoData['fecha'] }}
                        </p>
                    </div>
                    <x-button-primary wire:click="cerrarModal" class="mt-3 w-full text-xs sm:text-sm md:text-base p-2 sm:p-3">
                        Cerrar
                    </x-button-primary>
                </div>
            </div>
            @endif
        </div>
    </div>

    @endif
</div>
