'use strict';
Chart.defaults.color = '#b3b7bb';

// CHART#01
//Chart JS SalesChart Setup
const salesLabels = [
  'Day 01',
  'Day 02',
  'Day 03',
  'Day 04',
  'Day 05',
  'Day 06',
  'Day 07',
];

const salesData = {
  labels: salesLabels,
  datasets: [
    {
      label: 'Orders Received',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    },
  ],
};

const salesConfig = {
  type: 'line',
  data: salesData,
  options: {},
};

//Chart JS SalesChart Configuration
const salesChart = new Chart(
  document.getElementById('salesChart'),
  salesConfig
);

// CHART#02
//Chart JS CreditChart Setup
const creditLabels = [
  'Day 01',
  'Day 02',
  'Day 03',
  'Day 04',
  'Day 05',
  'Day 06',
  'Day 07',
];

const creditData = {
  labels: creditLabels,
  datasets: [
    {
      label: 'New Customers',
      backgroundColor: 'rgba(54, 162, 235, 1)',
      borderColor: 'rgba(54, 162, 235, 1)',
      data: [2, 10, 5, 2, 20, 30, 45],
    },
    {
      label: 'Credit Earned',
      backgroundColor: 'rgba(75, 192, 192, 1)',
      borderColor: 'rgba(75, 192, 192, 1)',
      data: [12, 20, 15, 21, 2, 10, 35],
    },
  ],
};

const creditConfig = {
  type: 'bar',
  data: creditData,
  options: {},
};

//Chart JS CreditChart Configuration
const creditChart = new Chart(
  document.getElementById('creditChart'),
  creditConfig
);
