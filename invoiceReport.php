<?php
session_start();
?>
<?php
include './includeDashboard/includeCss.php';
include './includeDashboard/includeHeader.php';
//include './includeDashboard/includeSidebar.php';
?>
<html>
    <head>

    </head>
    <h1>Generate Bill Report</h1>
    <div class="container-fluid">
        <div class="page-content">
            <!--<form name="ftable" action="FreeTableController.php" method="POST">-->
                <input type='hidden' name="table" value="<?php echo $_POST['slttable'];?>"

                <div class="tablelist">

                    <?php
                    include './Connection.php';
//                    $date=  date("d/m/Y") ;
//                    $query4="Insert into tbl_order_bill(order_date) values('".$date . "')";
                    //$result4=mysqli_query($conn,$query4);
                    $query = "select * from  tbl_order_bill where table_id=" . $_POST['slttable'];
                   // echo $date;
                    $result = mysqli_query($conn, $query);
                    $data = mysqli_fetch_assoc($result);

                    // order transaction fetch
                    $queryTrans = "select * from order_bill_txn ot left join tbl_food_item fi on fi.food_id=ot.food_id where order_bill_id=" . $data['order_bill_id'];
                    $resultTrans = mysqli_query($conn, $queryTrans);

                    echo"<table border='1px black solid'  style=' margin-right:250px; margin-top:150px;'>";
                    echo"<th>Food Name</th>";
                    echo"<th>Order Cost</th>";
                    echo"<th>Food Quantity</th>";
                    echo"<th>Total cost</th>";
                    $totalprice = 0;
                    while ($row = mysqli_fetch_array($resultTrans)) {
                      
                        $totalprice = $totalprice + ( $row['quantity'] * $row['order_cost']);
                        echo"<tr> <td>" . $row['food_name'] . "</td>"
                        . "<td>" . $row['order_cost'] . "</td>"
                        . "<td>" . $row['quantity'] . "</td>"
                        . "<td>" . $row['quantity'] * $row['order_cost']
                        . " </td></tr>";
                    }
                    echo "<tr><td colspan='3'> <strong>GRAND TOTAL</strong></td><td>$totalprice</td></tr>";


                    // echo $totalprice;
                    echo"</table>";
                    ?> 
                    <div  style='font-size: 18px; margin-left:620px;'>

                        <br><input type="submit" name="print" value="print" onclick='window.print();'  >

                    </div>

                </div>
            </form>
        </div>
    </div>




