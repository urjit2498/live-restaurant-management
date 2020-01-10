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
        </style>
    </head>
   
    <body>
        <div class="container-fluid">
            <div class="page-content">
        <form name="fitem" action="updateitemcontroller.php" method="POST">
                            

                         <div class="row">
                                <div class="col-md-6">
                                    
                                  
                                        <h1 class="text-center">Update Food Item Page</h1>
                                        
                        
                        <?php
                        include '\Connection.php';
                        if (!$conn) {
                            echo "not connect" . mysqli_connect_errno();
                        } else {
                            $query = "SELECT * from tbl_food_item where food_id=" . $_GET['food_id'];
                            $result = mysqli_query($conn, $query);
                            $row=  mysqli_fetch_array($result);
                       echo" <input type='hidden' name='txtfid'   value='$row[food_id]'>";
                            
                        }
                        ?>
                                    
                                            </div>
                                        </div>
            <div class="ffooditem">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <br> <lable>Food Name</lable>
                                                
                        
                       
                                                <br><input type='text'  name='txtfoodname' class='form-control' value="<?php echo $row['food_name'];?>"/>
                                    <input type='text'  name='txtfoodname' class='form-control'>
         
                                            
                                               
                                                       
                                        </div>
                                        </div>
            </div>
                                            <div class="ffooditem">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                 <lable>Food Price</lable>
                                                <br><input type="text"  name="txtfoodprice" class="form-control" value="<?php echo $row['food_price'];?>">
                                                <input type="text" name="txtfoodprice" size="30" class="form-comntrol">
                                                
                                            </div>
                                        </div>
                                            
                                           
                                            <div class="ffooditem">
                                                <div class="row">
                                            <div class="col-md-5">
                                                 <lable>subcatyegory</lable>
                                                <select name="drdsname" value="drdsname" class="form-control">
                                                    <?php
                                                    include '\Connection.php';
                                                    $query = "select * from  tbl_subcategory";
                                                    $result = mysqli_query($conn, $query);
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            echo"<br><option value='" . $row['subcategory_id'] . "'>$row[subcategory_name]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                               </div>
                                            </div>
                                        </div>
                                            
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="space20"></div>
                                                    <br><button button type="submit" class="btn btn-default btn-block"  class="form-control">Submit</button>
                                                
                                                </div>
                                            </div>
                                           
                                    </div>
                                        
                                   </div>
                                </div>
                            </div>
                        </div>
                        



                                               

                                        </div> 

                                        <!-- Javascript -->
                                        <?php
                                        include './includeDashboard/includeJS.php';
                                        ?>
                                        </body>

                                        </html>
