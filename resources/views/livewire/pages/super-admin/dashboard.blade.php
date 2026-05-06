<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <!-- Card Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Grid -->
  <div class="grid md:grid-cols-4 bg-layer border border-layer-line shadow-2xs rounded-xl overflow-hidden">
    <!-- Card -->
    <a class="block p-4 md:p-5 relative bg-layer hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:h-full before:border-s before:border-layer-line first:before:bg-transparent" href="#">
      <div class="flex md:flex flex-col lg:flex-row gap-y-3 gap-x-5">
        <svg class="shrink-0 size-5 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>

        <div class="grow">
          <p class="text-xs uppercase font-medium text-foreground">
            Total users
          </p>
          <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-primary">
            {{ number_format($totalUsers) }}
          </h3>
          <div class="mt-1 flex justify-between items-center">
            <p class="text-sm text-muted-foreground-1">
              Registered customers
            </p>
            <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-surface-1 text-surface-foreground">
              <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
              </svg>
              <span class="inline-block">
                12.5%
              </span>
            </span>
          </div>
        </div>
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="block p-4 md:p-5 relative bg-layer hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:h-full before:border-s before:border-layer-line first:before:bg-transparent" href="#">
      <div class="flex md:flex flex-col lg:flex-row gap-y-3 gap-x-5">
        <svg class="shrink-0 size-5 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>

        <div class="grow">
          <p class="text-xs uppercase font-medium text-foreground">
            Total Shops
          </p>
          <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-primary">
            {{ number_format($totalShops) }}
          </h3>
          <div class="mt-1 flex justify-between items-center">
            <p class="text-sm text-muted-foreground-1">
              Active shops: {{ number_format($activeShops) }}
            </p>
            <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-surface-1 text-surface-foreground">
              <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
              </svg>
              <span class="inline-block">
                1.7%
              </span>
            </span>
          </div>
        </div>
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="block p-4 md:p-5 relative bg-layer hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:h-full before:border-s before:border-layer-line first:before:bg-transparent" href="#">
      <div class="flex md:flex flex-col lg:flex-row gap-y-3 gap-x-5">
        <svg class="shrink-0 size-5 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"/><path d="m12 12 4 10 1.7-4.3L22 16Z"/></svg>

        <div class="grow">
          <p class="text-xs uppercase font-medium text-foreground">
            Visits
          </p>
          <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-primary">
            {{ number_format($totalVisitors) }}
          </h3>
          <div class="mt-1 flex justify-between items-center">
            <p class="text-sm text-muted-foreground-1">
              Unique visitors
            </p>
            <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-surface-1 text-surface-foreground">
              <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
              </svg>
              <span class="inline-block">
                4.4%
              </span>
            </span>
          </div>
        </div>
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="block p-4 md:p-5 relative bg-layer hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:h-full before:border-s before:border-layer-line first:before:bg-transparent" href="#">
      <div class="flex md:flex flex-col lg:flex-row gap-y-3 gap-x-5">
        <svg class="shrink-0 size-5 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z"/><path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/></svg>

        <div class="grow">
          <p class="text-xs uppercase font-medium text-foreground">
            Pageviews
          </p>
          <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-primary">
            ₱{{ number_format($totalRevenue, 2) }}
          </h3>
          <div class="mt-1 flex justify-between items-center">
            <p class="text-sm text-muted-foreground-1">
              Platform revenue
            </p>
            <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-surface-1 text-surface-foreground">
              <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
              </svg>
              <span class="inline-block">
                0.1%
              </span>
            </span>
          </div>
        </div>
      </div>
    </a>
    <!-- End Card -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Card Section -->

<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 mx-auto">
  <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
    <div>
      <h2 class="text-xl font-semibold text-foreground">Platform analytics</h2>
      <p class="mt-1 text-sm text-muted-foreground-2">Revenue, visitors, orders, and growth across the platform.</p>
    </div>
    <div class="inline-flex rounded-full border border-layer-line bg-surface p-1">
      <button wire:click.prevent="setRange('daily')" class="rounded-full px-4 py-2 text-sm font-medium transition {{ $range === 'daily' ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-layer-hover' }}">Daily</button>
      <button wire:click.prevent="setRange('weekly')" class="rounded-full px-4 py-2 text-sm font-medium transition {{ $range === 'weekly' ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-layer-hover' }}">Weekly</button>
      <button wire:click.prevent="setRange('monthly')" class="rounded-full px-4 py-2 text-sm font-medium transition {{ $range === 'monthly' ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-layer-hover' }}">Monthly</button>
    </div>
  </div>

  <div class="grid gap-4 lg:grid-cols-2">
    <div class="bg-layer border border-layer-line shadow-2xs rounded-xl p-5">
      <div class="flex items-center justify-between mb-4">
        <div>
          <p class="text-sm font-semibold text-foreground">Revenue trend</p>
          <p class="mt-1 text-sm text-muted-foreground-2">Total completed platform revenue.</p>
        </div>
        <span class="rounded-full bg-surface px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-muted-foreground">{{ ucfirst($range) }}</span>
      </div>
      <div id="superadmin-revenue-chart" wire:ignore class="min-h-[320px]"></div>
    </div>

    <div class="bg-layer border border-layer-line shadow-2xs rounded-xl p-5">
      <div class="flex items-center justify-between mb-4">
        <div>
          <p class="text-sm font-semibold text-foreground">Visitor trend</p>
          <p class="mt-1 text-sm text-muted-foreground-2">Unique visitors across all shops.</p>
        </div>
        <span class="rounded-full bg-surface px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-muted-foreground">Unique</span>
      </div>
      <div id="superadmin-visitors-chart" wire:ignore class="min-h-[320px]"></div>
    </div>
  </div>

  <div class="mt-6 grid gap-4 lg:grid-cols-2">
    <div class="bg-layer border border-layer-line shadow-2xs rounded-xl p-5">
      <p class="text-sm font-semibold text-foreground">User growth</p>
      <div id="superadmin-users-chart" wire:ignore class="mt-4 min-h-[280px]"></div>
    </div>
    <div class="bg-layer border border-layer-line shadow-2xs rounded-xl p-5">
      <p class="text-sm font-semibold text-foreground">Orders trend</p>
      <div id="superadmin-orders-chart" wire:ignore class="mt-4 min-h-[280px]"></div>
    </div>
  </div>

  <script id="superadmin-dashboard-data" type="application/json">
    {!! }json([
      'revenueLabels' => $revenueChartLabels,
      'revenueData' => array_values($revenueChartData),
      'visitorLabels' => $visitorChartLabels,
      'visitorData' => array_values($visitorChartData),
      'userLabels' => $userChartLabels,
      'userData' => array_values($userChartData),
      'orderLabels' => $orderTrendLabels,
      'orderSeries' => $orderTrendSeries,
    ])}
  </script>

  <link rel="stylesheet" href="{{ asset('assets/vendor/apexcharts/dist/apexcharts.css') }}">
  <script src="{{ asset('assets/vendor/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script>
    document.addEventListener('livewire:load', function () {
      const dataElement = document.getElementById('superadmin-dashboard-data');
      const revenueEl = document.getElementById('superadmin-revenue-chart');
      const visitorsEl = document.getElementById('superadmin-visitors-chart');
      const usersEl = document.getElementById('superadmin-users-chart');
      const ordersEl = document.getElementById('superadmin-orders-chart');

      let revenueChart = null;
      let visitorsChart = null;
      let usersChart = null;
      let ordersChart = null;

      function getData() {
        try {
          return JSON.parse(dataElement.textContent || '{}');
        } catch {
          return {};
        }
      }

      function buildAreaOptions(title, categories, series, color) {
        return {
          chart: { type: 'area', height: 320, toolbar: { show: false }, zoom: { enabled: false } },
          series: [{ name: title, data: series }],
          stroke: { curve: 'smooth', width: 3 },
          fill: { type: 'gradient', gradient: { shade: 'light', opacityFrom: 0.55, opacityTo: 0.08, stops: [0, 80, 100] } },
          grid: { borderColor: '#e5e7eb', strokeDashArray: 4 },
          xaxis: { categories, labels: { style: { colors: '#6b7280', fontSize: '12px' } }, axisBorder: { show: false }, axisTicks: { show: false } },
          yaxis: { labels: { style: { colors: '#6b7280', fontSize: '12px' }, formatter: (value) => value >= 1000 ? `${value / 1000}k` : value } },
          tooltip: { theme: 'light', x: { show: true }, y: { formatter: (value) => `₱${value.toLocaleString()}` } },
          colors: [color],
          responsive: [{ breakpoint: 768, options: { chart: { height: 280 }, xaxis: { labels: { rotate: -45 } } } }],
        };
      }

      function buildBarOptions(categories, series) {
        return {
          chart: { type: 'bar', height: 320, stacked: true, toolbar: { show: false } },
          series,
          plotOptions: { bar: { borderRadius: 6, columnWidth: '50%' } },
          dataLabels: { enabled: false },
          xaxis: { categories, labels: { style: { colors: '#6b7280', fontSize: '12px' } }, axisBorder: { show: false }, axisTicks: { show: false } },
          yaxis: { labels: { style: { colors: '#6b7280', fontSize: '12px' } } },
          grid: { borderColor: '#e5e7eb', strokeDashArray: 4 },
          tooltip: { theme: 'light' },
          colors: ['#2563eb', '#16a34a', '#ef4444', '#f59e0b'],
          legend: { position: 'top', horizontalAlign: 'left' },
        };
      }

      function renderCharts() {
        const payload = getData();
        if (!payload) return;

        if (revenueChart) {
          revenueChart.updateOptions(buildAreaOptions('Revenue', payload.revenueLabels, payload.revenueData, '#2563eb'));
          revenueChart.updateSeries([{ name: 'Revenue', data: payload.revenueData }]);
        } else {
          revenueChart = new ApexCharts(revenueEl, buildAreaOptions('Revenue', payload.revenueLabels, payload.revenueData, '#2563eb'));
          revenueChart.render();
        }

        if (visitorsChart) {
          visitorsChart.updateOptions(buildAreaOptions('Visitors', payload.visitorLabels, payload.visitorData, '#14b8a6'));
          visitorsChart.updateSeries([{ name: 'Visitors', data: payload.visitorData }]);
        } else {
          visitorsChart = new ApexCharts(visitorsEl, buildAreaOptions('Visitors', payload.visitorLabels, payload.visitorData, '#14b8a6'));
          visitorsChart.render();
        }

        if (usersChart) {
          usersChart.updateOptions(buildAreaOptions('Users', payload.userLabels, payload.userData, '#8b5cf6'));
          usersChart.updateSeries([{ name: 'Users', data: payload.userData }]);
        } else {
          usersChart = new ApexCharts(usersEl, buildAreaOptions('Users', payload.userLabels, payload.userData, '#8b5cf6'));
          usersChart.render();
        }

        if (ordersChart) {
          ordersChart.updateOptions(buildBarOptions(payload.orderLabels, payload.orderSeries));
          ordersChart.updateSeries(payload.orderSeries);
        } else {
          ordersChart = new ApexCharts(ordersEl, buildBarOptions(payload.orderLabels, payload.orderSeries));
          ordersChart.render();
        }
      }

      renderCharts();
      Livewire.hook('message.processed', renderCharts);
    });
  </script>




<!-- Card -->
<div class="p-4 md:p-5 min-h-102.5 flex flex-col bg-card border border-card-line shadow-2xs rounded-xl mt-5">
  <!-- Header -->
  <div class="flex flex-wrap justify-between items-center gap-2">
    <div>
      <h2 class="text-sm text-muted-foreground-1">
        Visitors
      </h2>
      <p class="text-xl sm:text-2xl font-medium text-foreground">
        80.3k
      </p>
    </div>

    <div>
      <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-red-100 text-red-800 dark:bg-red-500/10 dark:text-red-500">
        <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="m19 12-7 7-7-7"/></svg>
        2%
      </span>
    </div>
  </div>
  
  <!-- End Header -->

  <div id="hs-single-area-chart">
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
  </div>
</div>
<!-- End Card -->
</div>
