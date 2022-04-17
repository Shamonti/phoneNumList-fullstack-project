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

//DATE PICKER
$(function () {
  var from_$input = $('#input_from').pickadate(),
    from_picker = from_$input.pickadate('picker');

  var to_$input = $('#input_to').pickadate(),
    to_picker = to_$input.pickadate('picker');

  // Check if there’s a “from” or “to” date to start with.
  if (from_picker.get('value')) {
    to_picker.set('min', from_picker.get('select'));
  }
  if (to_picker.get('value')) {
    from_picker.set('max', to_picker.get('select'));
  }

  // When something is selected, update the “from” and “to” limits.
  from_picker.on('set', function (event) {
    if (event.select) {
      to_picker.set('min', from_picker.get('select'));
    } else if ('clear' in event) {
      to_picker.set('min', false);
    }
  });
  to_picker.on('set', function (event) {
    if (event.select) {
      from_picker.set('max', to_picker.get('select'));
    } else if ('clear' in event) {
      from_picker.set('max', false);
    }
  });
});
