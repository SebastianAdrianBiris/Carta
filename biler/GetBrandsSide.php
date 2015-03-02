<?php

include('includes/dbConnect.php');
$connection = db_connect();
$sql = "SELECT meta_value, post_id FROM wp_postmeta WHERE meta_key='Brands'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query, MYSQL_ASSOC);
$postid = $row["post_id"];
$cardetails = unserialize($row["meta_value"]);
$old = "old";
$ny = "ny";
echo '<li>';
echo "<a href='#' type='button'  onclick='myFunctionGetStatus(1,$ny)' style='font-size: 12px; color: white; text-align:right;'>NYE BILER </a><br/>";

echo '</li>';
echo '<li>';
echo "<a href='#' type='button'  onclick='myFunctionGetStatus(1,$old)' style='font-size: 12px; color: white; text-align:right;'>BRUGTE BILER </a><br/>";
echo '</li>';

for ($i = 0; $i < count($cardetails); $i++) {
    echo '<li>';

    echo "<a type='button' onclick='myFunctionGetStatus(1,$cardetails[$i])' href='#' >$cardetails[$i] </a><br />";
    echo '</li>';
}
$connection->close();