'use strict';

//SHOW USER MENU ON BUTTON CLICK
const userBtn = document.querySelector('.user-btn');
const userName = document.querySelector('.user-name');
const userMenu = document.querySelector('.user-div');
let timesClicked = 0;

userBtn.addEventListener('click', function () {
  timesClicked++;
  userBtn.style.backgroundColor = '#8979e8';
  userName.style.color = '#ffffff';

  if (timesClicked % 2 == 0) {
    userMenu.classList.remove('show-block');
    userMenu.classList.add('hide');
    userBtn.style.backgroundColor = '#E8EEF4';
    userName.style.color = '#242d3e';
  } else {
    userMenu.classList.remove('hide');
    userMenu.classList.add('show-block');
    userBtn.style.backgroundColor = '#8979e8';
    userName.style.color = '#ffffff';
  }

  userBtn.style.color = '#ffffff';
});

//SHOW PHONE CALL ACTION ON BUTTON CLICK
const phoneBtn = document.querySelector('.phone-btn');
const phoneCallDiv = document.querySelector('.phone-call__div');

phoneBtn.addEventListener('click', function () {
  timesClicked++;

  if (timesClicked % 2 == 0) {
    phoneCallDiv.classList.remove('visible');
    phoneCallDiv.classList.add('invisible');
  } else {
    phoneCallDiv.classList.remove('invisible');
    phoneCallDiv.classList.add('visible');
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
