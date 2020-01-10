<?php
session_start();
?>
<html>
    <?php
    include './includeDashboard/includeCss.php';
    include './includeDashboard/includeHeader.php';
    include './includeDashboard/includeSidebar.php';
    ?>
    <head>
        <style>
            h3{
                font-size:20px;
                font-weight: bold;
            }
            table{
                margin-left: 400px;
            }
            th,td{
                font-size:20px;
                font-weight: bold;
            }
            
        </style>
    </head>
        <body>
             <div class="page-content">
        <div class="container-fluid">
        <form name="ftable" action="UpdateTableController.php" method="POST">
            <h3 class="text-center" ">Update Table Page</h3>
            <table border="1px solid black" >
                <tr class="text-center">
                    <th colspan="2" align="center" >Table</th>
                </tr>
                
                

                
                    
                    
                          <?php
                        include '\Connection.php';
                        if (!$conn) {
                            echo "not connect" . mysqli_connect_errno();
                        }
                        $query = "select * from tbl_table where table_id = " . $_GET['table_id'];
                        $result = mysqli_query($conn, $query);

                        $row = mysqli_fetch_assoc($result);
                        echo "<input type='hidden'  name='txtid' value='$row[table_id]'/>";
                     
                        ?>   
                    
                
                        
                <tr>
                    <td>Table Name</td>
                    <td>
                       <input type='text' name='txtTableName' value="<?php echo $row['table_name'];?>"
                    <td><input type='text' name='txtTableName'></td>
                    
                    
                </tr>
                <tr>
                    <td colspan="1">Table Capacity</td>
                    <td><input type="text" name="txtTableCapacity" value="<?php echo $row['table_capacity'];?>">
                    <input type="text" name="txtTableCapacity"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btnsubmit"></td>
                </tr>
            </table>
        </form>
        </div>
             </div>
            <?php
                        include './includeDashboard/includeJS.php';
            ?>
    </body>
</html>
