<?php
ob_start();
include 'lib/session.php';
Session::init();
include_once("db_connect.php");
if(!empty($_POST['rating']) && !empty($_POST['itemId'])){
	$itemId = $_POST['itemId'];
	$userID = Session::get('customer_id');		
	
	
	$insertRating = "INSERT INTO item_rating (productId, userId, ratingNumber, title, comments, created, modified) VALUES ('".$itemId."', '".$userID."', '".$_POST['rating']."', '".$_POST['title']."', '".$_POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
	mysqli_query($conn, $insertRating) or die("database error: ". mysqli_error($conn));		
	echo "rating saved!";
}
?>