function teste(){
var seuNode = document.getElementById('inputGender'); //usei getElementById() por opção você pode resgatar a referência do seu node como quiser.
var clone   = seuNode.cloneNode(true); //aqui você terá seu clone armazenado em variável mas ainda não incluido no Documento, sem parentNode.
document.getElementById("generos").appendChild(clone); //você pode dar append onde quiser, utilizei o body
}