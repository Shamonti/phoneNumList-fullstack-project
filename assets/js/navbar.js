'use strict';

//SHOW USER MENU ON BUTTON CLICK
const userBtn = document.querySelector('.user-btn');
const userMenu = document.querySelector('.user-div');
let timesClicked = 0;

userBtn.addEventListener('click', function () {
  timesClicked++;

  if (timesClicked % 2 == 0) {
    userMenu.classList.remove('show-block');
    userMenu.classList.add('hide');
  } else {
    userMenu.classList.remove('hide');
    userMenu.classList.add('show-block');
  }
});

//SHOW PHONE CALL ACTION ON BUTTON CLICK
const phoneBtn = document.querySelector('.phone-btn');
const phoneCallDiv = document.querySelector('.phone-call__div');

phoneBtn.addEventListener('click', function () {
  timesClicked++;

  if (timesClicked % 2 == 0) {
    phoneCallDiv.classList.remove('show-block');
    phoneCallDiv.classList.add('hide');
  } else {
    phoneCallDiv.classList.remove('hide');
    phoneCallDiv.classList.add('show-block');
  }
});

//SHOW NOTIFICATION MENU ON BUTTON CLICK
const notificationBtn = document.querySelector('.notification-btn');
const notificationBar = document.querySelector('.notification__sidebar');

notificationBtn.addEventListener('click', function () {
  notificationBar.classList.remove('hide');
  notificationBar.classList.add('show-block');
});

//CLOSE NOTIFICATION MENU ON BUTTON CLICK
const closeBtn = document.querySelector('.close-btn');

closeBtn.addEventListener('click', function () {
  notificationBar.classList.remove('show-block');
  notificationBar.classList.add('hide');
});
