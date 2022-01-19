//Chart JS SalesChart Setup
const salesLabels = ['January', 'February', 'March', 'April', 'May', 'June'];

const salesData = {
  labels: salesLabels,
  datasets: [
    {
      label: 'My First dataset',
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
const creditChart = new Chart(document.getElementById('creditChart'), config);
