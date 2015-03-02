<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "colin";
$password = "bobbob";



// Do whatever you want with the $uid
require_once( '../../../../wp-load.php' );
get_currentuserinfo();
$cardetails= "cardetails";
$emo = $current_user->ID;
$firstName = $current_user->user_firstname ;
$LastName =$current_user->user_lastname ;
$result="";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

$conn = new mysqli($servername, $username, $password,"deleleasing_dk_db");
mysqli_set_charset($conn,'utf8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);


}

global $current_user;

$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);




if($user_role=='subscriber' ) {
    $sql = "SELECT deleleasing_dk_db.wp_posts.ID,deleleasing_dk_db.wp_posts.post_author,deleleasing_dk_db.wp_postmeta.meta_value,deleleasing_dk_db.wp_postmeta.meta_key
From deleleasing_dk_db.wp_posts,deleleasing_dk_db.wp_postmeta
WHERE deleleasing_dk_db.wp_posts.post_author =".  $emo . "  and deleleasing_dk_db.wp_posts.ID =deleleasing_dk_db.wp_postmeta.post_id and deleleasing_dk_db.wp_postmeta.meta_key= 'cardetails'" ;

    $result = $conn->query($sql);


}
if($user_role=='administrator') {
    $sql = "SELECT deleleasing_dk_db.wp_posts.ID,deleleasing_dk_db.wp_posts.post_author,deleleasing_dk_db.wp_postmeta.meta_value,deleleasing_dk_db.wp_postmeta.meta_key,deleleasing_dk_db.wp_users.display_name
From deleleasing_dk_db.wp_posts,deleleasing_dk_db.wp_postmeta,deleleasing_dk_db.wp_users
WHERE  deleleasing_dk_db.wp_users.ID=deleleasing_dk_db.wp_posts.post_author and deleleasing_dk_db.wp_posts.ID =deleleasing_dk_db.wp_postmeta.post_id and  deleleasing_dk_db.wp_postmeta.meta_key= 'cardetails'";
    $result = $conn->query($sql);
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



        echo "<html>



<body>



    <tr>


      <td>$temp[1]</td>
        <td>$temp[15]</td>
        <td>$postAuthor</td><td><button class = 'myButton-custom' type = 'button'  onclick='test1($elementToBeDeleted);$(".'"#html"'.").click();'>edit</button></td>
        <td><button class = 'myButton-custom' type = 'button'  onclick='test2($elementToBeDeleted)'>delete</button> <input type='checkbox' name= checkboxDelete id = '$elementToBeDeleted' value='delete' > delete<br></td>





</body>
</html>
";

        $temp=null;
    }
    echo " </table>";
    echo "<button class = 'myButton-custom' type = 'button'  onclick='DeleteAll()'>delete</button>";

}

$conn->close();