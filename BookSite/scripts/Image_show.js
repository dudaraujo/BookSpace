
$(function(){
    $('.upload').change(function(){
      const file = $(this)[0].files[0]
      const fileReader = new FileReader()
      fileReader.onloadend = function(){
        $('#show_img').attr ('src', fileReader.result)
      }
      fileReader.readAsDataURL(file)
    })
})

