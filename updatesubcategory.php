<?php
session_start();
?>
<?php
include './includeDashboard/includeCss.php';
include './includeDashboard/includeHeader.php';
include './includeDashboard/includeSidebar.php';
?>
<html>
    <head>
        <style>
            h3{
                font-weight: bold;
                font-size:22px;
            }
            th,td{
                font-size:15px;
                font-weight: bold;
            }
            
        </style>
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="page-content">
        

        
        <form name="fcategory" action="updatesubcontroller.php" method="POST">
                   
                                        <h3 class="text-center">Update SubCategory Page</h3>

       
            <table border="1px solid black" style="width:500px;" align="center">
                <tr>
                    <th colspan="2"class="text-center" >Sub Category</th>
                </tr>
                

                    
                        <input type='hidden'  name='txtid'/>
                    

                <tr>
                    <td>Sub Category Name</td>
                    
                    <td>
                        <?php
                        include './Connection.php';
                        if (!$conn) {
                            echo "not connect" . mysqli_connect_errno();
                        }
                        $query = "select * from tbl_subcategory where subcategory_id = " . $_GET['subcategory_id'];
                        $result = mysqli_query($conn, $query);

                        $row = mysqli_fetch_assoc($result);
                        echo "<input type='text'  name='txtSubName' value='$row[subcategory_name]'/>";
                         echo "<input type='text'  name='txtSubName'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>SubCategory's Photo Upload</td>
                    <td><input type='file' name='flSubcategory'></td>'
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btnsubmit"></td>
                </tr>
                
            </table>
        </form>
                                    </div>
                                </div>
                            
            <?php
                        include './include/includeJS.php';
            ?>
              
    </body>
</html>
