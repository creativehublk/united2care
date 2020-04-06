<?php
include_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';

// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;

$no = 1;
$columns = array( 
// datatable column index  => database column name
	0 => 'username', 
	1 => 'date',
	2 => 'id',
    3 => 'action',
    4 => 'description',
    5 => 'user_agent',
    6 => 'ip_address'
);

// getting total number records without any search
$sql = "SELECT au.*, user.`username` FROM `audit_trail` AS au LEFT JOIN `admin` AS user ON user.`id` = au.`user_id` ";

$query=mysqli_query($localhost, $sql) or die("No Data");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = $sql;

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( `username` LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR `date` LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR `id` LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR `ip_address` LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR `action` LIKE '".$requestData['search']['value']."%' )";
}

$query = mysqli_query($localhost, $sql) or die("No Data");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($localhost, $sql) or die("No Data");

$data = array();

while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	
        $nestedData[] = $row["username"];
        $nestedData[] = Date("d M,Y", strtotime($row["date"]));
		$nestedData[] = Date("h :i a", strtotime($row["date"]));
		$nestedData[] = $row["action"];
        $nestedData[] = $row["description"];
        $nestedData[] = $row["ip_address"];
        $nestedData[] = $row["user_agent"];
	
    	$data[] = $nestedData;
    
}




$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
