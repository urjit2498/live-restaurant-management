
<?php
session_start();
?>
<?php
include './includeDashboard/includeCss.php';
include './includeDashboard/includeHeader.php';
include './includeDashboard/includeSidebar.php';
?>
<html lang="en">
    <head>
        <style>
            lable{
                font-size: 18px;
                font-weight: bold;
            }
           .error{color:red;
           font-size:20px;}
        </style>
    </head>

    <body>

        <div class="page-content">
            <div class="container-fluid">
                <form class="fsubcategory" action='subcategorycontroller.php' method='POST' enctype='multipart/form-data' onsubmit="return validateForm()">

                    <h1 class="text-uppercase text-center" style="text-decoration: underline; font-size:28px; font-weight:bold;">Sub Category</h1>

                    <div class="fsubcategory">
                        <div class="row">
                            <div class='col-md-6'>
                                <lable>Category</lable>
                                <select name="sltCategory"  id="sltCategory" value='sltCategory' class='form-control'>
                                      <option value = '0'>Select a category</option>
                                    <?php
                                    include '\Connection.php';
                                    $query = "select * from  tbl_category";
                                    $result = mysqli_query($conn, $query);
                                    if ($result) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo"<option value='" . $row['category_id'] . "'>$row[category_name]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <label class="error" for="sltCategory" id="category_error" style="display: none">Select Category</label>

                            </div>
                        </div>
                    </div>

                    <div class='fsubcategory'>
                        <div class="row">
                            <div class="col-md-6">
                                <lable>Sub Category Name</lable>
                                <input type="text" name="txtsname" id="txtsname"class="form-control" value="">
                                <label class="error" for="txtsname" id="subcategory_error" style="display: none">Sub Category Name is Required</label>
 
                            </div>
                        </div>
                    </div>
                    <div class='fsubcategory'>
                        <div class="row">
                            <div class="col-md-6">
                                <lable>Sub Category's Photo Upload</lable>
                                <input type="File" name="Flsubcategory" id="Flsubcategory"class="form-control">
                                <label class="error" for="Flsubcategory" id="file_error" style="display: none">Select File</label>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="space20"></div>
                            <input type="submit" name="submit" value="submit" id="submit" class="btn-block" style="font-size:20px;">
                        </div>
                    </div>
                    <div id="categorylist">

                    </div>
                </form>
            </div>
        </div>

        <?php
        include './includeDashboard/includeJS.php';
        ?>

        <script>
            $(document).ready(function() {

                $.ajax({
                    async: false,
                    datatype: 'json',
                    method: 'POST',
                    url: './SubCategoryListAjax.php',
                    data: {
                        id: $("#sltCategory").val()
                    },
                    success: function(data) {
                        $("#categorylist").html("");
                        $("#categorylist").html(data);
                    }
                });


                $("#sltCategory").change(function() {
                    $.ajax({
                        async: false,
                        datatype: 'json',
                        method: 'POST',
                        url: './SubCategoryListAjax.php',
                        data: {
                            id: $("#sltCategory").val()
                        },
                        success: function(data) {
                            $("#categorylist").html("");
                            $("#categorylist").html(data);
                        }
                    });
                });
            });
            function validateForm(){
               
                var flag = true;
                if ($("#sltCategory").val() ==="0") {
                    $("#category_error").show();
                    flag = false;
                }
                  if ($("#txtsname").val() === '') {
                    $("#subcategory_error").show();
                    flag = false;
                }
              
                if ($("#Flsubcategory").val() === '') {
                    $("#file_error").show();
                    flag = false;
                }
                return flag;
            }
        </script>
    </body>
</html>
