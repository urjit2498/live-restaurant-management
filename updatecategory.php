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
            th{
                font-size:18px;
            }
            td{
                font-size:18px;
                font-weight: bold;
                       }
            
        </style>
    </head>

    <body>
        <div class="page-content">
            <div class="container-fluid">
                <form name="fcategory" action="updatecontroller_1.php" method="POST">
                    <h3 class="text-center" style="font-size:25px;">Update Category Page</h3>
                    <table border="1px solid black" style="width:50%; margin-left: 350px;">
                        <tr>
                            <th colspan="3" class='text-center'  > Category</th>
                        </tr>
                        
                        
<?php
   
                                include '\Connection.php';
                                if (!$conn) {
                                    echo "not connect" . mysqli_connect_errno();
                                }
                                $query = "select * from tbl_category where category_id = " . $_GET['category_id'];
                                $result = mysqli_query($conn, $query);

                                $row = mysqli_fetch_assoc($result);
                       echo" <input type='hidden'  name='txtid' value=$row[category_id]>";      
?>

                        

                        <tr >
                            <td class='text-center'>Category Name</td>
                            <td>
                               <input type='text'  name='txtname' value="<?php echo $row['category_name'];?>"/>
                                <input type='text'  name='txtname'>
                                
                            </td>
                        </tr>

                        <tr>
                            <td class='text-center'>Category's photo</td>
                            <td><input type='file' name='FlCategory'></td>

                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="btnsubmit"></td>
                        </tr>
                    </table>
                </form>
                <?php
                include './include/includeJS.php';
                ?>
                </body>
                </html>
