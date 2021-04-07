var feild = document.querySelector('textarea');
var backUp = feild.getAttribute('placeholder');
var but = document.querySelector('.but');
var clear = document.getElementById('clear')

feild.onfocus = function(){
    this.setAttribute('placeholder', '');
    this.style.borderColor = '#333';
    but.style.display = 'block'
}

feild.onblur = function(){
    this.setAttribute('placeholder',backUp);
    this.style.borderColor = '#aaa'
}

clear.onclick = function(){
    but.style.display = 'none';
    feild.value = '';
}
