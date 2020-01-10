<?php
include'./Connection.php';
$cid=$_GET['category_id'];
$query="delete from tbl_category where category_id='".$cid."'";
$result=mysqli_query($conn,$query);
if($result)
{
        echo "delete the record";
    }



 