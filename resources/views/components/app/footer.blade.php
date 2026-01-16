<!-- FOTTER -->
<div class="w-full md:w-full -mt-10 md:-mt-20 relative" style="z-index: 1; min-height: 147px;">
    <img src="/icons/footer.svg" alt="Footer" class="w-full h-auto" style="display: block; position: relative; z-index: 1;">
    <div class="absolute inset-0 flex items-end pointer-events-none" style="z-index: 1; padding-bottom: 1rem;">
        <div class="text-xs md:text-base text-white ml-5 md:ml-20 mb-2 md:mb-4" style="font-family: Arial, sans-serif;">
            @ {{ date('Y') }} Todos los derechos reservados
        </div>
    </div>
</div>
<!-- FIN FOOTER -->

{{ $slot }}
