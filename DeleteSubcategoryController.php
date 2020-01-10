<?php
include'./Connection.php';
$sid=$_GET['subcategory_id'];
$query="delete from tbl_subcategory where subcategory_id='".$sid."'";
$result=mysqli_query($conn,$query);
if($result)
{
        echo "delete the record";
    }



 