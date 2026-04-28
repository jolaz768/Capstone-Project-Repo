<div wire:poll.30s>
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
      <div class="bg-card border border-layer-line shadow-2xs rounded-xl overflow-hidden">
        <div class="p-5">
          <p class="text-xs uppercase tracking-widest text-muted-foreground">Total revenue</p>
          <h3 class="mt-4 text-3xl font-semibold text-foreground">₱{{ number_format($totalRevenue, 2) }}</h3>
          <p class="mt-2 text-sm text-muted-foreground-1">Completed revenue from approved orders.</p>
        </div>
        <div class="px-5 py-4 border-t border-layer-line bg-surface">
          <p class="text-xs text-muted-foreground-1">Completed orders</p>
          <p class="mt-1 text-lg font-semibold text-foreground">{{ number_format($completedOrders) }}</p>
        </div>
      </div>

      <div class="bg-card border border-layer-line shadow-2xs rounded-xl overflow-hidden">
        <div class="p-5">
          <p class="text-xs uppercase tracking-widest text-muted-foreground">Total orders</p>
          <h3 class="mt-4 text-3xl font-semibold text-foreground">{{ number_format($totalOrders) }}</h3>
          <p class="mt-2 text-sm text-muted-foreground-1">All bookings including pending and approved.</p>
        </div>
        <div class="px-5 py-4 border-t border-layer-line bg-surface">
          <p class="text-xs text-muted-foreground-1">Average order value</p>
          <p class="mt-1 text-lg font-semibold text-foreground">₱{{ number_format($averageOrderValue, 2) }}</p>
        </div>
      </div>

      <div class="bg-card border border-layer-line shadow-2xs rounded-xl overflow-hidden">
        <div class="p-5">
          <p class="text-xs uppercase tracking-widest text-muted-foreground">Unique visitors</p>
          <h3 class="mt-4 text-3xl font-semibold text-foreground">{{ number_format($uniqueVisitors) }}</h3>
          <p class="mt-2 text-sm text-muted-foreground-1">Unique visitors in the selected period.</p>
        </div>
        <div class="px-5 py-4 border-t border-layer-line bg-surface">
          <p class="text-xs text-muted-foreground-1">Visitor source</p>
          <p class="mt-1 text-lg font-semibold text-foreground">{{ $visitorsTableExists ? 'visitor logs' : 'Booking activity' }}</p>
        </div>
      </div>

      <div class="bg-card border border-layer-line shadow-2xs rounded-xl overflow-hidden">
        <div class="p-5">
          <p class="text-xs uppercase tracking-widest text-muted-foreground">Analytics refresh</p>
          <h3 class="mt-4 text-3xl font-semibold text-foreground">Live</h3>
          <p class="mt-2 text-sm text-muted-foreground-1">Dashboard refreshes every 30 seconds.</p>
        </div>
        <div class="px-5 py-4 border-t border-layer-line bg-surface">
          <p class="text-xs text-muted-foreground-1">Current period</p>
          <p class="mt-1 text-lg font-semibold text-foreground">{{ ucfirst($range) }}</p>
        </div>
      </div>
    </div>
  </div>
<!-- End Card Section -->
<!-- Card -->
<link rel="stylesheet" href="{{ asset('assets/vendor/apexcharts/dist/apexcharts.css') }}">
<style type="text/css">
  .apexcharts-tooltip.apexcharts-theme-light {
    background-color: transparent !important;
    border: none !important;
    box-shadow: none !important;
  }

  .apexcharts-xaxistooltip {
    background: var(--color-primary-600) !important;
    border-color: var(--color-primary-600) !important;
  }

  .apexcharts-xaxistooltip:after,
  .apexcharts-xaxistooltip:before {
    border-bottom-color: var(--color-primary-600) !important;
  }
</style>
<script src="{{ asset('assets/vendor/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('assets/vendor/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/preline/dist/helper-shared.js') }}"></script>
<script src="{{ asset('assets/vendor/preline/dist/helper-apexcharts.js') }}"></script>

<script>
  window.addEventListener("load", () => {
    const tabpanel = document.querySelector('#hs-single-area-chart').closest('[role="tabpanel"]');

    (function () {
      buildChart(
        "#hs-single-area-chart",
        (mode) => ({
          chart: {
            height: 300,
            type: "area",
            toolbar: {
              show: false,
            },
            zoom: {
              enabled: false,
            },
          },
          series: [
            {
              name: "Visitors",
              data: [180, 51, 60, 38, 88, 50, 40, 52, 88, 80, 60, 70],
            },
          ],
          legend: {
            show: false,
          },
          dataLabels: {
            enabled: false,
          },
          stroke: {
            curve: "straight",
            width: 2,
          },
          grid: {
            strokeDashArray: 2,
          },
          fill: {
            type: "gradient",
            gradient: {
              type: "vertical",
              shadeIntensity: 1,
              opacityFrom: 0.1,
              opacityTo: 0.8,
            },
          },
          xaxis: {
            type: "category",
            tickPlacement: "on",
            categories: [
              "25 January 2023",
              "26 January 2023",
              "27 January 2023",
              "28 January 2023",
              "29 January 2023",
              "30 January 2023",
              "31 January 2023",
              "1 February 2023",
              "2 February 2023",
              "3 February 2023",
              "4 February 2023",
              "5 February 2023",
            ],
            axisBorder: {
              show: false,
            },
            axisTicks: {
              show: false,
            },
            crosshairs: {
              stroke: {
                dashArray: 0,
              },
              dropShadow: {
                show: false,
              },
            },
            tooltip: {
              enabled: false,
            },
            labels: {
              style: {
                colors: varToColor('--chart-colors-xaxis-labels', tabpanel),
                fontSize: "13px",
                fontFamily: "Inter, ui-sans-serif",
                fontWeight: 400,
              },
              formatter: (title) => {
                let t = title;

                if (t) {
                  const newT = t.split(" ");
                  t = `${newT[0]} ${newT[1].slice(0, 3)}`;
                }

                return t;
              },
            },
          },
          yaxis: {
            labels: {
              align: "left",
              minWidth: 0,
              maxWidth: 140,
              style: {
                colors: varToColor('--chart-colors-yaxis-labels', tabpanel),
                fontSize: "13px",
                fontFamily: "Inter, ui-sans-serif",
                fontWeight: 400,
              },
              formatter: (value) => (value >= 1000 ? `${value / 1000}k` : value),
            },
          },
          tooltip: {
            x: {
              format: "MMMM yyyy",
            },
            y: {
              formatter: (value) =>
                `${value >= 1000 ? `${value / 1000}k` : value}`,
            },
            custom: function (props) {
              const { categories } = props.ctx.opts.xaxis;
              const { dataPointIndex } = props;
              const title = categories[dataPointIndex].split(" ");
              const newTitle = `${title[0]} ${title[1]}`;

              return buildTooltip(props, {
                title: newTitle,
                mode,
                valuePrefix: "",
                hasTextLabel: true,
                wrapperExtClasses: "min-w-28",
              });
            },
          },
          responsive: [
            {
              breakpoint: 568,
              options: {
                chart: {
                  height: 300,
                },
                labels: {
                  style: {
                    colors: varToColor('--chart-colors-labels', tabpanel),
                    fontSize: "11px",
                    fontFamily: "Inter, ui-sans-serif",
                    fontWeight: 400,
                  },
                  offsetX: -2,
                  formatter: (title) => title.slice(0, 3),
                },
                yaxis: {
                  labels: {
                    align: "left",
                    minWidth: 0,
                    maxWidth: 140,
                    style: {
                      colors: varToColor('--chart-colors-yaxis-labels', tabpanel),
                      fontSize: "11px",
                      fontFamily: "Inter, ui-sans-serif",
                      fontWeight: 400,
                    },
                    formatter: (value) =>
                      value >= 1000 ? `${value / 1000}k` : value,
                  },
                },
              },
            },
          ],
        }),
        () => ({
          colors: [varToColor('--chart-colors-primary-hex', tabpanel)],
          fill: {
            gradient: {
              stops: [0, 90, 100],
            },
          },
          grid: {
            borderColor: varToColor('--chart-colors-grid-border', tabpanel),
          },
        }),
        () => ({
          colors: [varToColor('--chart-colors-primary-hex-inverse', tabpanel)],
          fill: {
            gradient: {
              stops: [100, 90, 0],
            },
          },
          grid: {
            borderColor: varToColor('--chart-colors-grid-border-inverse', tabpanel),
          },
        })
      );
    })();
  });
</script>
<div class="p-4 md:p-5 min-h-102.5 flex flex-col bg-card border border-card-line shadow-2xs rounded-xl">
  <!-- Header -->
  <div class="flex flex-wrap justify-between items-center gap-2">
    <div>
      <h2 class="text-sm text-muted-foreground-1">
        Income
      </h2>
      <p class="text-xl sm:text-2xl font-medium text-foreground">
        $126,238.49
      </p>
    </div>

    <div>
      <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
        <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="m19 12-7 7-7-7"/></svg>
        25%
      </span>
    </div>
  </div>
  <!-- End Header -->

  <div id="hs-multiple-bar-charts"></div>
</div>
<!-- End Card -->




  <div class="max-w-[85rem] px-4 pb-10 sm:px-6 lg:px-8 mx-auto">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
      <div>
        <h2 class="text-xl font-semibold text-foreground">Admin analytics</h2>
        <p class="mt-1 text-sm text-muted-foreground-2">Revenue and visitor trends for your tailoring shop.</p>
      </div>
    </div>

    <div class="grid gap-4 lg:grid-cols-2">
      <div class="bg-card border border-layer-line shadow-2xs rounded-xl p-5">
        <div class="flex items-start justify-between gap-4 mb-4">
          <div>
            <p class="text-sm font-semibold text-foreground">Income trend</p>
            <p class="mt-1 text-sm text-muted-foreground-2">Completed earnings across the selected period.</p>
          </div>
          <span class="rounded-full bg-surface px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-muted-foreground">{{ ucfirst($range) }}</span>
        </div>
        <div id="admin-income-chart" wire:ignore class="min-h-[320px]"></div>
      </div>

      <div class="bg-card border border-layer-line shadow-2xs rounded-xl p-5">
        <div class="flex items-start justify-between gap-4 mb-4">
          <div>
            <p class="text-sm font-semibold text-foreground">Visitor trend</p>
            <p class="mt-1 text-sm text-muted-foreground-2">Unique visitors by {{ $range === 'daily' ? 'day' : ($range === 'weekly' ? 'week' : 'month') }}.</p>
          </div>
          <span class="rounded-full bg-surface px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-muted-foreground">Unique</span>
        </div>
        <div id="admin-visitor-chart" wire:ignore class="min-h-[320px]"></div>
      </div>
    </div>

    <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
      <div class="bg-card border border-layer-line shadow-2xs rounded-xl p-5">
        <p class="text-sm font-semibold text-foreground">Total revenue</p>
        <p class="mt-4 text-3xl font-semibold text-primary">₱{{ number_format($totalRevenue, 2) }}</p>
        <p class="mt-2 text-sm text-muted-foreground-1">Revenue from paid bookings.</p>
      </div>
      <div class="bg-card border border-layer-line shadow-2xs rounded-xl p-5">
        <p class="text-sm font-semibold text-foreground">Completed orders</p>
        <p class="mt-4 text-3xl font-semibold text-primary">{{ number_format($completedOrders) }}</p>
        <p class="mt-2 text-sm text-muted-foreground-1">Approved and paid orders.</p>
      </div>
      <div class="bg-card border border-layer-line shadow-2xs rounded-xl p-5">
        <p class="text-sm font-semibold text-foreground">Unique visitors</p>
        <p class="mt-4 text-3xl font-semibold text-primary">{{ number_format($uniqueVisitors) }}</p>
        <p class="mt-2 text-sm text-muted-foreground-1">Unique visitor sessions in this period.</p>
      </div>
      <div class="bg-card border border-layer-line shadow-2xs rounded-xl p-5">
        <p class="text-sm font-semibold text-foreground">Average order</p>
        <p class="mt-4 text-3xl font-semibold text-primary">₱{{ number_format($averageOrderValue, 2) }}</p>
        <p class="mt-2 text-sm text-muted-foreground-1">Average value per completed order.</p>
      </div>
    </div>
  </div>

  <script id="admin-dashboard-data" type="application/json">
    {!! json_encode([
      'incomeLabels' => $incomeChartLabels,
      'incomeData' => array_values($incomeChartData),
      'visitorLabels' => $visitorChartLabels,
      'visitorData' => array_values($visitorChartData),
    ]) !!}
  </script>

<link rel="stylesheet" href="{{ asset('assets/vendor/apexcharts/dist/apexcharts.css') }}">
<script src="{{ asset('assets/vendor/apexcharts/dist/apexcharts.min.js') }}"></script>

  <script>
    (function () {
      const dataElement = document.getElementById('admin-dashboard-data');
      const incomeChartEl = document.getElementById('admin-income-chart');
      const visitorChartEl = document.getElementById('admin-visitor-chart');

      let incomeChart = null;
      let visitorChart = null;

      function parseData() {
        try {
          return JSON.parse(dataElement?.textContent || '{}');
        } catch {
          return null;
        }
      }

      function buildOptions(title, categories, series, color) {
        return {
          chart: { type: 'area', height: 320, toolbar: { show: false }, zoom: { enabled: false } },
          series: [{ name: title, data: series }],
          stroke: { curve: 'smooth', width: 3 },
          fill: { type: 'gradient', gradient: { shade: 'light', opacityFrom: 0.55, opacityTo: 0.08, stops: [0, 80, 100] } },
          grid: { borderColor: '#e5e7eb', strokeDashArray: 4 },
          xaxis: { categories, labels: { style: { colors: '#6b7280', fontSize: '12px' } }, axisBorder: { show: false }, axisTicks: { show: false } },
          yaxis: { labels: { style: { colors: '#6b7280', fontSize: '12px' }, formatter: (value) => (value >= 1000 ? `${value / 1000}k` : value) } },
          tooltip: { theme: 'light', x: { show: true }, y: { formatter: (value) => `₱${value.toLocaleString()}` } },
          colors: [color],
          responsive: [{ breakpoint: 768, options: { chart: { height: 280 }, xaxis: { labels: { rotate: -45 } } } }],
        };
      }

      function renderCharts() {
        if (!incomeChartEl || !visitorChartEl || !dataElement) {
          return;
        }

        const payload = parseData();
        if (!payload) {
          return;
        }

        if (incomeChart) {
          incomeChart.updateOptions(buildOptions('Income', payload.incomeLabels, payload.incomeData, '#2563eb'));
          incomeChart.updateSeries([{ name: 'Income', data: payload.incomeData }]);
        } else {
          incomeChart = new ApexCharts(incomeChartEl, buildOptions('Income', payload.incomeLabels, payload.incomeData, '#2563eb'));
          incomeChart.render();
        }

        if (visitorChart) {
          visitorChart.updateOptions(buildOptions('Visitors', payload.visitorLabels, payload.visitorData, '#14b8a6'));
          visitorChart.updateSeries([{ name: 'Visitors', data: payload.visitorData }]);
        } else {
          visitorChart = new ApexCharts(visitorChartEl, buildOptions('Visitors', payload.visitorLabels, payload.visitorData, '#14b8a6'));
          visitorChart.render();
        }
      }

      function setupCharts() {
        renderCharts();

        if (window.Livewire) {
          if (typeof Livewire.hook === 'function') {
            Livewire.hook('message.processed', renderCharts);
          } else if (typeof Livewire.on === 'function') {
            Livewire.on('message.processed', renderCharts);
          }
        }
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setupCharts);
      } else {
        setupCharts();
      }
    })();
  </script>
</div>
