<?php
include'./Connection.php';
$fid=$_GET['food_id'];
$query="delete from tbl_food_item where food_id='".$fid."'";
echo $query;
$result=mysqli_query($conn,$query);
if($result)
{
        echo "delete the record";
    }



 