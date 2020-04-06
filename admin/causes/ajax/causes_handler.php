<?php 
include_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';

require_once ROOT_PATH.'/assets/vendors/validation/gump.class.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){


    if(isset($_POST['create_cause'])){

        $result = 0;
        $error = 0;
        $message = "Failed to create the cause";
        $redirectUrl = null;

        $desc = $_POST['dsc'];

        $gump = new GUMP();
        $_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

        $gump->validation_rules(array(
            'name' => 'required'
        ));
        
        $gump->filter_rules(array(
            'name' => 'trim',
            'description' => 'trim',
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
            );

            $DBResult = $dbOpertionsObj->insertData('causes', $insertData);
            
            $error = $DBResult;
            if($DBResult['result']){

                $cause_id = $DBResult['inserted_id'];
                $redirectUrl = URL.'admin/causes/images.php?id='.$cause_id;

                $result = 1;
                $message = 'New cause '.$validated_data['name'].' has been created';

                $auditArr = array(
                    'action' => 'Create Cause',
                    'description' => $message
                );

                $dbOpertionsObj->auditTrails($auditArr);

            }// db check result end


        } // validation check

        
        echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error, 'redirectURL'=>$redirectUrl) );


    }// create Lead isset


    // Edit Cause
    if(isset($_POST['edit_cause'])){

        $result = 0;
        $error = 0;
        $message = "Failed to edit the cause";
        $redirectUrl = null;

        $desc = $_POST['dsc'];

        $gump = new GUMP();
        $_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

        $gump->validation_rules(array(
            'name' => 'required',
            'edit_cause' => 'required'
        ));
        
        $gump->filter_rules(array(
            'name' => 'trim',
            'edit_cause' => 'trim',
            'description' => 'trim',
        ));
        
        $validated_data = $gump->run($_POST);

        if($validated_data === false) {
            
            $error = $gump->get_errors_array(true);
            $message = "Please fill all the required fields";

        }else{
            // validation end insert data
            $insertData = $validated_data;
            
            $cause_id = $validated_data['edit_cause'];
            
            $updateData = array(
                'name' => $validated_data['name'],
                'description' => $desc,
            );

            $DBResult = $dbOpertionsObj->updateData('causes', $updateData, array('id' => $cause_id));
            
            $error = $DBResult;
            if($DBResult['result']){

                $result = 1;
                $message = 'Cause '.$validated_data['name'].' has been edited';

                $auditArr = array(
                    'action' => 'Edit Cause',
                    'description' => $message
                );

                $dbOpertionsObj->auditTrails($auditArr);

            }// db check result end


        } // validation check

        
        echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error, 'redirectURL'=>$redirectUrl) );


    }// create Lead isset


    if(isset($_POST['uploadThumb'])){

        $result = 0;
        $message = "Failed to changes the cause thumb";
        $error = 0;


        $cause_id = $_POST['cause_id'];
        $image_name = $_POST['image_name'];

        $select = mysqli_query($localhost, "SELECT `thumb` FROM `causes` WHERE `id` = '$cause_id' ");
        if(mysqli_num_rows($select) > 0){
            // Delete the pic if exist
            $fetch = mysqli_fetch_array($select);

            $old_thumb = ROOT_PATH.'admin/uploads/causes/thumb/'.$fetch['thumb'];
            if(file_exists($old_thumb)){
                unlink($old_thumb);
            }
        }


        // Insert new Pic
        $updateData = array(
            'thumb' => $image_name
        );

        $DBResult = $dbOpertionsObj->updateData('causes', $updateData, array('id'=>$cause_id));
        
        if($DBResult['result']){

            $result = 1;
            $message = 'Cause thumbnail has been changed';

            $auditArr = array(
                'action' => 'Update Cause Thumbnail',
                'description' => $message
            );

            $dbOpertionsObj->auditTrails($auditArr);

        }// db check result end


        echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error) );


    } //uploadThumb


    if(isset($_POST['delete'])){

        if($_POST['delete'] == "delete_causes"){

            $result = 0;
            $error = 0;
            $message = "Failed to delete the cause";
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

                $cause_id = $validated_data['id'];
                
                $delete = $dbOpertionsObj->delete('causes', array(
                    'id' => $cause_id
                ));

                $result = 1;
                $message = "Cause has been deleted successfully";
                $error = $delete;
            }

            echo json_encode( array('result'=>$result, 'message'=>$message, 'error'=>$error) );

        } // check delete lead if end

    }// delete lead

} // post method



?>
