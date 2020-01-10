<?php

include './Connection.php';
$ordertype = $_POST['sltOrderType'];
$table = $_POST['sltTable'];
$foodItem = $_POST['txtFoodId'];
$qty = $_POST['txtQty'];
$price = $_POST['txtPrice'];


$queryTable = "SELECT * FROM tbl_order_bill ob WHERE is_billed = 0 and ob.table_id =" . $table;
$resultTable = mysqli_query($conn, $queryTable);
if (!$resultTable) {
    echo mysqli_errno($conn);
}

if (mysqli_num_rows($resultTable) == 1) {
    $orderbillid = mysqli_fetch_assoc($resultTable);
    $invoiceno = $orderbillid['order_bill_id'];
    $queryOrderTxn = "insert  into order_bill_txn ( food_id, quantity, order_cost, order_bill_id) values('" . $foodItem . "','" . $qty . "','" . $price . "','" . $invoiceno . "')";

    echo $queryOrderTxn;
    header("Location: /AdminPage/ajax.php");
    //header("LOCATION: ../Admin Page/orderBillTxn.php");
    $result = mysqli_query($conn, $queryOrderTxn);
} else {
    $queryUpdateTable = ""; // 1 > 0 is active=0 vali

    $queryOrder = "insert into tbl_order_bill(table_id,order_type_id) values('" . $table . "','" . $ordertype . "') ";
    echo $queryOrder;
    $result = mysqli_query($conn, $queryOrder);
    if (!$result) {
        echo mysqli_error($conn);
    }
  // echo $queryOrderTxn;
}