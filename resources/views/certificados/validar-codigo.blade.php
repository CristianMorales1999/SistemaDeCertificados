<x-layouts.main :title="__('Validar Código')" class="bg-primary-50 ">
    @livewire('validar-codigo')

    {{-- Ejemplo del input imagen --}}
    <div class="w-full bg-accent py-5">
        @livewire('input-imagen', ['tipo' => 'firma'])
    </div>
    <div class="w-full bg-amber-200 py-5">
        @livewire('input-imagen', ['tipo' => 'plantilla'])
    </div>
</x-layouts.main>
