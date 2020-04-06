<?php
include_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['create_admin_user'])){
        
        $result = 0;
        $message = "Failed to create new admin user";

        $user_type_level = $_POST['user_type'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $insertArr = array(
            'username'=>$username,
            'password' => $password,
            'level' => $user_type_level,
            'status' => 1
        );

        $insertArr = $dbOpertionsObj->validateDataArray($insertArr);

        $insertArr['password'] = password_hash($insertArr['password'], PASSWORD_DEFAULT);

        $DBresult = $dbOpertionsObj->insertData('admin', $insertArr);

        if($DBresult['result'] == 1){

            $auditArr = array(
				'action' => 'Create New Admin User',
				'description' => 'New admin user has been created'
			);
            $dbOpertionsObj->auditTrails($auditArr);

            $result = 1;
            $message = "New admin user has been created successfully";
        }


        echo json_encode(array('result' => $result, 'message'=>$message));

    } //isset

    // change master password
    if(isset($_POST['change_admin_password'])){

        $result = 0;
        $message = "Failed to update the password";

        $id = $_POST['change_admin_password'];
        $new_password = mysqli_real_escape_string($localhost, trim($_POST['new_password']) );
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);

        $dataArr = array('password'=>$new_password);
        $dataWhere = array('id'=>$id);
        $DBresult = $dbOpertionsObj->updateData('admin', $dataArr, $dataWhere);

        if($DBresult['result'] == 1){

            $auditArr = array(
				'action' => 'Change admin password',
				'description' => 'Admin user passwod has been changed'
			);
            $dbOpertionsObj->auditTrails($auditArr);


            $result = 1;
            $message = "User password has been updated successfully";
        }

        echo json_encode(array('result' => $result, 'message'=>$message));

    } // chnage admin user password  // change_admin_password


    // change master password
    if(isset($_POST['change_master_password'])){

        $result = 0;
        $message = "Failed to update the password";

        $id = $_POST['change_master_password'];
        $new_password = mysqli_real_escape_string($localhost, trim($_POST['new_password']) );
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);

        $dataArr = array('password'=>$new_password);
        $dataWhere = array('id'=>$id);
        $DBresult = $dbOpertionsObj->updateData('password_master', $dataArr, $dataWhere);

        if($DBresult['result'] == 1){

            $auditArr = array(
				'action' => 'Change master Password',
				'description' => 'Master operation password has been changed'
			);
            $dbOpertionsObj->auditTrails($auditArr);

            $result = 1;
            $message = "Mater password has been updated successfully";
        }

        echo json_encode(array('result' => $result, 'message'=>$message));

    } // chnage master password  // change_master_password




    // Delete Admin USer

    if(isset($_POST['delete_admin'])){
        $admin_id = $_POST['id'];

        $result = 0;
        $message = "Failed to delete admin user";

        $whereArr = array('id'=>$admin_id);
        $DBresult = $dbOpertionsObj->deleteBYId('admin', $whereArr);

        if($DBresult['result'] == 1){

            $auditArr = array(
				'action' => 'Delete Admin User',
				'description' => 'Admin user has been deleted successfully'
			);
            $dbOpertionsObj->auditTrails($auditArr);

            $result = 1;
            $message = "admin user has been deleted successfully";
        }


        echo json_encode(array('result' => $result, 'message'=>$message));

    } // Delete Admin

}// Post Method

?>