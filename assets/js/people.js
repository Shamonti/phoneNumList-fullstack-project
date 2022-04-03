'use strict';

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

//Access data via button
let accessDataBtn, buttonGroup, messageBox;
accessDataBtn = document.getElementById('accessBtn');
buttonGroup = document.getElementById('buttonGroup');
messageBox = document.getElementById('message');

accessDataBtn.addEventListener('click', showBtns);

function showBtns() {
  accessDataBtn.classList.add('hide');
  buttonGroup.classList.remove('hide');

  document.getElementById('messagePhone').innerHTML = '+880 1234 345 45';
  document.getElementById('messageEmail').innerHTML = 'a@gamail.com';
}
