<?php 
class dbConnector {
    private $localhost;
    private $database;
    private $username;
    private $password;

    function connection($l,$d,$u,$p){

        $this->localhost = $l;
        $this->database = $d;
        $this->username = $u;
        $this->password = $p;

        $connect_host = mysqli_connect($this->localhost,$this->username,$this->password);
        $select_db = mysqli_select_db($connect_host,$this->database);

        $connection_arr = array('connection' => $connect_host, 'db' => $select_db);

        if($connect_host && $select_db){
            return $connection_arr;
        }else{
            return mysqli_error($this->localhost);
        }
    } //Connection Function End

}


$dbObj = new dbConnector();
// $connect = $dbObj -> connection(HOST,DB,UNAME,PSWD);
$connect = $dbObj -> connection(HOST,DB,UNAME,PSWD);


$localhost =  $connect['connection'];
$database = $connect['db'];



class DBOperations{

    private $localhost,$database;
    private $table,$select,$insert,$update,$query;
    private $column,$data,$arr,$where;
    private $result,$result_array;


    public function __construct($host,$db){
        $this->localhost = $host;
        $this->database = $db;
    }

    public function getIp($ip = null, $deep_detect = TRUE){
        // function to get ip address
            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                $ip = $_SERVER["REMOTE_ADDR"];
                if ($deep_detect) {
                    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
            } else {
                $ip = $_SERVER["REMOTE_ADDR"];
            }
            return $ip;
    } //getIp functio end 

    public function getGlobalData(){

        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $ip_address = DBOperations::getIp();
        $expiry_date = Date("Y-m-d", strtotime(" +10 Days "));
        $rand_key = mt_rand(10000,99999);

        return array(
            'rand_key'=> $rand_key,
            'user_agent' => $user_agent,
            'ip_address' => $ip_address,
            'expiry_date' => $expiry_date
        );

    } //getGlobalData function end 

    public function validateData($data){
        
        $data = mysqli_real_escape_string($this->localhost, trim($data));
        
        return $data;

    } //validateData

    public function validateDataArray($arr){

        $this->arr = $arr;

        if(is_array($this->arr)){


            foreach($this->arr as $key => $value) {
                if(is_array($value)){

                    foreach($value as $sub_key => $sub_value) {

                        if(!is_array($value)){
                            
                            $this->arr[$sub_key] = mysqli_real_escape_string($this->localhost, trim($sub_value) );

                        }else{

                            $this->arr[$sub_key] = $sub_value;

                        } // inside array if end

                    } // inside foreach end

                }else{
                    
                    $this->arr[$key] = mysqli_real_escape_string($this->localhost, trim($value) );

                } // check array or not end
                
            } // fioreach end
        } // if check array

        return $this->arr;

    } //validateDataArray

    public function loginAdmin($loginarr){

        $arr = DBOperations::validateDataArray($loginarr);

        $username = $arr['username'];
        $password = $arr['password'];

        $this->select = mysqli_query($this->localhost,"SELECT `password`,`id`,`level` FROM `admin` WHERE `username`='$username' ");
        $this->fetch = mysqli_fetch_array($this->select);

        $pswd_verify = 0;
        if(password_verify($password,$this->fetch['password'])){
            // verified 
            $pswd_verify = 1;

            //Insert history
            $getGlobalData = DBOperations::getGlobalData();
            $user_agent = $getGlobalData['user_agent'];
            $ip_address = $getGlobalData['ip_address'];
            $expiry_date = $getGlobalData['expiry_date'];
            $rand_key = $getGlobalData['rand_key'];
            $user_id = $this->fetch['id'];

            $this->arr = array(
                'user_id'=>$user_id,
                'r_key'=> password_hash($rand_key, PASSWORD_DEFAULT),
                'user_agent' => $user_agent,
                'ip_address' => $ip_address,
                'expiry_date' => $expiry_date
            );

            DBOperations::insertData('login_history',$this->arr);
            
            $_SESSION['admin_user_id'] = $user_id;
            $_SESSION['admin_r_key'] = $rand_key;
            $_SESSION['admin_name'] = $username;
            $_SESSION['admin_level'] = $this->fetch['level'];

        } // password veriy if end 

        return array('result'=>$pswd_verify);

    } //loginUser function end 

    public function logout(){ }

    public function checkLogin($checkArr){

        $arr = DBOperations::validateDataArray($checkArr);

        $admin_user_id = 0;
        $r_key = 0;
        $access_code = 10;

        $key_verify = 0;

        if(isset($_SESSION['admin_user_id'])){
            $admin_user_id = $_SESSION['admin_user_id'];
            $r_key = $_SESSION['admin_r_key'];
            $access_code = $checkArr['page_level_code'];
        

        
            $today = Date("Y-m-d H:i:s");
            $yesterday = Date("Y-m-d H:i:s", strtotime("-24 hours"));

            $this->select = mysqli_query($this->localhost,"SELECT lH.`r_key`, aD.`level`
                            FROM `login_history` AS lH 
                            INNER JOIN `admin` AS aD ON aD.`id` = lH.`user_id` 
                            WHERE lH.`user_id`='$admin_user_id' AND (lH.`created` BETWEEN '$yesterday' AND '$today')  ORDER BY lH.`id` DESC LIMIT 0,1  ");
            $this->fetch = mysqli_fetch_array($this->select);

            //if(password_verify($r_key,$this->fetch['r_key']) && $this->fetch['level'] <= $access_code ){
                
                // verified 
                $key_verify = 1;

            //} // password veriy if end 

        }

        return $key_verify;


    } //checkLogin

    public function auditTrails($auditArr){

        $user_id = BLOG_USER_ID;

        $action = $auditArr['action'];
        $desc = $auditArr['description'];

        $getGlobalData = DBOperations::getGlobalData();
        $user_agent = $getGlobalData['user_agent'];
        $ip_address = $getGlobalData['ip_address'];

        $insertArr = array(
            'user_id' => $user_id,
            'action' => $action,
            'description' => $desc,
            'user_agent' => $user_agent,
            'ip_address' => $ip_address
        );
        $this->insertData('audit_trail', $insertArr);

    }

    //Insert Function 
    public function insertData($t,$arr){

        $arr = DBOperations::validateDataArray($arr);

        $this->table = $t;
        $this->column = array_keys($arr);
        $this->data = array_values($arr);

        $this->column = implode(" , ",$this->column);
        $this->data = implode("','",$this->data);

        
        $this->query = "INSERT INTO `$this->table` ( $this->column ) VALUES('$this->data') ";

        $this->insert = mysqli_query($this->localhost,$this->query);
        
        if($this->insert){

            // If inserted Get Last Data Id
            $select_last_data = mysqli_query($this->localhost, "SELECT `id` FROM `$this->table` ORDER BY `id` DESC LIMIT 0, 1 ");
            $fetch_last_data_id = mysqli_fetch_array($select_last_data);

            $this->result = 1;
            $this->result_array['inserted_id'] = $fetch_last_data_id['id'];
            $this->result_array['message'] = "Inserted Successfully";

        }else{

            $this->result = 0;
            $this->result_array['message'] = $this->query.' |Query End: '.mysqli_error($this->localhost);

        }

        $this->result_array['result'] = $this->result;

        return $this->result_array;

    } // get all refeence function over

    //Query Update Function
    public function updateData($t, $arr, $where = null){
    
        $arr = DBOperations::validateDataArray($arr);
        $where = DBOperations::validateDataArray($where);

        $this->table = $t;
        $this->data = array();
        foreach($arr as $field => $val) {
            $this->data[] = "$field = '$val'";
        }

        $this->where = array();
        if(is_array($where)){

            foreach($where as $column => $val) {
                $this->where[] = "$column = '$val'";
            }
        }

        $this->query = "UPDATE ".$this->table." SET " . join(', ', $this->data);
        
        if(count($this->where) > 0){
            $this->query .= " WHERE ". join(' AND ', $this->where);
        }

        $this->update = mysqli_query($this->localhost,$this->query);
        
        if($this->update){

            $this->result = 1;
            $this->result_array['message'] = "Updated Successfully";

        }else{

            $this->result = 0;
            $this->result_array['message'] = mysqli_error($this->localhost);
            $this->result_array['query'] = $this->query;

        }

        $this->result_array['result'] = $this->result;

        return $this->result_array;
        
    } // query update 

    public function deleteBYId($t,$whereArr){
        $this->table = $t;
        $where = DBOperations::validateDataArray($whereArr);

        $this->where = array();
        foreach($where as $column => $val) {
            $this->where[] = "$column = '$val'";
        }

        $this->query = "DELETE FROM ".$this->table." WHERE ". join(', ', $this->where) ." ";

        $delete = mysqli_query($this->localhost, $this->query);
        
        if($delete){

            $this->result = 1;
            $this->result_array['message'] = "Deleted Successfully";

        }else{

            $this->result = 0;
            $this->result_array['message'] = mysqli_error($this->localhost);

        }

        $this->result_array['result'] = $this->result;

        return $this->result_array;
        

    } // Delete end

    public function numbRows($t,$whereArr){
        $this->table = $t;
        $where = DBOperations::validateDataArray($whereArr);

        $this->where = array();
        foreach($where as $column => $val) {
            $this->where[] = "$column = '$val'";
        }

        $this->query = "SELECT `id` FROM ".$this->table;

        if(count($this->where) > 0){
            $this->query .= " WHERE ". join(' AND ', $this->where);
        }

        $select = mysqli_query($this->localhost, $this->query);
        $numRows = mysqli_num_rows($select);

        return $numRows;
        

    } // Delete end

    public function deleteImage($fullPath){

        if(file_exists($fullPath)){
            unlink($fullPath);
        }


    }//deleteImage

} // DBOperations Class End 

$dbOpertionsObj = new DBOperations($localhost,$database);


?>