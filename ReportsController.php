<?php

session_start();
include './includeDashboard/includeCss.php';
include './includeDashboard/includeHeader.php';
//include './includeDashboard/includeSidebar.php';
?>
 <input type="button" style="margin-left: 900px; " onclick="window.print();" value="print"/>
 
 <h1 style="alignment-adjust: center">Date to Date Report</h1>
    <?php

    include './Connection.php';
    $frmdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $queryTrans = "select * from tbl_order_bill ob  left join order_bill_txn ot ON ot.order_bill_id = ob.order_bill_id left join tbl_food_item fi on fi.food_id=ot.food_id 
where date_format(order_date,'%Y-%m-%d') between '$frmdate' and '$todate'";
    $resultTrans = mysqli_query($conn, $queryTrans);

    echo"<table border='1px black solid' align='center' style=' margin-left:450px; margin-top:150px;'>";
    echo"<th>Order_bill_id</th>";
    echo"<th>Food Name</th>";
    echo"<th>Food Quantity</th>";
    echo"<th>Order Cost</th>";


    while ($row = mysqli_fetch_array($resultTrans)) {

        echo"<tr> <td>" . $row['order_bill_id'] . "</td>"
        . "<td>" . $row['food_name'] . "</td>"
        . "<td>" . $row['quantity'] . "</td>"
        . "<td>" . $row['order_cost'] . "</td>"
        . " </td></tr>";
    }
    ?>
<?php

include './includeDashboard/includeJS.php';
?>