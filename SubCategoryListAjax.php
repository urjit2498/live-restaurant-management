<?php

include'/Connection.php';
$query = "select * from tbl_subcategory where category_id = " . $_POST['id'];
$result = mysqli_query($conn, $query);
if ($result) {
    echo"<div class='row menu-items2'>";
    while ($show = mysqli_fetch_array($result)) {
        echo"<div class='col-sm-2 col-md-2' >";
        echo" <div class='menu-info'>";
        echo"<a href='foodItemMenu.php?subcategory_id=$show[subcategory_id]'>";
        echo"<center><lable style=font-size:20px;>$show[subcategory_name]</lable></center>";
        echo"<br><img src='$show[upload_file]' style=height:100px;  class='img-responsive' alt='' />";
        echo"</a>";
        echo"</div>";
        echo"</div>";
    }
    echo"</div>";
}
?>