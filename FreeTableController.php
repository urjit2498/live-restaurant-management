<?php

include './Connection.php';

$query="update tbl_table set is_active=0 where table_id=".$_POST['slttable'];
//echo $query;
$result=mysqli_query($conn,$query);
if($result){
    
    echo "update table";
    header("location: ../AdminPage/OrderBill.php");
}

