const form = document.querySelector("form#dados-form")
const inputs = form.parentNode.getElementsByTagName("input")

form.addEventListener("submit", event =>{
    erros()
})

for (input of inputs){
    input.addEventListener("blur", event => { 
        validacao(event)
    })
}

function erros(){
    let eros = 0
    for (input of inputs){
        if (verifyErrors(input)){
            eros ++
        }
    }
    if (eros > 0){
        event.preventDefault();
    }
}

function validacao(event){
    const input = event.target

    verifyErrors(input)
}

function verifyErrors(input){
    var tipo = input.type

    switch(tipo){
        case "text":
            var erro = valiText(input)
            break
        case "email":
            var erro = valiEmail(input)
            break
        case "password":
           var erro = valiSenha(input)
            break
        case "number":
            var erro = valiNumber(input)
    }
    
    return mensagem(erro, input)
}

function valiText(text){
    let name = text.name
   let inputTxt = text.value
   let erro = false

   if (inputTxt.length == 0){
       erro = "preencha o campo"
   }else if(name == "cpf"){
       if (!cpf(inputTxt)){
        erro = "digite um cpf valido"
       }
   }else if (name == "rg" ){
    if (!rg(inputTxt)){
        erro = "digite um RG valido"
    }
   }
  return erro
}

function valiEmail(email){
    let inputEmail = email.value
    const regEmail =  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
    let erro = false

    if (inputEmail.length == 0){
        erro = "preencha o email"
    }
    else if (emailExi(inputEmail)){
        erro = "email já existe. Por favor coloque outro email"
    }else if (inputEmail.match(regEmail) == null){
        erro = "digite um email valido"
    }
    return erro
}

function valiSenha(senha){
    let inputSenha = senha.value
    const regSenha = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}$/
    let erro = false

    if (inputSenha.length == 0){
        erro = "preencha a senha⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀"
    }else if(inputSenha.length < 8){
        erro = "A senha deve conter no minimo 8 caracteres"
    }else if(inputSenha.length > 15){
        erro = "A senha deve conter no maximo 15 caracteres"
    }else if(inputSenha.match(regSenha) == null){
        erro = "Senha muito fraca! A senha deve conter no minimo 1 letra maiuscula, 1 letra minuscula, 1 caractere especial e 1 numero"
    }
    return erro
}   

function valiNumber(num){
    let inputNum = num.value
    let erro = false

    if (inputNum.length == 0){
        erro = "preencha o campo"
    }

    return erro
}

function mensagem(erro, input){
    var div = input.parentNode.querySelector("div#msg")

    div.style.marginTop = "8px"
    
    if (erro){
        input.style.borderColor = "red"
        div.setAttribute("class", "alert alert-danger")
        div.innerText = erro
        return true
    }else{
        input.style.borderColor = "green"
        div.removeAttribute("class")
        div.innerText = ""
    }
}

function cpf(cpf){
    cpf = cpf.replace(/\D/g, '');
    if(cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
    var result = true;
    [9,10].forEach(function(j){
        var soma = 0, r;
        cpf.split(/(?=)/).splice(0,j).forEach(function(e, i){
            soma += parseInt(e) * ((j+2)-(i+1));
        });
        r = soma % 11;
        r = (r <2)?0:11-r;
        if(r != cpf.substring(j, j+1)) result = false;
    });
    return result;
}

function rg(rg){
    var regRg = /(\d{1,2}\.?)(\d{3}\.?)(\d{3})(\-?[0-9Xx]{1})/g

    if (rg.match(regRg)){
        return true
    }else{
        return false
    }

}

function emailExi(email){
    var dados = new FormData()
    dados.append("email", email)

    resp = ""

    $.ajax({
        async: false,
        url: "../banco/emailexi.php",
        method: "post",
        data: dados,
        processData: false,
        contentType: false,
    }).done(function (resposta){
       if (resposta == "existe"){
           resp = true
       }else{
           resp = false
       }
    })
    return resp
}
