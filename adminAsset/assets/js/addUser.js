'use strict';

const resetPass = document.getElementById('reset-password');
const addUserForm = document.querySelector('.addUser-form');
const resetForm = document.querySelector('.reset-form');

resetPass.addEventListener('click', function () {
  addUserForm.classList.add('hide');
  resetForm.classList.remove('hide');
  resetForm.classList.add('show');
});

const addUserHere = document.getElementById('addUser-here');
addUserHere.addEventListener('click', function () {
  resetForm.classList.add('hide');
  addUserForm.classList.remove('hide');
  addUserForm.classList.add('show');
});

function showResetPassword() {
  let x = document.getElementById('password-reset');
  if (x.type === 'password') {
    x.type = 'text';
  } else {
    x.type = 'password';
  }
}
