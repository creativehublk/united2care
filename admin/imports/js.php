    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- <script src="dist/js/img.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation-datepicker/1.5.6/js/foundation-datepicker.min.js"></script>

    <!-- notifier -->

    <script>
    let ROOT_PATH = '<?php echo ROOT_PATH ?>';
    let ROOT_URL = '<?php echo URL ?>';
    </script>
    
    
    <script src="<?php echo URL ?>admin/assets/js/bootstrap-notify.min.js"></script>

    <!-- End custom js for this page-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-easy-loading@1.3.0/dist/jquery.loading.min.js"></script>
    
    <!-- Jquery Confir -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <!-- custom function for initialize -->
    <script src="<?php echo URL ?>admin/assets/js/function.js"></script>

    <!-- Charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


    <!-- Ajax Form Submission General Functions -->
    <script src="<?php echo URL ?>admin/assets/js/form_ajax_submission.js"></script>
    

    <script>
    $(".select2").select2();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tinymce@5.0.12/tinymce.min.js"></script>

    <script>
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
    </script>