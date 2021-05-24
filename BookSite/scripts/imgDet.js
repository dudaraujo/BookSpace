var img = document.querySelector("img#imgPr")

var imgs = document.querySelectorAll("img[name='img']")

var count = imgs.length

for (let i = 0; i < count; i++){
    imgs[i].addEventListener("click", function (){
        visu(imgs[i])
    })
}


function visu(a){
   img.src = a.src
}

//avaliação
var stars = document.getElementsByName("star")
var listS = document.querySelector("#list-stars")

listS.addEventListener("mouseleave", voltarCor)

for (s = 0; s < stars.length; s++){
    stars[s].addEventListener("mouseenter", mudarCor)
    stars[s].addEventListener("click", avaliação)
}

function mudarCor(){
    let atual = this.id

    for (let i = 0; i <= atual - 1; i++){
       stars[i].src = "Books_imgs/starOn.png" 
    }

    for (let a = 4; a >= atual; a--){
        stars[a].src = "Books_imgs/starOff.png" 
     }
}


function voltarCor(){
    for (let v = 0; v <= stars.length; v++){
        stars[v].src = "Books_imgs/starOff.png" 
    }
}

function avaliação(){
    let nota = this.id
    let notahid = document.querySelector("#nota")
    let form = document.querySelector("#form-nota")

    notahid.value = nota

    form.submit();

}