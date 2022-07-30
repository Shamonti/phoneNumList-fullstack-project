'use strict';

//UPLOAD BUTTON
document.getElementById('buttonid').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('fileid').click();
}

//UPLOAD BUTTON SHOWING FILE NAME
const uploadBtn = document.getElementById('fileid');
const infoArea = document.getElementById('file-upload-filename');

uploadBtn.addEventListener('change', showFileName);

function showFileName(event) {
  // the change event gives us the input it occurred in
  let uploadBtn = event.target;

  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  let fileName = uploadBtn.files[0].name;

  // use fileName however fits your app best, i.e. add it into a div
  infoArea.textContent = '✔ Uploaded: ' + fileName;
}

// PEOPLE NAME SEARCH FILTER
function searchPeople() {
  let input, filter, table, tr, td, i, txtValue;
  input = document.getElementById('searchPeople');
  filter = input.value.toUpperCase();
  table = document.getElementById('table');
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

// COMPANY NAME SEARCH FILTER
function searchCompany() {
  let input, filter, table, tr, td, i, txtValue;
  input = document.getElementById('searchCompany');
  filter = input.value.toUpperCase();
  table = document.getElementById('table');
  tr = table.getElementsByTagName('tr');

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName('td')[2];
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
