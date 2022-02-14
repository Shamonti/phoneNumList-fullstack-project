'user strict';

//SEE MORE BUTTON
function readMore() {
  let dots = document.getElementById('dots');
  let moreText = document.getElementById('more');
  let btnText = document.getElementById('seeMoreBtn');

  if (dots.style.display === 'none') {
    dots.style.display = 'inline';
    btnText.innerHTML = 'See more';
    moreText.style.display = 'none';
  } else {
    dots.style.display = 'none';
    btnText.innerHTML = 'See less';
    moreText.style.display = 'inline';
  }
}

//SHOW PASSWORD
function showPassword() {
  var x = document.getElementById('password');
  if (x.type === 'password') {
    x.type = 'text';
  } else {
    x.type = 'password';
  }
}
