<div class="posts_category_menu">
    
    <div class="category_box <?php echo doactive(0, $cat) ?>">
        <a href="<?php echo URL ?>posts">
            <!-- <i class="fa fa-paperclip"></i> -->
            <h4>All</h4>
        </a>
    </div>

    <?php foreach ($sub_categories_array as $key => $sub_cat) { ?>
        
        <div class="category_box <?php echo doactive($sub_cat['id'], $cat) ?>">
            <a href="<?php echo $sub_cat['url'] ?>">
                <h4><?php echo $sub_cat['name'] ?></h4>
            </a>
        </div>

    <?php } ?>

</div>