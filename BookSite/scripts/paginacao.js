const itens = document.querySelectorAll('#list-livro')

function paginacao(){
const itensBl = []

for (let it = 0; it <= itens.length - 1; it++){
    if (itens[it].style.display == ""){
        itensBl.push(itens[it])
    }
}



//lista de itens
const data = Array.from({length : itensBl.length})
.map((_, i) => `<div class='card mb-4' name='livro' id='list-livro'>${itensBl[i].innerHTML} </div>`)



//querySelector
const html = {
    get(element){
        return document.querySelector(element)
    }
}

//infos sobre em qual pag esta, numero de itens p/ pag, etc
let perPage = 5
const state = {
    page : 1,
    perPage,
    totalPage : Math.ceil(data.length / perPage),
    maxVisibleButtons : 5
}

//navegação
const controls = {
    next(){
        state.page ++

        const lastPage = state.page > state.totalPage
        if (lastPage){
            state.page --
        }
    },
    prev(){
        state.page --

        if(state.page < 1){
            state.page ++
        }
    },
    goTo(page){
        state.page = +page

        if (page < 1){
            state.page = 1
        }

        if (page > state.totalPage){
            state.page = state.totalPage
        }

    },
    createListeners(){
        html.get('#first').addEventListener("click", () =>{
            controls.goTo(1)
            update()
        })

        html.get('#last').addEventListener("click", () =>{
            controls.goTo(state.totalPage)
            update()
        })
        html.get('#next').addEventListener("click", () =>{
            controls.next()
            update()
        })
        html.get('#prev').addEventListener("click", () =>{
            controls.prev()
            update()
        })
        
    }
}

//aqui é criado os itens da lista e tbm atualizados
const list ={
    create(item) {
        const div = document.createElement("div")
        div.innerHTML = item

        html.get("#results_cards").appendChild(div)
    },
    update(){
        html.get("#results_cards").innerHTML = ""

        let page = state.page - 1
        let start = page * state.perPage
        let end = start + state.perPage

        const paginetedItems = data.slice(start, end)

        paginetedItems.forEach(list.create)
    }
}

//criação dos botões
const buttons = {
    element: html.get("#numbers"),
    create(number){
        const button = document.createElement("li")
        button.setAttribute("class", "page-item")
        button.setAttribute("role", "button")

        const childButton = document.createElement("div")
        childButton.setAttribute("class", "page-link")
        childButton.innerHTML = number

        if (state.page == number){
            button.classList.add("active")
        }

        button.addEventListener("click", (event) => {
            const page = event.target.innerText

            controls.goTo(page)
            update()
        } )

        buttons.element.appendChild(button)
        button.appendChild(childButton)
    },
    update(){
        buttons.element.innerHTML = ""

        const {maxLeft, maxRight} = buttons.calculateMaxVisible()

        for (let page = maxLeft; page <= maxRight; page++){
            buttons.create(page)
        }
    },
    calculateMaxVisible(){
        const {maxVisibleButtons} = state
        let maxLeft = (state.page - Math.floor(maxVisibleButtons/2))
        let maxRight = (state.page + Math.floor(maxVisibleButtons/2))   

        if (maxLeft < 1){
            maxLeft = 1
            maxRight = maxVisibleButtons
        }

        if (maxRight > state.totalPage){
            maxLeft = state.totalPage - (maxVisibleButtons - 1)
            maxRight = state.totalPage

            if (maxLeft < 1) maxLeft = 1
        }
        
        return {maxLeft, maxRight}
    }
}


function update(){
    list.update()
    buttons.update()
}

function init(){
update()
controls.createListeners()
}

init()

}

if (itens.length > 0){
    paginacao()
}