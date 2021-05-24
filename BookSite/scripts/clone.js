var adicao = document.querySelector("button#adc")
var deleted = document.querySelector("button#remove")

var div = document.querySelector("div#generos")

adicao.addEventListener("click", adc)
deleted.addEventListener("click", remove)

var generos = document.getElementsByName("genero[]")
var msgen = document.getElementsByName("msgen")

function adc(){
    var input = document.createElement("select")
    input.setAttribute("class", "form-control mt-3")
    input.setAttribute("name", "genero[]")
    input.setAttribute("aria-label", "Genero")
    input.setAttribute("aria-describedby", "basic-addon2")

    input.innerHTML = generos[0].innerHTML

    div.appendChild(input)
}

function remove(){
    let inputRem = generos.length - 1
    if (inputRem != 0){
   generos[inputRem].remove()
    }
}