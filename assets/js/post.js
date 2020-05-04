if ($(".post_slider").length) {
    $(".post_slider").slick({
        infinite: true,
        autoplay: true,
        adaptiveHeight: true,
        slidesToShow: 2,
        dots: true,
        slidesToScroll: 1,
        centerMode: true,
        responsive: [
            {
            breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
} // Slider

function submitForm(){
    $("#f_form").submit();
}

//page no chnage
$(".change_page_no").on('click',function(e){
    e.preventDefault();

    var pageNo = $(this).data('value');

    $("#page_no").val(pageNo);

    submitForm();
    
});


// Post Comment
$(document).on("click",'.submit_formcomment',function(e){
    
    e.preventDefault();

    var form = $(this).parents('form');
    var button = form.find('.disableOnSubmit');
    var messageField = form.find('.message p');
    var formData = new FormData(form[0]);

    var successShow = form.parents('.modal-content').find('.successShow');
    var referenceNo = form.parents('.modal-content').find('#requestNo');
    var successHide = form.parents('.modal-content').find('.successhide');

    button.prop('disabled', true);

    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: formData,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {

            if(response['result'] == 1){

                messageField.removeClass('text-danger');
                messageField.addClass('text-success');
                messageField.html(response.message);

                $('#comment_box').prepend(response.post);
                
                form.find('input').val('');
                form.find('textarea').empty();

            }else{
                console.error(response);
                messageField.removeClass('text-success');
                messageField.addClass('text-danger');
                messageField.html(response.message);
            }

        }, // success
        error:function(err){
            console.error(err);
            messageField.removeClass('text-success');
            messageField.addClass('text-danger');
            messageField.html('Failed to send the email');

            setTimeout(function(){
                messageField.html('');
                button.prop('disabled', false);
            }, 1000)
        } 
    }); // ajax end 

});
