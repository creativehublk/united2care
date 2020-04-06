function changeProductVerification(e){


    var pId = $(e).val();

    $.ajax({

        type: 'POST',
        url: 'ajax/post_handler.php',
        data:{
            'id' : pId,
            'update_verification' : 'yes'
        },
        dataType: 'json',
        success:function(res){
            console.log(res);
            if(res.result == 1){
                // Success msg
                // notifyMessage(res['message'],"Success", 1);
            }else{
                // failed message
                notifyMessage(res['message'],"Failed", 0);
            }
        },
        error:function(err){
            console.error(err);
            // Failed message
            notifyMessage("Failed to updated the post verification info","Failed", 0);
        }

    });// ajax end 

} //changeProductVerification


function showHide(e){

    var pId = $(e).val();

    $.ajax({

    type: 'POST',
    url: 'ajax/post_handler.php',
    data:{
        'id' : pId,
        'update_show_hide' : 'yes'
    },
    dataType: 'json',
    success:function(res){
        // console.log(res);
        if(res.result == 1){
            // Success msg
            // notifyMessage(res['message'],"Success", 1);
        }else{
            // failed message
            notifyMessage(res['message'],"Failed", 0);
        }
    },
    error:function(err){
        console.error(err);
        // Failed message
        notifyMessage("Failed to updated the product","Failed", 0);
    }

    });// ajax end 

} //showHide()