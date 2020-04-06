function displayPriceStockDetails(price_Id){
    var priceId = price_Id;
    var url = 'ajax/product_handler.php';

    $("#modal_stock_details_table").loading();

    var tbody = $("#modal_stock_details_table_tbody");

    var singleTrClone = tbody.find('tr:first-child').clone();
    //remove all other Rows
    tbody.find('tr').remove();
    tbody.append(singleTrClone);

    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {
            'get_price_min_stock_details' : priceId
        },
        success: function(ret){

            var stockDetailsArray = ret.stock_details;
            
            if(stockDetailsArray.length > 0){
                
                $.each(stockDetailsArray, function(key, index){
                    
                    var appendThis = tbody.find('tr:first-child').clone();
                    appendThis.find('.table_warehouse_name').text(index.warehouse);
                    appendThis.find('.product_single_qty_form').val(index.qty);
    
                    appendThis.find('.product_single_btn_update_form').val(index.stock_id);
                    appendThis.find('.product_single_btn_delete_form').val(index.stock_id);
    
                    tbody.append(appendThis);

                });
                

            }else{
                // No stock were added show show some message
                var appendThis = tbody.find('tr:first-child').clone();
                appendThis.find('.table_warehouse_name').text('Please add some stock to update');
                appendThis.find('.product_single_qty_form').val(0);

                appendThis.find('.product_single_btn_update_form').val(0);
                appendThis.find('.product_single_btn_delete_form').val(0);

                tbody.append(appendThis);
            }

            
            // After clone done remove this 
            tbody.find('tr:first-child').remove();
            $("#modal_stock_details_table").loading('stop');

        },
        error:function(err){
            console.log(err);
            $("#modal_stock_details_table").loading('stop');
        }
    });

} //displayStockDetails

function updateProStock(e){

    var stockId = $(e).val();
    var url = 'ajax/product_handler.php';
    var qty = $(e).parents('.product_single_qty_group_form').find('.product_single_qty_form').val();

    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {
            'update_price_stock' : stockId,
            'qty' : qty
        },
        success:function(ret){
            console.log(ret);

            Notifications('Stock has been updated', 'success');

            var priceId = ret.price_id;
            displayPriceStockDetails(priceId);

        },//success
        error:function(err){
            console.log(err);
            Notifications('Failed to update the stock', 'error');
        } //error
    });

} //updateProStock

function deleteProStock(e){
    var stockId = $(e).val();
    var url = 'ajax/product_handler.php';

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
                        url: url,
                        data: {'delete_price_stock' : stockId },
                        dataType: 'json',
                        success: function (response) {
                            
                            if(response['result'] == 1){

                                notifyMessage(response['message'],"Success", 1);

                                var priceId = response.price_id;
                                displayPriceStockDetails(priceId);

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



} //deleteProStock


function displayProductDetails(price_id){

    var priceId = price_id;
    $("#add_new_product_price_id").val(priceId);
    var url = 'ajax/product_handler.php';

    displayPriceStockDetails(priceId);

    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {
            'get_price_basic_details' : priceId
        },
        success:function(ret){

            $('.stock_modal_product_name').text(ret.name);
            $('.stock_update_header h3').text(ret.size);
            

            if(ret.color_type == "texture"){
                
                $('.stock_update_header img').attr('src', ret.texture);
                $('.stock_update_header img').show();
                $('.stock_update_header span').hide();

            }else{
                //if not texture
                //put bg color
                $('.stock_update_header img').hide();
                $('.stock_update_header span').show();
                $('.stock_update_header span').css('background', ret.color_code);
            }
        },
        error:function(err){
            console.log(err);
        }
    });

} //displayProductDetails

function displayProductPriceDetails(priceId){
    var priceId = priceId;
    $("#edit_product_price_id").val(priceId);
    var url = 'ajax/product_handler.php';

    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {
            'get_price_basic_details' : priceId
        },
        success:function(ret){

            $("#price_update_actual_price_form").val(ret.final_price);
            // $("#price_update_discount_type_form").val(ret.discount_type);
            $("#price_update_discount_form").val(ret.discount);
            $("#price_update_sale_price_form").val(ret.sale_price);

            $("#price_update_pro_artist_price").val(ret.artist_price)
            $("#price_update_pro_com_amount").val(ret.com_amount)

            $('.stock_modal_product_name').text(ret.name);
            $('.stock_update_header h3').text(ret.size);
            

            if(ret.color_type == "texture"){
                
                $('.stock_update_header img').attr('src', ret.texture);
                $('.stock_update_header img').show();
                $('.stock_update_header span').hide();

            }else{
                //if not texture
                //put bg color
                $('.stock_update_header img').hide();
                $('.stock_update_header span').show();
                $('.stock_update_header span').css('background', ret.color_code);
            }
        },
        error:function(err){
            console.log(err);
        }
    });

} //displayProductPriceDetails


// Submit form without lconfirm dialog
$(document).on("click",'.submitProStock',function(e){
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

    var priceId = $("#add_new_product_price_id").val();

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
                // form.find('input').val('');
                displayPriceStockDetails(priceId);

            }else{

                notifyMessage(response['message'],"Failed", 0);
            }

            $(form).loading('stop');

        }, // success
        error:function(err){
            console.log('err');
            console.log(err);
            notifyMessage('Please try again later',"Failed", 0);
            // alert(err)
            $(form).loading('stop');
        } 
    }); // ajax end 


});



// Submit form without lconfirm dialog
$(document).on("click",'.submitProPriceChange',function(e){
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

    var priceId = $("#edit_product_price_id").val();

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
                // form.find('input').val('');
                

            }else{

                notifyMessage(response['message'],"Failed", 0);
            }

            $(form).loading('stop');

        }, // success
        error:function(err){
            console.log('err');
            console.log(err);
            notifyMessage('Please try again later',"Failed", 0);
            // alert(err)
            $(form).loading('stop');
        } 
    }); // ajax end 


});

function calculateProductPrice(){

    var actualPrice = $("#pro_actual_price").val();
    var discountType = $("#pro_price_dis_type").val();
    var discountVal = $("#pro_discount_value").val();

    let artistPriceField = $("#pro_artist_price");
    let proComAmountField = $("#pro_com_amount");
    let commission_percentage = $("#commission_percentage").val();

    proSalePrice = 0;

    artistPrice = parseFloat(actualPrice);
    artistPriceField.val(artistPrice);

    // calculate Commission
    commissionAmount = parseFloat((artistPrice/100) * commission_percentage);
    proComAmountField.val(commissionAmount);

    var finalPrice = commissionAmount+artistPrice;
    // calculating final discount Per
    var percentageValue = 0;
    if(discountType == "%"){
        percentageValue = parseFloat((finalPrice/100) * discountVal);
    }else if(discountType == "/"){
        percentageValue = parseFloat(discountVal);
    }else{
        percentageValue = parseFloat((finalPrice/100) * discountVal);
    }
    
    // calculating final discount subtotal
    proSalePrice = ( parseFloat(commissionAmount) + parseFloat(artistPrice) ) - parseFloat(percentageValue) ;
    $("#pro_sale_price").val(proSalePrice);

} //calculateProductPrice


function modalCalculateProductPrice(){

    var actualPrice = $("#price_update_actual_price_form").val();
    var discountType = $("#price_update_discount_type_form").val();
    var discountVal = $("#price_update_discount_form").val();

    let artistPriceField = $("#price_update_pro_artist_price");
    let proComAmountField = $("#price_update_pro_com_amount");
    let commission_percentage = $("#commission_percentage").val();

    proSalePrice = 0;

    artistPrice = parseFloat(actualPrice);
    artistPriceField.val(artistPrice);

    // calculate Commission
    commissionAmount = parseFloat((artistPrice/100) * commission_percentage);
    proComAmountField.val(commissionAmount);

    var finalPrice = commissionAmount+artistPrice;
    // calculating final discount Per
    var percentageValue = 0;
    if(discountType == "%"){
        percentageValue = parseFloat((finalPrice/100) * discountVal);
    }else if(discountType == "/"){
        percentageValue = parseFloat(discountVal);
    }else{
        percentageValue = parseFloat((finalPrice/100) * discountVal);
    }
    
    // calculating final discount subtotal
    proSalePrice = ( parseFloat(commissionAmount) + parseFloat(artistPrice) ) - parseFloat(percentageValue) ;
    $("#price_update_sale_price_form").val(proSalePrice);

} //modalCalculateProductPrice

function deleteProductPrice(price_Id){
    var priceId = price_Id;
    var url = 'ajax/product_handler.php';

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
                        url: url,
                        data: {'delete_price_row' : priceId },
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            if(response['result'] == 1){

                                notifyMessage(response['message'],"Success", 1);
                                window.location = window.location;

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

} //deleteProductPrice