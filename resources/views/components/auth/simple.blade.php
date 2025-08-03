<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('components.app.head')
    </head>
    <body class="min-h-screen bg-[#EBF1FD] antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <!-- Corregido: eliminado w-1/4 y ajustado responsive con w-full -->
            <div class="flex w-full max-w-sm flex-col gap-2 shadow-xl bg-white p-7 border rounded-xl">
                <!-- Agregado: my-3 para dar espacio arriba y abajo al logo -->
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium my-3" wire:navigate>
                    <span class="flex h-9 w-9 items-center justify-center rounded-md py-5">
                        <!--LOGO-->
                        <x-app.logo-icon class="size-9 fill-current text-dark dark:text-white" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <!-- Agregado: mt-4 para crear espacio entre el logo y el contenido del formulario -->
                <div class="flex flex-col gap-6 mt-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
