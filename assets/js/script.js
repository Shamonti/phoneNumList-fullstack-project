'user strict';

// //MAKE TABLE ROWS CLICKABLE
// $(document).ready(function ($) {
//   $('.table-row').click(function () {
//     window.document.location = $(this).data('href');
//   });
// });

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
