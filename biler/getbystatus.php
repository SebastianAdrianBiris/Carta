<?php

include('includes/dbConnect.php');
$connection = db_connect();
$data = json_decode($_POST['data']);
$type=$data->type ;
$testnum=$data->page;






        $sql1 = "SELECT COUNT(post_id) FROM wp_postmeta WHERE meta_key='cardetails' and meta_value LIKE '%$type%'";




//$sql = "SELECT meta_value, post_id FROM wp_postmeta WHERE meta_key='cardetails' ";
$query = mysqli_query($connection, $sql1);
$row = mysqli_fetch_row($query);
//row count
$rows = $row[0];
// posts per page
$page_rows = 20;
// page num of last page
$last = ceil($rows / $page_rows);
//last not less than 1
if ($last < 1) {
    $last = 1;
}
if (!isset($testnum)) {
    $testnum = 1;
} else {
    $testnum =$testnum;
}



if ($testnum < 1) {
    $testnum;
} elseif ($testnum > $last) {
    $testnum = $last;
}
// sets range of rows to query for the chosen pagenum
$limit = 'LIMIT ' . ($testnum - 1) * $page_rows . ',' . $page_rows;
//this selects the rows needed for 1 page

    $sql = "SELECT meta_value, post_id FROM wp_postmeta WHERE meta_key='cardetails' and meta_value LIKE '%$type%' ORDER BY post_id DESC $limit ";



$query = mysqli_query($connection, $sql);

$textline1 = "Cars (<b>$rows</b>)";
$textline2 = "Page <b>$testnum</b> of <b>$last</b>";

$paginationCtrls = '';

if ($last != 1) {
    if ($testnum > 1) {
        $previous = $testnum - 1;

        $paginationCtrls .= "<a type='button' onclick='myFunctionGetPage($previous,$type)'>previous</a> ";
        for ($i = $testnum - 4; $i < $testnum; $i++) {
            if ($i > 0) {

                $paginationCtrls .= "<a type='button' onclick='myFunctionGetPage($i,$type)' >" . $i . "</a> ";
            }
        }
    }

    $paginationCtrls .= '' . $testnum . ' ';
    for ($i = $testnum + 1; $i <= $last; $i++) {

        $paginationCtrls .= "<a type='button' onclick='myFunctionGetPage($i,$type)'>" . $i . "</a> ";
        if ($i >= $testnum + 4) {
            break;
        }
    }
    if ($testnum != $last) {
        $next = $testnum + 1;
        $paginationCtrls .= "<a type='button' onclick='myFunctionGetPage($next,$type)' >Next</a> ";
    }
}
$list = '';
echo '<div class="bp_pagediv" style=" box-shadow:none; overflow: auto;">';
while ($row = mysqli_fetch_array($query, MYSQL_ASSOC)) {
    $postid = $row["post_id"];
    $cardetails = unserialize($row["meta_value"]);
    echo '<div class="img">';

    echo "<a  type='button'  onclick='myFunctionGet($postid)' target='_blank'  ><img   src='" . '../wp-content/plugins/biler/includes/test/' . $cardetails[21] . "' width='216' height='150'/></a>";
    echo '<div class="desc">';
    echo '<div class="desc">';
    echo '<p>'.$cardetails[1].'</p>';
    if($cardetails[11]!=null) {
        echo '<p class="price" style="text-align: center" >Fra ' . $cardetails[11] . ' kr./md.</p>';
    }elseif($cardetails[11]!=null){
        echo '<p class="price" style="text-align: center">Fra ' . $cardetails[15] . ' kr./md.</p>';
    }else{
        echo '<p class="price" style="text-align: center">Fra ' . 0 . ' kr./md.</p>';
    }
    echo '</div>';
    echo '</div>';
}

echo '</div>';



echo '<div class="paginationctrls" style="float: left ">';
echo '<p style="text-align:left">'.$paginationCtrls.'</p>';
echo '</div>';

mysqli_close($connection);

?>