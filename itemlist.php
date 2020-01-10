<?php
session_start();
?>
<?php
include './includeDashboard/includeCss.php';
include './includeDashboard/includeHeader.php';
include './includeDashboard/includeSidebar.php';
?>
<html>
      
    
    <body>
        <div class="container-fluid">
            <div class="page-content">
        <script>
            function DeleteRow(fid)
            {

                window.location.href = "DeleteItemController.php?food_id=" + fid;
                return confirm("Are You Sure Want To Delete This Item?");
            }
            function updateRow(cid)
            {

                window.location.href = "updatefooditems.php?food_id=" + cid;
            }
        </script>
       
                      <form name="fitem" action="updatefooditems.php" method="POST">
                            
                          <h3 class="text-center text-uppercase "style="text-decoration: underline; font-weight: bold; font-size:28px;" >FoodItems List Page</h3>
        <table border="1px solid black" style=" margin-left:400px;">
            <th>Food Id</th>
            <th>Food Name</th>
            <th>Food Price</th>
            <th>S ub Category Name</th>
            <th>Delete</th>
            <th>Update</th>
            <?php
            include '\Connection.php';
            //$query = "SELECT fi.*,sb.* from tbl_food_item fi LEFT JOIN tbl_subcategory sb ON fi.subcategory_id=sb.subcategory_id ";

            $query = "SELECT tc.*,ts.* from tbl_food_item tc LEFT JOIN tbl_subcategory ts ON ts.subcategory_id=tc.subcategory_id ";
            $result = mysqli_query($conn, $query);
            if ($result) {
            while ($row = mysqli_fetch_array($result)){
            echo "<tr> <td>" . $row['food_id'] . "</td>"
            . "<td>" . $row['food_name'] . "</td>"
            . "<td>" . $row['food_price'] . "</td>"
            . "<td>" . $row['subcategory_name'] . "</td>"
            . "<td><input type='button' onclick='DeleteRow($row[food_id])' value='Delete'/></td>"
            . "<td><input type='button' onclick='updateRow($row[food_id])' value='Update'/></td></tr>";
            }
            } 
            ?>
        </table> 
            </div>
        </div>
        <?php
            include './includeDashboard/includeJS.php';
        ?>
    </body>
</html>
