<x-app.header/>

@yield('content')
    <div class="fixed bottom-8 right-8 z-50 flex items-center justify-center text-white w-fit">
        <x-certificates.validar-button />
    </div>

<x-app.footer/>
