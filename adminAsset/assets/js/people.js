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

let genderInput = document.getElementById('genderInput');
let relationshipInput = document.getElementById('relationshipInput');
let countryInput = document.getElementById('countryInput');
let ageInput = document.getElementById('ageInput');

document.querySelector('.maleBtn').addEventListener('click', function () {
  genderInput.value = document.querySelector('.maleBtn').value;
});

document.querySelector('.femaleBtn').addEventListener('click', function () {
  genderInput.value = document.querySelector('.femaleBtn').value;
});

document.querySelector('.singleBtn').addEventListener('click', function () {
  relationshipInput.value = document.querySelector('.singleBtn').value;
});

document.querySelector('.relationBtn').addEventListener('click', function () {
  relationshipInput.value = document.querySelector('.relationBtn').value;
});

document.querySelector('.engagedBtn').addEventListener('click', function () {
  relationshipInput.value = document.querySelector('.engagedBtn').value;
});

document.querySelector('.marriedBtn').addEventListener('click', function () {
  relationshipInput.value = document.querySelector('.marriedBtn').value;
});

document.querySelector('.openBtn').addEventListener('click', function () {
  relationshipInput.value = document.querySelector('.openBtn').value;
});

document
  .querySelector('.complicatedBtn')
  .addEventListener('click', function () {
    relationshipInput.value = document.querySelector('.complicatedBtn').value;
  });

document.querySelector('.countryBtn01').addEventListener('click', function () {
  countryInput.value = document.querySelector('.countryBtn01').value;
});

document.querySelector('.ageBtn01').addEventListener('click', function () {
  ageInput.value = document.querySelector('.ageBtn01').value;
});

document.querySelector('.ageBtn02').addEventListener('click', function () {
  ageInput.value = document.querySelector('.ageBtn02').value;
});

document.querySelector('.ageBtn03').addEventListener('click', function () {
  ageInput.value = document.querySelector('.ageBtn03').value;
});

document.querySelector('.ageBtn04').addEventListener('click', function () {
  ageInput.value = document.querySelector('.ageBtn04').value;
});

document.querySelector('.ageBtn05').addEventListener('click', function () {
  ageInput.value = document.querySelector('.ageBtn05').value;
});
