<?php
include_once("db_connect.php");
$sqlEvents = "SELECT id, productId, productName, customer_id ,date_order FROM order_cus LIMIT 20";
$resultset = mysqli_query($conn, $sqlEvents) or die("database error:". mysqli_error($conn));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	$start = strtotime($rows['date_order']) * 1000;
	
	$calendar[] = array(
        'id' =>$rows['id'],
         'customer' => $rows['customer_id'],
        'title' => $rows['productName'],
        "class" => 'event-important',
       'start' => "$start",
        
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>