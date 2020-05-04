<?php
include_once '../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    function typeImg($type){

        switch ($type){
            case 'phone':
                return 'phone';
            break;

            case 'email':
                return 'envelope';
            break;

            case 'fb':
                return 'facebook';
            break;

            case 'twitter':
                return 'twitter';
            break;

            case 'insta':
                return 'instagram';
            break;

            case 'address':
                return 'map-marker';
            break;

            case 'link':
                return 'link';
            break;

            case 'time':
                return 'hourglass';
            break;
        }

    } //typeImg

    if(isset($_POST['loadPosts'])){
        
        $result = 0;
        $message = "Failed to create new admin user";
        $category_id = (int) mysqli_escape_string($localhost, trim($_POST['category_id']));
        $city_id = (int) mysqli_escape_string($localhost, trim($_POST['city_id']));
        $page = (int) mysqli_escape_string($localhost, trim($_POST['page']));

        $postsArray = array();
        $postContainer = file_get_contents(ROOT_PATH.'includes/container/singlePost.html');

        $select_query = "SELECT post.*, subC.`name` as category FROM `ad_posts` AS post  ";
        $select_query .= " INNER JOIN `ref_sub_categories` AS subC ON subC.`id` = post.`sub_cat_id` ";

        if($city_id > 0){
            $select_query .= " INNER JOIN `ad_post_cities` AS cities ON cities.`city_id` = '$city_id' AND cities.`ad_post_id` = post.`id` ";
        }

        $select_query .= " WHERE post.`status` = '1' ";

        if($category_id > 0){
            $select_query .= " AND post.`sub_cat_id` = $category_id ";   
        }
        $select_query .= " ORDER BY post.`id` DESC ";

        $select_t_producst = mysqli_query($localhost, $select_query);
        $total_num_products = mysqli_num_rows($select_t_producst);

        $per_page = 12;
        $total_pages = ceil($total_num_products/$per_page); // this for pagination reference check product pagination page
        if($page > $total_pages){
            $page = $total_pages;
        }

        if($page <= 0 ){
            $page = 1;
        }

        $limit_start = $per_page*($page-1);

        //-----------------------------------------------------------------------------------------------------------------------

        $select_posts_last_query = $select_query." LIMIT $limit_start, $per_page ";


        $select_posts = mysqli_query($localhost, $select_posts_last_query);
        while($fetch_posts = mysqli_fetch_array($select_posts)){ 

            $post_id = $fetch_posts['id'];
            $postUrl = URL.'post?q='.$post_id.'&p='.urlencode(strtolower($fetch_posts['name']));
            $select_img = mysqli_query($localhost, "SELECT * FROM `ad_post_images` WHERE `ad_post_id` = '$post_id' ORDER BY `id` ASC LIMIT 0, 1 ");
            $fetch_img = mysqli_fetch_array($select_img);

            $thumbnail_image = 0;
            if(strlen($fetch_img['name']) > 0){
                if(file_exists(ROOT_PATH."admin/uploads/posts/".$fetch_img['name'])){
                    $thumbnail_image = URL."admin/uploads/posts/".$fetch_img['name'];
                }
            }
            

            $tempPostContainer = $postContainer;

            if($thumbnail_image !== 0){
                $tempImg = '<img class="post_img" src="'.$thumbnail_image.'" alt="">';
                $tempPostContainer = str_replace("{{ IMG }}", $tempImg, $tempPostContainer);
            }else{
                $tempPostContainer = str_replace("{{ IMG }}", '', $tempPostContainer);
            }

            if($fetch_posts['verify'] == 0){
                $tempPostContainer = str_replace("{{ VERIFIED }}", 'hide', $tempPostContainer);
            }

            $tempPostContainer = str_replace("{{ ID }}", $post_id, $tempPostContainer);
            $tempPostContainer = str_replace("{{ TITLE }}", $fetch_posts['name'], $tempPostContainer);
            $tempPostContainer = str_replace("{{ PUBLISH_DATE }}", Date("d M, Y", strtotime($fetch_posts['created'])), $tempPostContainer);

            $locations = array();
            $select_locations = mysqli_query($localhost, "SELECT c.`name` FROM `ad_post_cities` AS apc INNER JOIN `cities` AS c ON c.`id` = apc.`city_id` WHERE apc.`ad_post_id` = '$post_id' ");
            while($fetch_locations = mysqli_fetch_array($select_locations)){
                array_push($locations, $fetch_locations['name']);
            }
            $locations = implode(" / ",$locations);
            if(strlen($locations) > 23){
                $locations = substr($locations, 0, 23).'...';
            }

            $tempPostContainer = str_replace("{{ CATEGORY }}", $fetch_posts['category'], $tempPostContainer);
            $tempPostContainer = str_replace("{{ LOCATIONS }}", $locations, $tempPostContainer);

            $phoneNumbers = array();
            $select_phone_nos = mysqli_query($localhost, "SELECT * FROM `ad_post_list` WHERE `ad_post_id` = '$post_id' AND `type` = 'phone' ORDER BY `id` ASC LIMIT 0,2 ");
            while($fetch_phone_no = mysqli_fetch_array($select_phone_nos)){
                
                array_push($phoneNumbers, '<h5>'.trim($fetch_phone_no['detail']).'</h5>');

            }
            $phoneNumbers = implode(" <span>&nbsp;/&nbsp;</span> ", $phoneNumbers);
            $tempPostContainer = str_replace("{{ PHONE }}", $phoneNumbers, $tempPostContainer);

            array_push($postsArray, $tempPostContainer);


        } // While End 


        $paginationConatainer = file_get_contents(ROOT_PATH.'includes/container/pagination.html');
        $paginationHtml = '';
        for($i = 1; $i <= $total_pages; $i++){
            $tempPagination = $paginationConatainer;

            if($i == $page){
                $tempPagination = str_replace('{{ ACTIVE }}', 'active', $tempPagination);
            }
            $tempPagination = str_replace('{{ ACTIVE }}', '', $tempPagination);
            
            $tempPagination = str_replace('{{ NO }}', $i, $tempPagination);

            $paginationHtml .= $tempPagination;

        } // Pagination 
        

        $dataArray = array(
            'posts' => $postsArray,
            'pagination' => $paginationHtml
        );
        
        echo json_encode(array('result' => $result, 'message'=>$message, 'data' => $dataArray));

    } //isset


    if(isset($_POST['fetch_post_content'])){

        $post_id = (int) trim($_POST['post_id']);

        $select_post = mysqli_query($localhost, "SELECT * FROM `ad_posts` WHERE `id` = '$post_id' ");
        $fetch_post = mysqli_fetch_array($select_post);

        $post_id = $fetch_post['id'];
        $postUrl = URL.'post?q='.$post_id.'&p='.urlencode(strtolower($fetch_post['name']));

        $images_series = array();
        $select_img = mysqli_query($localhost, "SELECT * FROM `ad_post_images` WHERE `ad_post_id` = '$post_id' ORDER BY `id` ASC ");
        while($fetch_img = mysqli_fetch_array($select_img)) {

            if(strlen($fetch_img['name']) > 0){
                if(file_exists(ROOT_PATH."admin/uploads/posts/".$fetch_img['name'])){
                    $thumbnail_image = URL."admin/uploads/posts/".$fetch_img['name'];
                    array_push($images_series, '<img src="'.$thumbnail_image.'" alt="'.$fetch_post['name'].'">');
                }
            }
            
        } // Post Img Fetch Done

        $verified = 0;
        if($fetch_post['verify'] == '1'){
            $verified = 1;
        }

        $locations = array();
        $select_locations = mysqli_query($localhost, "SELECT c.`name` FROM `ad_post_cities` AS apc INNER JOIN `cities` AS c ON c.`id` = apc.`city_id` WHERE apc.`ad_post_id` = '$post_id' ");
        while($fetch_locations = mysqli_fetch_array($select_locations)){
            array_push($locations, $fetch_locations['name']);
        }
        $locations = implode(" / ",$locations);

        $post_list = '';
        $select_post_list = mysqli_query($localhost, "SELECT * FROM `ad_post_list` WHERE `ad_post_id` = '$post_id' ORDER BY `id` ASC ");
        while($fetch_post_list = mysqli_fetch_array($select_post_list)){
            $post_list .= '<li>
                            <i class="fa fa-'.typeImg($fetch_post_list['type']).'"></i>
                            '.$fetch_post_list['detail'].'
                            </li>';
        } // While END

        $postUrl = URL.'post?q='.$post_id.'&p='.urlencode(strtolower($fetch_post['name']));

        $dataArray = array(
            'title' => $fetch_post['name'],
            'images' => $images_series,
            'desc' => $fetch_post['description'],
            'verify' => $verified,
            'post_date' => Date("d M, Y", strtotime($fetch_post['created'])),
            'post_locations' => $locations,
            'post_list' => $post_list,
            'url' => $postUrl
        );

        echo json_encode($dataArray);

    } //fetch_post_content


}// Post Method

?>