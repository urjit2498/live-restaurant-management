<?php
include'./Connection.php';
$sid=$_GET['subcategory_id'];
$query="delete from tbl_subcategory where subcategory_id='".$sid;
echo $query;
$result=mysqli_query($conn,$query);
if($result)
{
    while($row=mysqli_fetch_row($result)){
           echo "delete the record";
           header("location: ../AdminPage/subcategorylist.php");
    }
}

