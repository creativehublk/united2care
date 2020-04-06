<?php
if($total_num_products > 0){ 
  $page_end_limit = ($limit_start)+$per_page;
  
  if($total_num_products < $page_end_limit){
    $page_end_limit = $total_num_products;
  }

  ?>
  
  <nav>
    
    <p>Showing <?php echo $limit_start+1 ?>–<?php echo $page_end_limit ?> of <?php echo $total_num_products ?> results</p>

    <ul class="pagination">
    
    <?php 
      if($page > 1){ ?>
        <li> <a href="#" class="change_page_no" data-value="<?php echo ($page-1) ?>" ><span><span aria-hidden="true"><i class="fa fa-backward"></i></span></span></a> </li>
      <?php } ?>

      <?php  for($i = 1; $i <= $total_pages; $i++){ ?>
        <li class="<?php echo doactive($i,$page) ?>"> <a href="#" class="change_page_no" data-value="<?php echo $i ?>"><span> </span> <?php echo $i ?> </a> </li>
      <?php } ?>

      <?php 
      if($total_pages > $page){ ?>

        <li> <a href="#" class="change_page_no"  data-value="<?php echo ($page+1) ?>" ><span><span aria-hidden="true"><i class="fa fa-forward"></i></span></span> </a> </li>

      <?php } ?>

    </ul>
  </nav>

<?php } ?>