
$(document).on("click",'.submit_form_no_confirm',function(){

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

                successHide.hide(200);

                if (typeof response['referenceNo'] != "undefined") {
                    referenceNo.html(response['referenceNo']);
                }

                successShow.removeClass('hide');

            }else{
                console.error(response);
                messageField.removeClass('text-success');
                messageField.addClass('text-danger');
                messageField.html(response.message);
            }

            setTimeout(function(){
                messageField.html('');
                button.prop('disabled', false);
            }, 1000)

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



if($('.submit_form_no_confirm').length){
    $('.submit_form_no_confirm').parents('form').submit(function(e){
        e.preventDefault();
        // $(this).find('.submit_form_no_confirm').click();
    });
} //submit_form_no_confirm end