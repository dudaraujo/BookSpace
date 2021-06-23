var form = document.getElementById("esco")
 
input = document.getElementById("input")

function link(li){
    input.value = li + 1
    form.submit()
}