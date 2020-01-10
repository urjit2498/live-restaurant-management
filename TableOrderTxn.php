<html>
    <script>
function Deleterow(fid) {
           
            window.location.href = "DeleteFoodController.php?food_id=" + fid;
            return confirm("Are You Sure Want to Delete This Item?");
        }
        </script>
<?php

include'./Connection.php';
// oder id fetching

$query = "select * from  tbl_order_bill where table_id=".$_POST['id'];
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// order transaction fetch
$queryTrans = "select * from   order_bill_txn where order_bill_id=" . $data['order_bill_id'];
$queryTrans="select * from order_bill_txn ot left join tbl_food_item fi on fi.food_id=ot.food_id where order_bill_id=" . $data['order_bill_id'];
$resultTrans = mysqli_query($conn, $queryTrans);

echo"<table border='1px black solid' align='center' style=' margin-left:450px; '>";
echo"<th>Food Name</th>";
echo"<th>Order Cost</th>";
echo"<th>Food Quantity</th>";
echo"<th>Action</th>";

while ($row = mysqli_fetch_array($resultTrans)) {
    echo"<tr> <td>" . $row['food_name'] . "</td>"
    . "<td>" . $row['order_cost'] . "</td>"
    . "<td>" . $row['quantity'] . "</td>"
    . "<td><input type='button' onclick='Deleterow($row[food_id])'  value = 'Delete'/></td></tr>";
}
echo"</table>";
?>
                    



