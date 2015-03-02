<?php

include('dbConnect.php');
$connection = db_connect();

$type=$_POST['Brand'];
// Create connection

$sql1 = "SELECT post_id FROM wp_postmeta WHERE meta_key='Brands' and meta_value LIKE '%$type%'";
$query = mysqli_query($connection, $sql1);
$row = mysqli_fetch_row($query);

if($row == null) {


    $sql = "SELECT meta_value, post_id FROM wp_postmeta WHERE meta_key='Brands'" ;
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query, MYSQL_ASSOC);
    $postid = $row["post_id"];
    $cardetails = unserialize($row["meta_value"]);


    $cardetails.array_push($cardetails,$type);

    $location = $_SERVER['DOCUMENT_ROOT'];
    include($location . '/wp-load.php');
    include($location . '../../wp-includes/post.php');


    update_post_meta((int)$postid, 'Brands', $cardetails );
    echo "updated";
    // row not found, do stuff...
} else {
    echo "not updated";
}
$connection->close();



