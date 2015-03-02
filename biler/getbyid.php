

<?php
/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 13-Feb-15
 * Time: 12:20 PM
 */
include('includes/dbConnect.php');
$connection = db_connect();
if(isset($_POST['name']))
{
    $id = $_POST['name'];

// Do whatever you want with the $uid
}

$sql = "SELECT meta_value FROM deleleasing_dk_db.wp_postmeta WHERE post_id='".$id. "'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

$cardetails=$row['meta_value'];
    $cardetails=unserialize($cardetails);

echo  json_encode($cardetails);

}
} else {
echo "0 results";
}
$connection->close();
