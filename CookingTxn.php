<?php

include './Connection.php';
$query = "update order_bill_txn set is_cooked='1' where order_bill_txn=" . $_GET['order_bill_txn'];
echo $query;
$result = mysqli_query($conn, $query);
if ($result) {

    echo " update record";
    header("location: /AdminPage/ViewOrders.php");
}

