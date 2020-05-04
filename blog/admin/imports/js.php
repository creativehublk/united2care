<script>
    const ROOT_URL = "<?php echo URL ?>";
</script>

<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<!-- Tiny Mice Text Editor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.5/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.5/themes/silver/theme.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script src="<?php echo URL ?>blog/admin/assets/js/toast.js"></script>

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
<!-- Loading Js Custom -->
<script src="<?php echo URL ?>blog/admin/assets/js/loadingOverly.js?v=<?php echo VERSION?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="<?php echo URL ?>blog/admin/assets/js/confirmDialogBox.js?v=<?php echo VERSION?>"></script>

<!-- Ajax Form Submission General Functions -->
<script src="<?php echo URL ?>blog/admin/assets/js/form_submission/form_ajax_submission.js?v=<?php echo VERSION?>"></script>


<script>

    // $('.select2').select2();
    $('.datepicker').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
    });
    /*Tinymce editor*/
    if ($(".tinyMceEditor").length) {
        tinymce.init({
            selector: '.tinyMceEditor',
            height: 500,
            theme: 'silver',
            setup: function (editor) {
                editor.on('blur', function () {
                    editor.save();
                    // tinymce.triggerSave(); 
                });
            },
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
            image_advtab: false,
            content_css: []
        });
    }


    function dataTableGeneral() {
        
        if ($.fn.DataTable.isDataTable('#datatableGeneralOne') ) {
            $('#datatableGeneralOne').DataTable().destroy();
        }

        $(document).ready(function() {
            
            var actionUrl = $("#datatableGeneralOne").data('url');
            
            var dataTable = $('#datatableGeneralOne').DataTable( {
                    "pageLength": 10,
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                            url : actionUrl,
                            data: { 
                                'usersList': 'yes' 
                            },
                            type: "POST",  // method  , by default get
                            error: function(err){  // error handling
                                    console.log(err);
                                    $(".datatableGeneralOne-error").html("");
                                    $("#datatableGeneralOne").append('<tbody class="datatableGeneralOne-error"><tr><th colspan="3">No Data Available </th></tr></tbody>');
                                    $("#datatableGeneralOne_processing").css("display","none");
                            } // ERROR FUNCTION 
                    } // ajax end
                    
            } );

            $("#sort").click();
            $("#sort").click();
        } ); // document end

    } // dataTableGeneral


    
    function readURL(input, $thisI) {

        var imgPreviewTag = $(input).parents('.img_upload_preview_box').find('.img_preview');

        if(input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                imgPreviewTag.attr('src', e.target.result);
            }


            reader.readAsDataURL(input.files[0]);
        }

    } // function end 

        $(".image_upload").change(function(e) {

            readURL(this, $(this));

        }); // 

        $(".img_preview_label").on('click', function(){
            $(this).parents('.img_upload_preview_box').find('.image_upload').click();
        })


        $('.select2').select2();

</script>