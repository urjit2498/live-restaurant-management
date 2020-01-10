<?php
include '.\Connection.php';
$id=$_POST['txtid'];
$name=$_POST['txtTableName'];
$capacity=$_POST['txtTableCapacity'];
$query="update tbl_table set table_name='$name', table_capacity='$capacity' where table_id='$id'";
echo $query;
$result=mysqli_query($conn,$query);
if($result)
{
    echo "update record";
    header("LOCATION: ../AdminPage/table.php");
    
}
    else
    {
        echo "record not update";
    header("LOCATION: ../Admin Page/table.php?table not updated");
        }

