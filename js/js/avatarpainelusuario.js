function previewsImage(){
    var imgFiled = document.querySelector('input[name=imagem_avatar]').files[0];
    var imgPreviews = document.getElementById('previewsImage');

    var reader = new FileReader();

        reader.onloadend = function(){
            imgPreviews.src = reader.result;
        }
        if(imgFiled){
            reader.readAsDataURL(imgFiled);
        }else{
            imgPreviews.src = "";
        }
}
// $(function(){
//     $('form#avatarFormAvatar').on('submit', function(e){
//         e.preventDefault();
//         var inputfields = $('#file').val();
//         console.log(inputfields);
//     })
// })