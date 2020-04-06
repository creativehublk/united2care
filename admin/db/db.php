<?php 

date_default_timezone_set("Asia/Kolkata");

define("HOST","localhost");
define("DB","doublexl_dxl");
define("UNAME","root");
define("PSWD","");

// define("HOST","localhost");
// define("DB","doublexl_dxl");
// define("UNAME","doublexl_dxl");
// define("PSWD","Dbi79s9");


class dbConnector {
    private $localhost;
    private $database;
    private $username;
    private $password;
    private $select,$fetch,$tempswd,$user_id;

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

    function checkAdminLogin($l,$d,$u,$p){
        $this->localhost = $l;
        $this->database = $d;
        $this->user_id = $u;
        $this->password = $p;

        $this->select = mysqli_query($this->localhost,"SELECT `username`,`user_id`,`rand_pswd` FROM `admin_login` WHERE `user_id`= '$this->user_id' ORDER BY `id` DESC LIMIT 0,1  ");
        if(mysqli_num_rows($this->select) == 1 ){
            $this->fetch = mysqli_fetch_array($this->select);
            $this->tempswd = $this->fetch['rand_pswd'];
            $this->username = $this->fetch['username'];
            
            if (password_verify($this->password,$this->tempswd) ){
                return array( 'username' => $this->username , 'access' => 1 );
            }else{
                return array( 'username' => $this->username , 'access' => $this->password );
            } // Password Verification END

        }else{
            return array( 'username' => $this->username , 'access' => 0 );
        } // Check Numbers Of rows

    } // checkAdminLogin Function end

}


$dbObj = new dbConnector();
$connect = $dbObj -> connection(HOST,DB,UNAME,PSWD);

$con =  $connect['connection'];
$database = $connect['db'];

define('CURRENCY','LKR');

?>