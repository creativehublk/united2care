function uploadsThumbnail(imageName){

    let supplierId = $("#sub_cat_id").val();
    var postUrl = ROOT_URL+'admin/categories/ajax/cat_handler.php';
    $.ajax({
        type: 'POST',
        url: postUrl,
        data: {
            'sub_cat_id' : supplierId,
            'image_name' : imageName,
            'uploadSubCatCover' : 'yes',
        },
        dataType: 'json',
        success:function(res){
            console.log(res);
        },
        error:function(err){
            console.error(err);
        }

    });

} //uploadsThumbnail


var cropImagePhpFile = '../../assets/vendors/croppic/php/croppedImageSave.php';
var imageSaveDirectory = 'admin/uploads/category_banner/';

var croppicHeaderOptions = {
        
        cropData:{
            'saveDirectory': ROOT_PATH+imageSaveDirectory,
            'img_quality': 80
        },
        cropUrl: cropImagePhpFile,
        customUploadButtonId:'cropContainerHeaderButton',
        modal:true,
        processInline:true,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
        onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
        onImgDrag: function(){ console.log('onImgDrag') },
        onImgZoom: function(){ console.log('onImgZoom') },
        onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
        onAfterImgCrop:function(res){
            
            
            var imageFullUrl = ROOT_URL+imageSaveDirectory+res.newName;

            $('#croppic').find('.croppedImg').attr('src', imageFullUrl);
            $(".product_details_thumb_view_box").find('img').attr('src', imageFullUrl);
            console.log(res.newName);
            // Update DB
            uploadsThumbnail(res.newName);

        },
        onReset:function(){ console.log('onReset') },
        onError:function(errormessage){ console.log('onError:'+errormessage) }
}	
var croppic = new Croppic('croppic', croppicHeaderOptions);