const imgs= document.querySelector("div#imgs")


$(function(){
    $('.upload').change(function(){
      teste()
    })
})

$(function(){
  $('.upload').ready(function(){
    teste()
  })
})

function teste(){
  imgs.innerHTML = ""
  const count =  $('.upload')[0].files.length

  for (i = 0; i<count; i++){
  const file = $('.upload')[0].files[i]
  const fileReader = new FileReader()
  fileReader.onloadend = function(){

    var img = document.createElement("img")
    img.setAttribute("class", "img-thumbnail")
    img.setAttribute("id", "show_img")

    $(img).attr ('src', fileReader.result)
    imgs.appendChild(img)

  }
  fileReader.readAsDataURL(file)
}
}