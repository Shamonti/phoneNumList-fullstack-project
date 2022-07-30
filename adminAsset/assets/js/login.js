'use strict';

const resetPass = document.getElementById('reset-password');
const loginForm = document.querySelector('.login-form');
const resetForm = document.querySelector('.reset-form');

resetPass.addEventListener('click', function () {
  loginForm.classList.add('hide');
  resetForm.classList.remove('hide');
  resetForm.classList.add('show');
});

const loginHere = document.getElementById('login-here');
loginHere.addEventListener('click', function () {
  resetForm.classList.add('hide');
  loginForm.classList.remove('hide');
  loginForm.classList.add('show');
});
