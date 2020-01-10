<?php
session_start();
?>
<html lang="en">
    <head>
        <style>
            .error{color:red;
            font-size:20px;}
        </style>    
    </head>
    <?php
    include './includeDashboard/includeCss.php';
    include './includeDashboard/includeHeader.php';
    include './includeDashboard/includeManagerSidebar.php';
    ?>

    <body>
        <div class="container-fluid">
            <div class="page-content">
                <form class="forder" action='GenerateBill.php' method='POST' onsubmit="return validateForm()" >

                    <div class="forder">
                        <div class="row">
                            <div class="col-md-12">
                                <lable style="font-size:18px;">Order Date:</lable>
                                <?php
                                echo "<div style='font-size:18px;'>";
                                echo $date= "Today is " . date("d/m/Y") . "<br>";
                                
                                echo "</div>";
                                ?>

                            </div>
                        </div>
                    </div>
                              <div class="forder">
                        <div class="row">
                            <div class="col-md-4">
                                <lable style="font-size:18px;" >Order Type</lable>
                                <select name="sltorder" value="sltorder" id="sltorder" class="form-control">
                                    <option value = '0'>Select a Order Type</option>
                                    
                                    <?php
                                    include './Connection.php';
                                    if (!$conn) {
                                        echo "not connect" . mysqli_connect_errno();
                                    }
                                    $query = "select * from tbl_order_type";
                                    $result = mysqli_query($conn, $query);
                                    if ($result) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo"<option value='" . $row['order_type_id'] . "'>$row[order_type_name]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <label class="error" for="sltorder" id="type_error" style="display: none">Select Order Type</label>
                            </div>
                        </div>
                              </div>
                    <div class="forder">
                        <div class="row">
                            <div class="col-md-4">
                                <lable style="font-size:18px;">table id</lable>
                                <select name="slttable"  id="slttable" value="slttable"class="form-control">
                                    <option value = '0'>Select a Table</option>
                                    <?php
                                    include './Connection.php';
                                    if (!$conn) {
                                        echo "not connect" . mysqli_connect_errno();
                                    }
                                    $query = "select t.table_name,t.table_id from tbl_order_bill ob left join tbl_table t on t.table_id=ob.table_id where is_billed=0";
                                    $result = mysqli_query($conn, $query);
                                    if ($result) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo"<option value='" . $row['table_id'] . "'>$row[table_name]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <label class="error" for="slttabler" id="table_error" style="display: none">Select Table</label>
                            </div>
                        </div>
                    </div>
                    
                    <div id="tablelist"></div>
                       <div  style='font-size: 18px;'>

                           <div class="form-group" style='font-size: 18px;'>

                        <br><input type="submit" name="submit" value="Generate Bill" style="margin-left:550px;"/>
                    </div>
                    </div>
                </form>
                            </div>
                        </div>
    
                
        <?php
        include './includeDashboard/includeJS.php';
        ?>
        <script>
        $(document).ready(function() {
            
            $("#slttable").change(function() {
                $.ajax({
                    async: false,
                    datatype: 'json',
                    method: 'POST',
                    url: './orderBillTxnList.php',
                    data: {
                        id: $("#slttable").val()
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
                if ($("#sltorder").val() ==="0") {
                    $("#type_error").show();
                    flag = false;
                }
                  if ($("#slttable").val() === "0") {
                    $("#table_error").show();
                    flag = false;
                }
         return flag;
     }
        </script>
    </body>
</html>

                    







                   


        