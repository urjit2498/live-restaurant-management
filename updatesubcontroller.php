
<?php

include './Connection.php';
$id=$_POST['txtid'];
$name=$_POST['txtSubName'];
$query="update tbl_subcategory  set subcategory_name='".$name."'  where category_id='".$id."'";
//echo $query;
$result=mysqli_query($conn,$query);
if($result)
{
//    mysqli_commit($conn);
//         $show = mysqli_fetch_assoc($result);
    echo "update record";
  //  header("Location: ../Admin Page/cm1.php");
}
    else
    {
        echo "record not update";
        //header("Location: ../Admin Page/cm1.php?category not updated");
    }


      