<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    
    ?>
    <?php
    include './includeDashboard/includeCss.php';
    include './includeDashboard/includeHeader.php';
    include './includeDashboard/includeSidebar.php';
    ?>
    <head>
        <style>
            lable{
                font-size:18px;
                font-weight: bold;
                
            }
            .error{color:red;
            font-size:20px;}
        </style>
    </head>
    <body>

       <div class="page-content">
        <div class="container-fluid">
                <form class="ftable" action='tablecontroller.php' method='POST' onsubmit="return validateForm()">

                              <div class="formcategory">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br> <lable>Table Name</lable>
                                            <br>
                                            <input type="text" name="txtTableName" id="txtTableName" value="" class="form-control">
                                            <label class="error" for="txtTableName" id="name_error" style="display: none">Table Name is Required</label>
                                            
                                        </div>
                                    </div>
                                 <div class="formcategory">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br> <lable>Table capacity</lable>
                                            <br>
                                            <input type="text" name="txtTableCapacity" id="txtTableCapacity" value="" class="form-control">
                                            <label class="error" for="txtTableCapacity" id="capacity_error" style="display: none">Table Capacity is Required</label>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="space20"></div>
                                            <br>  <input type="submit" name="submit" id="submit" value="submit" class="btn-block">
                                            <br>
                                        </div>

                                    </div>
                                    <div>



                                    </div>
                                </div>
                            </div>
                </form>
            <script>
            function validateForm(){
               
                var flag = true;
                   if ($("#txtTableName").val() === '') {
                    $("#name_error").show();
                    flag = false;
                }
              
                if ($("#txtTableCapacity").val() === '') {
                    $("#capacity_error").show();
                    flag = false;
                }
                return flag;
            }
  </script>
                            </div>
                        </div>
                                    <?php
                include './includeDashboard//includeJS.php';
                ?>
