<?Php
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
                font-size:25px;
            }
            th{
                font-weight: bold;
            }
        </style>
        <script>
            function updaterow(sid) {
                window.location.href = "updatesubcategory.php?subcategory_id=" + sid;
            }
            function Deleterow(sid) {
                window.location.href = "DeleteSubCategoryController.php?subcategory_id=" + sid;
                return confirm("Are You Sure Want To Delete This Item?");
            }
        </script>



    <body>
        <div class="container-fluid">
            <div class="page-content">
                <h3 class="text-center text-uppercase" style="font-weight: bold; font-size: 28px; text-decoration:underline; ">Sub Category List Page</h3>
                <table border="2px solid black " style="margin-left:180px;" >
                    <th class="text-center">Sub Category Id</th>
                    <th class="text-center"> Sub Category Name</th>
                    <th class="text-center">Category Name</th>
                    <th class="text-center">Photo Upload</th>
                    <th class="text-center">Update</th>
                    <th class="text-center">Delete</th>
                        <?php
                        include '\Connection.php';
                        $query = "SELECT tc.*,ts.* from tbl_category tc LEFT JOIN tbl_subcategory ts ON ts.category_id=tc.category_id order by subcategory_id ";
                        $result = mysqli_query($conn, $query);
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr> <td class='text-center'>" . $row['subcategory_id'] . "</td>"
                                . "<td class='text-center'>" . $row['subcategory_name'] . "</td>"
                                . "<td class='text-center'>" . $row['category_name'] . "</td>"
                                . "<td class='text-center'>" . $row['upload_file'] . "</td>"
                                . "<td class='text-center'><input type='button' onclick='updaterow($row[subcategory_id])' value='update'/></td>"
                                . "<td class='text-center'><input type='button' onclick='Deleterow($row[subcategory_id])' value='Delete'/></td></tr>";
                            }
                        }
                        ?>
                </table>
            </div>
        </div>





        <?php
        include './includeDashboard/includeJs.php';
        ?>
    </body>
</html>
