
<?php 

$cat = 0; // category id 0 means no category selected   this only sub category
$page = 1; // pagination  default at 1st page
$sort_type = "latest";
$category_name = "All Posts";

$search_keyword_view = '';

if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET['search'])){
        
        if(!is_numeric($_GET['search']) && (strlen(trim($_GET['search'])) > 0) ){
            
            $search_keyword = strtolower(NumberValidation($con,$_GET['search']));
        }
        
    }
    

    if(isset($_GET['cat'])){
        $cat = checkNumeric($_GET['cat'],$con);
    } // check category end 

    if(isset($_GET['category'])){
        $category_name = $_GET['category']; // just show
    } // check category end 


    if(isset($_GET['page'])){
        $page = checkNumeric($_GET['page'],$con);

        if($page < 1){
            $page = 1;
        } // check if less than 1 set page equal to 1

    } // check page if end 


} // request method



$select_all_posts_query = "SELECT * FROM `ad_posts` AS p ";

$select_all_posts_query .= " WHERE p.`status` = '1' AND p.`approve` = '1' ";

// If Category
if($cat > 0 && (is_numeric($cat)) ){
    $select_all_posts_query .= " AND p.`sub_cat_id` = '$cat' ";
}

// If cat > 0 means category selected so filter by categories
if(isset($search_keyword)){

    $search_keyword_view = $search_keyword;
    
    $select_all_posts_query .= " AND p.`name` LIKE '%$search_keyword%' ";

}


// Order 
switch($sort_type){
    case 'latest':
        $sort_column = 'p.`created`';
        $sort_order = "DESC";
        break;

    case 'oldest':
        $sort_column = 'p.`created`';
        $sort_order = "ASC";
        break;
    
    case 'low_price':
        $sort_column = 'price.`sale_price`';
        $sort_order = "ASC";
        break;

    case 'high_price':
        $sort_column = 'price.`sale_price`';
        $sort_order = "DESC";
        break;
    
    case 'name_asc':
        $sort_column = 'p.`name`';
        $sort_order = "ASC";
        break;

    case 'name_desc':
        $sort_column = 'p.`name`';
        $sort_order = "DESC";
        break;

    default: 
        $sort_column = 'p.`id`';
        $sort_order = "DESC";

} // switch end


// this for pagination
$select_t_producst = mysqli_query($con,$select_all_posts_query);
$total_num_products = mysqli_num_rows($select_t_producst);

// per page only 12 products
$per_page = 18;

$total_pages = ceil($total_num_products/$per_page); // this for pagination reference check product pagination page

if($page > $total_pages){
    $page = $total_pages;
}

if($page <= 0 ){
    $page = 1;
}

$limit_start = $per_page*($page-1);

//-----------------------------------------------------------------------------------------------------------------------

$select_posts_last_query = $select_all_posts_query." LIMIT $limit_start, $per_page ";

$select_posts = mysqli_query($localhost, $select_posts_last_query);
$select_posts = mysqli_query($con,$select_posts_last_query);

?>



<!-- hidden form form for filter  -->
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" class="hide" id="f_form" name="f_form">
        
    <input type="hidden" id="f_search" name="search" value="<?php echo $search_keyword_view ?>">
    <input type="text" name="page" id="page_no" value="<?php echo $page ?>">
    <input type="text" name="cat" id="page_cat_id"  value="<?php echo $cat ?>">
    <input type="text" name="category" id="page_category_name"  value="<?php echo $category_name ?>">

</form>
