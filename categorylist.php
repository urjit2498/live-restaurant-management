<!DOCTYPE html>
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
                font-size: 18px;

            }
            td{
                font-size:18px;
            }
        </style> 
        <script>
             function updaterow(cid) {
                window.location.href = "updatecategory.php?category_id=" + cid;
            }
            function Deleterow(cid) {
                window.location.href = "DeleteCategoryController?category_id=" + cid;
            }
        </script>

            </script>
    </head>

    <body>
        <div class="page-content">
            <div class="container-fluid">
                <h3 class="text-uppercase text-center" style="font-weight:bold;font-size:28px;text-decoration:underline; ">Update Categorylist Page</h3>

                <div class="row">

                    <table border="2px solid black" style="width:80%; height:80%; margin-left:25px;" >

                        <tr class="text-center">
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Category's photo</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>

                        <tbody class="text-center">
                            <?php
                            include '\Connection.php';
                            $query = "select * from tbl_category where category_id=category_id";
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr> <td>" . $row['category_id'] . "</td>"
                                    . "<td>" . $row['category_name'] . "</td>"
                                    . "<td>" . $row['uplode_photo'] . "</td>"
                                    . "<td width='75px'><input type='button' onclick='updaterow($row[category_id])' value='update'/></td>"
                                    . "<td width='75px'><input type='button' onclick=' Deleterow($row[category_id])' value='Delete'/></td></tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
        <script>
            function updaterow(cid) {
                window.location.href = "updatecategory.php?category_id=" + cid;
                return confirm('Are you sure?');
            }

            function DeleteRow(cid)
            {

                window.location.href = "DeleteCategoryController.php?category_id=" + cid;
            }
            }

        </script>
                </div>
            </div>
        </div>

        <?php
        include './includeDashboard/includeJS.php';
        ?>

    </body>
</html>
