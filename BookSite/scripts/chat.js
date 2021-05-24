var hist = document.getElementById("historico")
var conversa = document.getElementById("conversa")
var dadosPerfil = document.getElementById("perfil")
var enviar = document.getElementById("enviar")
var aviso = document.getElementById("aviso")
var id, anunciante

setInterval(()=>{

    let xhr = new XMLHttpRequest()
    xhr.open("GET", "../banco/historico.php", true)
    xhr.onload = ()=>{
        if(xhr.status === 200){
            hist.innerHTML = ""
            let data = xhr.response
            hist.innerHTML = data
        }
    }

    xhr.send()

},1000)

function chat(c){
    perfil(c)
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "../banco/conversa.php", true)
    xhr.onload = ()=>{
        if(xhr.status === 200){
            aviso.innerHTML = ""
            enviar.className = ""
            let data = xhr.response
            conversa.innerHTML = data
        }
    }
    let data = new FormData() 
    data.append("cod_conversa", c)
    xhr.send(data)
}

function perfil(c){
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "../banco/perfil.php", true)
    xhr.onload = ()=>{
        if(xhr.status === 200){
            dadosPerfil.innerHTML = ""
            let data = xhr.response
            dadosPerfil.innerHTML = data
        }
    }
    let data = new FormData() 
    data.append("cod_conversa", c)
    xhr.send(data)
}

function setId(novoId){
    id = novoId
}


setInterval(()=>{
if(id != null){
    chat(id)
}

},500)

function novaMsg(){
    let input = document.getElementById("mensagem")
    let msg = input.value
    anunciante = document.getElementById("anunciante").value
    
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "../banco/newMess.php", true)
    xhr.onload = ()=>{
        if(xhr.status === 200){
            input.value = ""
            let data = xhr.response
            if(data){
                setId(data)
            }
        }
    }
    let data = new FormData() 
    data.append("send", msg)
    data.append("anunciante", anunciante)
    if (id){
        data.append("conversa", id)
    }
    xhr.send(data)
}
