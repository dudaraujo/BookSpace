var input = document.getElementById('senha');
var img = document.querySelector('#olho');
img.addEventListener('click', function () {
  input.type = input.type == 'text' ? 'password' : 'text';
});