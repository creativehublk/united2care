    function Notifications(msg,type){
        $.notify({
            // options
                icon: 'glyphicon glyphicon-send',
                message: msg 
            },{
                // settings
                type: type
        });

    } // Notifications end 


    function notifyMessage(message,title = null, status = null){

        switch (status) {
            case 1:
                $.confirm({
                    title: title,
                    theme: 'material',
                    content: '<h6>'+message+'</h6>',
                    type: 'green',
                    buttons: {
                        
                        close: {
                            text: 'Close', // With spaces and symbols
                            
                        }
                        
                    }
                });
                break;

            case 0:
                $.confirm({
                    title: title,
                    theme: 'material',
                    content: '<h6>'+message+'</h6>',
                    type: 'red',
                    icon: 'fa fa-warning',
                    buttons: {
                        
                        close: {
                            text: 'Close', // With spaces and symbols
                            
                        }
                        
                    }
                });
                break;
        
            default:
                $.confirm({
                    title: title,
                    theme: 'material',
                    content: '<h6>'+message+'</h6>',
                    buttons: {
                        
                        close: {
                            text: 'Close', // With spaces and symbols
                            
                        }
                        
                    }
                });
                break;
        }

    }


    function validUrl(url){
        url_validate = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
        if(url_validate.test( url )){
            return true;
        } else {
            return false;
        }
    }

    function afterSuccess(key, url){

        // IF actionAfterSuccess == 0 => No Action
        // IF actionAfterSuccess == 1 => No Refresh Same Page
        // IF actionAfterSuccess == 2 => Redirect to the given url
        switch(key){
            case 0:
                //No Action
            break;

            case 1:
                //Redirect same page
                window.location = window.location.href;
            break;

            case 2:

                if(validUrl(url)){
                    window.location = url;
                }else{
                    $("#clickhereForDataTable").click()
                    // console.log("function");
                }
                
            break;

            case 3:
                // This is to click the id
                // Only #ID
                $("#"+url).click();
            break;
        }
        
    }

$(document).on("click",'.submit_form',function(){
    
    var form = $(this).parents('form');
    var doValidation = $(this).data('validate');

    if(doValidation == Number(1)){
        var formId = form.attr('id');
        var validation = $("#"+formId).valid();
    
        if(validation){
            //validation pass
            // Process to submit
        }else{
            //validation failed return to fill the form
            return false;
        }
    }// check whether do validation or not, if end

    

    var actionAfterSuccess = form.data('action-after');
    var redirectUrl = form.data('redirect-url');

    var formData = new FormData(form[0]);

    $.confirm({
        title: 'Are you sure?',
        theme: 'material',
        content: '<h6> Press confirm to process </h6>',
        buttons: {
            
            close: {
                text: 'Close', // With spaces and symbols
                
            },
            ok: {
                text: 'Confirm', // With spaces and symbols
                action: function () {
                    $(form).loading();
                    // Ajax Start
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

                                notifyMessage(response['message'],"Success", 1);
                                form.find('input').val('');
                                
                                setTimeout(function(){
                                    afterSuccess(actionAfterSuccess, redirectUrl);
                                }, 1000)

                            }else{
                                notifyMessage(response['message'],"Failed", 0);
                            }
                            $(form).loading('stop');
                        }, // success
                        error:function(err){
                            console.log(err);
                            $(form).loading('stop');
                            notifyMessage('Please try again later',"Failed", 0);
                        }
                    }); // ajax end 

                },
            }
            
        }
    });

});

// Submit form without lconfirm dialog
$(document).on("click",'.submit_form_no_confirm',function(e){
    e.preventDefault();
    var form = $(this).parents('form');

    var actionAfterSuccess = form.data('action-after');
    var redirectUrl = form.data('redirect-url');
    var formData = new FormData(form[0]);

    // form.preventdefault();
    var doValidation = $(this).data('validate');

    if(doValidation == Number(1)){
        var formId = form.attr('id');
        var validation = $("#"+formId).valid();
    
        if(validation){
            //validation pass
            // Process to submit
        }else{
            //validation failed return to fill the form
            return false;
        }
    }// check whether do validation or not, if end

    var actionAfterSuccess = form.data('action-after');
    var redirectUrl = form.data('redirect-url');
    // IF actionAfterSuccess == 0 => No Action
    // IF actionAfterSuccess == 1 => No Refresh Same Page
    // IF actionAfterSuccess == 2 => Redirect to the given url

    // Ajax Start
    $(form).loading();

    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: formData,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {

            console.log(response);

            if(response['result'] == 1){
                
                notifyMessage(response['message'],"Success", 1);

                if(actionAfterSuccess > 0){
                    form.find('input').val('');
                }
                

                if (typeof response['redirectURL'] != "undefined") {
                    redirectUrl = response['redirectURL'];
                }
                
                setTimeout(function(){
                    afterSuccess(actionAfterSuccess, redirectUrl);
                }, 1000)

            }else{

                notifyMessage(response['message'],"Failed", 0);
            }

            $(form).loading('stop');

        }, // success
        error:function(err){
            console.error(err);
            notifyMessage('Please try again later',"Failed", 0);
            // alert(err)
            $(form).loading('stop');
        } 
    }); // ajax end 


});


// delete 
function deleteItem(e){

    var dId = $(e).data('id');
    var redirectUrl = $(e).data('refresh');
    var dUrl = $(e).data('url');
    var dKey = $(e).data('key');

    var actionAfterSuccess = $(e).data('after-success');

    // Ajax
    $.confirm({
        title: 'Are you sure?',
        theme: 'material',
        content: '<h6> Press delete to process </h6>',
        type: 'red',
        buttons: {
            
            close: {
                text: 'Close', // With spaces and symbols
                
            },
            ok: {
                text: 'Delete', // With spaces and symbols
                btnClass: 'btn-red',
                action: function () {
                    $("body").loading();
                    // Ajax Start
                    $.ajax({
                        type: 'POST',
                        url: dUrl,
                        data: {'id': dId, 'delete': dKey},
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            if(response['result'] == 1){
                                
                                if (typeof response['redirectURL'] != "undefined") {
                                    redirectUrl = response['redirectURL'];
                                }

                                notifyMessage(response['message'],"Success", 1);
                                setTimeout(function(){
                                    afterSuccess(actionAfterSuccess, redirectUrl);
                                }, 1000)

                            }else{

                                notifyMessage(response['message'],"Failed", 0);
                            }

                            $("body").loading('stop');

                        }, // success
                        error:function(err){
                            console.log('err');
                            console.log(err);
                            notifyMessage('Please try again later',"Failed", 0);
                            // alert(err)
                            $("body").loading('stop');
                        }
                    }); // ajax end 

                },
            }
            
        }
    });


} //deleteItem


function singleOperations(e){


    var dId = $(e).data('id');
    var redirectUrl = $(e).data('refresh');
    var dUrl = $(e).data('url');
    var dKey = $(e).data('key');
    var actionAfterSuccess = $(e).data('after-success');
    // Ajax
    $.confirm({
        title: 'Are you sure?',
        theme: 'material',
        content: '<h6> Press confirm to process </h6>',
        type: 'dark',
        buttons: {
            
            close: {
                text: 'Close', // With spaces and symbols
                
            },
            ok: {
                text: 'Confirm', // With spaces and symbols
                btnClass: 'btn-green',
                action: function () {
                    $("body").loading();
                    // Ajax Start
                    $.ajax({
                        type: 'POST',
                        url: dUrl,
                        data: {'id': dId, 'singleOperations': dKey},
                        dataType: 'json',
                        success: function (response) {
                            
                            if(response['result'] == 1){
                                
                                if (typeof response['redirectURL'] != "undefined") {
                                    redirectUrl = response['redirectURL'];
                                }

                                notifyMessage(response['message'],"Success", 1);
                                setTimeout(function(){
                                    afterSuccess(actionAfterSuccess, redirectUrl);
                                }, 1000)

                            }else{

                                notifyMessage(response['message'],"Failed", 0);
                            }

                            $("body").loading('stop');

                        }, // success
                        error:function(err){
                            console.log('err');
                            console.log(err);
                            notifyMessage('Please try again later',"Failed", 0);
                            // alert(err)
                            $("body").loading('stop');
                        }
                    }); // ajax end 

                },
            }
            
        }
    });


} //singleOperations