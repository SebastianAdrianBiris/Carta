<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 13/02/2015
 * Time: 11:54 AM
 */

$servername = "localhost";
$username = "colin";
$password = "bobbob";

// Create connection
$conn = new mysqli($servername, $username, $password,"deleleasing_dk_db");
// Create connection

$postid = $_POST['element'];



    mysqli_set_charset($conn,'utf8');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT  deleleasing_dk_db.wp_postmeta.meta_value FROM deleleasing_dk_db.wp_postmeta WHERE post_id = '" .  $postid ."'";

    $Value =  $conn->query($sql);

    while($row = mysqli_fetch_assoc($Value)){



    $temp[]=$row['meta_value'] ;

    $temp=unserialize($temp[0]);
        $temp[20] = $postid;




    }


  $conn->close();
echo json_encode($temp) ;








