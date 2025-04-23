<div class="bg-primary-50 min-h-screen justify-center items-start flex">
    <div class="">
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
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-black opacity-50" wire:click="cerrarModal"></div>
        <div class="bg-white p-8 rounded-lg z-10 max-w-md w-full">
            <div class="flex justify-between items-center mb-4 relative">
                <h2 class="text-xl text-primary-300 font-bold text-center w-full">Detalles del Certificado</h2>
            </div>

            @if($certificadoData)
            <div>
                <img src="images/certificado-ejemplo.png" alt="Certificado" class="w-full">
                <div class="space-y-4">
                    <div>
                        <p class="mb-2">Nombres</p>
                        <p class="font-medium p-5 bg-neutral-200 text-neutral-800 rounded-xl">{{ $certificadoData['nombres'] }}</p>
                    </div>
                    <div>
                        <p class="mb-2">Apellidos</p>
                        <p class="font-medium p-5 bg-neutral-200 text-neutral-800 rounded-xl">{{ $certificadoData['apellidos'] }}</p>
                    </div>
                    <div>
                        <p class="mb-2">Certificación por</p>
                        <p class="font-medium p-5 bg-neutral-200 text-neutral-800 rounded-xl">{{ $certificadoData['certificacionPor'] }}</p>
                    </div>
                    <div>
                        <p class="mb-2">Fecha de emisión</p>
                        <p class="font-medium p-5 bg-neutral-200 text-neutral-800 rounded-xl">{{ $certificadoData['fecha'] }}</p>
                    </div>

                    <x-button-primary wire:click="cerrarModal" class="mt-4 w-full">
                        Cerrar
                    </x-button-primary>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif
</div>
