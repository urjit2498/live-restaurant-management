<?php
session_start();
?>

<html>
    <?php
    include './includeDashboard/includeCss.php';
    include './includeDashboard/includeHeader.php';
    include './includeDashboard/includechefSidebar.php';
    ?>

    <body>
        <script>
            function checkbox(obt) {
                window.location.href = "CookingTxn.php?order_bill_txn=" + obt;
            }
            
        </script>
        <div class="container-fluid">
            <div class="page-content">
                <!--<form name="ftxn" action="CookingTxn.php" method="POST">-->
                <!--<table border="1px solid black" style="margin-left: 550px;">-->


                <label class="text-uppercase  text-center " style="font-weight: bold; text-decoration: underline; font-size:24px;">Food Menu</label>
                <!--<br><table  border="1px solid black" style='margin-right:350px;'>-->
                <div id="tablelist">

                </div>
                <br><table border="1px solid black"  style=" margin-right:280px; margin-left:250px;">
                    <!--<th>sr.no</th>--> 

                    <th>Table Name</th>
                    <th>Food Name</th>
                    <th>Food Quantity</th>
                    <th>is_Cooked</th>

                    <th>submit</th>
                    <?php
                    include '.\Connection.php';

                    //  $orderbillid=$_POST['order_bill_id'];
//                      $queryTrans= "select  *  from  order_bill_txn where order_bill_id =" . $data['order_bill_id'];


//                    $query1 = "select * from  tbl_order_bill ob left join tbl_table tt on tt.table_id=ob.table_id";
//                    $result = mysqli_query($conn, $query1);
//                    while ($row1 = mysqli_fetch_array($result)) {
//                        
                    




                        $queryTrans = "select * from  order_bill_txn ot left join tbl_food_item fi on fi.food_id=ot.food_id left join tbl_table tt on tt.table_id=ot.food_id where is_cooked='0'";
                        $resultTrans = mysqli_query($conn, $queryTrans);

                        $row = mysqli_fetch_assoc($resultTrans); 

                        
echo"<tr><td><tr><td>" . $row['table_name'] . "</td>"
                            ."<td>" . $row['food_name'] . "</td>"
                            . "<td>" . $row['quantity'] . "</td>"
                            . "<td>" . "<input type='checkbox' name='chkCooked_idnumber' value='chkCooked_idnumber' >" . "</td>"
                            . "<td>" . "<input type='submit' value='Submit' name='Submit' onclick='checkbox($row[order_bill_txn])'/>" . "</td></tr>";
                        
                    
                    ?>

                </table>

            </div>
        </div>

<?php
include './includeDashboard/includeJS.php';
?>

    </body>
</html>