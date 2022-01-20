'use strict';

//Chart JS SalesChart Setup
const salesLabels = [
  'Day01',
  'Day02',
  'Day03',
  'Day04',
  'Day05',
  'Day06',
  'Day07',
];

const salesData = {
  labels: salesLabels,
  datasets: [
    {
      label: 'Number of Orders',
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

//Chart JS CreditChart Setup
const creditLabels = [
  'Day01',
  'Day02',
  'Day03',
  'Day04',
  'Day05',
  'Day06',
  'Day07',
];

const creditData = {
  labels: creditLabels,
  datasets: [
    {
      label: 'Number of Customers',
      backgroundColor: 'rgb(75, 192, 192)',
      borderColor: 'rgb(75, 192, 192)',
      data: [2, 10, 5, 2, 20, 30, 45],
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
