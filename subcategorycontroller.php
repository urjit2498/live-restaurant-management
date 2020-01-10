
<?php
include'\Connection.php';
mysqli_autocommit($conn, FALSE);
if (!$conn) {
    die("connection error" . mysqli_connect_errno());
} else {

    $subcategoryname = $_POST['txtsname'];
    $category=$_POST['sltCategory'];
    $flag = true;
    $valid_formats = array("jpg", "jpeg", "png");
    $max_file_size = 1024 * 1024 * 1;
    $targetPath = "";
    $flagFileUpload = FALSE;
    if (isset($_FILES["Flsubcategory"]["type"])) {

        $file_extension = strtolower(pathinfo($_FILES["Flsubcategory"]["name"], PATHINFO_EXTENSION));

        if (($_FILES["Flsubcategory"]["size"] <= $max_file_size) && in_array($file_extension, $valid_formats)) {
            if ($_FILES["Flsubcategory"]["error"] > 0) {
                $flag = FALSE;
                echo "Please enter valid photo: " . $_FILES["Flsubcategory"]["error"] . "<br/><br/>";
            } else {
                $sourcePath = $_FILES['Flsubcategory']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = './image/' . time() . '_' . uniqid() . '.' . $file_extension; // Target path where file is to be stored
                $fileResult = move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file    
                $flagFileUpload = TRUE;
            }
        }
    }
    $query = "insert into tbl_subcategory(subcategory_name, category_id,upload_file)values('" . $subcategoryname . "','" . $category."','".$targetPath . "')";

    echo $query;
    $result = mysqli_query($conn, $query);
    if ($result) {
        mysqli_commit($conn);
         $show = mysqli_fetch_assoc($result);
       
        echo "Recored Inserted";
       
      
       
         header("location: ../AdminPage/subcategory.php");
    }
       
     else {
        mysqli_rollback($conn);
        unlink($targetPath);
        echo "Record Not Inserted";
        header("location: ../Admin Page/subcategory.php?subcategory not insert");
    }
}



//include'\Connection.php';
//if(!$conn)
//{
//    echo "connection invalid".mysqli_connect_errno();
//}
// else {
//    
//     
//$sname=$_POST['txtsname'];
// $cid=$_POST['txtCategoryId'];
////$categorytype=$_POST['txtcname'];
//}
//$query="insert into tbl_subcategory( subcategory_name,category_id) values('".$sname."','".$cid."')";
//$result=mysqli_query($conn,$query);
//echo $query;
//  if($result)
//  {
//      echo "record inserted";
//     // header("location: ../subcategory.php");
//  }
// else {
//echo "record not inserted";      
//}