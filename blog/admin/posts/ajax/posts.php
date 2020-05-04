<?php
require_once '../../../../app/global/url.php';
include_once ROOT_PATH.'/app/global/sessions.php';
include_once ROOT_PATH.'/app/global/Gvariables.php';
require_once ROOT_PATH.'blog/admin/db/db.php';


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$no = 1;
$columns = array( 
// datatable column index  => database column name
    0 => 'id',
	1 => 'heading',
	2 => 'created',
    3 => 'id'
);

// getting total number records without any search

$sql = "SELECT * FROM `blog_posts` WHERE `hide` = 0 ";

$query = mysqli_query($localhost, $sql) or die("../users.php: ");

$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = $sql;

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( `id` LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR `heading` LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR `created` LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR `id` LIKE '".$requestData['search']['value']."%' )";
}

$query=mysqli_query($localhost, $sql) or die("../users.php: ");

$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY  ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($localhost, $sql) or die("../users.php: ");

$data = array();
$no = $requestData['start']+1;
while( $row=mysqli_fetch_array($query) ) {  // preparing an array

	$nestedData=array(); 
    $id = $row['id'];
    $post_url = URL."blog/post?id=".$id."&news=".urlencode(strtolower(trim($row['heading'])));


    $edit_button = '<a href="'.URL.'blog/admin/posts/update.php?id='.$id.'" class="btn btn-sm btn-outline-primary"> <i class="fa fa-edit"></i> </a>';
	$delete_button = '<button class="btn btn-outline-danger btn-sm" 
						onclick="deleteItem(this)" 
						data-id="'.$id.'" 
						data-after-success = 2
						data-refresh="refreshDatatable" 
						data-url="'.URL.'blog/admin/posts/ajax/controller/deletePostController.php" 
						data-key="delete_post">
						<i class="fa fa-trash"></i> </button>';
    
    $nestedData[] = $no;
    $nestedData[] = '<a href="'.$post_url.'" target="_blank">'.$row['heading'].'</a>';
    $nestedData[] = Date("d M, Y", strtotime($row['created']));
    $nestedData[] = $edit_button.' | '.$delete_button;
    

	$data[] = $nestedData;
        $no++;
}




$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
