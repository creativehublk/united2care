$(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

  });

  function readURL(input) {

    var imgTag = $(input).parents(".img-preview-box").find('.img-preview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            imgTag.attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
} // function end 

function showPreview(e){
    readURL(e);
}


