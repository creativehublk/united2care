
if ($(".news_events_details_img").length) {
    $(".news_events_details_img").slick({
        infinite: true,
        autoplay: true,
        adaptiveHeight: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        // centerMode: true,
    });
} // Slider

$('.change_page_no').on('click', function(e){
    var page = $(this).data('value');
    $('#filter_page').val(page);
    $('#filter_form').submit();
});