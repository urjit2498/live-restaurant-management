<?php

session_start();

include'.\Connection.php';
if (!$conn) {
    die(mysqli_connect_errno());
} else {
    $user = $_POST['txtUserName'];
    $password = $_POST['txtPassword'];
    $query = "SELECT * FROM tbl_register WHERE  user_name='" . $user . "'AND password='" . $password . "'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['user_name'] = $data['user_name'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['user_type_id'] = $data['user_type_id'];
$_SESSION['user_photo']=$data['Users_photo'];
        if ($_SESSION['user_type_id'] == 1) {
           echo"<img src='$_SESSION[user_photo]' style='height:100px; margin-left:10px;'   class='img-responsive' alt='' />";
            header("location: ../AdminPage/cm1.php");
          
echo "hello".$_SESSION['user_name'];

           
        } else { 
            if ($_SESSION['user_type_id'] == 2) {

                header("location: ../AdminPage/ajax.php");
echo "hello".$_SESSION['user_name'];                
            }
        }
        if ($_SESSION['user_type_id'] == 3) {
            header("location: ../AdminPage/orderBill.php");
            echo "hello".$_SESSION['user_name'];
        } else {
            if ($_SESSION['user_type_id'] == 4) {

                header("location: ../AdminPage/ViewOrders.php");
                echo "hello".$_SESSION['user_name'];
            }
        }
    }
}

//$_SESSION['msg'] = "invalid username or password";
//echo $_SESSION['msg'];

mysqli_free_result($result);
mysqli_close($conn);

