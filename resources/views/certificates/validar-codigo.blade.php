@extends('layouts.app')

@section('title', __('Validar Código'))

@section('content')
    @livewire('validar-codigo')

    {{-- Ejemplo del input imagen --}}
    <div class="w-full bg-accent py-5">
        @livewire('input-imagen', ['tipo' => 'firma'])
    </div>
    <div class="w-full bg-amber-200 py-5">
        @livewire('input-imagen', ['tipo' => 'plantilla'])
    </div>
@endsection
