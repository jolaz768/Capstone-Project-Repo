<div>
    <script src="../assets/vendor/lodash/lodash.min.js"></script>
    <script src="../assets/vendor/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/vendor/preline/dist/helper-shared.js"></script>
    <script src="../assets/vendor/preline/dist/helper-apexcharts.js"></script>

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

<link rel="stylesheet" href="../assets/vendor/apexcharts/dist/apexcharts.css">
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







<!-- Card -->
<div class="p-4 md:p-5 min-h-102.5 flex flex-col bg-card border border-card-line shadow-2xs rounded-xl">
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

  <div id="hs-single-area-chart"></div>
</div>
<!-- End Card -->

</div>
