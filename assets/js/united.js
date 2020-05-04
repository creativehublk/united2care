$('.scroll_sec').click(function(e) {
	e.preventDefault();
	let id = $(this).attr('href');
	$('html, body').animate({
		scrollTop: $(id).offset().top-80
	}, 1000);
});

if ($(".gallery-img-slider").length) {
$(".gallery-img-slider").owlCarousel({
    center: true,
    loop: true,
    autoplay: true,
    margin: 20,
    items: 4,
    responsive:{
        0 : {
            items: 1,
        },
        
        650 : {
            items: 2,
            center: false,
            margin: 10
        },
        
        992:{
            items:4
        }
    }
});
} // gallery-img-slider


// Cause Modal
$(".openCausesModal").on('click', function(e) {
    e.preventDefault();

    var causeId = $(this).data('id');

    $('#causeDetailsModal').modal('show');

    var causeMoldaTitle = $("#cause-molda-title");
    var causeModalImages = $("#cause-modal-images");
    var causeModalDesc = $("#cause-modal-desc");

    var causeModalShare = $("#cause-modal-share");

    causeModalImages.removeClass('slick-initialized slick-slider');

    causeMoldaTitle.empty();
    causeModalImages.empty();
    causeModalDesc.empty();

    // Load Modal Details
    $.ajax({
        type: 'POST',
        url: 'ajax/causeModalDetails.php',
        data: {
            'cause_id' : causeId,
            'loadCauseDetails': 'yes',
        },
        dataType: 'json',
        success: function (response) {

            console.log(response)
            causeMoldaTitle.html(response.data.title);
            causeModalImages.html(response.data.images);
            causeModalDesc.html(response.data.description);

            causeModalShare.attr('data-a2a-url', response.data.url);
            causeModalShare.attr('data-a2a-title', response.data.title);


            if ($(".causes-img-slider").length) {
                $(".causes-img-slider").slick({
                    infinite: true,
                    autoplay: true,
                    adaptiveHeight: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [
                        {
                        breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
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

        }, // success
        error:function(err){
            console.error(err);
        }
    }); // ajax end 

});

// Cause Modal Pic Preview
function addMoreSides(){
    var clone = $('.img_upload .img_upload_single:last-child').clone();
    var appendTo = $('.img_upload');
    clone.find('img').attr('src','');
    clone.find('input').val('');

    randId = Math.random();
    clone.find('label').attr('for', randId);
    clone.find('input').attr('id', randId);

    clone.appendTo(appendTo);
} // addMoreSides();

function removeRow(e){
    var rowCount = $('.img_upload .img_upload_single').length;
    
    if( Number(rowCount) > 1 ){
        $(e).parents('.img_upload_single').remove();
    }
    
} // removeRow();

function readURL(input) {

    addMoreSides();

    $(input).parents(".img_upload_single").addClass('img_added');
    var imgTag = $(input).parents(".img_upload_single").find('.img_preview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            imgTag.attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }


} // function end 

function showPreviewPic(e){
    readURL(e);
}