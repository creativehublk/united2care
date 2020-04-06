<?php 
include_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';

require_once ROOT_PATH.'/assets/vendors/validation/gump.class.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){


    if(isset($_POST['create_post'])){

        $result = 0;
        $error = 0;
        $message = "Failed to create the post";
        $redirectUrl = null;

        $desc = $_POST['dsc'];

        $gump = new GUMP();
        $_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

        $gump->validation_rules(array(
            'name' => 'required',
            'sub_category' => 'required',
        ));
        
        $gump->filter_rules(array(
            'name' => 'trim',
            'sub_category' => 'trim',
        ));
        
        $validated_data = $gump->run($_POST);

        if($validated_data === false) {
            
            $error = $gump->get_errors_array(true);
            $message = "Please fill all the required fields";

        }else{
            // validation end insert data
            $insertData = $validated_data;
            
            
            $insertData = array(
                'name' => $validated_data['name'],
                'description' => $desc,
                'thumb' => 0,
                'sub_cat_id' => $validated_data['sub_category'],
                'approve' => 1,
                'status' => 1,
                'verify' => 1
            );

            $DBResult = $dbOpertionsObj->insertData('ad_posts', $insertData);
            
            $error = $DBResult;
            if($DBResult['result']){

                $post_id = $DBResult['inserted_id'];
                $redirectUrl = URL.'admin/posts/images.php?id='.$post_id;

                $result = 1;
                $message = 'New post '.$validated_data['name'].' has been created';

                $auditArr = array(
                    'action' => 'Create Post',
                    'description' => $message
                );

                $dbOpertionsObj->auditTrails($auditArr);

            }// db check result end


        } // validation check

        
        echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error) );


    }// create Lead isset


    // Edit Cause
    if(isset($_POST['update_post'])){

        $result = 0;
        $error = 0;
        $message = "Failed to update the post";
        $redirectUrl = null;

        $desc = $_POST['dsc'];

        $gump = new GUMP();
        $_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

        $gump->validation_rules(array(
            'name' => 'required',
            'update_post' => 'required',
            'sub_category' => 'required',
        ));
        
        $gump->filter_rules(array(
            'name' => 'trim',
            'update_post' => 'trim',
            'sub_category' => 'trim',
        ));
        
        $validated_data = $gump->run($_POST);

        if($validated_data === false) {
            
            $error = $gump->get_errors_array(true);
            $message = "Please fill all the required fields";

        }else{
            // validation end insert data
            $insertData = $validated_data;
            
            $post_id = $validated_data['update_post'];
            
            $updateData = array(
                'name' => $validated_data['name'],
                'description' => $desc,
                'sub_cat_id' => $validated_data['sub_category'],
            );

            $DBResult = $dbOpertionsObj->updateData('ad_posts', $updateData, array('id' => $post_id));
            
            $error = $DBResult;
            if($DBResult['result']){

                $result = 1;
                $message = 'Post '.$validated_data['name'].' has been updated';

                $auditArr = array(
                    'action' => 'Edit Post',
                    'description' => $message
                );

                $dbOpertionsObj->auditTrails($auditArr);

            }// db check result end


        } // validation check

        
        echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error, 'redirectURL'=>$redirectUrl) );


    }// create Lead isset


    if(isset($_POST['delete'])){

        if($_POST['delete'] == "delete_post"){

            $result = 0;
            $error = 0;
            $message = "Failed to delete the post";
            $redirectUrl = null;


            $gump = new GUMP();
            $_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

            $gump->validation_rules(array(
                'id' => 'required|numeric'
            ));
            
            $gump->filter_rules(array(
                'id' => 'trim|sanitize_numbers'
            ));
            
            $validated_data = $gump->run($_POST);

            if($validated_data === false) {
                
                $error = $gump->get_errors_array(true);
                $message = "Please tray again, or contact the administrator";

            }else{

                $post_id = $validated_data['id'];
                
                $delete = $dbOpertionsObj->delete('posts', array(
                    'id' => $post_id
                ));

                $result = 1;
                $message = "Post has been deleted successfully";
                $error = $delete;
            }

            echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error) );

        } // check delete lead if end

        if($_POST['delete'] == 'delete_post_comment'){


            $result = 0;
            $error = 0;
            $message = "Failed to delete the post comment";
            $redirectUrl = null;


            $gump = new GUMP();
            $_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

            $gump->validation_rules(array(
                'id' => 'required|numeric'
            ));
            
            $gump->filter_rules(array(
                'id' => 'trim|sanitize_numbers'
            ));
            
            $validated_data = $gump->run($_POST);

            if($validated_data === false) {
                
                $error = $gump->get_errors_array(true);
                $message = "Please tray again, or contact the administrator";

            }else{

                $post_id = $validated_data['id'];
                
                $delete = $dbOpertionsObj->delete('ad_post_comments', array(
                    'id' => $post_id
                ));

                $result = 1;
                $message = "Post comment has been deleted successfully";
                $error = $delete;
            }

            echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error) );

        } // Delete Post COmment end 

    }// delete lead


    if(isset($_POST['update_verification'])){

        $id = $_POST['id'];

        $select = mysqli_query($con, "SELECT `verify`, `id`, `name` FROM `ad_posts` WHERE `id` = '$id' ");
        $fetch = mysqli_fetch_array($select);

        $result = 0;
        $message = "Failed to chnage verification of ".$fetch['name'];
        
        $approved = 1;
        if($fetch['verify'] == 1){
            $approved = 0;
        }
        $updateData = array(
            'verify' => $approved,
        );
        $whereArray = array(
            'id' => $id
        );
        $DBResult = $dbOpertionsObj->updateData('ad_posts', $updateData, $whereArray);

        $error = $DBResult;
        if($DBResult['result']){

            $result = 1;
            $message = "Post ".$fetch['name']." verification update has been done";

        }// db check result end


        echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error) );

    } //update_verification

    if(isset($_POST['update_show_hide'])){


        $id = $_POST['id'];

        $select = mysqli_query($con, "SELECT `status`, `id`, `name` FROM `ad_posts` WHERE `id` = '$id' ");
        $fetch = mysqli_fetch_array($select);

        $result = 0;
        $message = "Failed to chnage ".$fetch['name'].' update';
        
        $approved = 1;
        if($fetch['status'] == 1){
            $approved = 0;
        }
        $updateData = array(
            'status' => $approved,
        );
        $whereArray = array(
            'id' => $id
        );
        $DBResult = $dbOpertionsObj->updateData('ad_posts', $updateData, $whereArray);

        $error = $DBResult;
        if($DBResult['result']){

            $result = 1;
            $message = "Post ".$fetch['name']." update has been done";

        }// db check result end


        echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error) );

    } //update_show_hide

} // post method



?>
