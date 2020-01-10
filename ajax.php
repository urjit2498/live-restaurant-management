<?php
session_start();
?>

<html>
    <?php
    include './includeDashboard/includeCss.php';
    include './includeDashboard/includeHeader.php';
    include './includeDashboard/includeCaptainSidebar.php'
    ?>
    <head>
   
  <style>
       .error{color:red;
       font-size:20px;}
    </style>

</head>
<body>
    <div class="container-fluid">
        <div class="page-content">
            <form name="frmAjax" action="orderBillTxn.php" id="frmAjax" method="post" onsubmit="return validateForm()">
                <table border="2px solid black" style="margin-left: 500px;">
                    <tr>
                        <td style="font-weight: bold; font-size:18px;">Order Type </td>
                        <td>
                            <select name="sltOrderType" id="sltOrderType" >
                                <option value = '0'>Select a Order Type</option>
                                <?php
                                include './Connection.php';
                                $query = "select * from tbl_order_type";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo("<option value='" . $row['order_type_id'] . "'>" . $row['order_type_name'] . "</option>");
                                }
                                ?>
                            </select>
                            <label class="error" for="sltOrderType" id="type_error" style="display: none">Select Order Type</label>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; font-size:18px;" >Table </td>
                        <td>
                            <select name="sltTable" id="sltTable" value="sltTable" >
                                <option value = '0'>Select a Table</option>
                                <?php
                                include './Connection.php';
                                $query = "select * from tbl_table WHERE is_active = 1";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo("<option value='" . $row['table_id'] . "'>" . $row['table_name'] . "</option>");
                                 
                                }
                                ?>
                            </select>
                            <label class="error" for="sltTable" id="table_error" style="display: none">Select Table</label>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight: bold; font-size:18px;">Category Name</td>
                        
                                <td><select name="sltCategory" id="sltCategory">
                             <option value = '0'>Select a Category</option>
                            </select>
                                    <label class="error" for="sltCategory" id="category_error" style="display: none">Select Category</label>
                                </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; font-size:18px;">Sub Category Name</td>
                        <td>
                            <select name="sltSubCategory" id="sltSubCategory" >
                                <option value = '0'>Select a Sub Category</option>
                            </select>
                            <label class="error" for="sltSubCategory" id="subcategory_error" style="display: none">Select Sub Category</label>
                        </td>
                    </tr>

                    <tr>
                        <td class="td1" style="font-weight: bold; font-size:18px;">Food Item</td>
                        <td>
                            <input type="text" name="txtFoodName" id="txtFoodName">
                            <input type="hidden" name="txtFoodId" id="txtFoodId">
                            <label class="error" for="txtFoodName" id="name_error" style="display: none">Select Food Name</label>
                            
                        </td>
                    </tr>

                    <tr><td style="font-weight: bold; font-size:18px;">Price </td><td><input type="text" name="txtPrice" id="txtPrice">
                        <label class="error" for="txtPrice" id="price_error" style="display: none">Select Price</label></td></tr>
                    <tr><td style="font-weight: bold; font-size:18px;">Qty </td><td><input type="number" name="txtQty" id="txtQty"/>
                    <label class="error" for="txtQty" id="quantity_error" style="display: none">Select Quantity</label></td></tr>
                    
                    <tr><td colspan="2" align="center"><input type="submit" value="ADD" style="font-weight: bold;" /></td></tr>
                </table>  

                    <center><h4 style="margin-bottom: 25px; margin-top:25px; font-size:25px; font-weight: bold;">View</h4></center>
<div id='tablelist'>
    
        </div>
  
                
    <div class="form-group" style="font-size: 18px; margin-left:600px;">

                        <br><input type="submit" name="submit" style="font-weight: bold;">

            
        </div>
            </form>
    </div>
    </div>


    <?php
    include './includeDashboard/includeJS.php';
    ?>
    <script>
        $(document).ready(function() {

            $("#txtFoodName").autocomplete({
                minLength: 0,
                source: function(request, response) {
                    $.ajax({
                        url: "./foodIdController.php",
                        dataType: "json",
                        async: false,
                        method: "POST",
                        data: {
                            term: request.term,
                            subCategoryId: $("#sltSubCategory").val()
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                focus: function() {
                    return false;
                },
                select: function(event, ui) {
                    $("#txtFoodId").val(ui.item.id);
                    $("#txtPrice").val(ui.item.food_price);
                }
            });

            $.ajax({
                async: false,
                datatype: 'json',
                method: 'POST',
                url: './ajaxController.php',
                data: {
                    page: 'sltCategory'
                },
                success: function(data) {
                    $("#sltCategory").html("");
                    $("#sltCategory").html(data);
                }
            });

            $("#sltCategory").change(function() {
                $.ajax({
                    async: false,
                    datatype: 'json',
                    method: 'POST',
                    url: "./ajaxController.php",
                    data: {
                        id: $("#sltCategory").val(),
                        page: 'sltSubCategory'
                    },
                    success: function(data) {
                        $("#sltSubCategory").html("");
                        $("#sltSubCategory").html(data);
                    }
                });
            });

            $("#sltSubCategory").change(function() {
                $.ajax({
                    async: false,
                    datatype: 'json',
                    method: 'POST',
                    url: './ajaxController.php',
                    data: {
                        id: $("#sltSubCategory").val(),
                        page: 'sltFood'
                    },
                    success: function(data) {
                        $("#sltFood").html("");
                        $("#sltFood").html(data);
                    }

                });
            });

            $("#sltTable").change(function() {
                $.ajax({
                    async: false,
                    datatype: 'json',
                    method: 'POST',
                    url: './TableOrderTxn.php',
                    data: {
                        id: $("#sltTable").val()
                    },
                    success: function(data) {
                        
                        $("#tablelist").html("");
                        $("#tablelist").html(data);
                    }
                });
            });
           
        });
        function validateForm(){
               
                var flag = true;
                if ($("#sltOrderType").val() ==="0") {
                    $("#type_error").show();
                    flag = false;
                }
                  if ($("#sltTable").val() === "0") {
                    $("#table_error").show();
                    flag = false;
                }
                if ($("#sltCategory").val() === "0") {
                    $("#category_error").show();
                    flag = false;
                }
                if ($("#sltSubCategory").val() === "0") {
                    $("#subcategory_error").show();
                    flag = false;
                }
            if ($("#txtFoodName").val() === '') {
                    $("#name_error").show();
                    flag = false;
                }
                if ($("#txtPrice").val() ==='') {
                    $("#price_error").show();
                    flag = false;
                }
                if ($("#txtQty").val() ==='') {
                    $("#quantity_error").show();
                    flag = false;
                }
                return flag;
            }
             
      
    </script>

    </script>

</body>
</html>
