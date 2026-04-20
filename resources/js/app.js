import './bootstrap';
// index.js
import 'preline';
import '@preline/theme-switch';

// document.addEventListener("DOMContentLoaded", async () => {
//     const ApexCharts = (await import('apexcharts')).default;

//     const chart = new ApexCharts(document.querySelector("#chart"), {
//         chart: { type: 'line' },
//         series: [{ data: [10, 20, 30] }]
//     });

//     chart.render();
// });


const initPreline = () => {
    if (window.HSStaticMethods) {
        window.HSStaticMethods.autoInit();
    }
};

// Initial page load
window.addEventListener('load', initPreline);

// Livewire v3/v4 navigation fix
document.addEventListener('livewire:navigated', () => {
    setTimeout(initPreline, 0);
});

// commonjs
const flatpickr = require("flatpickr");

// es modules are recommended, if available, especially for typescript
import flatpickr from "flatpickr";