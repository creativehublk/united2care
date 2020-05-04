<div class="wpo-case-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h2 class="reveal-slow">GET READY, STAY READY</h2>
                    <p>Check out these places that will give you everything you need in a single click, plus more great basic essentials for a well-stocked quarantine period!</p>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="row">
                <div class="posts_category_menu home-category">
            
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <select id="category_home_id" class="form-control select2" onchange="loadPosts()">
                                <option value="0">All Categories</option>

                                <?php foreach ($sub_categories_array as $key => $sub_cat) { ?>

                                    <option value="<?php echo $sub_cat['id'] ?>"><?php echo $sub_cat['name'] ?></option>

                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <select id="city_id" class="select2" onchange="loadPosts()">
                                <option value="0">All Cities</option>
                                <?php  
                                $select_city = mysqli_query($localhost, "SELECT c.* FROM `cities` AS c "); 
                                while($fetch_cities = mysqli_fetch_array($select_city)){ ?>

                                    <option value="<?php echo $fetch_cities['id'] ?>"><?php echo $fetch_cities['name'] ?></option>

                                <?php } // WHile ?>
                            </select>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="wpo-case-wrap">

            <div class="col-lg-12 posts_home" id="load_post_here">

            </div>

            <div class="col-lg-12">
                <?php include_once ROOT_PATH.'includes/postPagination.php' ?>
            </div>

        </div>


        <div class="col-lg-12 text-center">
            <br>
            <a href="<?php echo URL ?>submit_post" target="_blank"> <span class="theme-btn"> <i class="fa fa-send"></i> Post Now</span> </a>
        </div>

    </div>
</div>