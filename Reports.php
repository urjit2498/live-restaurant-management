<?php
session_start();
include './includeDashboard/includeCss.php';
include './includeDashboard/includeHeader.php';
include './includeDashboard/includeSidebar.php';
?>
<html lang="en">
    <head>
       
    </head>
    <body>

        <div class="page-content">
            <div class="container-fluid">
                <form name="freports" action="ReportsController.php" method="POST">
                    <h3 class="text-uppercase  text-center " style="font-weight: bold; text-decoration: underline; font-size:28px;">Reports</h3>

                   
                    <div class="row" style="margin-left: 550px;">
                        <div class="col-md-3">
                            <br> <lable style="font-size:20px;" >From Date:</lable>
                            <input type="date" name="fromdate" value="date">
                        </div>
                    
                    <!--<br>-->
 <!--<input type="text" name="txtCategoryName" id="txtCategoryName"value="" class="form-control">-->
<!--                    <div class="row" style="margin-left: 550px;">    -->
                        <div class="col-md-3">
                            <br> <lable  style="font-size:20px;" >To Date:</lable>
                            <input type="date" name="todate" value="date">
                        </div>
                    </div>
                    <br>
                    <div class="row" style="margin-left: 550px;">
                        <div class="col-md-6">
                            <div class="space20"></div>
                            <br><input type="submit" name="submit" id="submit" value="submit" class="btn btn-default btn-block"class="btn-default">

                        </div>
                    </div>
                </form>                   
            </div>
        </div>
        <?php
        include './includeDashboard/includeJS.php';
        ?>