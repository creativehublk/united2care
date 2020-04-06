<?php include_once '../../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php
$checkArr = array(
    'page_level_code' => 2
);
$checkAccess = $dbOpertionsObj->checkLogin($checkArr);

if($checkAccess == 1){ ?>


<?php 

$cause_id = 0;
if(isset($_GET['id'])){
    $cause_id = $_GET['id'];
}// check isset

$images_array = array();
$select_all_images = mysqli_query($con,"SELECT * FROM `causes_images` WHERE `cause_id`='$cause_id' ORDER BY `id` ASC ");
while($fetch_all_images = mysqli_fetch_array($select_all_images)){

    array_push($images_array,array(
        'image' => URL.'admin/uploads/causes/'.$fetch_all_images['name'],
        'id' => $fetch_all_images['id']
    ));

}

array_push($images_array,array(
    'image' => '',
    'id' => 0
));

?>

<!DOCTYPE html>
<html>
    <head>
    <?php require_once ROOT_PATH.'admin/imports/admin_meta.php' ?>

        <?php require_once ROOT_PATH.'admin/imports/css.php' ?>

    </head>

    <body class="hold-transition skin-black-light layout-top-nav">

        <?php include ROOT_PATH.'admin/imports/menu.php'; ?>

        <div class="wrapper">

            <div class="container">
                
                <div class="title">
                    <h3>Add images for your cause</h3>
                </div>  <!-- ./ title -->

                <div class="box box-primary">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-12">

                            <form class="forms-sample" id="create_product_form"
                                    data-action-after=2
                                    data-redirect-url="<?php echo URL ?>admin/causes/view_cause.php?pro_id=<?php echo $cause_id ?>"
                                    method="POST"
                                    action="<?php echo URL ?>admin/causes/ajax/update_images.php">
                                        
                                <div class="add-more-images">
                                    <div class="row">
                                        
                                        <?php  
                                        foreach ($images_array as $key => $value) { ?>
                                            
                                            <div class="col-xs-12 col-md-3 gallery-box">

                                                <div class="text-center gallery-img-box">
                                                    <button class="btn btn-sm btn-danger fa fa-trash-o delete-gallery" type="button" onclick="removeRow(this)"> </button>
                                                    <img src="<?php echo $value['image'] ?>" class="img-responsive img-preview">
                                                </div>

                                                <div class="form-group">
                                                    <label for="upload-img"></label>
                                                    <input type="file" name="gallery-img[]" id="upload-img" onchange="showPreview(this)">
                                                    <input type="hidden" name="image_id_if_exist[]" value="<?php echo $value['id'] ?>">
                                                </div>
                                                
                                            </div>
                                            
                                        <?php } ?>

                                    </div>

                                </div>


                                <div class="col-xs-12 col-md-3 gallery-box">
                                    <div class="text-center gallery-img-box">
                                        <img src="https://via.placeholder.com/1500x1961.png?text=1500px+X+1961px" class="img-responsive" alt="">
                                    </div>

                                    <div class="text-center">
                                        <br>
                                        <button class="btn btn-lg btn-primary" onclick="addMoreSides()" type="button">Add More Images</button>
                                    </div>

                                </div>


                                <div class="col-xs-12">
                                
                                    <input type="hidden" name="update_product_id" value="<?php echo $cause_id ?>" >
                                    <br>
                                    <button type="button" value="Update" class="btn btn-success btn-lg pull-right submit_form_no_confirm" data-validate=0>Update</button>

                                </div>


                            </form>


                            </div>  <!-- ./ col-12 -->

                        </div> <!-- ./ row -->

                    </div> <!-- ./ box body -->
                </div> <!-- ./ box -->
            </div>  <!-- ./ container -->

        </div> <!-- ./ wrapper -->

        <?php include ROOT_PATH.'admin/imports/footer.php'; ?> 
    </body>

    <?php require_once ROOT_PATH.'admin/imports/js.php' ?>


    <script>

        function addMoreSides(){
            var clone = $('.add-more-images .gallery-box:last-child').clone();
            var appendTo = $('.add-more-images');
            clone.find('img').attr('src','');
            clone.find('input').val('');
            clone.appendTo(appendTo);
        } // addMoreSides();

        function removeRow(e){
            var rowCount = $('.add-more-images .gallery-box').length;
            
            if( Number(rowCount) > 1 ){
                $(e).parents('.gallery-box').remove();
            }
            
        } // removeRow();

        function readURL(input) {

            var imgTag = $(input).parents(".gallery-box").find('.img-preview');

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



        $(document).on("click",'.update_gallery_btn',function(e){
            
            e.preventDefault();
            

            var form = $(this).parents('form');

            var formData = new FormData(form[0]);

            // $("#loading").show();

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
                            // notifyMessage("Success",response['message'],"success","fa fa-check");
                        }else{
                            // notifyMessage("Failed",response['message'],"danger","fa fa-exclamation");
                        }
                        
                        // $("#loading").hide();
                }, // success
                error:function(err){
                    console.error(err);
                }
            }); // ajax end 
        });


    </script>


</html>

<!-- If Access Denied  -->
<?php }else{ ?>

<script>
    window.location = '<?php echo URL ?>admin/accounts/login.php';    
</script>

<?php    
} ?>
<!-- If Access Denied End -->