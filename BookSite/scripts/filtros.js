const livro = []
const pags = document.querySelector("#pags")

for (let i = 0; i < itens.length; i++){
    livro.push(itens[i])
}

function Pesquisar(){
    // var nome = document.querySelector("input#nome").value.toUpperCase()
    // var autor = document.querySelector("input#autor").value.toUpperCase()
    //var preço = document.querySelector("input#preço").value.toUpperCase()
    var min = document.querySelector("input#min").value.toUpperCase()
    var max = document.querySelector("input#max").value.toUpperCase()
    var estado = document.querySelector("input#estado").value.toUpperCase()
    var cidade = document.querySelector("input#cidade").value.toUpperCase()
    var anun = 0

    for (i = 0; i<livro.length; i++){

    if (
    filtroGenero(livro[i]) &&
    filtroEntre(min, max, livro[i]) &&
    filtroEstado(estado, livro[i]) &&
    filtroCidade(cidade, livro[i])
    ){  
        livro[i].style.display = ""
        anun += 1
    }else{
        livro[i].style.display = "none"
    }

    }

    if (anun == 0){
        var Sresu = document.querySelector("#Sresu")
        pags.style.display = "none"

        if (Sresu == null){
            var sem = document.createElement("div")
            sem.setAttribute("id", "Sresu")
            sem.innerHTML = "<h1>sem resultados</h1>"

            var novadiv = document.querySelector("#novaDiv")

            novadiv.appendChild(sem)
        }else{
            Sresu.innerHTML = "<h1>sem resultados</h1>"
        }
    }else{
        var novadiv = document.querySelector("#novaDiv")
        novadiv.innerHTML = ""
        pags.style.display = ""
    }

    paginacao()
}

function filtroNome(nome, livro){
    let nomeLivro = livro.querySelector("p[name='nome']")
    
    if(nomeLivro.innerText.toUpperCase().indexOf(nome) > -1){
        return true
    }else{
        return false
    }
    
}

function filtroAutor(autor, livro){
    let autorLivro = livro.querySelector("p[name='autor']")
    
    if(autorLivro.innerText.toUpperCase().indexOf(autor) > -1){
        return true
    }else{
        return false
    }
}

function filtroPreço(Preço, livro){
    let preçoLivro = livro.querySelector("p[name='preço']")

    let começo = preçoLivro.innerText.indexOf("R$")
    let preçoreal = Number(preçoLivro.innerText.slice(começo+2, preçoLivro.length))

    if(preçoLivro.innerText.toUpperCase().indexOf(Preço) > -1){
        return true
    }else{
        return false
    }
}

function filtroEntre(min, max, livro){
    let preçoLivro = livro.querySelector("h5#preço")

    let começo = preçoLivro.innerText.indexOf("R$")

    let preçoreal = Number(preçoLivro.innerText.slice(começo+2, preçoLivro.length))

    if (preçoreal >= Number(min) && max == ""){
        return true
    }else if(preçoreal >= Number(min) && preçoreal <= Number(max)){
        return true
    }else{
        return false
    }
}

function filtroEstado(estado, livro){
    let estadoLivro = livro.querySelector("p[name='localiza']")

    let fim = estadoLivro.innerText.indexOf(",")

    let estadoReal = estadoLivro.innerText.slice(0, fim)

    
    if(estadoReal.toUpperCase().indexOf(estado) > -1){
        return true
    }else{
        return false
    }
}

function filtroCidade(cidade, livro){
    let cidadeLivro = livro.querySelector("p[name='localiza']")

    let começo = cidadeLivro.innerText.indexOf(",")

    let cidadeReal = cidadeLivro.innerText.slice(começo+1, cidadeLivro.innerText.length)
    
    if(cidadeReal.toUpperCase().indexOf(cidade) > -1){
        return true
    }else{
        return false
    }
}


function filtroGenero(livro){
    var generos = document.querySelectorAll("input[name='check[]']")
    var check = []
    var hidden = livro.querySelectorAll("input[name='generos[]']")
    valores = []
    var filtrado = 0

    for (let g = 0; g<generos.length; g++){
        if(generos[g].checked){
            check.push(generos[g].value)
        }
    }

    for (v in hidden){
       valores.push(hidden[v].value)
    }

    var count = check.length

    for (num = 0; num < count; num++){
        if (valores.indexOf(check[num]) >= 0){
            filtrado ++
        } 
    }

    if (filtrado == count){
        return true
    }
}
