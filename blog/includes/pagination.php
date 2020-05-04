<?php 
    if($total_num_rows > 0){ ?>

    <div class="pagination-wrapper pagination-wrapper-left">
        <ul class="pg-pagination">

            <?php 
            for($i = 1; $i <= $pages; $i++){ ?>

                <li class="<?php echo doactive($i,$current_pages) ?>"><a href="#" class="change_page_no" data-value="<?php echo $i ?>"><?php echo $i ?></a></li>

            <?php  } ?>
        </ul>
    </div>

    <br><br>

<?php } ?>