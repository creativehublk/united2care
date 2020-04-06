<?php

include_once '../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
include_once ROOT_PATH.'/db/db.php';

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$no = 1;
$columns = array( 
// datatable column index  => database column name
	0 => 'name',
    1 => 'cause',
    2 => 'email',
    3 => 'phone',
	4 => 'message',
	5 => 'created'
);


// getting total number records without any search
$sql = "SELECT * FROM `requested_cause` ";

$query = mysqli_query($con, $sql) or die("No Data");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = $sql;

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( `name` LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR `email` LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR `cause` LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR `phone` LIKE '".$requestData['search']['value']."%' )";
}

$query=mysqli_query($con, $sql) or die("No Data");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$query=mysqli_query($con, $sql) or die("No Data");

$data = array();

while( $row = mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	
		$nestedData[] = '<a href="view_req_cause.php?pro_id='.$row["id"].'">'.$row["cause"].'</a>';
		$nestedData[] = $row['name'];
        $nestedData[] = $row["email"];
		$nestedData[] = $row["phone"];
		$nestedData[] = $row['message'];
		$nestedData[] = Date("d M, Y h:i", strtotime($row['created']));
	
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
