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
                font-size:18px;
                font-weight: bold;
            }
            .error{color:red;}
        </style>
    </head>
        <body>
            <div class="container-fluid">
                <div class="page-content">
               <form class="ffooditem" action='itemcontroller.php' method='POST' onsubmit="return validateForm()">
                   <h1 class="text-uppercase text-center" style="text-decoration: underline; font-size:28px; font-weight: bold;">Food Items</h1>
                                  <div class="ffooditem">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <lable> Food Name</lable>
                                                <input type="text" name="txtFoodName" id="txtFoodName" value="" class="form-control">
                                                <label class="error" for="txtFoodName" id="name_error" style="display: none">Food's Item Name is Required</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ffooditem">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <lable>Food Price</lable>
                                                <input type="text" name="txtFoodPrice" value="" id="txtFoodPrice" class="form-control">
                                                <label class="error" for="txtFoodPrice" id="price_error" style="display: none">Food's Item Price is Required</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ffooditem">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <lable>subcategory </lable>
                                                 <select name='sltSubCategory' id="sltSubCategory" value='sltSubCategory' class='form-control'>
                                                     <option value = '0'>Select a Sub Category</option>
                                                <?php
                                              include '\Connection.php';
                            $query = "select * from  tbl_subcategory";
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo"<option value='" . $row['subcategory_id'] . "'>$row[subcategory_name]</option>";
                                }
                            }
                            ?>
                        

                                                </select>
                                                <label class="error" for="sltSubCategory" id="subcategory_error" style="display: none">Select Sub Category</label>
                                 
                           



                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="space20"></div>
                                            <br><input type="submit" name="submit" value="submit" id="submit" class="btn-block" style="font-size:20px;">
                                        </div>
                                    </div>
                   <br>
                            

                    <?php
                                                               include '/Connection.php';
                                $query = "select * from tbl_subcategory";
                                $result = mysqli_query($conn, $query);
                                if ($result) {
                                    $show3 = mysqli_fetch_assoc($result);
                                  //  echo"<br><h3 style='font-weight:bold;'>Food Items List</h3>";
                                 //  echo"<h3>Food Items</h3>";
                                   // echo "<h>Price</h3>";
                                }   
                                ?>
<div id='subcategorylist'>

                   </div>
             </form>
                            </div>
                        </div>
<!-- Javascript -->
        <?php
        include './include/includeJS.php';
        ?>
        <script>
        $(document).ready(function() {

            $.ajax({
                async: false,
                datatype: 'json',
                method: 'POST',
                url: './ItemListAjax.php',
                data: {
                    id: $("#sltSubCategory").val()
                },
                success: function(data) {
                    $("#subcategorylist").html("");
                    $("#subcategorylist").html(data);
                }
            });


            $("#sltSubCategory").change(function() {
                $.ajax({
                    async: false,
                    datatype: 'json',
                    method: 'POST',
                    url: './ItemListAjax.php',
                    data: {
                        id: $("#sltSubCategory").val()
                    },
                    success: function(data) {
                        $("#subcategorylist").html("");
                        $("#subcategorylist").html(data);
                    }
                });
            });
        });
        function validateForm(){
               
                var flag = true;
                   if ($("#txtFoodName").val() === '') {
                    $("#name_error").show();
                    flag = false;
                }
              
                if ($("#txtFoodPrice").val() === '') {
                    $("#price_error").show();
                    flag = false;
                }
  
                if ($("#sltSubCategory").val() ==="0") {
                    $("#subcategory_error").show();
                    flag = false;
                }
                             return flag;
            }
    </script>
    </body>

</html>
