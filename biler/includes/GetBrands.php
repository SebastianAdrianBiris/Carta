<?php
header('Content-Type: text/html; charset=utf-8');
include('dbConnect.php');
$connection = db_connect();

$sql = "SELECT meta_value, post_id FROM wp_postmeta WHERE meta_key='Brands'" ;
$query = mysqli_query($connection, $sql);



$row = mysqli_fetch_array($query, MYSQL_ASSOC);
$postid = $row["post_id"];
$cardetails = unserialize($row["meta_value"]);
$connection->close();

echo json_encode($cardetails);