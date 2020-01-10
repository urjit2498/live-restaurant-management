<?php
session_start();
include './includeDashboard/includeCss.php';
include './includeDashboard/includeHeader.php';
include './includeDashboard/includeSidebar.php';
?>

<html lang="en">
    <head>
        <style>
            lable{
                font-weight: bold;
                font-size:18px;
            }
            .error{color:red;
            font-size:20px;}
        </style>
    </head>
    <body>
       
        <div class="page-content">
            <div class="container-fluid">
                
                <!--<h3>Welcome pragnesh</h3>-->
                <!--<form class="fcategory" action='categorycontroller.php' method='POST' enctype="multipart/form-data">-->
            <!--<h1>Category<small>These fine folks trusted the award winning restaurant.</small></h1>-->
                <form  action='categorycontroller.php' method='POST' enctype="multipart/form-data" onsubmit="return validateForm()" >
                    <!--<div class="formcategory">-->
                    <h3 class="text-uppercase  text-center " style="font-weight: bold; text-decoration: underline; font-size:28px;">Category</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <br> <lable >Category Name</lable>
                            <!--<br>-->
                            <input type="text" name="txtCategoryName" id="txtCategoryName"value="" class="form-control">
                            
                            <label class="error" for="name" id="name_error" style="display: none">Category Name is Required</label>
                        </div>
                    </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <br> <lable>Category's Photo Upload</lable>
                                <br>
                                <input type="file" name="FlCategory"  id="FlCategory"class="form-control">
                                
                                <label class="error" for="photo" id="file_error" style="display: none"> Select a File</label>
                            </div>
                        </div>
                        <br> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="space20"></div>
                                <br><input type="submit" name="submit" id="submit" value="submit" class="btn btn-default btn-block"class="btn-default">
                                <!--<br>-->
                            </div>
                            <!--</div>-->
                        </div>
                </form>
                    
<script>
            function validateForm() {
               var flag=true;
                if ($("#txtCategoryName").val() === '') {
                    $("#name_error").show();
                    flag = false;
                }
                if ($("#FlCategory").val() === '') {
                    $("#file_error").show();
                    flag = false;
                }
                return flag;
            }
        </script>

                <?php
                include'/Connection.php';
                $query = "select * from tbl_category";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo"<div class='row menu-items2'>";
                    while ($show = mysqli_fetch_array($result)) {
                        echo"<div class=' col-sm-2 col-md-2' >";
                        echo" <div class='menu-info'>";
                        echo"<a href='subcategory.php?category_id=$show[category_id]'>";
                        echo"<center><lable style=font-size:25px;>$show[category_name]</lable></center>";
                        echo"<br><img src='$show[uplode_photo]' style='height:100px; margin-left:10px;'   class='img-responsive' alt='' />";
                        echo"</a>";
                        echo"</div>";
                        echo"</div>";
                    }
                    echo"</div>";
                }
                ?>
            </div>

        </div>
        <?php
        include './includeDashboard/includeJS.php';
        ?>
    </body></html>
