<?php
include'./Connection.php';
$tid=$_GET['table_id '];
$query="delete from tbl_table where table_id='". $tid."'";
$result=mysqli_query($conn,$query);
if($result==0)
{
    while ($row = mysqli_fetch_row($query)) 
     {
        echo "delete the record";
    }
}

