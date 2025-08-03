<div>
  <x-ui.section-title title="Dashboard" />

  <!-- INFORMACION PARA DASHBOARD-->
  <div class="grid grid-cols-4 gap-6 pl-10 pr-20 ml-1 mr-3">
    <!-- Botón Usuarios -->
    <div class="bg-white px-4 py-4 rounded-md shadow-md bg-transparent text-[#000000] flex items-center flex-1">
      <div>
        <h1 class="ml-3 mb-3 text-xs md:text-sm lg:text-sm text-[#636466]">Usuarios</h1>
        <h1 class="ml-3 font-medium text-xs md:text-sm lg:text-lg">40,689</h1>
      </div>
      <div class="bg-[#E5E4FF] p-4 py-4 rounded-lg ml-auto">
        <img src="{{asset('/imagenes/icons/1.svg')}}" alt="Usuarios Icon" class="w-10 h-10">
      </div>
    </div>

    <!-- Botón Grupos -->
    <div class="bg-white px-4 py-2 rounded-md shadow-md bg-transparent text-black flex items-center flex-1">
      <div>
        <h1 class="ml-3 mb-3 text-xs md:text-sm lg:text-sm text-[#636466]">Grupos</h1>
        <h1 class="ml-3 font-medium text-xs md:text-sm lg:text-lg">10,293</h1>
      </div>
      <div class="bg-[#FFF3D6] p-4 py-4 rounded-lg ml-auto">
        <img src="{{asset('/imagenes/icons/2.svg')}}" alt="Grupos Icon" class="w-10 h-10">
      </div>
    </div>

    <!-- Botón Certificados -->
    <div class="bg-white px-4 py-2 rounded-md shadow-md bg-transparent text-black flex items-center flex-1">
      <div>
        <h1 class="ml-3 mb-3 text-xs md:text-sm lg:text-sm text-[#636466]">Certificados</h1>
        <h1 class="ml-3 font-medium text-xs md:text-sm lg:text-lg">89,000</h1>
      </div>
      <div class="bg-[#D9F7E8] p-4 py-4 rounded-lg ml-auto">
        <img src="{{asset('/imagenes/icons/3.svg')}}" alt="Certificados Icon" class="w-10 h-10">
      </div>
    </div>

    <!-- Botón Pendientes -->
    <div class="bg-white px-4 py-2 rounded-md shadow-md bg-transparent text-black flex items-center flex-1">
      <div>
        <h1 class="ml-3 mb-3 text-xs md:text-sm lg:text-sm text-[#636466]">Pendientes</h1>
        <h1 class="ml-3 font-medium text-xs md:text-sm lg:text-lg">2,040</h1>
      </div>
      <div class="bg-[#FFDED1] p-4 py-4 rounded-lg ml-auto">
        <img src="{{asset('/imagenes/icons/4.svg')}}" alt="Pendientes Icon" class="w-10 h-10">
      </div>
    </div>
  </div>

  <!-- GRAFICO DE LINEAS-->
  <div class="px-10 pr-20 mr-3 ml-1 mt-5">
    <div class="w-full bg-white rounded-lg shadow-lg dark:bg-gray-800 p-5">
      <div class="flex justify-between pb-0">
        <div>
          <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-2">Certificados</h5>
        </div>
      </div>
      <!-- Agregar el div para el gráfico con una altura específica -->
      <div id="labels-chart" style="height: 300px;"></div>
    </div>
  </div>




  <!-- LIBRERIA APEXCHARTS ANTES DEL SCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <!-- SCRIPT PARA EL GRAFICO DE LINEAS-->
  <script>
    function initializeChart() {
      const options = {
        series: [{
          name: "Ventas",
          data: [3, 5, 2, 3, 1, 2, 4, 1, 3, 1, 2]
        }],
        chart: {
          height: 300,
          type: "line"
        },
        xaxis: {
          categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb', '08 Feb', '09 Feb', '10 Feb', '11 Feb']
        }
      };

      const chartElement = document.getElementById("labels-chart");
      if (chartElement && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(chartElement, options);
        chart.render();
      }
    }

    // Esperar a que tanto el DOM como ApexCharts estén cargados
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', function() {
        if (typeof ApexCharts !== 'undefined') {
          initializeChart();
        } else {
          // Si ApexCharts aún no está cargado, esperar a que se cargue
          const checkApexCharts = setInterval(function() {
            if (typeof ApexCharts !== 'undefined') {
              initializeChart();
              clearInterval(checkApexCharts);
            }
          }, 100);
        }
      });
    } else {
      // Si el DOM ya está cargado
      if (typeof ApexCharts !== 'undefined') {
        initializeChart();
      } else {
        const checkApexCharts = setInterval(function() {
          if (typeof ApexCharts !== 'undefined') {
            initializeChart();
            clearInterval(checkApexCharts);
          }
        }, 100);
      }
    }
  </script>
  <!-- FIN GRAFICO DE LINEAS-->
</div>
