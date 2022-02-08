'use strict';

//JOB TITLE FILTER
// const jobList = document.querySelector('.jobList');
// const body = document.querySelector('body');

// const inputJob = document.getElementById('job');

// inputJob.addEventListener('keyup', function () {
//   jobList.classList.remove('hide');
//   jobList.classList.add('show');
// });

// body.addEventListener('click', function () {
//   jobList.classList.remove('show');
//   jobList.classList.add('hide');
// });

// PEOPLE NAME SEARCH FILTER
function searchPeople() {
  let input, filter, table, tr, td, i, txtValue;
  input = document.getElementById('searchPeople');
  filter = input.value.toUpperCase();
  table = document.getElementById('peopleTable');
  tr = table.getElementsByTagName('tr');

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName('td')[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = '';
      } else {
        tr[i].style.display = 'none';
      }
    }
  }
}
