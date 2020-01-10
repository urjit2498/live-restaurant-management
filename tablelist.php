
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
            h3{
                font-weight: bold;
                font-size: 20px;
            }
            
           
        </style>
    </head>
    <body>
         <div class="page-content">
        <div class="container-fluid">
        <script>
             function deleterow(tid)
            {
       
                window.location.href = "DeleteTableController.php?table_id="+tid;
                 return confirm("Are You Sure Want To Delete This Table?");
                
            }
            function updaterow(tid) {
                window.location.href = "Updatetable.php?table_id=" + tid;
            }</script>
                   <h3 class="text-center">TableList</h3>
    <table border="1px solid black" style="margin-left:400px;">
        <th>Table id</th>
        <th>Table name</th>
        <th>Table Capacity</th>
        <th>Delete</th>
        <th>Update</th>
        
        <?php
        include '\Connection.php';
        $query = "select * from tbl_table where table_id=table_id";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr> <td>" . $row['table_id'] . "</td>"
                . "<td>" . $row['table_name'] . "</td>"
                         . "<td>" . $row['table_capacity'] . "</td>"
                          . "<td><input type='button' onclick='deleterow($row[table_id])' value='delete'/></td>"
                . "<td><input type='button' onclick='updaterow($row[table_id])' value='update'/></td></tr>";
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
