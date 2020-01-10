<?php
include '../Connection.php';
$fid=$_POST['txtfid'];
$fname=$_POST['txtfoodname'];
$fprice=$_POST['txtfoodprice'];
$sname=$_POST['drdsname'];
$query="update tbl_food_item SET food_name='$fname', food_price='$fprice', subcategory_id='$sname' where food_id='$fid'";

echo $query;
$result=mysqli_query($conn,$query);
if($result)
{
    echo "update record";
    header("LOCATION: ../AdminPage/FoodItemMenu.php");
}
    else
    {
        echo "record not update";
        header("LOCATION: ../Admin Page/FoodItemMenu.php?food items not updated");
    }

