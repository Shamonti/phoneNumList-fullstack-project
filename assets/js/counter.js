//START COUNTER ON HOVER OVER SECTION
const sectionCounter = document.querySelector('.section-counter');

sectionCounter.addEventListener('mouseover', function () {
  //COUNT
  $(document).ready(function () {
    $('.counter').each(function () {
      $(this)
        .prop('Counter', 0)
        .animate(
          {
            Counter: $(this).text(),
          },
          {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
              $(this).text(Math.ceil(now));
            },
          }
        );
    });
  });
});
