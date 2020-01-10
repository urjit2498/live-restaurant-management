
<?php

include'/Connection.php';
$foodquery = "select * from tbl_food_item where subcategory_id=" . $_POST['id'];
$foodresult = mysqli_query($conn, $foodquery);
if ($foodresult) {
    echo"<div class='menu-item col-sm-6 col-xs-12 starter dinner desserts'>";
    echo"<table  width='100%'>";
    while ($show3 = mysqli_fetch_array($foodresult)) {
        echo"<tr><td>" . $show3['food_name'] . "</td><td>" . $show3['food_price'] . "</td></tr>";
    }
    echo" </table>";
    echo " </div>";
}
?>
