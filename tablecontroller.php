<?php
include '\Connection.php';
$name=$_POST['txtTableName'];
$capacity=$_POST['txtTableCapacity'];
$query="insert into tbl_table(table_name,table_capacity)values('" . $name . "','" . $capacity . "')";
echo $query;
$result=mysqli_query($conn,$query);
if($result)
{
    echo " record insert";
    header("LOCATION: ../AdminPage/table.php");
    
}
    else
    {
        echo "record not insert";
        header("LOCATION: ../Admin Page/table.php?table not inserted");
    }

