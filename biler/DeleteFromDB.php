<?php
/**
 * Created by PhpStorm.
 * User: Majd
 * Date: 14/02/2015
 * Time: 4:57 PM
 */


$location = $_SERVER['DOCUMENT_ROOT'];
include($location . '/wp-load.php');
include($location . '../../wp-includes/post.php');
$path = 'includes/test/';


$post_id = $_POST['element'][0];


if(isset($post_id) )

{

    $image1 = $_POST['element'][1];
    $image2 = $_POST['element'][2];
    $image3 = $_POST['element'][3];
    $image4 = $_POST['element'][4];

    if($image1 != "white.png")
    {
        unlink($path . $image1);
    }
    if($image2 != "white.png")
    {
        unlink($path . $image2);
    }
    if($image3 != "white.png")
    {
        unlink($path . $image3);
    }
    if($image4 != "white.png")
    {
        unlink($path . $image4);
    }
    delete_post_meta($post_id, 'cardetails');
    wp_delete_post( $post_id);


}

else{

    $deleteElements = $_POST['deleteValues'];


    for ($i = 0; $i <= count($deleteElements); ++$i){

        $currentarray = $deleteElements[$i];
        for ($x = 0; $x <= count($currentarray); ++$x){

            $IdToBeDeleted = $currentarray[0];


            $image1 = $currentarray[1];
            $image2 = $currentarray[2];
            $image3 = $currentarray[3];
            $image4 = $currentarray[4];

            if($image1 != "white.png")
            {
                unlink($path . $image1);
            }
            if($image2 != "white.png")
            {
                unlink($path . $image2);
            }
            if($image3 != "white.png")
            {
                unlink($path . $image3);
            }
            if($image4 != "white.png")
            {
                unlink($path . $image4);
            }


            delete_post_meta($IdToBeDeleted, 'cardetails');
            wp_delete_post( $IdToBeDeleted);

        }
    }
    }

