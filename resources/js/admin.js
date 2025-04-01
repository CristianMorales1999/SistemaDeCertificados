document.addEventListener('DOMContentLoaded', function() {
    // Mostrar dashboard por defecto y ocultar las demás secciones
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        section.classList.add('hidden');
    });
    document.getElementById('dashboard').classList.remove('hidden');

    // Ocultar todos los cuadritos indicadores excepto el de dashboard al inicio
    const indicadores = document.querySelectorAll('.flex.items-center > div:first-child');
    indicadores.forEach(indicador => {
        indicador.classList.add('bg-white');
    });
    // Mostrar solo el indicador de dashboard
    const dashboardIndicador = document.querySelector('[data-section="dashboard"]').parentElement.querySelector('div:first-child');
    dashboardIndicador.classList.remove('bg-white');
    dashboardIndicador.classList.add('bg-[#9636AD]');

    // Obtener todos los botones de navegación
    const navButtons = document.querySelectorAll('.nav-button, .active-nav-button');

    // Agregar event listeners a todos los botones
    navButtons.forEach(button => {
        button.addEventListener('click', function() {
            const sectionId = this.getAttribute('data-section');
            showSection(sectionId);
        });
    });

    function showSection(sectionId) {
        // Ocultar todas las secciones
        sections.forEach(section => {
            section.classList.add('hidden');
        });

        // Mostrar la sección seleccionada
        const selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.classList.remove('hidden');
        }

        // Ocultar todos los cuadritos indicadores
        indicadores.forEach(indicador => {
            indicador.classList.remove('bg-[#9636AD]', 'bg-[#CF93DD]');
            indicador.classList.add('bg-white');
        });

        // Mostrar el cuadrito indicador de la sección seleccionada
        const activeIndicador = document.querySelector(`[data-section="${sectionId}"]`).parentElement.querySelector('div:first-child');
        activeIndicador.classList.remove('bg-white');
        activeIndicador.classList.add('bg-[#9636AD]');

        // Resetear estilos de todos los botones
        navButtons.forEach(button => {
            button.classList.remove('active-nav-button');
            button.classList.remove('bg-[#9636AD]');
            button.classList.remove('hover:bg-[#3553A2]');
            button.classList.add('bg-white');
            button.classList.add('hover:bg-[#CF93DD]');
            const text = button.querySelector('h1');
            if (text) {
                text.classList.remove('text-white');
                text.classList.add('text-black');
            }
        });

        // Aplicar estilos al botón seleccionado
        const activeButton = document.querySelector(`[data-section="${sectionId}"]`);
        if (activeButton) {
            activeButton.classList.add('active-nav-button');
            activeButton.classList.remove('bg-white');
            activeButton.classList.remove('hover:bg-[#CF93DD]');
            activeButton.classList.add('bg-[#9636AD]');
            activeButton.classList.add('hover:bg-[#3553A2]');
            const text = activeButton.querySelector('h1');
            if (text) {
                text.classList.remove('text-black');
                text.classList.add('text-white');
            }
        }
    }

    // Hacer la función showSection disponible globalmente
    window.showSection = showSection;

    // Inicializar con dashboard seleccionado
    showSection('dashboard');
});