<?php
header('Content-Type: text/html; charset=utf-8');
include('dbConnect.php');
$connection = db_connect();
// Do whatever you want with the $uid
require_once( '../../../../wp-load.php' );
get_currentuserinfo();
$cardetails= "cardetails";
$emo = $current_user->ID;
$firstName = $current_user->user_firstname ;
$LastName =$current_user->user_lastname ;
$result="";




global $current_user;

$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);




if($user_role=='subscriber' ) {
    $sql = "SELECT deleleasing_dk_db.wp_posts.ID,deleleasing_dk_db.wp_posts.post_author,deleleasing_dk_db.wp_postmeta.meta_value,deleleasing_dk_db.wp_postmeta.meta_key
From deleleasing_dk_db.wp_posts,deleleasing_dk_db.wp_postmeta
WHERE deleleasing_dk_db.wp_posts.post_author =".  $emo . "  and deleleasing_dk_db.wp_posts.ID =deleleasing_dk_db.wp_postmeta.post_id and deleleasing_dk_db.wp_postmeta.meta_key= 'cardetails'" ;

    $result = $connection->query($sql);


}
if($user_role=='administrator') {
    $sql = "SELECT deleleasing_dk_db.wp_posts.ID,deleleasing_dk_db.wp_posts.post_author,deleleasing_dk_db.wp_postmeta.meta_value,deleleasing_dk_db.wp_postmeta.meta_key,deleleasing_dk_db.wp_users.display_name
From deleleasing_dk_db.wp_posts,deleleasing_dk_db.wp_postmeta,deleleasing_dk_db.wp_users
WHERE  deleleasing_dk_db.wp_users.ID=deleleasing_dk_db.wp_posts.post_author and deleleasing_dk_db.wp_posts.ID =deleleasing_dk_db.wp_postmeta.post_id and  deleleasing_dk_db.wp_postmeta.meta_key= 'cardetails'";
    $result = $connection->query($sql);
}


if ($result->num_rows > 0) {
// output data of each row
    echo "<table class='zebra'><tr><th>Title</th><th>Dato</th><th>Navn</th><th>Rediger</th><th>Slet</th></tr>";


    while($row = mysqli_fetch_assoc($result)) {
        $temp[]=$row['meta_value'] ;
        $temp=unserialize($temp[0]);
        array_push($temp,$row['ID']);
        $elementToBeDeleted = $row['ID'];
        $postAuthor = $row['display_name'];

        $DeleteArray= array($elementToBeDeleted, $temp[21], $temp[22], $temp[23],$temp[24]);
        $DeleteArray = json_encode($DeleteArray);

        echo "<html>



<body>



    <tr>


      <td>$temp[1]</td>
        <td>$temp[20]</td>
        <td>$postAuthor</td><td><button class = 'myButton-custom' type = 'button'  onclick='getbyid($elementToBeDeleted);$(".'"#html"'.").click();'>edit</button></td>
        <td><button class = 'myButton-custom' type = 'button'  onclick='deletebyid($DeleteArray)'>delete</button> <input type='checkbox' name= checkboxDelete id = '$DeleteArray' value='delete' > delete<br></td>





</body>
</html>
";

        $temp=null;
    }
    echo " </table>";
    echo "<button class = 'myButton-custom' type = 'button'  onclick='DeleteAll()'>delete</button>";

}

$connection->close();