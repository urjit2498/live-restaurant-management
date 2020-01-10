
<head>
        <style>
            img{
                height:90px;
               width:100px;
            }
        </style>
    </head>

<?php

session_start();

echo $_SESSION['first_name'];
include './Connection.php';


if(!$conn){
    mysqli_connect_errno();
}
 else {

$query="select * from tbl_register where registration_id=".$_SESSION['registration_id'];
                $result=mysqli_query($conn,$query);
                if($result){
                   $row=  mysqli_fetch_assoc($result);
                   echo"<div>";
                          echo"<img src='$row[Users_photo]' class='img-responsive' alt='' />";
                echo"</div>";
                  echo'<a href="Logout.php">Logout</a>';         
                }
                echo'<a href="updateRegistration.php">RegistrationList Page</a>';
}

    
