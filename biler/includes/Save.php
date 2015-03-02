<?php

require'../class.upload_0.32/class.upload.php';

$cli = (isset($argc) && $argc > 1);
if ($cli) {
    if (isset($argv[1])) $_GET['file'] = $argv[1];
    if (isset($argv[2])) $_GET['dir'] = $argv[2];
    if (isset($argv[3])) $_GET['pics'] = $argv[3];
}

// set variables
$dir_dest = (isset($_GET['dir']) ? $_GET['dir'] : 'test');
$dir_pics = (isset($_GET['pics']) ? $_GET['pics'] : $dir_dest);

if (!$cli && !(isset($_SERVER['HTTP_X_FILE_NAME']) && isset($_SERVER['CONTENT_LENGTH']))) {


    if ((isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : '')) == 'multiple') {
        $WhiteImage='white.png';
        $date = date('m/d/Y h:i:s a', time());
        if( $_POST['currentID']!= ""){

            $Cardetales= array($_POST['Brand'],$_POST['title'],$_POST['New_old'],$_POST['production'],$_POST['kilometer'],$_POST['price']
            ,$_POST['fuel'],$_POST['colour'],$_POST['besparelse'],$_POST['korsel'],$_POST['periode'],$_POST['permonth'],$_POST['ydelse'],$_POST['beskatningsgrundlag'], $_POST['description'],$date);


            if($_FILES['my_field']['name'][0]=="" ){
                array_push($Cardetales,$_POST['Image1']);
            }if($_FILES['my_field']['name'][1]=="" ){
                array_push($Cardetales, $_POST['Image2']);
            }if($_FILES['my_field']['name'][2]==""){
                array_push($Cardetales,$_POST['Image3']);
            }if($_FILES['my_field']['name'][3]==""){
                array_push($Cardetales,$_POST['Image4']);
            }






            $files = array();
            foreach ($_FILES['my_field'] as $k => $l) {
                foreach ($l as $i => $v) {
                    if (!array_key_exists($i, $files))
                        $files[$i] = array();
                    $files[$i][$k] = $v;
                }
            }
            foreach ($files as $file) {

                // we instanciate the class for each element of $file
                $handle = new Upload($file);

                // then we check if the file has been uploaded properly
                // in its *temporary* location in the server (often, it is /tmp)
                if ($handle->uploaded) {

                    // now, we start the upload 'process'. That is, to copy the uploaded file
                    // from its temporary location to the wanted location
                    // It could be something like $handle->Process('/home/www/my_uploads/');
                    $handle->Process($dir_dest);


                    array_push($Cardetales, $handle->file_dst_name);


                }

            }
            if ($handle->processed) {
                global $user_ID;

                $location = $_SERVER['DOCUMENT_ROOT'];
                include($location . '/wp-load.php');
                include($location . '../../wp-includes/post.php');






                $post_id = $_POST['currentID'];

                update_post_meta($post_id, 'cardetails', $Cardetales,false);


                header('Location: http://localhost:8080/wp-admin/admin.php?page=Bil%20Opload');


            }


















        } else {
            /////// end og if statement

            $Cardetales= array($_POST['Brand'],$_POST['title'],$_POST['New_old'],$_POST['production'],$_POST['kilometer'],$_POST['price']
            ,$_POST['fuel'],$_POST['colour'],$_POST['besparelse'],$_POST['korsel'],$_POST['periode'],$_POST['permonth'],$_POST['ydelse'],$_POST['beskatningsgrundlag'], $_POST['description'],$date);



            $files = array();
            foreach ($_FILES['my_field'] as $k => $l) {
                foreach ($l as $i => $v) {
                    if (!array_key_exists($i, $files))
                        $files[$i] = array();
                    $files[$i][$k] = $v;
                }
            }
            foreach ($files as $file) {

                // we instanciate the class for each element of $file
                $handle = new Upload($file);

                // then we check if the file has been uploaded properly
                // in its *temporary* location in the server (often, it is /tmp)
                if ($handle->uploaded) {

                    // now, we start the upload 'process'. That is, to copy the uploaded file
                    // from its temporary location to the wanted location
                    // It could be something like $handle->Process('/home/www/my_uploads/');
                    $handle->Process($dir_dest);


                    array_push($Cardetales, $handle->file_dst_name);


                }

            }
            if ($handle->processed) {
                if($_FILES['my_field']['name'][0]=="" )
                {
                    array_push($Cardetales,$WhiteImage);

                }
                if($_FILES['my_field']['name'][1]=="" )
                {
                    array_push($Cardetales,$WhiteImage);

                }
                if($_FILES['my_field']['name'][2]=="" )
                {
                    array_push($Cardetales,$WhiteImage);

                }

                if($_FILES['my_field']['name'][3]=="" )
                {
                    array_push($Cardetales,$WhiteImage);

                }
                global $user_ID;

                $location = $_SERVER['DOCUMENT_ROOT'];
                include($location . '/wp-load.php');

                $new_post = array(
                    'post_title' => $_POST['title'],
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_date' => date('Y-m-d H(idea)(worry)'),
                    'post_author' => $user_ID,
                    'post_type' => 'car',
                    'post_category' => array(o)

                );


                $post_id = wp_insert_post($new_post);

                add_post_meta($post_id, 'cardetails', $Cardetales, true);


                header('Location: http://localhost:8080/wp-admin/admin.php?page=Bil%20Opload');


            } else {
                // one error occured
                echo '<p class="result">';
                echo '  <b>File not uploaded to the wanted location</b><br />';
                echo '  Error: ' . $handle->error . '';
                echo '</p>';
            }
        }
    } else {
        // if we're here, the upload file failed for some reasons
        // i.e. the server didn't receive the file
        echo '<p class="result">';
        echo '  <b>File not uploaded on the server</b><br />';
        echo '  Error: ' . $handle->error . '';
        echo '</p>';

    }





}
?>