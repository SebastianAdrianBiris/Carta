<?php

require_once( '../../../../wp-load.php' );
get_currentuserinfo();
global $current_user;

$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);
if ($user_role == 'administrator' ) {
   echo   '<button  class="myButton" style="margin-left:10px " type="button"  onclick = "createBrand()" />';
    echo 'Tilføj Mærke';
    echo '</button>';
}