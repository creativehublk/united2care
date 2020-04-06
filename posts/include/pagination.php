<?php
    if($total_num_products > 0){ ?>

    <div class="pagination-wrapper pagination-wrapper-left">
        <ul class="pg-pagination">
            <li>
                <a href="#" aria-label="Previous" class="change_page_no" data-value="<?php echo ($page-1) ?>">
                    <i class="fi ti-angle-left"></i>
                </a>
            </li>

            <?php 
                for($i = 1; $i <= $total_pages; $i++){ ?>

                <li class="<?php echo doactive($i,$page) ?>"><a href="#" class="change_page_no" data-value="<?php echo $i ?>"><?php echo $i ?></a></li>

            <?php } ?>

            <li>
                <a href="#" aria-label="Next" class="change_page_no" data-value="<?php echo ($page+1) ?>">
                    <i class="fi ti-angle-right"></i>
                </a>
            </li>
        </ul>
    </div>

<?php } ?>

<p>Showing <?php echo $limit_start+1 ?>–<?php echo ($limit_start)+$per_page ?> of <?php echo $total_num_products ?> results</p>
