//START COUNTER ON HOVER OVER SECTION
// const sectionCounter = document.querySelector('.section-counter');

// sectionCounter.addEventListener('mouseover', function () {
//   //COUNT
//   $(document).ready(function () {
//     $('.counter').each(function () {
//       $(this)
//         .prop('Counter', 0)
//         .animate(
//           { Counter: $(this).text() },
//           {
//             duration: 4000,
//             easing: 'swing',
//             step: function (now) {
//               $(this).text(Math.ceil(now));
//             },
//           }
//         );
//     });
//   });
// });

let a = 0;
$(window).scroll(function () {
  let oTop = $('.section-counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter').each(function () {
      let $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text(),
      }).animate(
        {
          countNum: countTo,
        },

        {
          duration: 7000,
          easing: 'swing',
          step: function () {
            $this.text(Math.floor(this.countNum));
          },
          complete: function () {
            $this.text(this.countNum);
            //alert('finished');
          },
        }
      );
    });
    a = 1;
  }
});
