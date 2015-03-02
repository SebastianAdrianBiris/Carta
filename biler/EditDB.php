<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 13/02/2015
 * Time: 11:54 AM
 */

include('includes/dbConnect.php');
$connection = db_connect();

$postid = $_POST['element'];




    $sql = "SELECT  deleleasing_dk_db.wp_postmeta.meta_value FROM deleleasing_dk_db.wp_postmeta WHERE post_id = '" .  $postid ."'";

    $Value =  $connection->query($sql);

    while($row = mysqli_fetch_assoc($Value)){



    $temp[]=$row['meta_value'] ;

    $temp=unserialize($temp[0]);
        $temp[25] = $postid;




    }


$connection->close();
echo json_encode($temp) ;








