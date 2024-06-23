<div
  class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
  <div class="flex items-center justify-between mb-4">
    <div class="flex-shrink-0">
      <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">Analisis Pengunjung</h3>
    </div>
  </div>
  <div id="visitor-analytics"></div>
  <!-- Card Footer -->
  <div class="flex items-center justify-between pt-3 mt-4 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
    <div>
      <button id="dropdownButton"
        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
        type="button" data-dropdown-toggle="visitor-analytics-dropdown">7 hari terakhir
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <!-- Dropdown menu -->
      <div
        class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
        id="visitor-analytics-dropdown">
        <div class="px-4 py-3" role="none">
          <p id="dateRangeText" class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none"></p>
        </div>
        <ul class="py-1" role="none">
          <li>
            <a href="#"
              class="dropdown-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
              role="menuitem" data-range="7">7 hari terakhir</a>
          </li>
          <li>
            <a href="#"
              class="dropdown-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
              role="menuitem" data-range="30">30 hari terakhir</a>
          </li>
          <li>
            <a href="#"
              class="dropdown-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
              role="menuitem" data-range="all">Semua</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="flex-shrink-0">
      <a href="{{ route('pengunjung.index') }}"
        class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
        LIHAT PENGUNJUNG
        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const chartElement = document.getElementById('visitor-analytics');
    let chart;

    let memberData = {
      'last7day': {{ $totalMember['last7day'] }},
      'last30day': {{ $totalMember['last30day'] }},
      'all': {{ $totalMember['all'] }},
    }
    let guestData = {
      'last7day': {{ $totalGuest['last7day'] }},
      'last30day': {{ $totalGuest['last30day'] }},
      'all': {{ $totalGuest['all'] }},
    }

    let totalMember = memberData['last7day'];
    let totalGuest = guestData['last7day'];

    const dropdownButton = document.getElementById('dropdownButton');
    const dateRangeText = document.getElementById('dateRangeText');
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    function setDefaultDateRange() {
      const startDate = moment().subtract(7, 'days').format('DD MMM YYYY');
      const endDate = moment().format('DD MMM YYYY');
      dropdownButton.innerHTML =
        '7 hari terakhir <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
      dateRangeText.textContent = `${startDate} - ${endDate}`;
      totalMember = memberData['last7day'];
      totalGuest = guestData['last7day'];
    }

    setDefaultDateRange();

    dropdownItems.forEach(item => {
      item.addEventListener('click', function(event) {
        event.preventDefault();
        const range = item.getAttribute('data-range');
        let startDate, endDate;

        if (range === '7') {
          startDate = moment().subtract(7, 'days').format('DD MMM YYYY');
          endDate = moment().format('DD MMM YYYY');
          dropdownButton.innerHTML =
            '7 hari terakhir <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
          totalMember = memberData['last7day'];
          totalGuest = guestData['last7day'];
        } else if (range === '30') {
          startDate = moment().subtract(30, 'days').format('DD MMM YYYY');
          endDate = moment().format('DD MMM YYYY');
          dropdownButton.innerHTML =
            '30 hari terakhir <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
          totalMember = memberData['last30day'];
          totalGuest = guestData['last30day'];
        } else if (range === 'all') {
          startDate = 'Semua';
          endDate = '';
          dropdownButton.innerHTML =
            'Semua <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
          totalMember = memberData['all'];
          totalGuest = guestData['all'];
        }

        dateRangeText.textContent = endDate ? `${startDate} - ${endDate}` : startDate;

        updateChart();
      });
    });

    function updateChart() {
      const options = getChartOptions();
      if (chart) {
        chart.destroy();
      }
      chart = new ApexCharts(chartElement, options);
      chart.render();
    }

    dropdownItems.forEach(item => {
      item.addEventListener('click', function(event) {
        event.preventDefault();
        const range = item.getAttribute('data-range');
        refreshChart(range);
      });
    });

    let getChartOptions = () => {
      return {
        series: [totalMember, totalGuest],
        colors: ["#1C64F2", "#16BDCA"],
        chart: {
          height: 320,
          width: "100%",
          type: "donut",
        },
        stroke: {
          colors: ["transparent"],
          lineCap: "",
        },
        plotOptions: {
          pie: {
            donut: {
              labels: {
                show: true,
                name: {
                  show: true,
                  fontFamily: "Inter, sans-serif",
                  offsetY: 20,
                },
                total: {
                  showAlways: true,
                  show: true,
                  label: "Unique visitors",
                  fontFamily: "Inter, sans-serif",
                  formatter: function(w) {
                    const sum = w.globals.seriesTotals.reduce(
                      (a, b) => {
                        return a + b;
                      },
                      0
                    );
                    return sum;
                  },
                },
                value: {
                  show: true,
                  fontFamily: "Inter, sans-serif",
                  offsetY: -20,
                  formatter: function(value) {
                    return value;
                  },
                },
              },
              size: "80%",
            },
          },
        },
        grid: {
          padding: {
            top: -2,
          },
        },
        labels: ["Members", "Guests"],
        dataLabels: {
          enabled: false,
        },
        legend: {
          position: "bottom",
          fontFamily: "Inter, sans-serif",
        },
        yaxis: {
          labels: {
            formatter: function(value) {
              return value;
            },
          },
        },
        xaxis: {
          labels: {
            formatter: function(value) {
              return value;
            },
          },
          axisTicks: {
            show: false,
          },
          axisBorder: {
            show: false,
          },
        },
      };
    };

    if (chartElement && typeof ApexCharts !== "undefined") {
      chart = new ApexCharts(chartElement, getChartOptions());
      chart.render();
    }
  });
</script>
