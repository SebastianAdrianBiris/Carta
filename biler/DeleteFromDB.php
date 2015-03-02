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
$post_id = $_POST['element'];
if(isset($post_id) )

{  delete_post_meta($post_id, 'cardetails');
    wp_delete_post( $post_id);}

else{
    foreach($_POST['vals']as $IdToBeDeleted){
        delete_post_meta($IdToBeDeleted, 'cardetails');
        wp_delete_post( $IdToBeDeleted);
    }}

