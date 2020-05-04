function loadPosts(pageNo = 1){

    var loadPostHere = $('#load_post_here');
    var categoryId = $("#category_home_id").val();
    var cityId = $("#city_id").val();
    var loadPagesHere = $("#loadPages-here");

    showDomLoading(loadPostHere);

    $.ajax({

        type: 'POST',
        url: 'ajax/postsHandler.php',
        data: {
            'category_id' : categoryId,
            'city_id' : cityId,
            'page' : pageNo,
            'loadPosts' : 'yes'
        },
        dataType: 'json',
        success:function(response) {
            loadPostHere.empty();

            $.each(response.data.posts, function(e) {
                loadPostHere.append(this);
            });

            loadPagesHere.empty();
            loadPagesHere.html(response.data.pagination);

            hideDomLoading(loadPostHere);

        }, //success
        error:function(err){
            console.error(err);
            hideDomLoading(loadPostHere);
        } //err

    });

} //loadPosts

loadPosts();

function changePage(e){
    event.preventDefault();

    var pageNo = $(e).data('value');
    
    loadPosts(pageNo);

} //changePage


// Load Post Content
function loadPostContent(e){

    var postId = $(e).data('id');
    var postTitle = $("#post-modal-title");
    var postSliderImages = $("#post-modal-images");
    var postDesc = $("#post-modal-desc");

    var postLocations = $("#post-locations");
    var postDate = $("#post-date");
    var postVerified = $("#post-verified");
    var verifiedContent = '<i class="fa fa-check-circle-o"></i> Verified';
    var postModalList = $("#post-modal-list");
    var postShareModal = $("#post-modal-share");
    
    postSliderImages.removeClass('slick-initialized slick-slider');

    postTitle.empty();
    postSliderImages.empty();
    postDesc.empty();
    postVerified.empty();
    postLocations.empty();
    postModalList.empty();

    $('#postDetailsModal').modal('show');
    
    setTimeout(() => {
        showDomLoading(postDesc);
    }, 10);

    $.ajax({

        type: 'POST',
        url: 'ajax/postsHandler.php',
        dataType: 'json',
        data: {
            'post_id' : postId,
            'fetch_post_content' : 'yes',
        },
        success:function(response){
            // console.log(response);
            postTitle.html(response.title);
            postDate.html(response.post_date);
            postLocations.html(response.post_locations);
            postModalList.html(response.post_list);

            postShareModal.attr('data-a2a-url', response.url);
            postShareModal.attr('data-a2a-title', response.title);

            if(response.verify == 1){
                postVerified.html(verifiedContent);
            }
            
            $.each(response.images, function(e){
                postSliderImages.append(this);
            });

            postDesc.html(response.desc);

            if(response.images.length > 1){
                if ($(".posts-img-slider").length) {
                    $(".posts-img-slider").slick({
                        infinite: true,
                        autoplay: true,
                        adaptiveHeight: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    });
                } // Slider
            }

            hideDomLoading(postDesc);

        },  //Success
        error:function(err){

            console.error(err);
            hideDomLoading(postDesc);

        } //Error

    });

} //loadPostContent